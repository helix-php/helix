<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Config;

use Helix\Config\Exception\ConfigException;
use Helix\Config\Exception\ValidationException;
use Helix\Config\Exception\ValidatorException;
use JsonSchema\Constraints\Constraint;
use JsonSchema\Constraints\Factory;
use JsonSchema\Exception\ExceptionInterface;
use JsonSchema\SchemaStorage;
use JsonSchema\Uri\Retrievers\PredefinedArray;
use JsonSchema\Uri\Retrievers\UriRetrieverInterface;
use JsonSchema\Uri\UriRetriever;
use JsonSchema\Validator as JsonSchemaValidator;

/**
 * @psalm-type ConstraintCheckMode = Constraint::CHECK_MODE_*
 *
 * @psalm-type JsonSchemaError = array {
 *  property: string,
 *  pointer: string,
 *  message: non-empty-string,
 *  constraint: non-empty-string,
 *  context: int
 * }
 */
class Validator implements ValidatorInterface
{
    /**
     * @var list<non-empty-string>
     */
    private const BUILTIN_SCHEMAS = [
        '/dist/schema/json-schema-draft-03.json',
        '/dist/schema/json-schema-draft-04.json',
    ];

    /**
     * @var non-empty-string
     */
    private const ERROR_JSON_PARSING = 'An error occurred while parsing a JSON string: %s';

    /**
     * @var non-empty-string
     */
    private const ERROR_JSON_FORMAT = 'JSON Schema must be an array or object, but %s parsed';

    /**
     * @var int-mask-of<ConstraintCheckMode>
     */
    protected const CHECK_MODE_FLAGS = Constraint::CHECK_MODE_TYPE_CAST
                                     | Constraint::CHECK_MODE_VALIDATE_SCHEMA
    ;

    /**
     * @var array|object
     */
    protected readonly array|object $schema;

    /**
     * @var string|null
     */
    private static ?string $root;

    /**
     * @param array|object $schema
     */
    public function __construct(array|object $schema = [])
    {
        self::$root ??= self::getJsonValidatorRootPath();

        $this->schema = $schema;
    }

    /**
     * @return non-empty-string
     */
    private static function getJsonValidatorRootPath(): string
    {
        $file = (new \ReflectionClass(JsonSchemaValidator::class))
            ->getFileName()
        ;

        return \dirname($file, 3);
    }

    /**
     * @param non-empty-string $schema
     * @return static
     * @throws ConfigException
     */
    public static function fromJsonString(string $schema): self
    {
        try {
            $json = \json_decode($schema, true, flags: \JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
            $message = \sprintf(self::ERROR_JSON_PARSING, $e->getMessage());
            throw new ConfigException($message, $e->getCode(), $e);
        }

        if (!\is_array($json)) {
            $message = \sprintf(self::ERROR_JSON_FORMAT, \get_debug_type($json));
            throw new ConfigException($message);
        }

        return new self($json);
    }

    /**
     * {@inheritDoc}
     */
    public function validate(mixed $payload): ?iterable
    {
        $validator = $this->getValidator();

        try {
            self::hideWarnings(function () use ($validator, $payload) {
                $validator->validate($payload, $this->schema, static::CHECK_MODE_FLAGS);
            });
        } catch (ExceptionInterface $e) {
            //
            return [new ValidationException($e->getMessage())];
        }

        $exceptions = $this->jsonErrorsToException($validator->getErrors());

        return [...$exceptions] ?: null;
    }

    /**
     * @param \Closure $then
     * @return void
     */
    private static function hideWarnings(\Closure $then): void
    {
        $previous = \set_error_handler(static fn () => true);

        $then();

        \set_error_handler($previous);
    }

    /**
     * @return UriRetrieverInterface
     */
    private function getUriRetriever(): UriRetrieverInterface
    {
        $result = [];

        foreach (self::BUILTIN_SCHEMAS as $schema) {
            $pathname = self::$root . $schema;

            $result['file://' . $pathname] = \file_get_contents($pathname);
        }

        return new PredefinedArray($result);
    }

    /**
     * @return JsonSchemaValidator
     */
    private function getValidator(): JsonSchemaValidator
    {
        $retriever = new UriRetriever();
        $retriever->setUriRetriever($this->getUriRetriever());

        $factory = new Factory(new SchemaStorage($retriever), $retriever, self::CHECK_MODE_FLAGS);

        return new JsonSchemaValidator($factory);
    }

    /**
     * @param mixed $payload
     * @return void
     * @throws ValidatorException
     */
    public function validateOrException(mixed $payload): void
    {
        if (($exceptions = $this->validate($payload)) !== null) {
            throw new ValidatorException($exceptions);
        }
    }

    /**
     * @param list<JsonSchemaError> $errors
     * @return list<ValidationException>
     */
    private function jsonErrorsToException(iterable $errors): iterable
    {
        foreach ($errors as $error) {
            yield $this->jsonErrorToException($error);
        }
    }

    /**
     * @param JsonSchemaError $error
     * @return ValidationException
     */
    private function jsonErrorToException(array $error): ValidationException
    {
        return new ValidationException($error['message'], \explode('.', $error['property']));
    }
}

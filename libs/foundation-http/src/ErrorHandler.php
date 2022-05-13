<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Foundation\Http;

use Helix\Contracts\ErrorHandler\Http\HttpErrorHandlerInterface;
use Helix\Contracts\Http\StatusCode\StatusCodeInterface;
use Helix\Foundation\ErrorHandler as BaseErrorHandler;
use Helix\Http\StatusCode\StatusCode;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Log\LoggerInterface;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler extends BaseErrorHandler implements HttpErrorHandlerInterface
{
    /**
     * @var array<class-string<\Throwable>, StatusCodeInterface>
     */
    protected array $mapping = [];

    /**
     * @param Application $app
     * @param ResponseFactoryInterface $responses
     * @param StreamFactoryInterface $streams
     * @param LoggerInterface|null $logger
     */
    public function __construct(
        private readonly Application $app,
        protected readonly ResponseFactoryInterface $responses,
        protected readonly StreamFactoryInterface $streams,
        LoggerInterface $logger = null
    ) {
        parent::__construct($logger);
    }

    /**
     * @param \Throwable $e
     * @param ServerRequestInterface|null $request
     * @return ResponseInterface
     */
    public function throw(\Throwable $e, ServerRequestInterface $request = null): ResponseInterface
    {
        $this->report($e);

        return $this->respond($e, $request);
    }

    /**
     * @param \Throwable $e
     * @return StatusCodeInterface
     */
    protected function getStatusCodeFromException(\Throwable $e): StatusCodeInterface
    {
        foreach ($this->mapping as $class => $code) {
            if (\is_a($e, $class, true)) {
                return $code;
            }
        }

        return StatusCode::INTERNAL_SERVER_ERROR;
    }

    /**
     * @param \Throwable $e
     * @return bool
     */
    protected function isReportable(\Throwable $e): bool
    {
        $category = $this->getStatusCodeFromException($e)
            ->getCategory();

        return parent::isReportable($e) && $category->isError(server: true);
    }

    /**
     * @param \Throwable $e
     * @param ServerRequestInterface|null $request
     * @return ResponseInterface
     */
    private function respond(\Throwable $e, ?ServerRequestInterface $request): ResponseInterface
    {
        $code = $this->getStatusCodeFromException($e);

        return $this->responses
            ->createResponse($code->getCode(), $code->getReasonPhrase())
            ->withBody($this->streams->createStream(
                $this->getResponseBody($code, $e)
            ));
    }

    /**
     * @param StatusCodeInterface $code
     * @param \Throwable $e
     * @return string
     */
    private function getResponseBody(StatusCodeInterface $code, \Throwable $e): string
    {
        if ($this->app->debug) {
            return $this->getDebugResponseBody($e);
        }

        \ob_start();

        try {
            require __DIR__ . '/../resources/template/error.php';
        } catch (\Throwable) {
            \ob_clean();
            return $code->getReasonPhrase();
        }

        return (string)(\ob_get_clean() ?: $code->getReasonPhrase());
    }

    /**
     * @param \Throwable $e
     * @return string
     */
    private function getDebugResponseBody(\Throwable $e): string
    {
        $whoops = new Run();
        $whoops->allowQuit(false);
        $whoops->pushHandler(new PrettyPageHandler());
        $whoops->writeToOutput(false);

        return $whoops->handleException($e);
    }
}

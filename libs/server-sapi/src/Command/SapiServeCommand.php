<?php

/**
 * This file is part of Helix package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Helix\Server\Sapi\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Process\Process;

final class SapiServeCommand extends Command
{
    /**
     * @param non-empty-string $public
     */
    public function __construct(private string $public)
    {
        parent::__construct('serve:sapi');
    }

    /**
     * {@inheritDoc}
     */
    public function configure(): void
    {
        $this->setProcessTitle('Helix SAPI Server');
        $this->setDescription('Executes SAPI server');
        $this->addOption(
            name: 'host',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'The IP address the server should bind to',
            default: '127.0.0.1'
        );
        $this->addOption(
            name: 'port',
            mode: InputOption::VALUE_OPTIONAL,
            description: 'The port the server should be available on',
            default: '8080'
        );
    }

    /**
     * {@inheritDoc}
     * @psalm-suppress MixedAssignment
     * @psalm-suppress UnnecessaryVarAnnotation
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        /**
         * @var string $host
         * @var string $port
         */
        [$host, $port] = [$input->getOption('host'), $input->getOption('port')];

        $process = new Process(['php', '-S', $host . ':' . $port, 'index.php'], $this->public, [
            'PHP_CLI_SERVER_WORKERS' => '2'
        ]);

        $process->setTimeout(null);

        return $process->run($this->processHandler(
            new SymfonyStyle($input, $output)
        ));
    }

    /**
     * @param SymfonyStyle $io
     * @return \Closure
     */
    private function processHandler(SymfonyStyle $io): \Closure
    {
        return function (string $_, string $data) use ($io): void {
            $lines = $this->lines($data);

            while ($lines !== []) {
                $line = \array_shift($lines);

                switch (true) {
                    case \str_contains($line, ' Closing'):
                    case \str_contains($line, ' Accepted'):
                        break;

                    case \str_contains($line, 'Development Server'):
                        $this->printHeader($line, $io);
                        break;

                    case \str_contains($line, 'PHP Fatal error:'):
                        $this->printException($lines, $line, $io);
                        break;

                    default:
                        $this->printData($line, $io);
                        break;
                }
            }
        };
    }

    /**
     * @param array<string> $lines
     * @param string $error
     * @param SymfonyStyle $io
     * @return void
     */
    private function printException(array &$lines, string $error, SymfonyStyle $io): void
    {
        $io->error(\ltrim(\str_replace('PHP Fatal error:', '', $this->removeDate($error))));

        while ($lines !== []) {
            $line = \array_shift($lines);

            if (\str_ends_with($line, '{main}') || \str_ends_with($line, 'Stack trace:')) {
                continue;
            }

            if (\str_starts_with(\ltrim($line), 'thrown in ')) {
                $io->newLine();
                break;
            }

            if (\preg_match('/^#(\d+)\h+(.+?):\h(.+?)$/isum', $line, $m)) {
                $io->writeln(\sprintf(' <fg=gray>#%-2s</><fg=yellow> %s </>', $m[1], $m[3]));

                if (\preg_match('/^(.+?)\((\d+)\)$/isum', $m[2], $fm)) {
                    $io->writeln(\sprintf('     <fg=green;href=%s:%d>%1$s:%2$d</>', $fm[1], $fm[2]));
                } else {
                    $io->writeln(\sprintf('     <fg=green>%s</>', $m[2]));
                }
            } else {
                $io->writeln(\sprintf('<fg=red> %s</>', $line));
            }
        }
    }

    /**
     * @param string $line
     * @param SymfonyStyle $io
     * @return void
     */
    private function printData(string $line, SymfonyStyle $io): void
    {
        $line = @\preg_replace('/(?:https?:\/\/)?(?:\d+\.){3}\d+:\d+/isum', '<fg=gray>$0</>', $line)
            ?? $line;

        $io->writeln($this->removeDate($line));
    }

    /**
     * @param string $line
     * @return string
     */
    private function removeDate(string $line): string
    {
        return @\preg_replace('/^\[\w+.+?]\h+/isum', '', $line)
            ?? $line;
    }

    /**
     * @param string $line
     * @param SymfonyStyle $io
     * @return void
     */
    private function printHeader(string $line, SymfonyStyle $io): void
    {
        $io->info($this->removeDate(\trim($line)));
    }

    /**
     * @param string $data
     * @return array<string>
     */
    private function lines(string $data): array
    {
        return \explode("\n", \trim($data));
    }
}

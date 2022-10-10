<?php

namespace App\Command;

use Doctrine\DBAL\Exception;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Psr\Log\LoggerInterface;

use App\Service\DownloadLicenses;

#[AsCommand(
    name: 'app:download-licenses',
    description: 'Downloads the monthly ATF licenses.',
)]
class DownloadLicensesCommand extends Command
{
    private LoggerInterface $logger;

    private DownloadLicenses $download;

    public function __construct(LoggerInterface $logger, DownloadLicenses $download)
    {
        set_time_limit(0);

        $this->logger = $logger;
        $this->download = $download;

        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $this->logger->notice('Entered Method.');

        $this->download->downloadFiles();

        $this->download->insertLicenseData();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
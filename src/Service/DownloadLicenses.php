<?php
/** @noinspection MissingService */

namespace App\Service;

use App\Entity\License;
use DateTime;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class DownloadLicenses
{
    private EntityManagerInterface $entityManager;

    private LoggerInterface $logger;

    private ContainerBagInterface $params;

    private string $downloadMonth;

    private string $downloadYear;

    private string $downloadDay;

    private string $fileMonth;

    private string $fileYear;

    private string $fileDirectory;

    private string $fileName;

    private string $savePath;

    private string $url;

    private string $fileToUpload;

    public function __construct(
        LoggerInterface $logger,
        ContainerBagInterface $params,
        EntityManagerInterface $entityManager
    ) {
        set_time_limit(0);
        $this->logger = $logger;
        $this->params = $params;
        $this->entityManager = $entityManager;
    }

    /**
     * @return void
     */
    public function downloadFiles(): void
    {
        $this->downloadExcelFile();
        $this->downloadTextFile();
    }

    /**
     * @return void
     * @throws Exception
     * @noinspection PhpRedundantOptionalArgumentInspection
     */
    public function insertLicenseData(): void
    {
        //  Get the data from the Excel file.
        $data = $this->readExcelFile();

        //  Unset the first two values from the array
        unset($data[0], $data[1]);

        //  Set the commit batch sizes.
        $batchSize = 20;

        $size = count($data);
        $this->logger->notice($size.' in the array.');

        //  Since we have data to insert, go ahead and truncate the table now.
        if ($size > 1000) {
            $this->truncateLicenses();
        }

        //  Turn off SQL logging to speed up the process.
        $this->entityManager->getConnection()->getConfiguration()->setSQLLogger(null);

        //  Since you knocked off zero and one from the top of the array....
        $i = 2;
        while ($i <= $size) {
            $license = new license();
            $license->setMonth($this->getDownloadMonth());
            $license->setYear($this->getDownloadYear());
            $license->setLicRegn($data[$i][0]);
            $license->setLicDist($data[$i][1]);
            $license->setLicCnty($data[$i][2]);
            $license->setLicType($data[$i][3]);
            $license->setLicXprdte($data[$i][4]);
            $license->setLicSeqn($data[$i][5]);
            $license->setLicenseName($data[$i][6]);
            $license->setBusinessName($data[$i][7]);
            $license->setPremiseStreet($data[$i][8]);
            $license->setPremiseCity($data[$i][9]);
            $license->setPremiseState($data[$i][10]);
            $license->setPremiseZipCode($data[$i][11]);
            $license->setMailStreet($data[$i][12]);
            $license->setMailCity($data[$i][13]);
            $license->setMailState($data[$i][14]);
            $license->setMailZipCode($data[$i][15]);
            $license->setVoicePhone($data[$i][16]);
            $license->setCreatedAt(new DateTime('now'));
            $license->setUpdatedAt(new DateTime('now'));

            $this->entityManager->persist($license);

            // Detaches all objects from Doctrine!
            if (($i % $batchSize) === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
            }
            $i++;
        }

        // Persist objects that did not make up an entire batch
        $this->entityManager->flush();
        $this->entityManager->clear();

        $this->logger->notice($size.'Records were inserted.');
    }

    /**
     * @return void
     * @throws Exception
     */
    private function truncateLicenses(): void
    {
        //  Dump the data from the table.
        $conn = $this->entityManager->getConnection();
        $sql = 'truncate table license';
        $stmt = $conn->prepare($sql);
        $stmt->executeStatement();
    }

    /**
     * Pulls the data from the spreadsheet into an array.
     *
     * @return array
     * @noinspection PhpRedundantOptionalArgumentInspection
     */
    public function readExcelFile(): array
    {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($this->fileToUpload);
        $data = $spreadsheet->getActiveSheet()->toArray(null, false, false, false);

        if (is_array($data)) {
            $this->logger->notice('File that is being inserted: '.$this->fileToUpload);
        } else {
            $this->logger->notice('The data was not uploaded.');
        }
        return $data;
    }

    /**
     * Get the Excel file from the ATF web server
     */
    public function downloadExcelFile(): void
    {
        $this->makeDates(4);
        try {
            $this->setFileDirectory();
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
        }
        $this->setFileName('xlsx');

        //  Delete file if it is over 120 days old
        if (file_exists($this->getSavePath())) {
            unlink($this->getSavePath());
            $this->logger->notice('120 file Deleted: '.$this->getSavePath());
        }
        $this->logger->notice('The four month old Excel file was not deleted.');

        $i = 3;
        while ($i >= 0) {
            $this->logger->notice('I is == to: '.$i);
            $this->makeDates($i);
            try {
                $this->setFileDirectory();
            } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            }
            $this->setFileName('xlsx');
            $this->setUrl('xlsx');

            if (!file_exists($this->getSavePath())) {
                $this->executeDownload();
            }

            if (file_exists($this->getSavePath()) && filesize($this->getSavePath()) < 1000000) {
                unlink($this->getSavePath());
                $this->logger->notice('The excel file from '.$i.' months ago was empty and was deleted.');
            } else {
                //  This is the file we will upload into the database.
                $this->fileToUpload = $this->getSavePath();
            }
            $i--;
        }
    }

    /**
     * Assign the date values to class vars.
     *
     * @param int $offset = 0
     *
     * @return void
     */
    private function makeDates(int $offset = 0): void
    {
        $dates = array();
        $now = new DateTime('NOW');

        $this->setDownloadMonth($now->format('m'));
        $this->setDownloadDay($now->format('d'));
        $this->setDownloadYear($now->format('Y'));

        switch ($offset) {
            case 1:
                $now->modify('-1 Month');
                break;
            case 2:
                $now->modify('-2 Months');
                break;
            case 3:
                $now->modify('-3 Months');
                break;
            case 4:
                $now->modify('-4 Months');
                break;
        }

        $this->setFileMonth($now->format('m'));
        $this->setFileYear($now->format('y'));
    }

    /**
     * Create the URL to download the ATF's FFL licensee file in Excel format.
     *
     * @param string $fileType
     *
     * @return void
     */
    private function setURL(string $fileType): void
    {
        if ($fileType === 'txt') {
            //  https://www.atf.gov/firearms/docs/undefined/0122-ffl-listtxt/download
            $urlString = 'https://www.atf.gov/firearms/docs/undefined/'.$this->getFileMonth().$this->getFileYear()
                .'-ffl-listtxt/download';
        } else {
            //  https://www.atf.gov/firearms/docs/undefined/0122-ffl-listxlsx/download
            $urlString = 'https://www.atf.gov/firearms/docs/undefined/'.$this->getFileMonth().$this->getFileYear()
                .'-ffl-listxlsx/download';
        }

        $this->url = $urlString;

        $this->logger->notice('The Download URL is: '.$urlString);
    }

    /**
     * Execute the download only.
     *
     * @return void
     */
    private function executeDownload(): void
    {
        set_time_limit(0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $this->getUrl());
        $fp = fopen($this->getSavePath(), 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        $this->logger->notice('The File was downloaded to: '.$this->getSavePath());
    }

    /**
     * Get the Excel file from the ATF web server
     *
     * @return void
     */
    public function downloadTextFile(): void
    {
        $this->makeDates(4);
        try {
            $this->setFileDirectory();
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface) {
        }
        $this->setFileName('txt');

        //  Delete file if it is over 120 days old
        if (file_exists($this->getSavePath())) {
            unlink($this->getSavePath());
            $this->logger->notice('120 file old Text File was Deleted: '.$this->getSavePath());
        }

        $this->logger->notice('The four month old Text file was not deleted.');

        $i = 3;
        while ($i >= 0) {
            $this->logger->notice('I is == to: '.$i);
            $this->makeDates($i);
            try {
                $this->setFileDirectory();
            } catch (NotFoundExceptionInterface|ContainerExceptionInterface) {
            }
            $this->setFileName('txt');
            $this->setUrl('txt');

            if (!file_exists($this->getSavePath())) {
                $this->executeDownload();
            }

            if (file_exists($this->getSavePath()) && filesize($this->getSavePath()) < 1000000) {
                unlink($this->getSavePath());
                $this->logger->notice('The Text file from '.$i.' months ago was empty and was deleted.');
            }
            $i--;
        }
    }

    /**
     * @return string
     */
    public function getFileDirectory(): string
    {
        return $this->fileDirectory;
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function setFileDirectory(): void
    {
        // $this->logger->notice('The Project Directory is: ' . $this->params->get('app.project_dir'));
        // $this->logger->notice('The License Directory is: ' . $this->params->get('app.atf_license_path'));
        $this->fileDirectory = $this->params->get('app.project_dir').$this->params->get('app.atf_license_path');
    }

    /**
     * @return string
     */
    public function getDownloadMonth(): string
    {
        return $this->downloadMonth;
    }

    /**
     * @param string $downloadMonth
     */
    public function setDownloadMonth(string $downloadMonth): void
    {
        $this->downloadMonth = $downloadMonth;
    }

    /**
     * @return string
     */
    public function getDownloadYear(): string
    {
        return $this->downloadYear;
    }

    /**
     * @param string $downloadYear
     */
    public function setDownloadYear(string $downloadYear): void
    {
        $this->downloadYear = $downloadYear;
    }

    /**
     * @return string
     */
    public function getDownloadDay(): string
    {
        return $this->downloadDay;
    }

    /**
     * @param string $downloadDay
     */
    public function setDownloadDay(string $downloadDay): void
    {
        $this->downloadDay = $downloadDay;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * Create the file name for the downloaded file to be saved.
     * Extension must be text or xlsx
     *
     * @param string $fileType
     */
    public function setFileName(string $fileType): void
    {
        $file = 'ffl_licenses_'.$this->getFileYear().'-'.$this->getFileMonth().'.'.$fileType;
        // file.= '_downloaded(' . $this->getDownloadYear() . '-'. $this->getDownloadMonth(). ').' . $fileType;
        $this->logger->notice('The File NameSimple is: '.$file);

        $this->fileName = $file;
        $this->setSavePath($this->getFileDirectory().$file);
    }

    /**
     * @return string
     */
    public function getSavePath(): string
    {
        return $this->savePath;
    }

    /**
     * @param string $savePath
     */
    public function setSavePath(string $savePath): void
    {
        $this->savePath = $savePath;
    }

    /**
     * @return string
     */
    public function getFileMonth(): string
    {
        return $this->fileMonth;
    }

    /**
     * @param string $fileMonth
     */
    public function setFileMonth(string $fileMonth): void
    {
        $this->fileMonth = $fileMonth;
    }

    /**
     * @return string
     */
    public function getFileYear(): string
    {
        return $this->fileYear;
    }

    /**
     * @param string $fileYear
     */
    public function setFileYear(string $fileYear): void
    {
        $this->fileYear = $fileYear;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}
<?php

namespace App;

abstract class Report implements ReportInterface
{
    private int $reportNumber;
    private string $reportName;
    private string $text;
    private string $author;
    private string $dataCreateReport;
    private int $revisionNumber;
    private string $dataLastUpdateReport;

    public function __construct($reportNumber, $reportName)
    {
        $this->reportNumber = $reportNumber;
        $this->reportName = $reportName;
    }

    /**
     * @return string
     */
    public function getReportName(): string
    {
        return $this->reportName;
    }

    /**
     * @param string $reportName
     */
    public function setReportName(string $reportName): void
    {
        $this->reportName = $reportName;
    }


    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = trim($text);
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @return int
     */
    public function getRevisionNumber(): int
    {
        return $this->revisionNumber;
    }

    /**
     * @param int $revisionNumber
     */
    public function setRevisionNumber(int $revisionNumber): void
    {
        $this->revisionNumber += $revisionNumber;
    }

    /**
     * @return string
     */
    public function getDataLastUpdateReport(): string
    {
        return $this->dataLastUpdateReport;
    }

    /**
     * @param string $dataLastUpdateReport
     */
    public function setDataLastUpdateReport(string $dataLastUpdateReport): void
    {
        $this->dataLastUpdateReport = $dataLastUpdateReport;
    }


    public function render(array $array): string
    {
        foreach ($array as $anchor => $value) {
            $text = str_replace("{{$anchor}}", $value, $this->getText());
            $this->setText($text);
        }
        return $this->getText();
    }

    public function nameToUpperCase():string
    {
        return mb_strtoupper($this->getReportName());
    }

    public function modifyAuthorName(): string
    {
        $words = explode(' ', $this->getAuthor());
        $initials = '';
        foreach ([$words[1], $words[2]] as $word) {
            $initials .= mb_substr($word, 0, 1) . '.';
        }
        return "$words[0] $initials";
    }

    public function getCompanyInfo(object $company): string {

        $name = $company->getCompanyName();
        $ipn = $company->getCompanyIPN();
        $kpp = $company->getCompanyKPP();
        $director = $company->getDirectorName();

        return "$name" . PHP_EOL . "(ІПН:$ipn/КПП:$kpp).Директор: $director";
    }

//    abstract protected function checkDate(string $date): void;

    private function save(string $date): void
    {
        $this->setRevisionNumber(1);
        $this->setDataLastUpdateReport($date);
    }
}
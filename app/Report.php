<?php

namespace App;

abstract class Report
{
    protected int $reportNumber;
    protected string $reportName;
    protected string $text;
    protected string $author;
    protected string $dataCreateReport;
    protected int $revisionNumber;
    protected string $dataLastUpdateReport;

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


    public function render(string $value): string
    {
        return preg_replace('/{(.+?)}/', $value, $this->getText());
    }

    public function nameToUpperCase():string
    {
        return mb_strtoupper($this->getReportName());
    }

    public function modifyAuthorName()
    {
        $words = explode(' ', $this->getAuthor());
        $initials = '';
        foreach ([$words[1], $words[2]] as $word) {
            $initials .= mb_substr($word, 0, 1) . '.';
        }
        return "{$words[0]} {$initials}";
    }
    
    abstract protected function checkDate(string $date): void;

    private function save(string $date): void
    {
        $this->setRevisionNumber(1);
        $this->setDataLastUpdateReport($date);
    }
}
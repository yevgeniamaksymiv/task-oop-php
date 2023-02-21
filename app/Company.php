<?php

namespace App;

class Company
{
    private string $companyName;
    private int $companyIPN;
    private int $companyKPP;
    private string $companyAddress;
    private string $directorName;

    public function __construct
    (
        string $companyName,
        int $companyIPN,
        int $companyKPP,
        string $companyAddress,
        string $directorName
    )
    {
        $this->companyName = $companyName;
        $this->companyIPN = $companyIPN;
        $this->companyKPP = $companyKPP;
        $this->companyAddress = $companyAddress;
        $this->directorName = $directorName;
    }


    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return int
     */
    public function getCompanyIPN(): int
    {
        return $this->companyIPN;
    }

    /**
     * @return int
     */
    public function getCompanyKPP(): int
    {
        return $this->companyKPP;
    }

    /**
     * @return string
     */
    public function getCompanyAddress(): string
    {
        return $this->companyAddress;
    }

    /**
     * @return string
     */
    public function getDirectorName(): string
    {
        return $this->directorName;
    }

}
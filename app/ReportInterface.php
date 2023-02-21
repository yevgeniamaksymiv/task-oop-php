<?php

namespace App;

interface ReportInterface
{
    public function checkDate(string $date): void;
}
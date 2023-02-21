<?php

namespace App;

class YearReport extends Report
{

    public function checkDate(string $date): void
    {
        echo date('Y', strtotime($date)), PHP_EOL;
    }
}
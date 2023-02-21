<?php

namespace App;

class MonthReport extends Report
{
    public function checkDate(string $date): void
    {
    echo date('m', strtotime($date)), PHP_EOL;
    }
}
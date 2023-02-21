<?php

namespace App;

class WeekReport extends Report
{
    public function checkDate(string $date): void
    {
        echo date('W', strtotime($date)), PHP_EOL;
    }

}
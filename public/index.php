<?php

require_once '../vendor/autoload.php';

$yearReport = new \App\YearReport(1, 'year-report');
$monthReport = new \App\MonthReport(2, 'month-report');
$weekReport = new \App\WeekReport(3, 'week-report');

$yearReport->checkDate('11/12/1991');
$monthReport->checkDate('11/12/1991');
$weekReport->checkDate('11/12/1991');

$weekReport->setAuthor('Максимів Євгенія Леонідівна');
$name = $weekReport->modifyAuthorName();
echo $name, PHP_EOL;

$titleYearReport = $yearReport->nameToUpperCase();
echo $titleYearReport, PHP_EOL;

$yearReport->setText('     Hello {anchor} world {anchor}      ');
$text = $yearReport->getText();
echo $text . '.end', PHP_EOL;

$anchorReplaceText = $yearReport->render('Palmo');
echo $anchorReplaceText, PHP_EOL;


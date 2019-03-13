<?php
echo Carbon::parse('2015/03/30')->toDateTimeString(); //2015-03-30 00:00:00
echo Carbon::parse('2015-03-30')->toDateTimeString(); //2015-03-30 00:00:00
echo Carbon::parse('2015-03-30 00:10:25')->toDateTimeString(); //2015-03-30 00:10:25

echo Carbon::parse('today')->toDateTimeString(); //2015-07-26 00:00:00
echo Carbon::parse('yesterday')->toDateTimeString(); //2015-07-25 00:00:00
echo Carbon::parse('tomorrow')->toDateTimeString(); //2015-07-27 00:00:00
echo Carbon::parse('2 days ago')->toDateTimeString(); //2015-07-24 20:49:53
echo Carbon::parse('+3 days')->toDateTimeString(); //2015-07-29 20:49:53
echo Carbon::parse('+2 weeks')->toDateTimeString(); //2015-08-09 20:49:53
echo Carbon::parse('+4 months')->toDateTimeString(); //2015-11-26 20:49:53
echo Carbon::parse('-1 year')->toDateTimeString(); //2014-07-26 20:49:53
echo Carbon::parse('next wednesday')->toDateTimeString(); //2015-07-29 00:00:00
echo Carbon::parse('last friday')->toDateTimeString(); //2015-07-24 00:00:00
?>



<?php
$year = '2015';
$month = '04';
$day = '12';

echo Carbon::createFromDate($year, $month, $day); //2015-04-12 20:55:59

$hour = '02';
$minute = '15';
$second = '30';

echo Carbon::create($year, $month, $day, $hour, $minute, $second); //2015-04-12 02:15:30
?>

<?php
echo Carbon::now()->addDays(25); //2015-08-20 21:10:00
echo Carbon::now()->addWeeks(3); //2015-08-16 21:10:00
echo Carbon::now()->addHours(25); //2015-07-27 22:10:00
echo Carbon::now()->subHours(2); //2015-07-26 19:10:00
echo Carbon::now()->addHours(2)->addMinutes(12); //2015-07-26 23:22:00
echo Carbon::now()->modify('+15 days'); //2015-08-10 21:10:00
echo Carbon::now()->modify('-2 days'); //2015-07-24 21:10:00
?>



<?php
$carbon->isWeekend();
$carbon->isFuture();
$carbon->isLeapYear();

$carbon->year;
$carbon->month;

$carbon->daysInMonth;
$carbon->weekOfYear;

?>

<?php
echo Carbon::now()->addYear()->diffForHumans();    // in 1 year
$born = Carbon::createFromDate(1987, 4, 23);
$noCake = Carbon::createFromDate(2014, 9, 26);
$yesCake = Carbon::createFromDate(2014, 4, 23);
$overTheHill = Carbon::now()->subYears(50);
var_dump($born->isBirthday($noCake));              // bool(false)
var_dump($born->isBirthday($yesCake));             // bool(true)
var_dump($overTheHill->isBirthday());              // bool(true) -> default compare it to today!
?>

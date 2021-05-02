<?php
include __DIR__ . '/../src/RateInterface.php';
include __DIR__ . '/../src/RateAbstract.php';
include __DIR__ . '/../src/ServiceInterface.php';
include __DIR__ . '/../src/DriverService.php';
include __DIR__ . '/../src/GPSService.php';
include __DIR__ . '/../src/RateBasic.php';
include __DIR__ . '/../src/RateByHour.php';
include __DIR__ . '/../src/RateStudent.php';

/** =230 **/
$rate = new \App\RateBasic(5, 60);
echo $rate->getPrice() . ' руб';

///** =245 **/
//$rate = new \App\RateBasic(5, 60);
//echo $rate->addServices(new \App\GPSService()) . ' руб';
//
///** =330 **/
//$rate = new \App\RateBasic(5, 60);
//echo $rate->addServices(new \App\DriverService()) . ' руб';
//
///** =200 **/
//$rate = new \App\RateByHour( 60);
//echo $rate->getPrice() . ' руб';
//
///** =420 **/
//$rate = new \App\RateByHour(120);
//echo $rate->addServices(new \App\GPSService()) . ' руб';
//
///** =500 **/
//$rate = new \App\RateByHour(120);
//echo $rate->addServices(new \App\DriverService()) . ' руб';
//
///** =80 **/
//$rate = new \App\RateStudent(5, 60);
//echo $rate->getPrice() . ' руб';
//
///** =95 **/
//$rate = new \App\RateStudent(5, 60);
//echo $rate->addServices(new \App\GPSService()) . ' руб';
//
///** =180 **/
//$rate = new \App\RateStudent(5, 60);
//echo $rate->addServices(new \App\DriverService()) . ' руб';
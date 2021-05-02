<?php

namespace App;

class GpsService implements PaymentInterface
{
    protected $minute;
    protected $rate = 15 / 60;

    public function getPriceOfService($minute)
    {
        $time = $minute > 60 ? $minute : 60;
        $priceForGps = ceil($time * $this->rate);
        return $priceForGps;
    }

}
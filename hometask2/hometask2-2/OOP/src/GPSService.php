<?php

namespace App;

class GPSService implements PaymentInterface
{
    protected $rate = 15 / 60;

    public function getPriceOfService($minute)
    {
        $time = $minute > 60 ? $minute : 60;
        $priceForGps = ceil($time * $this->rate);
        return $priceForGps;
    }

}
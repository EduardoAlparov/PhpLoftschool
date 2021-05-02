<?php

namespace App;

class DriverService implements PaymentInterface
{
    public function getPriceOfService($minutes)
    {
        return 100;
    }

}
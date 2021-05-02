<?php

namespace App;

interface PaymentInterface
{
    public function getPriceOfService($minute);
}
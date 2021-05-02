<?php
namespace App;

class VoiceService implements PaymentInterface
{
    public function getPriceOfService($minute)
    {
        return 2000;
    }

}
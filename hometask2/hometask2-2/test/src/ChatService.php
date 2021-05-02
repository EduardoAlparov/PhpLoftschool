<?php

namespace App;

class ChatService implements PaymentInterface
{
    public function getPriceOfService($minute)
    {
        return 300;
    }

}
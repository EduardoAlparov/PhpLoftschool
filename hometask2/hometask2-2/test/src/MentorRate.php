<?php
namespace App;

class MentorRate
{
    protected $services = [];
    public $price;

    public function __construct($price)
    {
        $this->price = $price;
        $this->services[] = new VoiceService();
        $this->services[] = new ChatService();

    }

    public function getPrice() {
        $price = 1;
        return $price;

    }

    public function addServices()
    {
        foreach ($this->services as $value) {
            $this->price += $value->getPriceOfService(1);
        }

        return $this->price;
    }
}

class BasicRate
{
    protected $priceByKilometer = 10;
    protected $priceByMinute = 3;
    protected $services = [];
    protected $distance;
    protected $minutes;

    public function __construct(int $distance, int $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
        $this->services[] = new GpsService();
    }

    public function getPrice() {
        $price = $this->distance * $this->priceByKilometer + $this->minutes * $this->priceByMinute;
        if ($this->services) {
            foreach ($this->services as $value) {
                $price += $value->getPriceOfService($this->minutes);
            }
        }
        return $price;
    }

    public function getMinutes(): int
    {
        return $this->minutes;
    }
}

class ByHourRate
{
    protected $priceByKilometer = 0;
    protected $priceByMinute = 200/60;
    protected $services = [];
    protected $minutes;

    public function __construct(int $minutes)
    {
//        $this->services[] = new VoiceService();
//        $this->services[] = new ChatService();
        $this->minutes = $minutes;
    }

    public function getPrice() {
        return $price = $this->minutes - $this->minutes % 60 + 60;
    }
}


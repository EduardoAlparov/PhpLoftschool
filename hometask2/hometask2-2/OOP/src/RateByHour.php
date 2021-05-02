<?php
namespace App;

class RateByHour extends RateAbstract
{
    protected $rate = 200/60;

    public function __construct(int $minutes)
    {
        parent::__construct($distance = 0,$minutes);

    }

    public function getPrice() {
        $time = $this->minutes > 60 ? ($this->minutes - $this->minutes % 60) : 60;
        $price = ceil($time * $this->rate);
        $this->price = $price;
        return $price;
    }
}

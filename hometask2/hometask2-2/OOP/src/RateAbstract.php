<?php
namespace App;

class RateAbstract implements RateInterface
{
    protected $services = []; //массив сервисов
    protected $minutes; // время в дороге в мин.
    protected $price; // итоговая цена тарифа
    protected $distance; // пройденное расстояние в км.

    public function __construct(int $distance, int $minutes)
    {
        $this->distance = $distance;
        $this->minutes = $minutes;
    }

    /** Расчет цены тарифа **/
    public function getPrice()
    {
        $price = $this->distance * $this->priceByKilometer + $this->minutes * $this->priceByMinute;
        $this->price = $price;
        return $price;
    }

    /** Добавление сервиса **/
    public function addServices($service)
    {
        $this->getPrice();

        array_push($this->services, $service);

        if ($this->services) {
            foreach ($this->services as $value) {
                $this->price += $value->getPriceOfService($this->minutes);
            }
        }
        return $this->price;
    }
}
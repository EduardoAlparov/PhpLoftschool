<?php
namespace App;

interface RateInterface
{
    public function getPrice();
    public function addServices($service);
}
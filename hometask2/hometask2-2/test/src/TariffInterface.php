<?php

interface iTariff
{
    public function calculatePrice();
    public function addService(ServiceInterface $service);
    public function getMinutes(): int;
    public function getDistance(): int;
}
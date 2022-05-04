<?php

namespace Shopping;

class Product
{
    public string $id;
    public string $name;
    public float $price;

    public function __construct(string $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}
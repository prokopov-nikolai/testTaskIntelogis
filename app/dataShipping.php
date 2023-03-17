<?php

class DataShipping {
    private float $price;
    private string $dateDelivery;
    private array $errors;

    /**
     * @param float $price
     * @param string $dateDelivery
     */
    public function __construct(float $price, string $dateDelivery, array $errors = []) {
        $this->price = $price;
        $this->dateDelivery = $dateDelivery;
        $this->errors = $errors;
    }

    public function getData(): array
    {
        return [
            'price' => $this->price,
            'date' => $this->dateDelivery,
            'errors' => $this->errors,
        ];
    }
}
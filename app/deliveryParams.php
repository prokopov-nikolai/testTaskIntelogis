<?php

use JetBrains\PhpStorm\ArrayShape;

class DeliveryParams implements InputParams {
    private string $sourceKladr;
    private string $targetKladr;
    private float $weight;
    private array $errors;

    /**
     * @param string $sourceKladr
     * @param string $targetKladr
     * @param float $weight
     */
    public function __construct(string $sourceKladr, string $targetKladr, float $weight)
    {
        $this->sourceKladr = $sourceKladr;
        $this->targetKladr = $targetKladr;
        $this->weight = $weight;
        $this->errors = [];
    }


    public function Validate(): bool
    {
        if (strlen($this->sourceKladr) != 17) $this->errors['sourceKladr'] = 'wrong length';
        if (strlen($this->targetKladr) != 17) $this->errors['targetKladr'] = 'wrong length';
        if ($this->weight <= 0) $this->errors['weight'] = 'weight must be more then zero';
        if (count($this->errors) == 0) return true;
        return false;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return ['errors' => $this->errors];
    }


}
<?php
require_once 'transportCompany.php';

class TransportCompany2 extends TransportCompany implements Request {

    private int $basePrice = 150;

    public function __construct()
    {
        $this->baseUrl = ROOT . 'transportCompany2/index.json';
    }

    public function requestData(DeliveryParams $deliveryParams): void
    {
        $this->requestResult = json_decode(file_get_contents($this->baseUrl), true);
        if ($this->validateRequestData())
        {
            $this->setDataShipping();
        } else {
            $this->setErrors();
        }
    }

    protected function setDataShipping(): void
    {
        $this->dataShipping = new DataShipping(
            $this->basePrice * $this->requestResult['coefficient'],
            $this->requestResult['date']
        );
    }

    private function validateRequestData(): bool
    {
        if ($this->requestResult['error']) {
            $this->errors = ['serviceError' => $this->requestResult['error']];
        }

        if (!is_numeric($this->requestResult['coefficient'])) {
            $this->errors['coefficient'] = 'invalid coefficient';
        }

        if (!preg_match('#^\d{4}-\d{2}-\d{2}$#', $this->requestResult['date'])) {
            $this->errors['date'] = 'invalid date';
        }

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }
}
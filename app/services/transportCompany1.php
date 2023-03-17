<?php
require_once 'transportCompany.php';

class TransportCompany1 extends TransportCompany implements Request {

    public function __construct()
    {
        $this->baseUrl = ROOT . 'transportCompany1/index.json';
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
        $date = new DateTime('+'.$this->requestResult['period'].'days');
        $this->dataShipping = new DataShipping(
            $this->requestResult['price'],
            $date->format('Y-m-d')
        );
    }

    private function validateRequestData(): bool
    {
        if ($this->requestResult['error']) {
            $this->errors = ['serviceError' => $this->requestResult['error']];
        }

        if (!is_numeric($this->requestResult['price'])) {
            $this->errors['price'] = 'invalid price';
        }

        if (!is_numeric($this->requestResult['period'])) {
            $this->errors['period'] = 'invalid period';
        }

        if (count($this->errors) == 0) {
            return true;
        }

        return false;
    }
}
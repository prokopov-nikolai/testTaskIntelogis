<?php

abstract class TransportCompany {
    protected string $baseUrl;
    protected array $requestResult;
    protected array $errors = [];
    protected DataShipping $dataShipping;

    abstract protected function setDataShipping(): void;

    /**
     * @return DataShipping
     */
    public function getDataShipping(): DataShipping
    {
        return $this->dataShipping;
    }

    public function setErrors()
    {
        $this->dataShipping = new DataShipping(0, '', $this->errors);
    }
}
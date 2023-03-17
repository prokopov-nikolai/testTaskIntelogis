<?php

class DeliveryController {

    private array $result = [];

    public function Calculate($params): array
    {
        $deliveryParams = $params['deliveryParams'];
        if (!$deliveryParams->Validate()) {
            return $deliveryParams->getErrors();
        }

        $transportCompanies = $params['transportCompanies'];
        foreach ($transportCompanies as $transportCompanyName) {
            $transportCompany = transportCompanyFactory::$transportCompanyName();
            $transportCompany->requestData($deliveryParams);
            $this->result[$transportCompanyName] = $transportCompany->getDataShipping()->getData();
        }

        return $this->result;
    }
}
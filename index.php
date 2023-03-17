<?php
const ROOT = __DIR__.'/';
require_once ROOT.'app/controllerConfiguration.php';
require_once ROOT.'app/router.php';
require_once ROOT.'app/controllerDelivery.php';
require_once ROOT.'app/inputParams.php';
require_once ROOT.'app/deliveryParams.php';
require_once ROOT.'app/dataShipping.php';
require_once ROOT.'app/services/transportCompanyFactory.php';
require_once ROOT.'app/services/request.php';
require_once ROOT.'app/services/transportCompany.php';
require_once ROOT.'app/services/transportCompany1.php';
require_once ROOT.'app/services/transportCompany2.php';


$params = [
    'deliveryParams' => new DeliveryParams(
        '33000002000000300',
        '89000005000004800',
        .5
    ),
    'transportCompanies' => [
        'transportCompany1',
        'transportCompany2'
    ]
];
$controllerConfiguration = new ControllerConfiguration('delivery', 'calculate', $params);
$router = new Router($controllerConfiguration);
$result = $router->execute();
var_dump(json_encode($result));
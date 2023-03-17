<?php


class Router
{
    private ControllerConfiguration $controllerConfiguration;

    /**
     * @param ControllerConfiguration $controllerConfiguration
     */
    public function __construct(ControllerConfiguration $controllerConfiguration)
    {
        $this->controllerConfiguration = $controllerConfiguration;
    }

    /**
     * @throws Exception
     */
    public function execute() {
        $className = $this->controllerConfiguration->getController();
        $class = null;

        if (class_exists($className)) {
            $class = new $className();
        } else
            throw new \Exception('Класс ' . $className . ' не найден');

        $methodName = $this->controllerConfiguration->getMethod();
        $params = $this->controllerConfiguration->getParams();
        if (method_exists($class, $methodName)) {
            return $class->$methodName($params);
        } else
            throw new \Exception('Метод ' . $methodName . ' класса ' . $className . ' не найден');

        return new $className;
    }
}
<?php

class ControllerConfiguration {
    private string $controller;
    private string $method;
    private array $params;

    /**
     * @param string $controller
     * @param string $method
     */
    public function __construct(string $controller, string $method, array $params)
    {
        $this->controller = $controller;
        $this->method = $method;
        $this->params = $params;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return ucwords($this->controller).'Controller';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return ucwords($this->method);
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }
}
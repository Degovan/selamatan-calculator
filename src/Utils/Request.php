<?php

namespace Selamatan\App\Utils;

class Request
{
    private $_data;

    public function __construct()
    {
        $this->_data = $_REQUEST;
    }

    public function __set($name, $value)
    {
        return $this->_data[$name] = $value;
    }

    public function __get($name)
    {
        return array_key_exists($name, $this->_data)
            ? $this->_data[$name] : null;
    }

    public function all()
    {
        return $this->_data;
    }
}

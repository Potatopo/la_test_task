<?php

namespace src\Entity;

class BaseRequest
{
    /** @var string */
    protected $productName, $productParams;

    function __construct($productName, $productParams)
    {
        $this->productName = $productName;
        $this->productParams = $productParams;
    }

    function get_productName(){
        return $this->productName;
    }

    function get_productParams(){
        return $this->productParams;
    }
}

<?php

namespace RestApi\CustomApi\Model;

use RestApi\CustomApi\Api\MyApiInterface;

class MyApi implements MyApiInterface
{
    /**
     * Retrieve custom message
     *
     * @return string
     */
    public function getCustomMessage()
    {
        return "This is my first RestApi Call.";
    }
}
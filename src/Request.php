<?php

namespace Antiockus;

class Request
{
    public $request;
    public $method;

    public function __construct($req, $method)
    {
        $this->request = $req;
        $this->method  = $method;
    }
}

<?php

namespace Antiockus;

class User
{
    private $isLoggedIn = false;
    private $id;


    public function __construct($id)
    {
        $this->isLoggedIn = $_SESSION['isLoggedIn'] = true;
        $this->id = $_SESSION['user_id'] = $id;
    }
}

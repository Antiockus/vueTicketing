<?php

namespace Antiockus\Controllers;

class ClientController
{
    public $twig;
    public function __construct($twig)
    {
        $this->twig = $twig;
    }


    public function create_view()
    {
        $session = $_SESSION;
        echo $this->twig->render('create_client.html', ['app' => $_SESSION]);
    }
}

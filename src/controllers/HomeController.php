<?php

namespace Antiockus\Controllers;

class HomeController
{
    public $twig;

    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function index()
    {

        return $this->twig->render('index.html', ['app' => $_SESSION]);
        // echo "testing";
        // return $request;
    }
    public function about()
    {
        return $this->twig->render('about.html', ['app' => $_SESSION]);
    }

    public function contact()
    {
        return $this->twig->render('contact.html', ['app' => $_SESSION]);
    }

    public function test()
    {
        return $this->twig->render('test.html', ['app' => $_SESSION]);
    }
}

<?php

    namespace Antiockus\Controllers;
    
    class UserController
    {

        public $twig;

        public function __construct($twig)
        {
            $this->twig = $twig;
        }

        public function register()
        {
            echo $this->twig->render('register.html', []);
        }

        public function login()
        {
            echo $this->twig->render('login.html', []);
        }
    }
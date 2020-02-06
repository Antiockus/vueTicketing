<?php

namespace Antiockus\Controllers;

use Doctrine\DBAL\DriverManager;

require "bootstrap.php";


class TicketController
{

    public $twig;
    public function __construct($twig)
    {
        $this->twig = $twig;
    }
    public function index()
    {

        echo $this->twig->render('index.html', ['test' => 'test']);
    }

    public function create_view()
    {
        echo $this->twig->render('create_ticket.html', ['app' => $_SESSION]);
    }

    public function view_user_tickets()
    {
        $connectionParams = [
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'driver' => 'pdo_mysql'
        ];

        $conn = DriverManager::getConnection($connectionParams);
        if ($_SESSION['isLoggedIn']) {
            $sql = 'SELECT * FROM tickets WHERE owner_id = "' . $_SESSION['user_id'] . '"';
            $stmt = $conn->query($sql);
            $tickets = $stmt->fetchAll();
            echo $this->twig->render('view_user_tickets.html', ['tickets' => $tickets, 'app' => $_SESSION]);
        } else {
            header('Location:/login');
        }
    }
}

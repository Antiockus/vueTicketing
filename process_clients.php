<?php
    require "database.class.php";
    require "client.class.php";

    if($_SERVER["REQUEST_METHOD"] == 'GET'){
        exit("cannot find");
    }

    $db = new DB();

    $client_name = htmlspecialchars($_POST['client_name']);
    $client_url = htmlspecialchars($_POST['client_url']);
    $client_description = $_POST['client_description'];
    $client = new Client($client_name, $client_url, $client_description);

    $db->saveClient($client);
    $db->close();
    header('Location:/');


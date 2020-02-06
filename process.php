<?php
require_once "bootstrap.php";

use Antiockus\Client;
use Antiockus\Ticket;

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    exit("cannot find");
}

if ($_POST['value_type'] == 'ticket') {
    try {

        $ticket_title = htmlspecialchars($_POST['ticket_title']);
        $ticket_description = htmlspecialchars($_POST['ticket_description']);
        $ticket_status = $_POST['ticket_status'];
        $ticket = new Ticket($ticket_title, $ticket_description, $ticket_status);

        $ticket->saveTicket();
    } catch (PDOException $e) {
        header('Location:/about');
        exit('Error:' . $e->getMessage());
    }
} else if ($_POST['value_type'] == 'client') {
    $client_name = htmlspecialchars($_POST['client_name']);
    $client_url = htmlspecialchars($_POST['client_url']);
    $client_description = htmlspecialchars($_POST['client_description']);
    $client = new Client($client_name, $client_url, $client_description);
    $client->saveClient();
} else {
    echo "no value type found";
}

header('Location:/');
exit;

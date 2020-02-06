<?php

require 'bootstrap.php';

$name = htmlspecialchars($_POST['contact_name']);
$subject = htmlspecialchars($_POST['subject']);
$message = htmlspecialchars($_POST['message']);

mail($_ENV['CONTACT'], $subject, $message);

header('Location:/');
#test

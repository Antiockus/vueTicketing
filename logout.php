<?php
//unset user session data
//set user isLoggedIn to false
session_start();
session_unset();
session_destroy();
header('Location:/');

<?php

include("connection.php");


unset($_SESSION["id"]);
unset($_SESSION["rid"]);
unset($_SESSION["hid"]);
session_destroy(); 


header('Location: login.php');
exit();

?>
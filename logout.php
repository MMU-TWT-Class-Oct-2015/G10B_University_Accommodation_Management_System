<?php

include("connection.php");


unset($_SESSION["id"]);
unset($_SESSION["rid"]);
session_destroy(); 


header('Location: login.php');
exit();

?>
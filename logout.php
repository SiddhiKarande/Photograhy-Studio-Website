<?php


session_start();
unset($_SESSION["adminEmail"]);
unset($_SESSION["adminPassword"]);
header("Location:index.html");
?>
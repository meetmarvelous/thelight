<?php
session_start();
unset($_SESSION["admin_id"]);
unset($_SESSION["username"]);
header("Location:login.php");

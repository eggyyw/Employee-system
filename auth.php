<?php

session_start();
if(!isset($_SESSION["scg"])) header("Location: login.php");
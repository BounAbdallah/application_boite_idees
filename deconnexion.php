<?php

session_start();

if (isset($_SESSION)) {
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
    exit;
} else {
    header('Location: accueil.php');
    exit;
}

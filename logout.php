<?php
session_start();

session_unset();

session_destroy();

if ($_SESSION['id']) {
    $_SESSION['error'] = 'Erreur lors de la deconnexion';
} else {
    $_SESSION['success'] = "Déconnexion effectué avec succès";
    header("Location:index.php");
}
?>
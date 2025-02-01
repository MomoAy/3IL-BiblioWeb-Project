<?php
require "connectDB.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql2 = " AND id NOT IN (SELECT book_id FROM livres_user)";

    //les catégories et les dates
    $cat = "SELECT categorie FROM livres";
    $cat_result = $conn->query($cat);
    if (!$cat_result) {
        echo "Erreur";
    } else {
        $cat_datas = $cat_result->fetchAll();
    }

    $date = "SELECT date FROM livres";
    $result_date = $conn->query($date);
    if (!$result_date) {
        echo "Erreur";
    } else {
        $date_datas = $result_date->fetchAll();
    }

    //les livres
    if (isset($_GET['date']) && isset($_GET['categorie'])) {
        $s_date = $_GET['date'];
        $s_cat = $_GET['categorie'];    
        $sql = "SELECT * FROM livres WHERE date = '$s_date' AND categorie = '$s_cat'";
        $sql .= $sql2;
        $result = $conn->query($sql);
        if (!$result) {
            echo "Erreur";
        } else {
            $livres_datas = $result->fetchAll();
        }
    } else if (isset($_GET['date'])) {
        $s_date = $_GET['date'];
        $sql = "SELECT * FROM livres WHERE date = '$s_date'";
        $sql .= $sql2;
        $result = $conn->query($sql);
        if (!$result) {
            echo "Erreur";
        } else {
            $livres_datas = $result->fetchAll();
        }
    } else if (isset($_GET['categorie'])) {
        $s_cat = $_GET['categorie'];
        $sql = "SELECT * FROM livres WHERE categorie = '$s_cat'";
        $sql .= $sql2;
        $result = $conn->query($sql);
        if (!$result) {
            echo "Erreur";
        } else {
            $livres_datas = $result->fetchAll();
        }
    } else {
        $sql = "SELECT * FROM livres WHERE id NOT IN (SELECT livre_id FROM livres_user)";
        $result = $conn->query($sql);
        if (!$result) {
            echo "Erreur";
        } else {
            $livres_datas = $result->fetchAll();
        }
    }

} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['date']) && isset($_POST['categorie'])) && ($_POST['date'] != '' && $_POST['categorie'] != '')) {
        $s_date = $_POST['date'];
        $s_cat = $_POST['categorie'];
        header("Location:biblio.php?date=$s_date&categorie=$s_cat");
    } else if (isset($_POST['date']) && $_POST['date'] != '') {
        $s_date = $_POST['date'];
        header("Location: biblio.php?date=$s_date");
    } else if (isset($_POST['categorie']) && $_POST['categorie'] != '') {
        $s_cat = $_POST['categorie'];
        header("Location: biblio.php?categorie=$s_cat");
    } else {
        header("Location: biblio.php");
    }
}
?>
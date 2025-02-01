<?php
    require "connectDB.php";
    session_start();

    $user_id = $_SESSION['id'];
    $book_id = $_GET['book_id'];

    $sql = "INSERT INTO livres_user (user_id, livre_id) VALUES (:user_id, :book_id)";
    $result = $conn->prepare($sql);
    $result->execute(['user_id' => $user_id, 'book_id' => $book_id]);

    if($result->rowCount() > 0) {
        $_SESSION['success'] = "Emprunt effectuer";
        header("Location:biblio.php");
    } else {
        $_SESSION["error"] = "Impossible d'emprunter un livre pour le moment";
        header("Location: biblio.php");
    }

?>
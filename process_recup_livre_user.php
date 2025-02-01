<?php 
    require "connectDB.php";

    $sql = "SELECT * FROM livres l 
    JOIN livres_user ON l.id = livres_user.livre_id
    JOIN users u ON livres_user.user_id = u.id";

    $result = $conn->prepare($sql);
    $result->execute();

    $books = $result->fetchAll();
?>
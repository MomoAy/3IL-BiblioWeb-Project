<?php
session_start();
require 'connectDB.php';

$id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name']) && isset($_POST['first_name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $first_name = $_POST['first_name'];
        $email = $_POST['email'];

        $sql = "UPDATE users SET name = '$name', first_name = '$first_name', email = '$email' WHERE id = '$id';";
        $u_result = $conn->query($sql);

        if ($u_result) {
            //Si cest bon c'est bon
            $sql = "SELECT * FROM users where id = '$id';";
            $result = $conn->query($sql);

            if (!$result) {
                echo "error";
            } else {
                $user_data = $result->fetch();
                $_SESSION['name'] = $user_data['name'];
                $_SESSION['first_name'] = $user_data['first_name'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['success'] = "Modification effectué avec succès";
                header('Location: profil.php');
            }
        } else {
            $_SESSION['error'] = "Quelques choses n'a pas marché";
            header("Location:profil.php");
        }
    } else {
        $_SESSION['error'] = "Toutes les valeurs n'ont pas été remplies";
        header("Location:profil.php");
    }
}
?>
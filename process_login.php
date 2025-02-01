<?php
require "connectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST['password'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result) {
            $user_data = $result->fetch();
            if (password_verify($password, $user_data['password'])) {
                session_start();
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['name'] = $user_data['name'];
                $_SESSION['first_name'] = $user_data['first_name'];
                $_SESSION['email'] = $user_data['email'];
                $_SESSION['success'] = "Connexion réussi";
                header("Location: biblio.php");
            } else {
                $_SESSION['error'] = "Email ou mot de passe incorrect";
                header("Location: login.php");
            }
        } else {
            $_SESSION['error'] = "Email ou mot de passe incorrect";
            header("Location: login.php");
        }
    } else {
        $_SESSION['error'] = "Veuillez remplir tous les champs";
        header("Location: login.php");
    }
}

?>
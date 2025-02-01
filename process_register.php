<?php
require "connectDB.php";

if (isset($_POST['name']) && isset($_POST['first_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($confirm_password !== $password) {
        header("Location:inscription.php");
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    $exist_user_sql = "SELECT * FROM users WHERE email = :email";
    $result = $conn->prepare($exist_user_sql);
    $result->execute(['email' => $email]);

    $data = $result->fetch();

    if ($data) {
        $_SESSION['error'] = "Un compte avec le même email existe déjà";
        header("Location:inscription.php");
    } else {
        $sql = "INSERT INTO users(name, first_name, email, password) VALUES ('$name', '$first_name', '$email', '$password');";
        $result = $conn->query($sql);

        if (!$result) {
            $_SESSION['error'] = "Quelque chose n'a pas fonctionné";
            header("Location:inscription.php");
        } else {
            $_SESSION['success'] = "Vous êtes inscrit avec succès";
            header("Location:login.php");
        }
    }
} else {
    $_SESSION['error'] = "Vous devez remplir tous les champs";
    header("Location:login.php");
}
?>
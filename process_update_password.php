<?php
require 'connectDB.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['id'];
    $old_password = $_POST['password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_new_password'];

    // Vérifier si les deux nouveaux mots de passe correspondent
    if ($new_password !== $confirm_password) {
        $_SESSION['error'] = "Les nouveaux mots de passe ne correspondent pas.";
        header("Location: profil.php");
    }

    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $user_id]);

    $user = $stmt->fetch();

    if (!$user || !password_verify($old_password, $user['password'])) {
        $_SESSION['success'] = "Ancien mot de passe incorrect.";
    }

    $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute([$new_hashed_password, $user_id]);

    $_SESSION['success'] = "Mot de passe modifié avec succès !";
    header("Location: profil.php");
}
?>
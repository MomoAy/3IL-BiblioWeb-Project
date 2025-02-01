<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if ($title) {
        echo $title;
    } else {
        echo "Site biblio";
    } ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <script defer src="https://unpkg.com/alpinejs@latest/dist/cdn.min.js"></script>
</head>

<body>
    <?php if (isset($_SESSION['success'])): ?>

        <div x-cloak x-show="showAlert" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 3000)"
            role="alert" class="bg-green-100 p-2 px-4 fixed bottom-1 right-0 z-10">
            <p><?= $_SESSION['success'] ?></p>
            <?php unset($_SESSION['success']); ?>
        </div>

    <?php elseif(isset($_SESSION['error'])): ?>

        <div x-cloak x-show="showAlert" x-data="{ showAlert: true }" x-init="setTimeout(() => showAlert = false, 3000)"
            role="alert" class="bg-red-100 p-2 px-4 fixed bottom-1 right-0 z-10">
            <p><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        </div>

    <?php endif; ?>
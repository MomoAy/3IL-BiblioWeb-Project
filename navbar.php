<?php ?>
<header class="w-full fixed top-0 z-10 backdrop-blur-xl text-xl text-orange-400">
    <nav class="w-full flex justify-between items-center shadow-xl p-3">
        <section>
            <h1>Biblio</h1>
        </section>

        <section>
            <ul class="flex justify-center">
                <li class="p-5 rounded"><a href="index.php">Acceuil</a></li>
                <li class="p-5 rounded"><a href="biblio.php">Bibliothèques</a></li>
                <li class="p-5 rounded"><a href="contact.php">Contact</a></li>
            </ul>
        </section>

        <section class="flex space-x-4">
            <?php if (!isset($_SESSION['id'])): ?>
                <a href="inscription.php"
                    class="outline-none bg-orange-600 border-orange text-white p-2 rounded outline-orange-500/50 hover:bg-white hover:text-orange-500 transition">Inscription</a>

                <a href="login.php"
                    class="bg-white text-orange-600 p-2 rounded bg-white outline-none outline-orange-500/50 hover:bg-orange-600 hover:text-white hover:outline-orange-500/50 transition">Connexion</a>
            <?php else: ?>
                <section class="w-[50px] h-[50px] rounded flex flex-col items-center mr-3">
                    <a href="profil.php" class="flex flex-col items-center">
                        <img width="50px" height="50px" class="rounded-xl" src="profil.png"
                            alt="profil de l'utilisateur <?= $_SESSION['name'] ?>" />
                        <h4><?= $_SESSION["first_name"] ?></h4>
                    </a>
                </section>
            <?php endif; ?>
        </section>
    </nav>
</header>
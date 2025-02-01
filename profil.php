<?php
$title = "Page de profil";
require "header.php";
require "process_recup_livre_user.php";
?>


<main class="w-full h-screen">
    <div class="w-full h-full flex justify-evenly p-5">
        <section class="w-2/6 h-full space-y-5">
            <section
                class="w-4/5 h-3/6 p-2 bg-gray-100 border border-orange shadow-xl rounded-xl flex flex-col items-center justify-around">
                <img class="rounded-full" src="profil.png"
                    alt="Photo de profil de l'utilisateur <?= $_SESSION["name"] ?>" />
                <h3><?= $_SESSION["first_name"] ?> <?= $_SESSION["name"] ?></h3>
                <a href="logout.php"
                    class="outline-none bg-orange-600 border-orange text-white p-2 rounded outline-orange-500/50 hover:bg-white hover:text-orange-500 transition">Deconnexion</a>
            </section>

            <section class="w-4/5 h-3/6 p-2 border rounded-xl bg-gray-100 shadow-xl">
                <h2 class="text-center text-xl underline">Informations sur les livres empruntés</h2>
                <?php foreach ($books as $book): ?>
                    <p class="p-2">-  <?= $book['titre'] ?></p>
                <?php endforeach; ?>
            </section>
        </section>

        <section class="w-4/6 h-full p-3 space-y-10">
            <a href="index.php" class="text-xl text-orange-500 hover:underline"><- Revenir à la page d'acceuil</a>
                    <section class="w-full p-5 bg-gray-100 rounded shadow-xl border">
                        <form class="w-full mt-4 space-y-5" method="post" action="process_update_user_profil.php">
                            <div>
                                <input
                                    class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                                    placeholder="Nom" id="name" name="name" type="text"
                                    value="<?= $_SESSION["name"] ?>" />
                            </div>

                            <div>
                                <input
                                    class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                                    placeholder="Prenom" id="first_name" name="first_name" type="text"
                                    value="<?= $_SESSION["first_name"] ?>" />
                            </div>

                            <div>
                                <input
                                    class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                                    placeholder="Email" id="email" name="email" type="email"
                                    value="<?= $_SESSION["email"] ?>" />
                            </div>

                            <section class="w-full flex justify-end items-center">
                                <button
                                    class="w-1/3 justify-center py-1 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 rounded-md text-white outline-none outline-orange-400"
                                    id="update_profil" type="submit">
                                    Modifier le profil
                                </button>
                            </section>
                        </form>
                    </section>

                    <section class="w-full p-5 bg-gray-100 border rounded shadow-xl">
                        <form class="w-full mt-4 space-y-5" action="process_update_password.php" method="post">
                            <div>
                                <input
                                    class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                                    placeholder="Mot de passe" id="password" name="password" type="password" />
                            </div>

                            <div>
                                <input
                                    class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                                    placeholder="Nouveau mot de passe" id="new_password" name="new_password"
                                    type="password" />
                            </div>

                            <div>
                                <input
                                    class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                                    placeholder="Confirmer le nouveau mot de passe" id="confirm_new_password"
                                    name="confirm_new_password" type="password" />
                            </div>

                            <section class="w-full flex justify-end items-center">
                                <button
                                    class="w-1/3 justify-center py-1 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 rounded-md text-white outline-none outline-orange-400"
                                    id="update_password" name="update_password" type="submit">
                                    Modifier le mot de passe
                                </button>
                            </section>
                        </form>
                    </section>
        </section>
    </div>
</main>

<?php require "footer.php"; ?>
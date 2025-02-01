<?php $title = "Page d'inscription";
require "header.php"; ?>

<?php require "navbar.php"; ?>
<main class="w-full h-screen">
    <section class="w-full h-full bg-[url('bg.jpg')] bg-cover bg-no-repeat bg-center flex justify-center items-center">

        <div class="w-2/6 rounded-lg shadow h-auto p-6 bg-white relative overflow-hidden opacity-90">
            <div class="flex flex-col justify-center items-center space-y-2">
                <h2 class="text-2xl font-medium text-slate-700">Inscription</h2>
                <p class="text-slate-500">Entrez vos informations ci-dessous</p>
            </div>

            <form class="w-full mt-4 space-y-3" method="post" action="process_register.php">
                <div>
                    <input
                        class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                        placeholder="Nom" id="name" name="name" type="text" required />
                </div>

                <div>
                    <input
                        class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                        placeholder="Prenom" id="first_name" name="first_name" type="text" required />
                </div>

                <div>
                    <input
                        class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                        placeholder="Email" id="email" name="email" type="email" required />
                </div>

                <div>
                    <input
                        class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                        placeholder="Mot de passe" id="password" name="password" type="password" required />
                </div>

                <div>
                    <input
                        class="outline-none border-2 rounded-md px-2 py-1 text-slate-500 w-full focus:border-orange-300"
                        placeholder="Confirmer le mot de passe" id="confirm_password" name="confirm_password"
                        type="password" required />
                </div>

                <section class="w-full flex justify-center items-center">
                    <button
                        class="w-1/2 justify-center py-1 bg-orange-500 hover:bg-orange-600 active:bg-orange-700 rounded-md text-white outline-none outline-orange-400"
                        id="register" type="submit">
                        S'inscrire
                    </button>
                </section>

                <p class="flex justify-center space-x-1">
                    <span class="text-slate-700"> Vous avez déjà un compte ? </span>
                    <a class="text-orange-500 hover:underline" href="login.php">Connectez-vous</a>
                </p>
            </form>
        </div>

    </section>
</main>

<?php require "footer.php"; ?>
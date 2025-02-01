<?php $title = "Bibliothèque";
require "header.php";
require "navbar.php";
require "process_recup_livres.php" ?>

<main class="w-full h-screen">
    <section class="w-full h-1/6 bg-[url('banner.jpg')] bg-cover bg-no-repeat bg-center">
    </section>

    <section class="w-full h-1/6">
        <form class="w-full h-full flex justify-evenly items-center flex-row" action="process_recup_livres.php"
            method="post">
            <select class="w-1/4 p-2 rounded" name="categorie" id="categorie">
                <option value="">--Choisissez une catégorie--</option>
                <?php foreach ($cat_datas as $cat): ?>
                    <option value=<?= $cat['categorie'] ?>><?= $cat['categorie'] ?></option>
                <?php endforeach; ?>
            </select>

            <select class="w-1/4 p-2 rounded" name="date" id="date">
                <option value="">--Choisissez une date de parution--</option>
                <?php foreach ($date_datas as $date): ?>
                    <option value=<?= $date['date'] ?>><?= $date['date'] ?></option>
                <?php endforeach; ?>
            </select>

            <button data-ripple-light="true" type="submit"
                class="select-none rounded-lg bg-orange-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                Aller ->
            </button>
        </form>
    </section>

    <section class="flex gap-3 flex-wrap justify-center">

        <?php foreach ($livres_datas as $livre): ?>
            <div
                class="relative flex w-80 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md border space-x-6 mb-10">
                <div class="relative mx-4 -mt-6 h-40 overflow-hidden rounded-xl bg-clip-border text-white shadow-lg">
                    <img src="<?= $livre['image']; ?>" alt="Image du livre <?= $livre['titre']; ?>">
                </div>
                <div class="p-6 flex-1">
                    <h5
                        class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-orange-gray-900 antialiased">
                        <?= $livre['titre']; ?>
                    </h5>
                    <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased line-clamp-4">
                        <?= $livre['description']; ?>
                    </p>
                </div>
                <div class="p-6 pt-0 flex justify-center items-center">
                    <?php if (isset($_SESSION['id'])): ?>
                        <a href="process_borrow_book.php?book_id=<?= $livre['id'] ?>" data-ripple-light="true" type="button"
                            class="select-none rounded-lg bg-orange-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Emprunter
                        </a>
                    <?php else: ?>
                        <button data-ripple-light="true" type="button" disabled
                            class="select-none rounded-lg bg-orange-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-orange-500/20 transition-all hover:shadow-lg hover:shadow-orange-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Emprunter
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

    </section>
</main>
<!-- <div class="w-1/3">
            <h2 class="text-4xl font-bold text-white">Livres</h2>
            <p class="text-lg text-white">Voici les derniers livres ajoutés à la bibliothèque</p>
        </div>
        <div class="w-1/3">
            <h2 class="text-4xl font-bold text-white">Auteurs</h2>
            <p class="text-lg text-white">Voici les derniers auteurs ajoutés à la bibliothèque</p>
        </div>
        <div class="w-1/3">
            <h2 class="text-4xl font-bold text-white">Emprunts</h2>
            <p class="text-lg text-white">Voici les derniers emprunts effectués</p>
        </div> -->
<!-- <div class="w-full">
            <h2 class="text-4xl font-bold text-white">Recherche</h2>
            <input class="w-full px-4 py-2 text-white rounded-md bg-gray-800 focus:outline-none focus:ring-2 focus:ring-orange-500" type="text" placeholder="Rechercher un livre...">
            <div class="flex items-center justify-center mt-4">

            </div>
        </div> -->

<?php require "footer.php"; ?>
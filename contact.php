<?php $title = "Page de Contact";
require "header.php"; ?>

<main class="w-full h-screen">
    <?php require "navbar.php"; ?>

    <section class="w-full h-full flex">
        <section class="w-1/2 h-full flex justify-center items-center space-x-8">
            <div class="w-1/4 h-4/6 bg-[url('bg_c1.jpg')] bg-cover bg-no-repeat bg-center"></div>
            <div class="w-1/4 h-4/6 mt-32 bg-[url('bg_c2.jpg')] bg-cover bg-no-repeat bg-center"></div>
        </section>

        <section class="w-1/2 h-full flex justify-center items-center flex-col">
            <h2 class="text-3xl font-bold">Dites-nous😊</h2>
            <section class="w-3/5">
                <form class="w-full" action="" method="post">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" <?php if (isset($_SESSION['id'])): ?>
                                disabled value="<?= $_SESSION['name'] ?>" <?php endif; ?> required >
                    </div>

                    <div class=" form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" <?php if (isset($_SESSION['id'])): ?>
                                disabled value="<?= $_SESSION['email'] ?>" <?php endif; ?> required>
                    </div>

                    <div class=" form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    </div>

                    <div class="form-group flex space-x-8 flex-row justify-center items-center mt-5">
                        <button
                            class="w-1/3 outline-none bg-orange-600 border-orange text-white p-2 rounded outline-orange-500/50 hover:bg-white hover:text-orange-500 transition"
                            type="submit" class="btn btn-primary">Envoyer</button>
                        <button
                            class="w-1/3 bg-white text-orange-600 p-2 rounded bg-white outline-none outline-orange-500/50 hover:bg-orange-600 hover:text-white hover:outline-orange-500/50 transition"
                            type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </form>
            </section>
        </section>
    </section>
</main>

<?php require "footer.php"; ?>
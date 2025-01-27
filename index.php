<?php $title = "Page d'acceuil";
require "header.php" ?>


<main class="w-full h-screen overflow-y-auto">
    <section class="w-screen h-full">
        <video class="w-full h-full absolute inset-0 object-cover" autoplay muted loop>
            <source src="back.mp4">
        </video>

        <?php require "navbar.php"; ?>

        <div class="absolute inset-0 flex items-center justify-center text-white">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Animi ad quae provident ratione placeat sit
                nostrum quidem inventore reprehenderit, similique blanditiis corporis distinctio? Odit libero id
                repellendus mollitia consectetur neque!
            </p>
        </div>
    </section>
</main>

<?php require "footer.php"; ?>
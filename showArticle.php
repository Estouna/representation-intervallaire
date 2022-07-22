<?php
require_once 'actions/showArticleAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <!-- 
        -------------------------------------------------------- AFFICHE UN ARTICLE -------------------------------------------------------- 
    -->
    <?php foreach ($articles as $article) : ?>
        <article class="mt-5">
            <h2 class="text-center text-primary"><?= $article['titre'] ?></h2>
            <p class="text-center"><?= $article['created_at'] ?></p>
            <p class="border-top border-primary mt-5 px-1 py-5"><?= $article['description'] ?></p>
        </article>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
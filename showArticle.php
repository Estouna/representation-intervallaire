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
        <article>
            <h2 class="text-primary text-center mt-2 mb-3 p-2 rounded"><?= $article['titre'] ?></h2>
            <p class="text-center"><?= $article['created_at'] ?></p>
            <p class="border-top border-bottom border-primary mt-5 px-1 py-5"><?= $article['description'] ?></p>
        </article>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
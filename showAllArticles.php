<?php
require_once 'actions/showAllArticlesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <?php if (isset($_GET['id']) && !empty($_GET['id'])) : ?>
        <h1 class="text-primary text-center my-5"><?= get_name_categorie($_GET['id']) ?></h1>
        <?php else : ?>
        <h1 class="text-primary text-center my-5">Liste des articles</h1>
    <?php endif; ?>

    <?php foreach ($articles as $article) : ?>
        <div class="border border-primary my-4 p-2 rounded">
            <h2><a href="showArticle.php?id=<?= $article['id'] ?>"><?= $article['titre'] ?></a></h2>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
<?php
require_once 'actions/categoriesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-primary text-center my-5">Catégories</h1>

    <!-- 
        -------------------------------------------------------- CATEGORIES -------------------------------------------------------- 
    -->
    <?php foreach ($categories as $category) : ?>
        <div class="border border-primary my-4 p-2 rounded">
            <h2><a href="sous-categories?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h2>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
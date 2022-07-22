<?php
require_once 'actions/sub-categoriesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-primary text-center my-5"><?= $name_cat ?></h1>

    <!-- 
        -------------------------------------------------------- AFFICHE LES SOUS-CATEGORIES -------------------------------------------------------- 
    -->
    <?php foreach ($sub_categories as $sub_category) : ?>
        <div class="border border-primary my-4 p-2 rounded">
            <h2><a href="/sub-categories.php?id=<?= $sub_category['id'] ?>"><?= $sub_category['name'] ?></a></h2>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
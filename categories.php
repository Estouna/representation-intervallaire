<?php
require_once 'actions/categoriesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-white bg-primary text-center mt-2 mb-5 p-2">Catégories</h1>

    <!-- 
        -------------------------------------------------------- AFFICHE LES CATEGORIES RACINES -------------------------------------------------------- 
    -->
    <?php foreach ($categories as $category) : ?>
        <div class="row justify-content-center p-1">
            <div class="text-center border border-primary my-2 p-1 rounded col-sm-6 col-md-5 col-lg-4">
                <h3><a href="sub-categories?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h3>
            </div>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
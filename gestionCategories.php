<?php
require_once 'actions/categoriesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-white bg-primary text-center mt-2 mb-5 p-2">Gestion des catégories</h1>


    <div class="text-center mt-5">
        <a href="create_category.php" class="fs-5 btn btn-primary">Ajouter une nouvelle catégorie</a>
    </div>

    <h2 class="text-primary text-center border-top border-bottom border-primary py-2 my-5">Ajouter une sous-catégories dans :</h2>

    <!-- 
        -------------------------------------------------------- AFFICHE LES CATEGORIES RACINES -------------------------------------------------------- 
    -->
    <?php foreach ($categories as $category) : ?>
        <div class="row justify-content-center p-1">
            <div class="text-center border border-primary my-2 p-1 rounded col-sm-5 col-md-4 col-lg-3">
                <h3><a href="create_category.php?id=<?= $category['id']?>"><?= $category['name'] ?></a></h3>
            </div>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
<?php
require_once 'actions/gestionCategoriesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-primary text-center mt-2">Gestion des catégories</h1>


    <div class="text-center mt-5">
        <a href="create_category.php" class="btn btn-primary">Ajouter une nouvelle catégorie</a>
    </div>

    <h2 class="text-primary text-center my-5">Ajouter une sous-catégories dans :</h2>

    <!-- 
        -------------------------------------------------------- AFFICHE TOUTES LES SOUS-CATEGORIES -------------------------------------------------------- 
    -->
    <?php foreach ($categories as $category) : ?>
        <div class="border border-primary my-4 p-2 rounded">
            <h2><a href="create_category.php?id=<?= $category['id'] ?>"><?= $category['name'] ?></a></h2>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
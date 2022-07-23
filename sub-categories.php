<?php
require_once 'actions/sub-categoriesAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-white bg-primary text-center mt-2 mb-5 p-2"><?= $name_cat ?></h1>

    <!-- 
        -------------------------------------------------------- AFFICHE LES SOUS-CATEGORIES -------------------------------------------------------- 
    -->
    <?php foreach ($sub_categories as $sub_category) : ?>
        <div class="row justify-content-center p-1">
            <div class="text-center border border-primary my-2 p-1 rounded col-sm-6 col-md-5 col-lg-4">
                <h3><a href="sub-categories.php?id=<?= $sub_category['id'] ?>"><?= $sub_category['name'] ?></a></h3>
            </div>
        </div>
    <?php endforeach; ?>

</main>


<?php include 'includes/footer.php'; ?>
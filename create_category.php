<?php
require_once 'actions/create_categoryAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <h1 class="text-white bg-primary text-center mt-2 mb-5 p-2"><?= !empty($_GET['id']) ? get_name_categorie($_GET['id']) : 'Nouvelle catégorie' ?></h1>

    <!-- 
        -------------------------------------------------------- MESSAGE -------------------------------------------------------- 
    -->
    <?php
    if (isset($erreur)) {
        echo '<div class="alert alert-danger text-center" role="alert">' . $erreur . "</span></div>";
    }
    if (isset($valide)) {
        echo '<span class="alert alert-success text-center" role="alert">' . $valide . "</span>";
    }
    ?>

    <!-- 
        -------------------------------------------------------- FORMULAIRE D'AJOUT DE CATEGORIE -------------------------------------------------------- 
    -->
    <form method="post" action="#" class="mb-5">
        <label for="titre">Titre de la nouvelle catégorie</label>
        <input class="form-control" type="text" name="titre">

        <!-- 
            Si ajout d'une catégorie racine 
        -->
        <?php if (!isset($_GET['id']) && empty($_GET['id'])) : ?>
            <p class="text-center bg-info text-white border-info py-2 mt-5">Une nouvelle catégorie contient au minimum une sous-catégorie, vous pourrez en ajouter d'autres par la suite.</p>

            <label for="titre-sc">Titre de la sous-catégorie</label>
            <input class="form-control" type="text" name="titre-sc">
        <?php endif; ?>

        <button class="btn btn-primary my-4" type="submit" name="validateCateg">Ajouter</button>
    </form>

    <!-- 
        -------------------------------------------------------- AFFICHE LES SOUS-CATEGORIES DE LA CATEGORIE RACINES -------------------------------------------------------- 
    -->
    <!-- 
        Si ajout d'une sous-catégorie 
    -->
    <?php if (isset($_GET['id']) && !empty($_GET['id'])) : ?>
        <?php foreach ($sub_cat as $sc) : ?>
            <div class="row justify-content-center p-1">
                <div class="text-center border border-primary my-2 p-1 rounded col-sm-5 col-md-4 col-lg-3">
                    <h3><a href="create_category.php?id=<?= $sc['id'] ?>"><?= $sc['name'] ?></a></h3>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</main>


<?php include 'includes/footer.php'; ?>
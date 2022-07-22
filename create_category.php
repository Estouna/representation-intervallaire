<?php
require_once 'actions/create_categoryAction.php';
include 'includes/head.php';
include 'includes/navbar.php';
?>

<main class="container">

    <!-- 
        -------------------------------------------------------- MESSAGE -------------------------------------------------------- 
    -->
    <h1 class="text-primary text-center my-5">Nouvelle catégorie</h1>
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
    <form method="post" action="#">
        <label for="titre">Titre de la catégorie</label>
        <input class="form-control" type="text" name="titre">
        <button class="btn btn-primary my-4" type="submit" name="validateCateg">Ajouter</button>
    </form>

</main>


<?php include 'includes/footer.php'; ?>
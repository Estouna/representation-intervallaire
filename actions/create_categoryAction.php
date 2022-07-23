<?php
require_once 'db/Db.php';
require_once 'functions/functions_categories.php';

if (isset($_POST['validateCateg'])) {

    if (!empty($_POST['titre'])) {

        $titre = htmlspecialchars($_POST['titre']);
        $titre_subCat = htmlspecialchars($_POST['titre-sc']);

        $titrelength = strlen($titre);
        $titreSubCatlength = strlen($titre_subCat);
        if ($titrelength <= 30 && $titreSubCatlength <= 30) {

            $checkIfCategoryAlreadyExists = $bdd->prepare('SELECT name FROM categories_interval WHERE name = ?');
            $checkIfCategoryAlreadyExists->execute(array($titre));
            if ($checkIfCategoryAlreadyExists->rowCount() == 0) {


                if (isset($_GET['id']) && !empty($_GET['id'])) {

                    $get_id = htmlspecialchars($_GET['id']);

                    // requête sur la sous-catégorie
                    $subCat = $bdd->prepare("SELECT parent_id, lft, rght FROM categories_interval WHERE id = ?");
                    $subCat->execute(array($get_id));
                    $subCatFetch = $subCat->fetch();

                    // parent_id, lft, rght de la sous-catégorie
                    $sc_parent_id = $subCatFetch['parent_id'];
                    $sc_lft = $subCatFetch['lft'];
                    $sc_rght = $subCatFetch['rght'];

                    // requête sur la catégorie parente
                    $cat = $bdd->prepare("SELECT rght FROM categories_interval WHERE id = ?");
                    $cat->execute(array($sc_parent_id));
                    $catFetch = $cat->fetch();
                    // rght de la catégorie parente
                    $c_rght = $catFetch['rght'];

                    var_dump($sc_parent_id, $sc_lft, $sc_rght, $c_rght);
                } else {
                    // requête sur la catégorie racine ayant le plus grand bord droit
                    $catRacine = $bdd->prepare("SELECT MAX(rght) FROM categories_interval");
                    $catRacine->execute();
                    $catRacineFetch = $catRacine->fetch();

                    // Bord droit le plus grand de la bdd
                    $cr_max_rght = (int)$catRacineFetch[0];
                    // Bord gauche
                    $lft = $cr_max_rght + 1;
                    // Bord droit + 1
                    $rght = $lft + 3;
                    $parent_id = 0;
                    $level = 0;

                    $insertCategory = $bdd->prepare('INSERT INTO categories_interval(name, lft, rght, parent_id, level) VALUES(?, ?, ?, ?, ?)');
                    $insertCategory->execute(array(
                        $titre,
                        $lft,
                        $rght,
                        $parent_id,
                        $level
                    ));

                    // requête sur l'id de la catégorie parente
                    $req_id_catParent = $bdd->prepare("SELECT MAX(id) FROM categories_interval");
                    $req_id_catParent->execute();
                    $req_id_catParentFetch = $req_id_catParent->fetch();
                    // id de la catégorie parente
                    $id_cat_parent = (int)$req_id_catParentFetch['0'];

                    $lft_subCat = $lft + 1;
                    $rght_subCat = $lft_subCat + 1;
                    $parent_id_subCat = $id_cat_parent;
                    $level_subCat = 1;

                    $insertSub_category = $bdd->prepare('INSERT INTO categories_interval(name, lft, rght, parent_id, level) VALUES(?, ?, ?, ?, ?)');
                    $insertSub_category->execute(array(
                        $titre_subCat,
                        $lft_subCat,
                        $rght_subCat,
                        $parent_id_subCat,
                        $level_subCat
                    ));

                    // var_dump($lft_subCat, $rght_subCat, $parent_id_subCat);

                    header('Location: create_category.php');
                    exit;
                }
            } else {
                $erreur = "Ce nom de catégorie existe déjà";
            }
        } else {
            $erreur = "Le nom de la catégorie ou de la sous-catégorie ne doit pas dépasser 30 carcatères";
        }
    } else {
        $erreur = "Vous devez donner un nom à la catégorie";
    }
}

if (isset($_GET['id']) && !empty($_GET['id'])) {

    $get_id = htmlspecialchars($_GET['id']);
    $categ =  findCategoryById($get_id);
    // $flat_categ = flattenArray($categ);

    $id_cat =  $categ[0]['id'];
    $name_cat =  $categ[0]['name'];
    $lft_cat =  $categ[0]['lft'];
    $rght_cat =  $categ[0]['rght'];
    $parent_id_cat =  $categ[0]['parent_id'];
    $level_cat =  $categ[0]['level'];

    $req_subCat = $bdd->prepare("SELECT * FROM categories_interval 
    WHERE rght - lft > 1
    AND lft > $lft_cat 
    AND rght < $rght_cat 
    ");

    $req_subCat->execute();
    $sub_cat = $req_subCat->fetchAll();
}

<?php
require_once 'db/Db.php';


if (isset($_GET['id']) and !empty($_GET['id'])) {

    $id_categories = htmlspecialchars((int)$_GET['id']);

    $req_treeLeaves = $bdd->prepare('SELECT * FROM categories_interval WHERE id = ?');
    $req_treeLeaves->execute(array($id_categories));
    $treeLeaves = $req_treeLeaves->fetch();

    $id_cat = $treeLeaves['id'];
    $name_cat = $treeLeaves['name'];
    $lft_cat = $treeLeaves['lft'];
    $rght_cat = $treeLeaves['rght'];
    $parent_id_cat = $treeLeaves['parent_id'];
    $level_cat = $treeLeaves['level'];

    // var_dump($id_cat, $name_cat, $lft_cat, $rght_cat, $parent_id_cat, $level_cat);

    if ($rght_cat - $lft_cat !== 1) {

        $req_subCat = $bdd->prepare('SELECT * FROM categories_interval WHERE parent_id = ?');
        $req_subCat->execute(array($id_categories));

        $sub_categories = $req_subCat->fetchAll();
    } else {
        header("Location: showAllArticles.php?id={$_GET["id"]}");
    }
} else {
    echo "L'identifiant de la catégorie n'a pas été trouvée";
}

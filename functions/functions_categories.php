<?php
// Aplatir un tableau multi multidimensionnel
function flattenArray(array $array)
{
    global $bdd;
    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
    $l = iterator_to_array($it, true);
    return $l;
}

function findCategoryById(int $id)
{
    global $bdd;
    $categorie = $bdd->prepare('SELECT * FROM categories_interval WHERE id = ?');
    $categorie->execute(array($id));
    $allInfos_categ = $categorie->fetchAll();
    return $allInfos_categ;
}


function get_id_categorie(int $id)
{
    global $bdd;
    $id_categorie = $bdd->prepare('SELECT id FROM categories_interval WHERE id = ?');
    $id_categorie->execute(array($id));
    $id_categ = $id_categorie->fetch()['id'];
    return $id_categ;
}

function get_name_categorie(int $id)
{
    global $bdd;
    $name_categorie = $bdd->prepare('SELECT name FROM categories_interval WHERE id = ?');
    $name_categorie->execute(array($id));
    $name_categ = $name_categorie->fetch()['name'];
    return $name_categ;
}

function get_lft_categorie(int $id)
{
    global $bdd;
    $lft_categorie = $bdd->prepare('SELECT lft FROM categories_interval WHERE id = ?');
    $lft_categorie->execute(array($id));
    $lft_categ = $lft_categorie->fetch()['lft'];
    return $lft_categ;
}

function get_rght_categorie(int $id)
{
    global $bdd;
    $rght_categorie = $bdd->prepare('SELECT rght FROM categories_interval WHERE id = ?');
    $rght_categorie->execute(array($id));
    $rght_categ = $rght_categorie->fetch()['rght'];
    return $rght_categ;
}

function get_parent_id_categorie(int $id)
{
    global $bdd;
    $parent_id_categorie = $bdd->prepare('SELECT parent_id FROM categories_interval WHERE id = ?');
    $parent_id_categorie->execute(array($id));
    $parent_id_categ = $parent_id_categorie->fetch()['parent_id'];
    return $parent_id_categ;
}

function get_level_categorie(int $id)
{
    global $bdd;
    $level_categorie = $bdd->prepare('SELECT level FROM categories_interval WHERE id = ?');
    $level_categorie->execute(array($id));
    $level_categ = $level_categorie->fetch()['level'];
    return $level_categ;
}

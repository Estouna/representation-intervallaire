<?php

function get_name_categorie($id)
{
    // Les fonctions ne prennent en compte que les variables qui sont à l'intérieur de la fonction. Donc on déclare que la variable $bdd est ailleurs dans notre code, que c'est une variable global.
    global $bdd;
    $name_categorie = $bdd->prepare('SELECT * FROM categories_interval WHERE id = ?');
    $name_categorie->execute(array($id));
    $name_categ = $name_categorie->fetch()['name'];
    return $name_categ;  
}

<?php
require_once 'db/Db.php';

$req_sub_categories = $bdd->prepare('SELECT * FROM categories_interval WHERE level > 0');
$req_sub_categories->execute();
$categories = $req_sub_categories->fetchAll();
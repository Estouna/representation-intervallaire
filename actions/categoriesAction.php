<?php
require_once 'db/Db.php';

$req_categories = $bdd->prepare('SELECT * FROM categories_interval WHERE parent_id = 0');
$req_categories->execute();
$categories = $req_categories->fetchAll();

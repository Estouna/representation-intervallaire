<?php
require_once 'db/Db.php';
require_once 'functions/functions_categories.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $articles = $bdd->prepare('SELECT * FROM articles WHERE id_category = ?');
    $articles->execute(array($get_id));
    $articles = $articles->fetchAll();
} else {
    $articles = $bdd->prepare('SELECT * FROM articles ORDER BY created_at ASC');
    $articles->execute(array());
    $articles = $articles->fetchAll();
}

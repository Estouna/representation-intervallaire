<?php
require_once 'db/Db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);

    $req_articles = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req_articles->execute(array($get_id));
    $articles = $req_articles->fetchAll();
}

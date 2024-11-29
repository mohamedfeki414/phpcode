<?php
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

// Créer une instance de ArticleManager
$articleManager = new ArticleManager();

// Récupérer la liste des articles
$articles = $articleManager->getAllArticles();

// Afficher la liste des articles
echo "<h2>Liste des articles</h2>";
echo "<ul>";
foreach ($articles as $article) {
    echo "<li>{$article['reference']} - {$article['libelle']} <a href='DetailProd.php?id={$article['reference']}'>Détails</a></li>";
}
echo "</ul>";
?>

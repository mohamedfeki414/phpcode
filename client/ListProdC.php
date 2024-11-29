<?php
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

// Créer une instance de ArticleManager
$articleManager = new ArticleManager();

// Récupérer la liste des produits disponibles
$articles = $articleManager->getAvailableArticles();

// Afficher la liste des produits
echo "<h2>Liste des produits disponibles</h2>";
echo "<ul>";
foreach ($articles as $article) {
    echo "<li>{$article['libelle']} - Prix : {$article['prix']} € <a href='Acheter.php?id={$article['reference']}'>Acheter</a></li>";
}
echo "</ul>";
?>

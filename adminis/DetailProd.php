<?php
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

// Vérifier si l'identifiant de l'article est passé en paramètre
if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    // Créer une instance de ArticleManager
    $articleManager = new ArticleManager();

    // Récupérer les détails de l'article
    $articleDetails = $articleManager->getArticleDetails($articleId);

    if ($articleDetails) {
        echo "<h2>Détails de l'article</h2>";
        echo "<p>Référence : {$articleDetails['reference']}</p>";
        echo "<p>Libellé : {$articleDetails['libelle']}</p>";
        echo "<p>Description : {$articleDetails['description']}</p>";
        echo "<p>Prix : {$articleDetails['prix']} €</p>";
        echo "<p>Quantité en stock : {$articleDetails['qstock']}</p>";
        echo "<p>Image : <img src='{$articleDetails['image']}' alt='Image produit'></p>";
    } else {
        echo "Article non trouvé.";
    }
} else {
    echo "Identifiant d'article non spécifié.";
}
?>

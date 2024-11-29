<?php
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $reference = $_POST['reference'];
    $quantite = $_POST['quantite'];

    // Créer une instance de ArticleManager
    $articleManager = new ArticleManager();

    // Appeler la méthode pour vérifier la quantité en stock
    $quantiteEnStock = $articleManager->getStockQuantity($reference);

    if ($quantiteEnStock >= $quantite) {
        // Ajouter l'article au panier (à implémenter)
        // Rediriger vers la page de confirmation d'achat
        header("Location: ConfirmationAchat.php?reference=$reference&quantite=$quantite");
        exit();
    } else {
        echo "La quantité demandée est supérieure à la quantité en stock.";
    }
}

// Récupérer l'identifiant de l'article depuis l'URL
if (isset($_GET['reference'])) { // Correction ici
    $articleReference = $_GET['reference']; // Correction ici

    // Créer une instance de ArticleManager
    $articleManager = new ArticleManager();

    // Récupérer les détails de l'article
    $articleDetails = $articleManager->getArticleDetails($articleReference); // Correction ici

    if ($articleDetails) {
        echo "<h2>Acheter {$articleDetails['libelle']}</h2>";
        echo "<p>Prix : {$articleDetails['prix']} €</p>";
        echo "<p>Description : {$articleDetails['description']}</p>";
        echo "<form method='post' action='Acheter.php'>";
        echo "<input type='hidden' name='reference' value='{$articleDetails['reference']}'>";
        echo "Quantité : <input type='number' name='quantite' min='1' max='{$articleDetails['qstock']}' required><br>";
        echo "<input type='submit' value='Ajouter au panier'>";
        echo "</form>";
    } else {
        echo "Article non trouvé.";
    }
} else {
    echo "Identifiant d'article non spécifié.";
}
?>

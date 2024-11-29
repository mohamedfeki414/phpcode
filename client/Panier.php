<?php
session_start(); // Démarrer la session
include_once 'PanierManager.php'; // Inclure la classe PanierManager
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    header("Location: Login.php");
    exit();
}

// Créer une instance de PanierManager
$panierManager = new PanierManager();

// Récupérer le contenu du panier de l'utilisateur depuis la session
$panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];

// Récupérer les détails des articles dans le panier
$articlesDansPanier = [];
foreach ($panier as $reference => $quantite) {
    $articleManager = new ArticleManager();
    $article = $articleManager->getArticleDetails($reference);
    if ($article) {
        $articlesDansPanier[] = [
            'reference' => $article['reference'],
            'libelle' => $article['libelle'],
            'prix' => $article['prix'],
            'quantite' => $quantite
        ];
    }
}

// Afficher le contenu du panier
echo "<h2>Votre panier</h2>";
echo "<table border='1'>";
echo "<tr><th>Référence</th><th>Libellé</th><th>Prix unitaire</th><th>Quantité</th><th>Prix total</th><th>Action</th></tr>";
$totalMontant = 0;
foreach ($articlesDansPanier as $article) {
    $prixTotal = $article['prix'] * $article['quantite'];
    $totalMontant += $prixTotal;
    echo "<tr>";
    echo "<td>{$article['reference']}</td>";
    echo "<td>{$article['libelle']}</td>";
    echo "<td>{$article['prix']} €</td>";
    echo "<td>{$article['quantite']}</td>";
    echo "<td>{$prixTotal} €</td>";
    echo "<td><a href='SupprimerDuPanier.php?reference={$article['reference']}'>Supprimer</a></td>";
    echo "</tr>";
}
echo "<tr><td colspan='4'><b>Total :</b></td><td>{$totalMontant} €</td><td><a href='ViderPanier.php'>Vider Panier</a></td></tr>";
echo "</table>";
?>

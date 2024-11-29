<?php
session_start(); // Démarrer la session

class PanierManager {
    // Ajouter un article au panier
    public function ajouterAuPanier($reference, $quantite) {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        if (isset($_SESSION['panier'][$reference])) {
            $_SESSION['panier'][$reference] += $quantite;
        } else {
            $_SESSION['panier'][$reference] = $quantite;
        }
    }

    // Supprimer un article du panier
    public function supprimerDuPanier($reference) {
        if (isset($_SESSION['panier'][$reference])) {
            unset($_SESSION['panier'][$reference]);
        }
    }

    // Vider le panier
    public function viderPanier() {
        unset($_SESSION['panier']);
    }

    // Obtenir le contenu du panier
    public function getContenuPanier() {
        return isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
    }

    // Obtenir le nombre total d'articles dans le panier
    public function getNombreArticlesPanier() {
        $panier = $this->getContenuPanier();
        return array_sum($panier);
    }

    // Obtenir le montant total du panier
    public function getMontantTotalPanier() {
        $panier = $this->getContenuPanier();
        $montantTotal = 0;

        // Obtenir les détails de chaque article depuis la base de données
        foreach ($panier as $reference => $quantite) {
            $articleManager = new ArticleManager();
            $article = $articleManager->getArticleDetails($reference);
            if ($article) {
                $montantTotal += $article['prix'] * $quantite;
            }
        }

        return $montantTotal;
    }
}
?>

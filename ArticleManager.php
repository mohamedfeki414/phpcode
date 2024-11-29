<?php
include_once 'DatabaseConfig.php'; // Inclure la configuration de la base de données
include_once 'Article.php'; // Inclure la classe Article

class ArticleManager {
    private $db;

    public function __construct() {
        $this->db = DatabaseConfig::getInstance();
    }

    // Méthode pour récupérer tous les articles
    public function getAllArticles() {
        $query = "SELECT * FROM Article";
        $result = $this->db->query($query);
        $articles = [];
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
        return $articles;
    }

    // Méthode pour récupérer les détails d'un article par son identifiant
    public function getArticleDetails($reference) {
        $query = "SELECT * FROM Article WHERE REFERENCE = '$reference'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    // Méthode pour ajouter un nouvel article
    public function addArticle($article) {
        $reference = $article->getReference();
        $libelle = $article->getLibelle();
        $description = $article->getDescription();
        $prix = $article->getPrix();
        $qstock = $article->getQstock();
        $image = $article->getImage();

        $query = "INSERT INTO Article (REFERENCE, LIBELLE, DESCRIPTION, PRIX, QSTOCK, IMAGE) VALUES ('$reference', '$libelle', '$description', $prix, $qstock, '$image')";
        return $this->db->query($query);
    }

    // Méthode pour mettre à jour les détails d'un article
    public function updateArticle($article) {
        $reference = $article->getReference();
        $libelle = $article->getLibelle();
        $description = $article->getDescription();
        $prix = $article->getPrix();
        $qstock = $article->getQstock();
        $image = $article->getImage();

        $query = "UPDATE Article SET LIBELLE = '$libelle', DESCRIPTION = '$description', PRIX = $prix, QSTOCK = $qstock, IMAGE = '$image' WHERE REFERENCE = '$reference'";
        return $this->db->query($query);
    }

    // Méthode pour supprimer un article par son identifiant
    public function deleteArticle($reference) {
        $query = "DELETE FROM Article WHERE REFERENCE = '$reference'";
        return $this->db->query($query);
    }
    public function getStockQuantity($reference) {
        $reference = $this->db->escapeString($reference);

        $query = "SELECT QSTOCK FROM Article WHERE REFERENCE = '$reference'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['QSTOCK'];
        } else {
            return 0; // Article non trouvé, quantité en stock = 0
        }
    }
    public function getAvailableArticles() {
        $query = "SELECT * FROM Article WHERE QSTOCK > 0 ORDER BY LIBELLE ASC";
        $result = $this->db->query($query);

        $articles = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $articles[] = $row;
            }
        }

        return $articles;
    }
}
?>

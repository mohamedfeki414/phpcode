<?php
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $reference = $_POST['reference'];
    $libelle = $_POST['libelle'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $qstock = $_POST['qstock'];
    $image = $_POST['image'];

    // Créer un objet Article avec les données
    $article = new Article($reference, $libelle, $description, $prix, $qstock, $image);

    // Créer une instance de ArticleManager
    $articleManager = new ArticleManager();

    // Appeler la méthode pour ajouter l'article
    $ajoutStatus = $articleManager->addArticle($article);

    if ($ajoutStatus) {
        echo "Article ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'article.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un produit</title>
</head>
<body>
    <h2>Ajouter un produit</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="reference">Référence :</label>
        <input type="text" id="reference" name="reference" required><br>
        <label for="libelle">Libellé :</label>
        <input type="text" id="libelle" name="libelle" required><br>
        <label for="description">Description :</label>
        <input type="text" id="description" name="description" required><br>
        <label for="prix">Prix :</label>
        <input type="number" id="prix" name="prix" step="0.01" required><br>
        <label for="qstock">Quantité en stock :</label>
        <input type="number" id="qstock" name="qstock" required><br>
        <label for="image">URL de l'image :</label>
        <input type="text" id="image" name="image" required><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>

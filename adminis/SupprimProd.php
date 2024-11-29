<?php
include_once 'ArticleManager.php'; // Inclure la classe ArticleManager

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant de l'article à supprimer
    $reference = $_POST['reference'];

    // Créer une instance de ArticleManager
    $articleManager = new ArticleManager();

    // Appeler la méthode pour supprimer l'article
    $suppressionStatus = $articleManager->deleteArticle($reference);

    if ($suppressionStatus) {
        echo "Article supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression de l'article.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un produit</title>
</head>
<body>
    <h2>Supprimer un produit</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="reference">Référence de l'article à supprimer :</label>
        <input type="text" id="reference" name="reference" required><br>
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>

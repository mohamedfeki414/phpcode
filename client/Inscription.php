<?php
include_once 'UserManager.php'; // Inclure la classe UserManager

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $code = $_POST['code'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Créer un objet Client avec les données
    $client = new Client($code, $nom, $prenom, $adresse, $email, $motdepasse);

    // Créer une instance de UserManager
    $userManager = new UserManager();

    // Appeler la méthode pour ajouter le client
    $inscriptionStatus = $userManager->addClient($client);

    if ($inscriptionStatus) {
        echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="code">Code client :</label>
        <input type="text" id="code" name="code" required><br>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br>
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>

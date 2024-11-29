<?php
session_start(); // Démarrer la session
include_once 'UserManager.php'; // Inclure la classe UserManager

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];

    // Créer une instance de UserManager
    $userManager = new UserManager();

    // Vérifier les informations d'authentification
    $authStatus = $userManager->authenticateClient($email, $motdepasse);

    if ($authStatus) {
        $_SESSION['email'] = $email;
        // Rediriger vers la page ListProdC.php
        header("Location: ListProdC.php");
        exit();
    } else {
        $message = "Email ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" id="motdepasse" name="motdepasse" required><br>
        <input type="submit" value="Se connecter">
    </form>
    <?php if(isset($message)) echo "<p>$message</p>"; ?>
</body>
</html>

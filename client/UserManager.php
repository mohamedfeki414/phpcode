<?php
include_once 'DatabaseConfig.php'; // Inclure la classe DatabaseConfig
include_once 'Client.php'; // Inclure la classe Client

class UserManager {
    private $db;

    public function __construct() {
        $this->db = DatabaseConfig::getInstance();
    }

    // Méthode pour ajouter un nouveau client
    public function addClient($client) {
        $code = $client->getCode();
        $nom = $this->db->escapeString($client->getNom());
        $prenom = $this->db->escapeString($client->getPrenom());
        $adresse = $this->db->escapeString($client->getAdresse());
        $email = $this->db->escapeString($client->getEmail());
        $motdepasse = password_hash($client->getMotdepasse(), PASSWORD_DEFAULT); // Hasher le mot de passe

        $query = "INSERT INTO Client (CODEC, NOMC, PRENOMC, ADRESSE, EMAIL, MDPC) VALUES ('$code', '$nom', '$prenom', '$adresse', '$email', '$motdepasse')";
        return $this->db->query($query);
    }

    // Méthode pour authentifier un client
    public function authenticateClient($email, $motdepasse) {
        $email = $this->db->escapeString($email);

        $query = "SELECT MDPC FROM Client WHERE EMAIL = '$email'";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hash = $row['MDPC'];
            return password_verify($motdepasse, $hash); // Vérifier le mot de passe hashé
        } else {
            return false;
        }
    }

    // Autres méthodes pour gérer les utilisateurs selon vos besoins
}
?>

<?php
class DatabaseConfig {
    private static $instance = null;
    private $conn;

    private $host = 'localhost';
    private $username = 'votre_nom_utilisateur';
    private $password = 'votre_mot_de_passe';
    private $database = 'ECOMMERCE'; // Nom de la base de données

    // Constructeur privé pour empêcher l'instanciation directe
    private function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Échec de la connexion : " . $this->conn->connect_error);
        }
    }

    // Méthode statique pour récupérer l'instance unique de la classe (singleton)
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DatabaseConfig();
        }
        return self::$instance;
    }

    // Méthode pour exécuter une requête SQL
    public function query($sql) {
        return $this->conn->query($sql);
    }

    // Méthode pour échapper les caractères spéciaux dans une chaîne (sécurité contre les injections SQL)
    public function escapeString($str) {
        return $this->conn->real_escape_string($str);
    }
}
?>

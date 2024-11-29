<?php
class Client {
    private $code;
    private $nom;
    private $prenom;
    private $adresse;
    private $email;
    private $motdepasse;

    public function __construct($code, $nom, $prenom, $adresse, $email, $motdepasse) {
        $this->code = $code;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->motdepasse = $motdepasse;
    }

    // Getters et setters pour chaque propriété du client

    public function getCode() {
        return $this->code;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getMotdepasse() {
        return $this->motdepasse;
    }

    public function setMotdepasse($motdepasse) {
        $this->motdepasse = $motdepasse;
    }
}
?>

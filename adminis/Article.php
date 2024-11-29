<?php
class Article {
    private $reference;
    private $libelle;
    private $description;
    private $prix;
    private $qstock;
    private $image;

    public function __construct($reference, $libelle, $description, $prix, $qstock, $image) {
        $this->reference = $reference;
        $this->libelle = $libelle;
        $this->description = $description;
        $this->prix = $prix;
        $this->qstock = $qstock;
        $this->image = $image;
    }

    // Getters et setters pour chaque propriété de l'article

    public function getReference() {
        return $this->reference;
    }

    public function setReference($reference) {
        $this->reference = $reference;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getQstock() {
        return $this->qstock;
    }

    public function setQstock($qstock) {
        $this->qstock = $qstock;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}
?>

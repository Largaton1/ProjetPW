<?php
class LicencieModel
{
    private $id;
    private $numeroLicence;
    private $nom;
    private $prenom;
    private $contactId;
    private $categorieId;

    // Constructeur
    public function __construct($numeroLicence, $nom, $prenom, $contactId, $categorieId)
    {
        $this->numeroLicence = $numeroLicence;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contactId = $contactId;
        $this->categorieId = $categorieId;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }

    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getContactId()
    {
        return $this->contactId;
    }

    public function setContactId($contactId)
    {
        $this->contactId = $contactId;
    }

    public function getCategorieId()
    {
        return $this->categorieId;
    }

    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;
    }
}
?>
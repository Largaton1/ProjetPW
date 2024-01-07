<?php
class Contact
{
    private  $contact_id;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;

    // Constructeur
    public function __construct($contact_id, $nom, $prenom, $email, $telephone)
    {
        $this->contact_id = $contact_id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    // Getters and setters
    public function getId()
    {
        return $this->contact_id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setId($id)
    {
        $this->contact_id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }
}
?>

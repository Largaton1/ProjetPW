<?php
class Contact
{
    private  $contact_id;
    private $nom_contact;
    private $prenom_contact;
    private $email;
    private $telephone;

    // Constructeur
    public function __construct($contact_id, $nom_contact, $prenom_contact, $email, $telephone)
    {
        $this->contact_id = $contact_id;
        $this->nom_contact = $nom_contact;
        $this->prenom_contact = $prenom_contact;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    // Getters and setters
    public function getId()
    {
        return $this->contact_id;
    }

    public function getNomContact()
    {
        return $this->nom_contact;
    }

    public function getPrenom()
    {
        return $this->prenom_contact;
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

    public function setNom($nom_contact)
    {
        $this->nom_contact = $nom_contact;
    }

    public function setPrenom($prenom_contact)
    {
        $this->prenom_contact = $prenom_contact;
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

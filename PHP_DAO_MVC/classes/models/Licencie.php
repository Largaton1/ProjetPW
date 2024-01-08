<?php
require_once '../../classes/models/Contact.php';

require_once '../../classes/models/Categorie.php';

class Licencie
{
    private $licencie_id;
    private $numeroLicencie;
    private $nom;
    private $prenom;
    private $contact; 
    private $categorie;

    public function __construct($licencie_id, $numero_licencie, $nom, $prenom,  $contact,  $categorie)
    {
        $this->licencie_id = $licencie_id;
        $this->numeroLicencie = $numero_licencie;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->contact = $contact;
        $this->categorie = $categorie;
    }

    public function getIdLicencie()
    {
        return $this->licencie_id;
    }
  

    public function setIdLicencie($id)
    {
        $this->licencie_id = $id;
    }

    public function getNumeroLicencie()
    {
        return $this->numeroLicencie;
    }

    public function setNumeroLicencie($numero_licencie)
    {
        $this->numeroLicencie = $numero_licencie;
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

    public function getContact()
    {
        return $this->contact;
    }

    public function setContact( $contact)
    {
        $this->contact = $contact;
    }
    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie( $categorie)
    {
        $this->categorie = $categorie;
    }
    public function getNomLicencie()
    {
        return $this->nom.' '.$this->prenom;
    }
    

    // public function getCodeRaccourci(Categorie $categorie) {
    //     $this->code_raccourci = $code_raccourci;
    // }
        
}
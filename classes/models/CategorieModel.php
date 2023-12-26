<?php

class CategorieModel
{

    private $id;

    private $nom;

    private $code_raccourci;


    public function __construct($nom, $code_raccourci)
    {

        $this->id = uniqid(); // Utilisation d'une fonction pour générer un ID aléatoire

        $this->nom = $nom;

        $this->code_raccourci = $code_raccourci;
    }


    public function getId()
    {

        return $this->id;
    }


    public function getNom()
    {

        return $this->nom;
    }

    public function getCode()
    {

        return $this->code_raccourci;
    }


    public function setId($id)
    {

        $this->id = $id;
    }


    public function setNom($nom)
    {

        $this->nom = $nom;
    }

    public function setCode($code)
    {

        $this->code_raccourci = $code;
    }
}
?>
<?php

class CategorieModel
{

    private $id;

    private $nom;

    private $code;


    public function __construct($nom, $code)
    {

        $this->id = uniqid(); // Utilisation d'une fonction pour générer un ID aléatoire

        $this->nom = $nom;

        $this->code = $code;
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

        return $this->code;
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

        $this->code = $code;
    }
}
?>
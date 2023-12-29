<?php
class EducateurModel
{
    private $id;
    private $licencie_id;
    private $email;
    private $password;
    private $est_administrateur;

    // Constructeur
    public function __construct($licencie_id, $email, $password, $est_administrateur)
    {
        $this->licencie_id = $licencie_id;
        $this->email = $email;
        $this->password = $password;
        $this->est_administrateur = $est_administrateur;
    }

    // Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getLicenceID()
    {
        return $this->licencie_id;
    }

    public function setLicenceID($licencie_id)
    {
        $this->licencie_id = $licencie_id;
    }

    public function getemail()
    {
        return $this->email;
    }

    public function setemail($email)
    {
        $this->email = $email;
    }

    public function getpassword()
    {
        return $this->password;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }

    public function getAdmin()
    {
        return $this->est_administrateur;
    }

    public function setAdmin($est_administrateur)
    {
        $this->est_administrateur = $est_administrateur;
    }
}
?>

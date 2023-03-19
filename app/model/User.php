<?php

require_once "C:\wamp64\www\DAO\app\database/Connexion.php";

class User
{


private $id;
private $prenom;
private $nom;
private $age;
private $genre;


public function getId()
{

return $this->id;
}


public function getPrenom()
{
    

    return $this->prenom;
}


public function getNom()
{
    
    return $this->nom;
}


public function getAge()
{
    
    return $this->age;
}



public function getGenre()
{
    
    return $this->genre;
}



public function setId($id)
{
    
    return $this->id=$id;

}

public function setPrenom($prenom)
{
    return $this->prenom=$prenom;

}



public function setNom($nom)
{
    
    return $this->nom=$nom;
}



public function setAge($age)
{
    return $this->age=$age;
}



public function setGenre($genre)
{
    return $this->genre=$genre;
}


}


?>
<?php

require_once "C:\wamp64\www\DAO\app\database/Connexion.php";
require_once "C:\wamp64\www\DAO\app\model/User.php";
require_once "C:\wamp64\www\DAO\app\Controller/UserController.php";


class UserDAO {

public function Create(User $user){

$req = ("INSERT INTO user (prenom, nom, age, genre) VALUES (:prenom,:nom,:age,:genre)");

$p_req= Connexion::getConnexion()->prepare($req);

$p_req->bindValue(":prenom", $user->getPrenom());
$p_req->bindValue(":nom", $user->getNom());
$p_req->bindValue(":age", $user->getAge());
$p_req->bindValue(":genre", $user->getGenre());


return $p_req->execute();

}

public function Read(){

    $req = ("SELECT * FROM user ");

    $p_req= Connexion::getConnexion()->prepare($req);

    $p_req->execute();
    
    $tout = $p_req -> fetchAll();

return $tout;

}

public function get_id($id){

    $req = ("SELECT * FROM user WHERE id=:id");
    $p_req= Connexion::getConnexion()->prepare($req);
    $p_req->bindValue(":id", $id);
    $p_req->execute();
    $result = $p_req->fetch();

    return $result;

}

public function Update(User $user){
    
    $id=$user->getId();
    $prenom= $user->getPrenom();
    $nom= $user->getNom();
    $age=$user->getAge();
    $genre=$user->getGenre();
    
    $req= "UPDATE user SET prenom='$prenom', nom='$nom', age='$age', genre='$genre'  WHERE id = '$id'";
    $p_req= Connexion::getConnexion()->prepare($req);

    return $p_req->execute();

}


public function delete($id){

    $req = "DELETE FROM user WHERE id = :id";

   $p_req= Connexion::getConnexion()->prepare($req);

   $p_req->bindValue(":id", $id);
 
   return  $p_req->execute();


}

}
?>


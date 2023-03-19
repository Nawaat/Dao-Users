<?php

class Connexion {


static function getConnexion() {


     $host = 'localhost';
     $dbname = 'dao-user';
     $username = 'root';
     $password = '';

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
    // echo "Connecté à $dbname sur $host avec succès.";
    
  } catch (PDOException $e) {

    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());

  }

  return $conn;

}
}

// Connexion::getConnexion();


?>
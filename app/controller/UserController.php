<?php
require_once "C:\wamp64\www\DAO\app\database/Connexion.php";

require_once "C:\wamp64\www\DAO\app\dao/UserDAO.php";

require_once "C:\wamp64\www\DAO\app\model/User.php";

require "C:\wamp64\www\DAO/vendor\autoload.php";

$user = new User();
$userDAO = new UserDAO();

$userDAO->read($user);

$donnees= filter_input_array(INPUT_POST);

if (isset($_POST['submit'])){

$user->setPrenom($donnees['prenom']);
$user->setnom($donnees['nom']);
$user->setAge($donnees['age']);
$user->setGenre($donnees['genre']);
 
$userDAO->Create($user);

header('Location:../../');

}else if(isset($_POST['modif'])){

        $user->setId($_POST['id']);
        $user->setPrenom($donnees['prenom']);
        $user->setnom($donnees['nom']);
        $user->setAge($donnees['age']);
        $user->setGenre($donnees['genre']);
    
        $userDAO->Update($user);

        header('Location:../../');
    
}else if(isset($_GET['id'])) {

    $userDAO->delete($_GET['id']);
    
    header('Location:../../');

}else{

    // header('Location:../../');

}



?>
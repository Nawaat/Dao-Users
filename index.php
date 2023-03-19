<?php

require_once "./app/database/Connexion.php";
require_once "./app/view/header.php";
require_once "C:\wamp64\www\DAO\app\dao/UserDAO.php";
require_once "C:\wamp64\www\DAO\app\model/User.php";

$user = new User();
$userDAO = new UserDAO();


?>

<div class="container border rounded-3 bg-light d-flex mt-5 pt-3 form-row">

    <form action="app/Controller/UserController.php" method="post" enctype="multipart/form-data" class="col-lg-4 offset-4 ">

        <div class="mb-3 text-center">
         <h1> Créer un contact</h1>
        </div>
        
        <div class="form-group mb-3">
            <label>Nom</label>
            <input class="form-control" value="" placeholder="" name="nom">
        </div>

        <div class="form-group mb-3">
            <label>Prenom</label>
            <input class="form-control" value="" placeholder="" name="prenom">
        </div>

        <div class="form-group mb-3">
            <label for="inputCity">age</label>
            <input type="number" class="form-control" id="inputCity" name="age">
        </div>

        <div class="form-group ">
            <label for="inputState">Genre</label>
            <select id="inputState" class="form-control" name="genre">
                <option value="F" selected>Feminin</option>
                <option value="H">Masculin</option>
            </select>
        </div>

        <div class="m-3 py-2 text-center">
            <input type="submit" value="créer" name="submit" class="btn btn-primary px-5">
        </div>

    </form>

</div>

<table class="container table table-striped mt-5">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Age</th>
            <th scope="col">genre</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>

            <?php 
           
           $Liste= $userDAO->Read();
          
            foreach ($Liste as $User):?>

            <th scope="row"><?= $User['id']?></th>
            <td><?=$User['prenom']?></td>
            <td><?= $User['nom']?></td>
            <td><?= $User['age']?></td>
            <td><?= $User['genre']?></td>

            <td> <button type="button" class="btn btn-warning"  data-bs-toggle="modal"
                    data-bs-target="#modifier<?=$User['id']?>">
                    Modifier
                </button>

                
                <?php $valeur_a_modif= $userDAO->get_id($User['id']);?>

   <!-- Modal -->
                <div class="modal fade" id="modifier<?= $User['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Id : <?= $valeur_a_modif['id'] ?> </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="app/Controller/UserController.php" method="post" class="">

                                    <div class="form-group mb-3">

                                        <input class="form-control" type="hidden" value="<?= $valeur_a_modif['id'] ?>"  name="id">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Nom</label>
                                        <input class="form-control" value="<?= $valeur_a_modif['nom'] ?>" placeholder="" name="nom">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Prenom</label>
                                        <input class="form-control" value="<?= $valeur_a_modif['prenom'] ?>" placeholder="" name="prenom">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label for="inputCity">age</label>
                                        <input type="number" value="<?= $valeur_a_modif['age'] ?>" class="form-control" id="inputCity" name="age">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Genre</label>
                                       
                                        <select id="inputState" value="" class="form-control" name="genre" >
                                      
                                         <?php  if($valeur_a_modif['genre'] === 'H'):?>
                                        
                                               <option value="H" selected>Masculin</option>
                                               <option value="F" >Feminin</option>

                                            <?php else:?> 

                                             <option value="H" >Masculin</option>
                                               <option value="F" selected >Feminin</option>
                                         
                                               <?php endif ?> 

                                         
                                        </select>

                                    </div>   
                                       <div class="modal-footer">
                          
                                 <input type="submit" name="modif" value="Enregistrer" class="btn btn-primary">
       
                            
                            </div>
                                </form>
                            </div>
                      
                        </div>
                    </div>
                </div>
               <a href="./app/Controller/UserController?id=<?= $valeur_a_modif['id']?>"> <button type="submit" class="btn btn-danger " name="supprimer">supprimer</button></a>
            </td> 
               
        </tr> 
       
 <?php endforeach ?>
        

    </tbody>

</table>

</div>


<?php

require_once "./app/view/footer.php";

?>
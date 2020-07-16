<?php
    session_start();
    require_once('pdo.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>my_meetic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    
    <div class="monBody">
        <div class="comp">
            <div class="comp1">
                <?php
                    if($_SESSION['genre']=="masculin" || $_SESSION['genre']=="autre")
                    {
                        echo ' <img class="profil" src="homme1.jpeg" width="100px" height="100px"> ';
                    }
                    else{
                        echo ' <img class="profil" src="femme.jpeg" width="120px" height="120px"> ';

                    }
                
                ?>
                <br><br><br>
                <h4>Nom : <?php echo ucfirst($_SESSION['nom']); ?></h4>
                <h4>Prénom : <?php echo ucfirst($_SESSION['prenom']); ?></h4>
                <h4>Date de naissance : <?php echo ucfirst($_SESSION['date']); ?></h4>
                <h4>Ville : <?php echo ucfirst($_SESSION['ville']); ?></h4>
                <h4>Genre : <?php echo ucfirst($_SESSION['genre']); ?></h4>
                <h4>E-mail : <?php echo ucfirst($_SESSION['email']); ?></h4>
                <h4>Loisirs : <?php 
                if(isset($_SESSION['choix']))
                {
                    foreach($_SESSION['choix'] as $value)
                    { 
                        $data = $pdo->query("SELECT * FROM loisir WHERE id_loisir=$value");
                        foreach($data as $row)
                        {
                            echo $row['nom']."\t" ;
                            
                        }    
                    }
                }
                else{
                    $id = $_SESSION['id'];
                    $datas = $pdo->query("SELECT * FROM loisir_users WHERE id_user=$id");
                        foreach($datas as $rows)
                        {
                            $value = $rows['id_loisir'];
                            $data = $pdo->query("SELECT * FROM loisir WHERE id_loisir=$value");
                            foreach($data as $row)
                            {
                                echo $row['nom']." \n" ;
                                
                            }   
                        }   
                }   
                ?>
                </h4>
            </div> 
        </div>
        <div class="modifCompte1">
            
            <h4>Rechercher des personnes</h4>
            <div class='modif2'>
            
                <div class="part2">
                    <div class="modifrech">
                       <form action="" method="POST">
                           Genre <select name="genre" id="genre">
                               <option value="">Genre</option>
                               <option value="masculin">M</option>
                               <option value="feminin">F</option>
                               <option value="autre">Autre</option>
                           </select>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Age <select name="age" id="age" required >
                               <option value="">Age</option>
                               <option value="1">18 - 25</option>
                               <option value="2">25 - 35</option>
                               <option value="3">35 - 45</option>
                               <option value="4">Plus</option>
                           </select><br><br>
                           Localisation&nbsp;&nbsp;&nbsp;&nbsp;:<input type="checkbox" name="ville[]" value="Paris">Paris
                           <input type="checkbox" name="ville[]" value="Lyon">Lyon
                           <input type="checkbox" name="ville[]" value="Marseille">Marseille
                           <br><div class="ville">
                           <input type="checkbox" name="ville[]" value="Bordeaux">Bordeaux
                           <input type="checkbox" name="ville[]" value="Nice">Nice
                           <input type="checkbox" name="ville[]" value="Toulouse">Toulouse
                        </div>
                        <br><br>
                        Loisirs&nbsp;&nbsp;&nbsp;&nbsp;:<input type="checkbox" id="dance" name="choix[]" value="1">Dance 
                        <input type="checkbox" id="dance" name="choix[]" value="2">Skateboard 
                        <input type="checkbox" id="dance" name="choix[]" value="3">Mangas 
                        <input type="checkbox" id="dance" name="choix[]" value="4">Licorn 
                        <div class="loisir">
                            <input type="checkbox" id="dance" name="choix[]" value="5">Cuisiner 
                            <input type="checkbox" id="dance" name="choix[]" value="6">Lecture 
                            <input type="checkbox" id="dance" name="choix[]" value="7">Musique 
                            <input type="checkbox" id="dance" name="choix[]" value="8">Informatique 
                        </div><br>
                        <div class="btn">
                            <button  type="submit" name="submit">Rechercher</button>
                        </div>



                       </form> 
                    </div>
                    <div class="deroulant">
                    <?php require_once("header.html"); ?>
                    
                    </div>
                </div>
                <!-- <div id="suiv" ></div> 
                <div id="prec" ></div> -->
                <div class="carossel">
                    
                
                    <?php require_once("rechPerso.php")  ?>   
                </div> 
                
                
                
                
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="caroussel.js"></script>
</body>
</html>
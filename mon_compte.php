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
                // else{
                //     $id = $_SESSION['id'];
                //     $datas = $pdo->query("SELECT * FROM loisir_users WHERE id_user=$id");
                //         foreach($datas as $rows)
                //         {
                //             $value = $rows['id_loisir'];
                //             $data = $pdo->query("SELECT * FROM loisir WHERE id_loisir=$value");
                //             foreach($data as $row)
                //             {
                //                 echo $row['nom']." \n" ;
                                
                //             }   
                //         }   
                // }   
                ?>
                </h4>
            </div> 
        </div>
        <div class="modifCompte">
            
            <h4>Modifier mon compte</h4>
            <div class="part2">
                <div class='modif1'>
                    <div class="modif">
                        <form action="modif.php" method="POST">
                            <label>Nom&nbsp;&nbsp;</label>
                            <input type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom'];  ?>" ><br><br>
                            <label>Prenom&nbsp;&nbsp;</label>
                            <input type="text" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom'];  ?>" ><br><br>
                            <label>Date de naissance&nbsp;&nbsp;</label>
                            <input type="date" id="date" name="date" value="<?php echo $_SESSION['date'];  ?>" ><br><br>
                            <label>E-mail&nbsp;&nbsp;</label>
                            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email'];  ?>" ><br><br>
                            <label>Ville&nbsp;&nbsp;</label>
                            <input type="text" id="ville" name="ville" value="<?php echo $_SESSION['ville'];  ?>"  ><br><br>
                            <label>Loisirs&nbsp;&nbsp;</label>
                            <input type="checkbox" id="dance" name="choix[]" value="1"> Dance
                            <input type="checkbox" id="dance" name="choix[]" value="2"> Skateboard 
                            <input type="checkbox" id="dance" name="choix[]" value="3"> Mangas 
                            <input type="checkbox" id="dance" name="choix[]" value="4"> Licorn 
                            
                            <div class="loisir">
                                <input type="checkbox" id="dance" name="choix[]" value="5"> Cuisiner 
                                <input type="checkbox" id="dance" name="choix[]" value="6">Lecture 
                                <input type="checkbox" id="dance" name="choix[]" value="7"> Musique 
                                <input type="checkbox" id="dance" name="choix[]" value="8"> Informatique 
                            </div><br><br>
                            <label>Mot de passe actuel&nbsp;&nbsp;</label>
                            <input type="password" id="pass1" name="pass1" required ><br><br>
                            <label>Nouveau mot de passe&nbsp;&nbsp;</label>
                            <input type="password" id="pass2" name="pass2" ><br><br>
                            
                            <div class="btn">   
                                <button  type="submit" id="submit" name="submit">Modifier</button>
                            </div>


                        </form>
                    </div>
                    <div class="sup">
                        <form action="modif.php" method="POST">
                            <button class="btn1" name="sup" type="submit">Supprimer définitivement mon compte.</button>
                        </form>
                    </div>
                </div>
                <div class="deroulant">
                    <?php require_once("header.html"); ?>
                </div>
            </div>


            </div>
        </div>
    </div>
</body>
</html>
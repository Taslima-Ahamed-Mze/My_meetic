<?php

try{
    $user = '';
    $password = "";
    $bdd = "meetic";
    
    $pdo = new PDO(
        'mysql:host=localhost;dbname='.$bdd,
        $user,
        $password
    );

    // Requete Bdd pour la liste des salles et leurs étage
    // $qpdo = 'SELECT nom_salle AS nom, etage_salle AS etage FROM salle';
    
    // foreach($pdo->query($qpdo) as $row){
    //      echo $row["nom"] . ' -> Etage : ' . $row["etage"] . PHP_EOL;
    //     var_dump($row);     
    //     echo $row["nom"]. ' -> etage : ' . $row["etage"] . PHP_EOL;
    // }

}
catch(PDOException $error){
    echo 'Error : ' . $error->getMessage() . PHP_EOL;
}

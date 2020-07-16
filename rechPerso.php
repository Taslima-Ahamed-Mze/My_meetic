<?php
    session_start();
    class Recherche{

        public $debut;
        public $fin;
        public $data;
        public $rows;
        public $pdo;
        public $age;
        public $result;
        public $genre;
        public $email;
        public $date;
        public $ville = "";
        public $year;
        public $bool = true;
        public $bool1 = true;
        public $choix = "" ;
        public $id;
        public $sesId;
        public $req;
        public $row;
        public $choice;
        public $value;
        public $sesMail;
        public $req2;
        public $req3;
        public $perso = [];
        public $search;
        public $rech = [];
        public $loisir;
        public $loisir1;
        public $nbr;
        
        
        public function __construct()
        {
            try{
                $user = '';
                $password = "";
                $bdd = "meetic";
                
                $this->pdo = new PDO(
                    'mysql:host=localhost;dbname='.$bdd,
                    $user,
                    $password
                );
            
            }
            catch(PDOException $error){
                echo 'Error : ' . $error->getMessage() . PHP_EOL;
            }
        }

        public function rechPerso()
        {
            if(isset($_POST['submit'])){
 
                if($_POST['genre']!=""){
                    $this->genre = "genre='".$_POST['genre']."' ";
                    // echo $this->genre;
                }else{
                    $this->genre = "(genre='masculin' or genre = 'feminin' or genre = 'autre') ";
                    // echo $this->genre;
                }
                if(isset($_POST['age']))
                {
                    switch($_POST['age'])
                    {
                        case 1:
                            $this->debut = date('Y')-18;
                            $this->fin = date('Y') - 25;
                            $this->age = "date_naiss between '".$this->fin."-01-01' and '".$this->debut."-01-01' " ;
                            // echo $this->age;
                        break;
                        case 2:
                            $this->debut = date('Y')-25;
                            $this->fin = date('Y') - 35;
                            $this->age = "date_naiss between '".$this->fin."-01-01' and '".$this->debut."-01-01' " ;
                            // echo $this->age;
                        break;
                        case 3:
                            $this->debut = date('Y')-35;
                            $this->fin = date('Y') - 45;
                            $this->age = "date_naiss between '".$this->fin."-01-01' and '".$this->debut."-01-01' " ;
                            // echo $this->age;
                        break;
                        default:
                            $this->debut = date('Y')-45;
                            $this->age = "date_naiss >= '".$this->debut."-01-01' ";
                            // echo $this->age;

                    }
                }
                if(isset($_POST['ville']))
                {
                    foreach($_POST['ville'] as $this->row)
                    {
                        if($this->bool == true)
                        {
                            $this->bool = false;
                            $this->ville.="ville = '".$this->row."'";
                        }
                        else{
                            $this->ville.=" or ville = '".$this->row."'";
                        }   
                    }
                    // echo $this->ville;
                }
                else{
                    echo "coche une ville";
                }
                
                if($this->genre == "genre='masculin' or genre = 'feminin' or genre = 'autre' ")
                {
                    $this->data = $this->pdo->query("SELECT * FROM users WHERE $this->age AND $this->ville AND $this->genre  and status=1") or die("failedn");

                }
                else
                {
                    $this->data = $this->pdo->query("SELECT * FROM users WHERE $this->age  AND $this->genre AND $this->ville and status=1 ") or die("failed");

                }
                if($this->data->fetchColumn() > 0)
                {
                    

                    if(isset($_POST['choix']))
                    {
                        

                        if($this->genre == "(genre='masculin' or genre = 'feminin' or genre = 'autre')")
                        {
                            $this->req = $this->pdo->query("SELECT * FROM users WHERE $this->age AND $this->ville AND $this->genre and status=1  ") or die("failed");
                        }
                        else
                        {
                            $this->req = $this->pdo->query("SELECT * FROM users WHERE $this->age  AND $this->genre AND $this->ville and status=1  ") or die("failed");
                        }
                        foreach($_POST['choix'] as $this->choix)
                        {
                            if($this->bool1 == true)
                            {
                                $this->bool1 = false;
                                $this->loisir.= "(loisir1='".$this->choix."' or loisir2='".$this->choix."' or loisir3='".$this->choix."')";

                            }
                            else{
                                $this->loisir.= "and"." (loisir1='".$this->choix."' or loisir2='".$this->choix."' or loisir3='".$this->choix."')";

                            } 

                        }
                        
                        foreach($this->req as $this->search)
                        {
                            $this->id = $this->search['id_user'];
                            $this->req2 = $this->pdo->query("SELECT * FROM users WHERE id_user=$this->id AND $this->loisir ") or die("fail");
                            if($this->req2->fetchColumn() > 0)
                            {
                                $this->req3 = $this->pdo->query("SELECT * FROM users WHERE id_user=$this->id AND $this->loisir ") or die("failed");
                                echo '<div class="personnes">';
                                foreach($this->req3 as $this->value)
                                {
                                    echo '
                                    <div class="perso">';
                                        if($this->value['genre']== "masculin" ||$this->value['genre']== "autre")
                                        {
                                            echo '<img class="profil1" src="homme1.jpeg" width="50px" height="50px"><br><br>';
                                        }
                                        else{
                                            echo ' <img class="profil1" src="femme.jpeg" width="60px" height="60px"><br><br>' ;

                                        }
                                        echo $this->value['nom']." ";
                                        echo $this->value['prenom']."<br><br>";
                                        echo $this->value['mail']."<br><br>";
                                        echo $this->value['date_naiss']."<br><br>";
                                        echo $this->value['ville']."<br>";

                                        for($i=0;$i<4;$i++)
                                        {
                                            $this->loisir1 = $this->value["loisir$i"];
                                            $this->req3 = $this->pdo->query("SELECT * FROM loisir WHERE  id_loisir='".$this->loisir1."'") or die("failed");
                                            foreach($this->req3 as $this->nom )
                                            {
                                                echo $this->nom['nom']." ";
                                            }

                                        }
                                        
                                    '</div>';

                                }
                                echo '</div>';
                            }
                        
                        }
                    }
                    else{

                        if($this->genre == "(genre='masculin' or genre = 'feminin' or genre = 'autre')")
                        {
                            $this->req = $this->pdo->query("SELECT * FROM users WHERE $this->age AND $this->ville AND $this->genre and status=1 ") or die("failed");
                            var_dump($this->req);
                        }
                        else
                        {
                            $this->req = $this->pdo->query("SELECT * FROM users WHERE $this->age  AND $this->genre AND $this->ville and status=1  ") or die("failed");
                        }
                        
                        foreach($this->req as $this->search)
                        {
                            $this->id = $this->search['id_user'];
                            $this->req2 = $this->pdo->query("SELECT * FROM users WHERE  id_user=$this->id") or die("failed");
                            echo '<div class="personnes">';
                            foreach($this->req2 as $this->value)
                            {
                                echo '
                                <div class="perso">';
                                    if($this->value['genre']== "masculin" ||$this->value['genre']== "autre")
                                    {
                                        echo '<img class="profil1" src="homme1.jpeg" width="50px" height="50px"><br><br>';
                                    }
                                    else{
                                        echo ' <img class="profil1" src="femme.jpeg" width="60px" height="60px"><br><br>' ;

                                    }
                                    echo $this->value['nom']." ";
                                    echo $this->value['prenom']."<br><br>";
                                    echo $this->value['mail']."<br><br>";
                                    echo $this->value['date_naiss']."<br><br>";
                                    echo $this->value['ville']."<br>";

                                    for($i=0;$i<4;$i++)
                                    {
                                        $this->loisir1 = $this->value["loisir$i"];
                                        $this->req3 = $this->pdo->query("SELECT * FROM loisir WHERE  id_loisir='".$this->loisir1."'") or die("failed");
                                        foreach($this->req3 as $this->nom )
                                        {
                                            echo $this->nom['nom']." ";
                                        }

                                    }
                                    

                                    // echo $this->value['loisir1']."<br>";
                                    // echo $this->value['loisir2']."<br>";
                                    // echo $this->value['loisir3']."<br>";
                                    
                                '</div>';
                                
                            }
                            echo '</div>';
                            
                        }
                        
                    }   
                }else{
                    echo "Desolé nous n'avons rien trouvé !";
                }
                
            }
            
        }
        

    }
    $action = new Recherche();
    $action->rechPerso();
    
    
     
    
 
    
?>


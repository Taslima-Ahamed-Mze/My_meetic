<?php
    session_start();
    class Inscription{

        public $password;
        public $data;
        public $pdo;
        public $nom;
        public $prenom;
        public $genre;
        public $email;
        public $date;
        public $ville;
        public $year;
        public $valide;
        public $choix;
        public $value;
        public $choice;
        public $id;
        public $req;
        public $loisir;
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

        public function execute()
        {
            if(isset($_POST['submit'])){

                $this->nom =$_POST['nom'];
                $this->prenom =$_POST['prenom'];
                $this->date =$_POST['date'];
                $this->ville =$_POST['ville'];
                $this->genre =$_POST['genre'];
                $this->email =$_POST['email'];
                $this->password =md5($_POST['password1']);
                $this->choix = $_POST['choix'];
                $this->valid = date('Y') - substr($this->date,0,4);


                if($_POST['password1']==$_POST['password2'])
                {
                    $this->data = $this->pdo->query("SELECT * FROM users WHERE mail='".$this->email."'");
                    if($this->data->fetchColumn() > 0)
                    {
                        echo "renseigne un autre email";
                    }
                    else{
                        if($this->valid<18)
                        {
                            echo "Desolé ce site est reservé au majeur!";
                        }
                        else
                        {
                            if(isset($this->choix))
                            {
                                if(count($this->choix)>3)
                                {
                                     echo "Veillez selectionner 3 loisirs au maximum ";
                                }
                                else
                                {
                                    $this->nbr = count($this->choix);
                                    switch($this->nbr)
                                    {
                                        case 1 : 
                                            $this->loisir = "'".$this->choix[0]."',0,0";
                                        break;
                                        case 2 :
                                            $this->loisir = "'".$this->choix[0]."','".$this->choix[1]."',0"; 
                                        break;
                                        case 3 :
                                            $this->loisir = "'".$this->choix[0]."','".$this->choix[1]."','".$this->choix[2]."'"; 
   
                                    }
                                    

                                    $this->pdo->exec("INSERT INTO users (nom,prenom,genre,ville,mail,password,date_naiss,loisir1,loisir2,loisir3,status) VALUES ('".$this->nom."','".$this->prenom."','".$this->genre."','".$this->ville."','".$this->email."','".$this->password."','".$this->date."',$this->loisir,1)") or die("failed");
                                
                                $_SESSION['email'] = $_POST['email'];
                                $_SESSION['ville'] = $_POST['ville'];
                                $_SESSION['nom'] = $_POST['nom'];
                                $_SESSION['prenom'] = $_POST['prenom'];
                                $_SESSION['date'] = $_POST['date'];
                                $_SESSION['genre'] = $_POST['genre'];
                                $_SESSION['choix'] = $_POST['choix'];
                                
                                header('location:mon_compte.php');
                                }
                                
                            }
                            else
                            {
                                echo "veillez selectionner au moins un loisir";
                            }
                            
                        }
                        
                    }
                     
                }
                else{
                    echo "Mot de passe different";
                }
            
                
        
                
            }
            
        }

    }
    $action = new Inscription();
    $action->execute();
    
     
    
 
    
?>

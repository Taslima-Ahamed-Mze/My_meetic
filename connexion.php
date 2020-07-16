<?php
    session_start();
    class Connexion{

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
        public $choix = [];
        public $value;
        public $choice;
        public $id;
        public $req;
        public $i;
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

        public function connecting()
        {
            if(isset($_POST['submit'])){

                $this->email =$_POST['email'];
                $this->password =md5($_POST['password']);
                
                $this->data = $this->pdo->query("SELECT * FROM users WHERE mail='".$this->email."' AND password='".$this->password."' ");
                if($this->data->fetchColumn() > 0 )
                {
                    $this->req = $this->pdo->query("SELECT * FROM users WHERE mail='".$this->email."' AND password='".$this->password."'  ");

                    foreach($this->req as $this->value)
                    {
                       
                        $_SESSION['email'] = $this->value['mail'];
                        $_SESSION['ville'] = $this->value['ville'];
                        $_SESSION['nom'] = $this->value['nom'];
                        $_SESSION['prenom'] = $this->value['prenom'];
                        $_SESSION['date'] = $this->value['date_naiss'];
                        $_SESSION['genre'] =$this->value['genre'];
                        $_SESSION['id'] = $this->value['id_user'];
                        $this->status = $this->value['status'];
                        for($this->i=0;$this->i<=3;$this->i++)
                        {
                            array_push($this->choix,$this->value["loisir$this->i"]);
                        }
                        $_SESSION['choix'] = $this->choix;
                        
                        if($this->status == 1)
                        {
                            header('Location:mon_compte.php');
                        }
                        else
                        {
                            echo "ce compte n'existe pas";
                        }

                    }
                    // if($this->status == 1)
                    // {
                    //     header('Location:form.php');
                    // }
                    // else
                    // {
                    //     echo "ce compte n'existe pas";
                    // }
                    
                }
                else{
                    echo "Identifiants incorrects" ;  
                }
            
            }
            
        }

    }
    $action = new Connexion();
    $action->connecting();
    
     
    
 
    
?>

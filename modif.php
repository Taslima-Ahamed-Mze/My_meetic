<?php
    session_start();
    class ModifCompte{

        public $password1;
        public $password2;
        public $data;
        public $rows;
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
        public $sesId;
        public $req;
        public $row;
        public $sesMail;
        public $nbr;
        public $loisir;
        
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

        public function modif()
        {
            if(isset($_POST['submit'])){
                $this->nom =$_POST['nom'];
                $this->prenom =$_POST['prenom'];
                $this->date =$_POST['date'];
                $this->ville =$_POST['ville'];
                $this->choix = $_POST['choix'];
                $this->valid = date('Y') - substr($this->date,0,4);
                $this->email =$_POST['email'];
                $this->password1 =md5($_POST['pass1']);
                $this->password2 =md5($_POST['pass2']);
                $this->sesMail = $_SESSION['email'];
                $this->sesId = $_SESSION['id'];
               

                
                    $this->data = $this->pdo->query("SELECT * FROM users WHERE mail='".$this->sesMail."'");
                    foreach($this->data as $this->rows )
                    {
                        if($this->password1 == $this->rows['password'])
                        {
                            if($_POST['pass2']=="")
                            {
                                if(isset($_POST['choix']))
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
                                                $this->loisir = "loisir1='".$this->choix[0]."',loisir2=0,loisir3=0";
                                            break;
                                            case 2 :
                                                $this->loisir = "loisir1='".$this->choix[0]."',loisir2='".$this->choix[1]."',loisir3=0"; 
                                            break;
                                            case 3 :
                                                $this->loisir = "loisir1='".$this->choix[0]."',loisir2='".$this->choix[1]."',loisir3='".$this->choix[2]."'"; 
    
                                        }
                                        $this->pdo->exec("UPDATE users SET nom='".$this->nom."', prenom='".$this->prenom."',ville='".$this->ville."',mail='".$this->email."',password='".$this->password1."',date_naiss='".$this->date."',$this->loisir WHERE mail='".$this->sesMail."'") or die("other mail");
                                        header('Location:se-connecter.php');
                                    } 
                                }else{
                                    $this->pdo->exec("UPDATE users SET nom='".$this->nom."', prenom='".$this->prenom."',ville='".$this->ville."',mail='".$this->email."',password='".$this->password1."',date_naiss='".$this->date."' WHERE mail='".$this->sesMail."'") or die("other mail");
                                    header('Location:se-connecter.php');
                                }
                                

                            }
                            else{
                                if(isset($_POST['choix']))
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
                                                $this->loisir = "loisir1='".$this->choix[0]."',loisir2=0,loisir3=0";
                                            break;
                                            case 2 :
                                                $this->loisir = "loisir1='".$this->choix[0]."',loisir2='".$this->choix[1]."',loisir3=0"; 
                                            break;
                                            case 3 :
                                                $this->loisir = "loisir1='".$this->choix[0]."',loisir2='".$this->choix[1]."',loisir3='".$this->choix[2]."'"; 
    
                                        }
                                        $this->pdo->exec("UPDATE users SET nom='".$this->nom."', prenom='".$this->prenom."',ville='".$this->ville."',mail='".$this->email."',password='".$this->password2."',date_naiss='".$this->date."',$this->loisir WHERE mail='".$this->sesMail."'") or die("other mail");
                                        header('Location:se-connecter.php');
                                    } 
                                }
                                else{
                                    $this->pdo->exec("UPDATE users SET nom='".$this->nom."', prenom='".$this->prenom."',ville='".$this->ville."',mail='".$this->email."',password='".$this->password2."',date_naiss='".$this->date."' WHERE mail='".$this->sesMail."'") or die("other mail");
                                    header('Location:se-connecter.php');
                                }
                            }
                            
                            
                            
                            
                        }else{
                            echo "Mot de passe actuel incorrect";
                        }
                    }
                    
                
            }
            
        }
        public function sup()
        {
            if(isset($_POST['sup']))
            {
                $this->sesMail = $_SESSION['email'];
                $this->pdo->exec("UPDATE users SET status=0 WHERE mail='".$this->sesMail."'") or die("failed");
                header('Location:index.php');
            }
        }

    }
    $action = new ModifCompte();
    $action->modif();
    $action->sup();
    
     
    
 
    
?>

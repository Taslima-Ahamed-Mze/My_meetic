<?php
    // session_start();
    // if(isset($_SESSION['loggedIN']))
    // {
    //     header('Location:test.php');
    //     exit();

    // }
    if(isset($_POST['login']))
    {
        require_once('connexion.php');
        $mail = $_POST['mailPHP'];
        $password = $_POST['passwordPHP'];
        $data = $pdo->query("SELECT id_user FROM users WHERE mail='$mail' AND password='$password'");
        if($data->fetchColumn() > 0)
        {
            // $_SESSION['loggedIN'] = '1';
            // $_SESSION['mail'] = $mail;
            exit('<font color="green">success</font>');
        }
        else{
            exit('<font color="red">failed</font>');
        }
    }




?>







<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Un formulaire de connexion en AJAX</title>
</head>

<body>


    <form method="POST" action="" >
    <p>
        Email : <input type="text" id="mail" /><br>
        Mot de passe : <input type="password" id="password" /><br>
        <input type="button" id="login" value="Se connecter !" />
    </p>
    </form>
    <p id="response"></p>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
</body>
</html>
<script >
    $(document).ready(function(){
 
    $("#login").click(function(){
     
       mail = $("#mail").val(),  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
       password =$("#password").val()
        
        if(mail=="" || password=="")
        {
            alert('Please check your inputs');
        }
        else{
            $.ajax(
                {
                    url: 'index.php',
                    method:'POST',
                    data: {
                        login:1,
                        mailPHP: mail,
                        passwordPHP:password

                    },
                    success: function(response){
                        $('#response').html(response);
                    },
                    dataType: 'text'
                }
            );

        }
            
        
            
        });
    });
         

</script>


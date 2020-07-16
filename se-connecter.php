

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>my_meetic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="monBody">
        <div class="moitie1">
            <div class="haut">
                <div>
                    <img src="images.jpeg" width="75%" height="95%">
                </div>
                <div class="title">
                    <h1>My_meetic</h1>
                </div>
                
            </div>
            <img src="téléchargement.jpeg" width="100%" height="80%">
        </div>
        <div class="form">
            <div class="hautform">
                <div class="inscript"><h1>Connexion</h1></div>
                
                
            </div>
            <form action="connexion.php" method="POST" >
                
                <label>Email&nbsp;&nbsp;</label>
                <input type="email"  id="email" name="email" required><br><br>
                
                <label>Mot de passe&nbsp;&nbsp;</label>
                <input type="password"  id="password" name="password" ><br><br>
               
                <button type="submit" id="submit" name="submit">Connexion</button>   
            </form>
            <div id="resultat"></div>
        </div>

      

    </div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- <script src="script.js"></script> -->

</body>
</html>
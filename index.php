

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
                <div class="inscript"><h1>Inscription</h1></div>
                <div><a href="se-connecter.php"><h3>Se connecter</h3></a></div>
                
            </div>
            <form action="inscription.php" method="POST" >
                <label>Nom&nbsp;&nbsp;</label>
                <input type="text" id="nom" name="nom" required ><br><br>
                <label>Prenom&nbsp;&nbsp;</label>
                <input type="text" id="prenom" name="prenom" required><br><br>
                <label>Date de naissance&nbsp;&nbsp;</label>
                <input type="date" id="date" name="date" required><br><br>
                <p id="erreurdate"></p>
                <label>Genre&nbsp;&nbsp;</label>
                <select name="genre" id="genre" required>
                    <option value="">Genre</option>
                    <option value="masculin">Masculin</option>
                    <option value="feminin">Feminin</option>
                    <option value="autre">Autre</option>
                </select><br><br>
                <label>Ville&nbsp;&nbsp;</label>
                <select name="ville" id="ville" required>
                    <option value="">ville</option>
                    <option value="Paris">Paris</option>
                    <option value="Lyon">Lyon</option>
                    <option value="Marseille">Marseille</option>
                    <option value="Bordeaux">Bordeaux</option>
                    <option value="Nice">Nice</option>
                    <option value="Toulouse">Toulouse</option>
                </select><br><br>
                <label>Email&nbsp;&nbsp;</label>
                <input type="email"  id="email" name="email" required><br><br>
                <label>Loisirs&nbsp;&nbsp;</label>
                Dance <input type="checkbox" id="dance" name="choix[]" value="1">
                Skateboard <input type="checkbox" id="dance" name="choix[]" value="2">
                Mangas <input type="checkbox" id="dance" name="choix[]" value="3">
                Licorn <input type="checkbox" id="dance" name="choix[]" value="4">
                Cuisiner <input type="checkbox" id="dance" name="choix[]" value="5"><br>
                <div class="loisir">
                    Lecture <input type="checkbox" id="dance" name="choix[]" value="6">
                    Musique <input type="checkbox" id="dance" name="choix[]" value="7">
                    Informatique <input type="checkbox" id="dance" name="choix[]" value="8">
                </div><br><br>
                <label>Mot de passe&nbsp;&nbsp;</label>
                <input type="password"  id="password1" name="password1" required><br><br>
                <label> Confirmer mot de passe&nbsp;&nbsp;</label>
                
                <input type="password"  id="password2" name="password2" required><br>
                
                <br><br>
                <button type="submit" id="submit" name="submit">S'inscrire</button>   
            </form>
            
        </div>

      

    </div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- <script src="script.js"></script> -->

</body>
</html>
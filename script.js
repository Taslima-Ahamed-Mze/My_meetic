

$(document).ready(function(){

    $("#submit").on('click',function(e){
        e.preventDefault();

        

        $.post(
            'action.php', // Un script PHP que l'on va créer juste après
            {
                nom : $("#nom").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                prenom : $("#prenom").val(),
                date : $("#date").val(),
                genre : $("#genre").val(),
                ville : $("#ville").val(),
                email : $("#email").val(),
                loisir : $("#loisir").val(),
                password1 : $("#password1").val(),
                password2 : $("#password2").val()
            },
            

            function(data){ // Cette fonction ne fait rien encore, nous la mettrons à jour plus tard
                if(data == "Desolé ce site est reservé au majeur!"){
                    // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                    $("#resultat").html("<p>Mineur !</p>");
                    // window.location.replace("form.php");
               }
               else if(data=='success')
               {
                    window.location.replace("test.html");
               }
               else{
                    // Le membre n'a pas été connecté. (data vaut ici "failed")

                    $("#resultat").html("<p>veillez renseigner tous les champs</p>");
               }
        
           
            },

            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
         );

    });

});


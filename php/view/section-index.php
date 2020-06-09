<?php
require_once "php/view/header.php";
?>
        
    <h2>Accueil</h2>
       
    <!-- ------------------------------- LOGIN -------------------------------------- -->
    <section class="login">
    
      <h3>FORMULAIRE DE LOGIN</h3>   
      <form  class="login" action="" method="POST">

        <label for="email">Email</label>
        <input type="email" id="email"  required placeholder="Entrer votre Email"name="email">

        <label for="password">Mot de Passe</label>
        <input type="password" required placeholder="Entrer votre Mot de Passe" id="password" name="password">

        <button  type="submit" class="big-button">SE CONNECTER</button>

        <span class="labelNone">Besoin d'un Compte ?<span> <span onclick="myfunction()" class="aa"><a href="#">S'inscrire</a></span>
      </form>

    </section>



    <!-- ---------------------------- REGISTER ------------------------------------ -->
    <section class="register cache">
       <h3>FORMULAIRE D'INSCRIPTION</h3>
       <form method="POST"  action="" class="">

        <label for="email">Email</label>  
        <input type="email" id="user"  required placeholder="Entrer votre Email" name="email">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" requried placeholder="Entrer votre Nom d'Utilisateur">

        <label for="password">Mot de Passe</label>

        <input type="password"  required placeholder="Entrer votre Mot de Passe" id ="password" name="password">

        <button  type="submit" class="big-button">CREER VOTRE COMPTE</button>

        <input type="hidden" name="register" value="register">

        <span onclick="myfunction2()" class="labelNone"><a href="#">Vous avez déjà un Compte ?</a></span>
      </form>
  
    </section>

 <?php
require_once "php/view/footer.php";
?>

<script> 
const email=document.getElementById("email");
const password=document.getElementById("password");
var login=document.querySelector(".login");
const error=document.getElementById('error');

login.addEventListener("submit",(e)=>{

    let message=[];

    if(email.value == "" || password.value =="" ){

        message.push("ce champs est obligatoire");
    
    }
     
    if(password.value.length <= 6){


        message.push("le Mot de passe ne correspond pas ou email est déja pris  ");

    }
  if(password.value.length>20){

    message.push("le mot de passe ou email n'est pas valide ");
  }
                if(message.length > 0 ){

                    e.preventDefault()
                    error.innerHTML=message.join(', ')
                }


})


function myfunction ()
{
   var register=document.querySelector(".register");
   register.classList.remove("cache");
   var login=document.querySelector(".login");
   login.classList.add("cache");
}
function myfunction2()
{
   var register=document.querySelector(".register");
   register.classList.add("cache");
   var login=document.querySelector(".login");
   login.classList.remove("cache");

}

</script>
























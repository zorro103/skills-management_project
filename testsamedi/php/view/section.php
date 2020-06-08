
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
  section  h3 {text-align:center;}
  form {display:flex;
        width:10%;
       flex-direction:column;
      margin:auto;
       
  
}

.cache
{
   display:none;
}

    </style>
</head>

<body>

<main> 



         
      <section class="login">
    

    <h3>Se Connecter</h3>
   
   <form  class="login" action="" method="POST">
   <span id="error"></span>
      <label for="email">E-MAIL</label>
  
    <input type="email" id="email"  required placeholder="email"name="email">
 

 
   <label for="password"> MOT DE PASSE</label>


  <input type="password" required placeholder="password" id="password" name="password">

  <button  type="submit">Se Connecter</button>
  <span>Besoin d'un Compte ?<span><span onclick="myfunction()"><a href="#">S'inscrire</a></span>
  </form>


  </section>




<section class="register cache">
       <h3>Créer un compte </h3>

       <form method="POST"  action="" class="">
        
       <label for="email">E-MAIL</label>
       
      <input type="email" id="user"  required placeholder="E-Mail" name="email">

      <label for="username">Nom d'utilisateur</label>
      <input type="text" name="username" requried placeholder="Username">
      
       <label for="password">MOT DE PASSE </label>
    
      <input type="password"  required placeholder="password" id ="password" name="password">
      <span id="error"></span>
     
       <button  type="submit">Continuer</button>

      <input type="hidden" name="register" value="register">
      <span onclick="myfunction2()"><a href="#">Vous Avez déja un compte?</a></span>
    </form>
  
 </section>
 

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
</body>
</html>































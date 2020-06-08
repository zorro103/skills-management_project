<?php


if(empty(trim($_REQUEST["username"]??""))){
  $username_Err = "VEUILLEZ ENTRER VOTRE IDENTIFIENT.";
} 

if(empty(trim($_REQUEST["password"]??""))){

   $password_Err="VEUILLEZ ENTRER VOTRE MOT DE PASSE . ";
}


require_once "Model.php";

class LoginPage

{    
  
function __construct()
{
    
 
   
  
}




  static $GO="";

   
   public static function login()
{


 // $array["request"]=$_REQUEST;

///  echo LoginPage::$arr=json_encode($array,JSON_PRETTY_PRINT);

 
      $username=$_REQUEST["user"]??"";

$passwordForm= $_REQUEST["password"]??"";



             

$Result=Model::Read("users","username",$username);

$passwordHash=password_hash($passwordForm, PASSWORD_DEFAULT);

  
           
 foreach($Result as $arr){

 extract($arr);
 
            

      if(!empty($arr)){
                
          
 

          if(password_verify($passwordForm,$password))
              
     {
        
             
      echo  LoginPage::$GO= "<script>location.href='admin.php'</script>";
        
        
     }
      
}

}
     
}

    static function CreateUser()
{
     
 static $ArrayAsso=[];
 static $register="";


 $ArrayAsso=[

  "username"=>$_REQUEST['user']??"",
  "password"=>$_REQUEST['password']?? "",
 ];


  
 $register=$_REQUEST["register"]??"";


 $Result=Model::Read("users","username",$ArrayAsso["username"]);

foreach($Result as $table){
  extract($table);

  

}
        

if($register =="register"){



 

$ArrayAsso['password']=password_hash($ArrayAsso["password"],PASSWORD_DEFAULT);

if(empty($table))
{

  if($username!=$ArrayAsso['username']){

$RequetSql=
<<<CODE
INSERT INTO users
 (username,password) 
VALUES
(:username,:password)
CODE;
  

  
 Model::SendToSql($RequetSql,$ArrayAsso);
  }
}
}
}

}
     


LoginPage::CreateUser();
LoginPage::login();

?>



        <h2>Accueil</h2>

        <!-- ------------------------------- LOGIN -------------------------------------- -->
        <section>
            <h3>FORMULAIRE DE LOGIN</h3>
            <form action="" method="POST">
                <label>Identifiant</label>
                <input type="text" name="user" required placeholder="Entrer votre Identifiant">
                <label>Mot de Passe</label>
                <input type="password" name="password" required placeholder="Entrer votre Mot de Passe">
                <button type="submit" class="big-button">SE CONNECTER</button>
            </form>
        </section>

        <!-- ----------------------------- INSCRIPTION ---------------------------------- -->
        <section>
            <br>
            VOUS AVEZ BESOIN D'UN COMPTE<a href="inscription.php" class="inscription"> Cliquer ici</a>
            <h3>FORMULAIRE D'INSCRIPTION</h3>
            <form action="" method="POST">
                <label>Identifiant</label>
                <input type="text" name="user" required placeholder="Choisir votre Identifiant">
                <label>Mot de Passe</label>
                <input type="password" name="password" required placeholder="Choisir votre Mot de Passe">
                <button type="submit" class="big-button">CREER VOTRE COMPTE</button>
                <input type="hidden" name="register" value="register">
            </form>
        </section>

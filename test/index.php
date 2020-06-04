



 
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <style type="text/css">
        body{ font: 14px sans-serif; }
        .login{width: 350px; padding: 20px; 
        
        ;}
     .btn{text-align: center;}
    </style>
</head>

<body>
 <div class="login">
   <h3>Se Connecter</h3>
  <form action="" method="POST" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> >
  <div class="form-group <?php echo (!empty($username_Err)) ? 'has-error' : ''; ?>">
      <label>Identifient</label>
    <input type="text" class="form-control" name="user">
    <span class="help-block"><?php echo $username_Err ??""?></span>
</div>
   <div>
   <label>LE MOT DE PASSE</label>
   <div class="form-group <?php echo (!empty($password_Err)) ? 'has-error' : ''; ?>">
    <input type="password" class="form-control" name="password">
   <span class="help-block"><?php echo $password_Err??""?></span>
</div>

      <div class="form-groupe">
    <button class="btn btn-primary btn" type="submit">Se Connecter</button>
</div>
  </form>
</div>
<br>
  <span>VOUS AVEZ BESOIN D'Un Compte <span><a href="inscription.php"> Cliquer IcI</a>

  
   <section class="">

     <H3>CREATE YOUR ACCOUNT</H3>
    <form method="POST" action="" >

    <div class="">
  <form action="" method="POST" action="" >
    <div class="from-group">
      <label>UserName</label>
    <input type="text" class="form-control" name="user">
</div>
   <div>
   <label>PASSWORD</label>
    <input type="password" class="form-control" name="password">

</div>


      <div class="form-groupe">
    <button class="btn btn-primary" type="submit">LOGIN</button>
</div>
<input type="hidden" name="register" value="register">

</div>
  

    
    
    </form>
   </section>
</body>
</html>
<!-- 
<script>


 var  HandelForm={}

 HandelForm.Start=function()
{
   var AllForm=document.querySelectorAll("form.ajax");

   AllForm.forEach((tag)=> {
       tag.addEventListener("submit",HandelForm.StartFetch)

   
   });
}

HandelForm.StartFetch=(event)=>
{
   //event.preventDefault();
  console.log("GOD")

  var formuliare=event.target;
  

  var formData=new FormData(formuliare);

  var Fetch=
  {
  method:"POST",
  body:formData};
             
                
                
  fetch("api.php",Fetch)

  .then((response)=>
  {
      return response.json();
  })

  .then(data=>
  {
    console.log(data);
  });




}
HandelForm.Start();
</script> -->
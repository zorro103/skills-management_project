


<?php






   class HandelUser

   {    

      public static function login()
   {
              session_start();
        $_SESSION['login']="login";
        if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
         header("location: admin.php");
         exit;
     }
   
    // $array["request"]=$_REQUEST;
   
   ///  echo LoginPage::$arr=json_encode($array,JSON_PRETTY_PRINT);
   
    
         $emailEntered=$_REQUEST["email"]??"";
   
   $passwordEntered= $_REQUEST["password"]??"";
   
   
   
                
   
   $Result=Model::Read("users","email",$emailEntered);
   
   $passwordHash=password_hash($passwordEntered, PASSWORD_DEFAULT);
   
     
              
    foreach($Result as $arr){
   
    extract($arr);
    
               
   
         if(!empty($arr)){
                   
             
               
   
             if(password_verify($passwordEntered,$password))
                 
        {    
                  $_SESSION['login']=true;
                  header("location:admin.php");

                  
          //echo  LoginPage::$GO= "<script>window.location.href='admin.php'</script>";
           
           
        }
         
   }
   
   }
        
   }
   
      public static function CreateUser()
   {
            // start_session();
            //  $_SESSION['regiser']="register";
            //   header("location: index.php");
            //  exit;}


    
    static $ArrayAsso=[];
    static $register="";
   
   
    $ArrayAsso=[
   
     "email"=>$_REQUEST['email']??"",
     "username"=>$_REQUEST["username"]??"",
     "password"=>$_REQUEST['password']?? "",
     
    ];
   
   
     
    $register=$_REQUEST["register"]??"";
   
    if($register =="register"){
   
   
    $Result=Model::Read("users","email",$ArrayAsso["email"]);
   
    foreach($Result as $table){
     
     extract($table);}
   
     if("email"!=$ArrayAsso["email"])
     {
   
     
      $_SESSION['register']=true;
      header("location:index.php");
       
       
   
       
   

    
   
    $ArrayAsso['password']=password_hash($ArrayAsso["password"],PASSWORD_DEFAULT);
   
   
     }
          
   
   $RequetSql=
   
   <<<CODE
   
   INSERT INTO users
    (email,username,password) 
   
   VALUES
   (:email,:username,:password)
   
   CODE;
     
   

     
    Model::SendToSql($RequetSql,$ArrayAsso);
      
  
   
   }
   }
   }
   
 
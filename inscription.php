<?php
// Include config file
// $pdo=new PDO("mysql:host=localhost;dbname=test;charset=utf8;","root",'');
// $pdoStatement=$pdo->prepare($sql);
//  $pdoStatemen->execute($Array);
 
require_once "Model.php";

   

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Veuillez Entre L'identifient.";
    } else{
      
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
        
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            //s	correspond à une variable de type chaîne de caractères
       
            $param_username = trim($_POST["username"]);
            
        
            if(mysqli_stmt_execute($stmt)){
          
                mysqli_stmt_store_result($stmt);

              //CHECKING  
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "ce nom d'utilisateur deja pris.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! . essayer plus tard My love .";
            }

        
            mysqli_stmt_close($stmt);
        }
    }
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
    

    if(empty(trim($_POST["password"]))){
        $password_err = "Veuillez Entrer le mot de passe.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Le mot de passe doit etre plus de 6 caracteire.";
    } else{
        $password = trim($_POST["password"]);
    }
    
 
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Veuillez Entrer le mot de passe .";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Le mot de passe ne correspond pas .";
        }
    }
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
    

    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
        
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
         
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
      
            if(mysqli_stmt_execute($stmt)){
             
                header("location: index.php");
            } else{
                echo "Veuillez essayer plus tard .";
            }

           
            mysqli_stmt_close($stmt);
        }
    }
    

    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Créer votre Compte</h2>
        <p>VEUILLEZ REMPLIR LES CHAMPS</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Identifiant</label>
                <input type="text" name="username" class="form-control" value="">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Mot de Passe</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmer Mot de Passe</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" >Continuer</button>
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>VOUS AVEZ DEJA UN COMPTE ? <a href="index.php">Se Connecter</a>.</p>
        </form>
    </div>    
</body>
</html>
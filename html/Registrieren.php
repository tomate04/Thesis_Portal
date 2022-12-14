<?php
require_once "config.php";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

function validate($email)
{
  if (!preg_match('/^([a-z0-9\+\_\-\.]+)@([a-z0-9\+\_\-\.]{2,})(\.[a-z]{2,4})$/i', $email)) return false;

  $domains = array('hs-flensburg.de','stud.hs-flensburg.de');
  list(, $email_domain) = explode('@', $email, 2);
  return !in_array($email_domain, $domains);
} 

// Daten nach dem Button verabeiten
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    // Überprüfung der Email
    if(empty(trim($_POST["username"]))){
        $username_err = "Bitte geben sie eine Email ein";
    } 
    if(!filter_var(trim($_POST["username"]), FILTER_VALIDATE_EMAIL))
    {
        $username_err = "Bitte geben sie eine Email ein";
    } 
   
    elseif((validate($_POST["username"])))
    {
        $username_err = "Bitte geben sie eineEmail adresse  der Hochschule an ";
    } else{
        // Select Statmant vorbereiten
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Parameter setzten
            $param_username = trim($_POST["username"]);
            
            // Ausfüheren
            if(mysqli_stmt_execute($stmt)){
               
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Diese Username ist bereits vergeben";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Da ist ein Fehler aufgetreten ";
            }

            // Schließen
            mysqli_stmt_close($stmt);
        }
    }
    
    // Passwort überprüfen
    if(empty(trim($_POST["password"]))){
        $password_err = "Bitte gebe eine Passwort ein";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Das Passwort muss mindestest 6 Zeichen lang sein";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Passwort überprüfen
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bitte bestätige das Passwort";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Die Passwörter stimmen nicht so überein";
        }
    }
    
    // Input error überprüfen
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        echo "imput passt";
        // Vorbereiten des SQL statments
        $sql = "INSERT INTO users (username, password , vorname , nachname) VALUES (?, ? ,? ,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssss", $param_username,$param_password, $vorname , $nachname);

            // Parameter setzten

            $param_password = $password;
            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){

                header("location: login.php");
            } else{
                echo "Es ist ein fehler aufgetreten.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
        else{
            echo "<pre>";
            echo $stmt;
            echo "<pre>";
        }
    }

    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<body>
    <meta charset="UTF-8">
    <title>Sign Up</title>
        <style>
     Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: gray;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid rgb(128, 0, 21);   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;
        background-color: #4CAF50;
        
    }   
        
     
 .container {   
        padding: 25px;   
          
    }   
    </style>   
<center> <h1> Login </h1> </center>   
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">  
    <div class="container">
   
            <label>Email : </label>   
            <input type="text" placeholder="Enter Email" name="username" required <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
        <label>Vorname : </label>
        <input name="vorname" type="text" value="Vorname">
        <label>Nachnamen : </label>
        <input name="nachname" type="text" value="Nachname">
        <label>Password : </label>
            <input type="password" placeholder="Enter Password" name="password" required <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span> 
            <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" placeholder="confirm Password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <button type="submit">Registreiern</button value="Submit">
            <input class="cancelbtn" type="button" value="Zurück" onClick="javascript:history.back()">
</div<>  
</body>
</head>
</html> 
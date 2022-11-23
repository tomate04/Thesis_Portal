<?php
?>

<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
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
    }   
        
     
 .container {   
        padding: 25px;   
          
    }   
</style>   
</head>    
<body>    
    <center> <h1> Login </h1> </center>   
    <form>  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit" name="login">Login</button>  
            
            <input class="cancelbtn" type="button" value="Zurück" onClick="javascript:history.back()">
        </div>   
    </form>     
</body>     
</html>  

<?php
    require_once "config.php";
   
    if (!empty($_POST["login"]))
        {
    
        $_username = $_POST["username"];
        $_passwort = $_POST["passwort"];

        # Befehl für die MySQL Datenbank
        $_sql = "SELECT * FROM login_usernamen WHERE
                    username='$_username' AND
                    passwort='$_passwort'
                    
                LIMIT 1";

        # Prüfen, ob der User in der Datenbank existiert !
        $_res = mysqli_query($_sql, $link);
        $_anzahl = @mysqli_num_rows($_res);

        # Die Anzahl der gefundenen Einträge überprüfen. Maximal
        # wird 1 Eintrag rausgefiltert (LIMIT 1). Wenn 0 Einträge
        # gefunden wurden, dann gibt es keinen Usereintrag, der
        # gültig ist. Keinen wo der Username und das Passwort stimmt
        # und user_geloescht auch gleich 0 ist !
        if ($_anzahl > 0)
            {
            echo "Der Login war erfolgreich.<br>";

            # In der Session merken, dass der User eingeloggt ist !
            $_SESSION["login"] = 1;

            # Den Eintrag vom User in der Session speichern !
            $_SESSION["user"] = mysqli_fetch_array($_res, MYSQL_ASSOC);

            # Das Einlogdatum in der Tabelle setzen !
            $_sql = "UPDATE login_usernamen SET letzter_login=NOW()
                     WHERE id=".$_SESSION["user"]["id"];
            mysqli_query($_sql);
            }
        else
            {
            echo "Die Logindaten sind nicht korrekt.<br>";
            }
        }

    
    mysqli_close($link);
?>
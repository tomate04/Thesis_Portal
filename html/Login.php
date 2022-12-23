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
    <form method="POST">  
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
    session_start();
    //schauen ob Student oder Prof
    function is_student($email)
    {
      if (!preg_match('/^([a-z0-9\+\_\-\.]+)@([a-z0-9\+\_\-\.]{2,})(\.[a-z]{2,4})$/i', $email)) return false;
    
      $domains = array('stud.hs-flensburg.de');
      list(, $email_domain) = explode('@', $email, 2);
      return !in_array($email_domain, $domains);
    } 

    if(isset($_POST['login'])) 
    {
        require_once "config.php";
        
        $query = $link->prepare('SELECT `id` FROM `users` WHERE `username` = ? AND `password` = ?');
        $query->bind_param('ss', $_POST['username'],($_POST['password']));
        $query->execute();
        $query->store_result();
        $query->bind_result($id);

        //Sind Benutzerdaten vorhanden und korrekt?

        if($query->num_rows == 1)
        {
            $query->fetch();

            $_SESSION['id'] = $id;
            $username = $_POST['username'];
            $_SESSION['username'] = $username;

            session_id($id);
            $query->bind_result($id);
            if(is_student($_POST['username']))
            {
                echo '<script>alert("Refolgreich angemeldet")</script>';
                header('location: Profesor_Status.php');


                exit();
            }
            else
            {

                echo '<script>alert("Refolgreich angemeldet")</script>';
                header('location: Student_Anfrage.php');


                exit();
            }
           
            


        }
        else
        {
            $error = 'Ihre Anmeldedaten sind nicht korrekt. Bitte wiederholen Sie Ihre Eingabe.';
        }




    }
   
    ?>
    
     
    

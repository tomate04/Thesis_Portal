<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anfrage</title>
</head>
<body>

<form method="post">
  <div>
        <img src="../Images/Fh Flensburg_Logo.png"/>
    </div>
    <h1 class="Title"> Status Portal </h1>  
    <div>
    <tr >
            <td >
                 <h2 class="Suchfelder">Titel</h2>
                 <p class="Suchfelder"> <input name="Titel" > </p>
                 
            </td>
            <td >
                 <h2 class="Suchfelder">Studnet</h2>
                 <p class="Suchfelder"> <input name="Studnet" > </p>
                 
            </td>
            <td >
                <h2 class="Suchfelder">Professor</h2>
                <select  name="Betreuer" >
                        <option >Prof. Dr. rer. pol. Till Albert</option>
                        <option >Prof. Dr. rer. pol. habil. Marcus Brandenburg</option>
                        <option >Prof. Dr. Sönke Cordts</option>
                        <option >Prof. Dr. rer. pol. Jan Gerken</option>
                        <option >Prof. Dr. rer. pol., MBA Thorsten Kümper</option>
                        <option >Prof. Dr. Andreas Rusnjak</option>
                        <option >Prof. Dr. rer. pol. Lasse Tausch-Nebel</option>
                        <option >Prof. Dr. rer. pol. Ulrich Welland</option>
                
                    </select>
           </td>
           
           <div >
           <input name="Anfrage_Stelle" type="submit" value="Anfrage stellen" >
           </div>
        
      <form\>
        
      </form>    
           
<?php

if(isset($_POST["Anfrage_Stelle"]))
{
  
    require_once "config.php";
   
    $sql = "INSERT INTO anfragen (Thema, Betreuer, Student) VALUES (?, ?, ?)";

    if($stmt = mysqli_prepare($link, $sql)){
        
       
        

        mysqli_stmt_bind_param($stmt, "sss", $param_Titel, $param_Betreuer, $param_Studnet );
        
        // Parameter setzten
        $param_Titel = $_POST['Titel'];
        $param_Studnet = $_POST['Studnet'];
        $param_Betreuer = $_POST['Betreuer'];
      
        

        
        if(mysqli_stmt_execute($stmt)){
            
            header("location: login.php");
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }


}

    
    
//$to_email = "felixbloch13@gmail.com";
//$subject = "Anfrage für eine Abschlussarbeit";
//$body = "Hallo ich möchte gerne eine Abschlussarbeit bei Ihnen schreiben zu folgendem Thema";
//$headers = "From: sender\'s email";
 
//f (mail($to_email, $subject, $body, $headers)) {
  ///  echo "Email successfully sent to $to_email...";
//} else {
//    echo "Email wurde verschickt.";
//}
  //  require_once "config.php";

    //$sql="SELECT * FROM professor "; 
    //$result = mysqli_query($link,"SELECT * FROM professor ");
     
 
    

     //$sql="SELECT * FROM professor "; 

    
    
     


     //mysqli_close($link); 

?>
</body>
</html>

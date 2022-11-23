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
                <select name="Fachbereich_Suche" class="" name="Betreuer">
                        <option value="alle">Prof. Dr. rer. pol. Till Albert</option>
                        <option value="alle">Prof. Dr. rer. pol. habil. Marcus Brandenburg</option>
                        <option value="alle">Prof. Dr. Sönke Cordts</option>
                        <option value="alle">Prof. Dr. rer. pol. Jan Gerken</option>
                        <option value="alle">Prof. Dr. rer. pol., MBA Thorsten Kümper</option>
                        <option value="alle">Prof. Dr. Andreas Rusnjak</option>
                        <option value="alle">Prof. Dr. rer. pol. Lasse Tausch-Nebel</option>
                        <option value="alle">Prof. Dr. rer. pol. Ulrich Welland</option>
                
                    </select>
           </td>
           
           <div >
           <input name="Anfrage_Stelle" type="submit" value="Anfrage stellen" >
           </div>
        
          
           
<?php

if(isset($_POST["Anfrage_Stelle"]))
{
  
    require_once "config.php";
    $Titel=$_POST['Titel'];
  
    $sql1 = "INSERT INTO anfragen (Thema, Betreuer, Student) VALUES ('$_POST[Titel]', '$_POST[Titel]', '$_POST[Titel]',)";
    $sql2 = "INSERT INTO anfragen (Thema, Betreuer, Student) VALUES (Titel, 'test', 'test')";
    
    mysqli_query($link, $sql1);
    mysqli_query($link, $sql2);

    mysqli_close($link);

 



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

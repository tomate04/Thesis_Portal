<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anfrage</title>
</head>
<body>
<style>
      table {
  border-collapse: collapse;
  width: 100%;
  font-size: 20px;
  font-family: Arial, Helvetica, sans-serif;
}

th, td {
  text-align: left;
  padding: 20px;
  font-family: Arial, Helvetica, sans-serif;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: white;
  color: rgb(43, 47, 136)
 
}
</style> 
<form method="post">
  <div>
        <img src="../Images/Fh Flensburg_Logo.png"/>
    </div>
    <h1 class="Title"> Status Portal </h1>

    <div>

        <tr>

        </tr>
            <td >
                 <h2 class="Suchfelder">Titel</h2>
                 <p class="Suchfelder"> <input name="Titel" > </p>
                 
            </td>

        <td >
            <h2 class="Suchfelder">Fachbereich</h2>
            <p class="Suchfelder"> <input name="Fachbereich" > </p>

        </td>
        </td>
        <td >
            <h2 class="Suchfelder">Professor</h2>
            <select  name="Prof_Email" >
                <option >till.albert@hs-flensburg.de</option>
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
           <table name="Anfragestatus" style="width:100%">

      <form\>
        
   
      
<?php
session_start();
require_once "config.php";
$id =$_SESSION['id'];

if(isset($_POST["Anfrage_Stelle"]))
{

    
   
    $sql = "INSERT INTO abschlussarbeit (Titel, Fachbereich, Status , User_ID , Prof_Email ) VALUES (?, ?, ?, ?,?)";

    if($stmt = mysqli_prepare($link, $sql)){
        


        mysqli_stmt_bind_param($stmt, "sssss", $param_Titel, $param_Fachbereich, $param_Status ,$param_ID ,$param_Prof_Email);
        
        // Parameter setzten
        $param_Titel = $_POST['Titel'];
        $param_Prof_Email = $_POST['Prof_Email'];
        $param_Fachbereich = $_POST['Fachbereich'];
        $param_Status = 'Angefragt';
        $param_ID = $id;
      
        

        
        if(mysqli_stmt_execute($stmt)){
            
            echo '<script>alert("Anfrage wurde gestellt")</script>';
            
            
        } else{
            echo "Es ist ein Fehler aufgetreten";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    


}
    echo "<tr>";
    echo "<th> Titel </th>";
    echo "<th> Fachbereich </th>";
    echo "<th> Prof Email </th>";
    echo "<th> Status </th>";
    echo "<tr>";
    

    $result = mysqli_query($link,"SELECT * FROM abschlussarbeit WHERE User_ID = $id");
    
    
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Titel'] . "</td>";
    echo "<td>" . $row['Fachbereich'] . "</td>";
    echo "<td>" . $row['Prof_Email'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
 
    echo "</tr>";
    }
    
    
    mysqli_close($link);
    
    
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



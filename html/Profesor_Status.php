<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anfrage</title>
    <form method="POST">
    
    <td >
                 <h2 class="Suchfelder">Student</h2>
                 <p class="Suchfelder"> <input name="Student" > </p>
                 
            </td>
            <div >
           <input name="Anfrage_Beantworten" type="submit" value="Anfrage beantworten" >
    </div>
    </form>
    
</head>
<body>

<form method="post">
  <div>
        <img src="../Images/Fh Flensburg_Logo.png"/>
    </div>
    <h1 class="Title"> Status Portal Prof Ansicht </h1>  
    <div>
    <tr >
         
    <table name="suchergebnis" style="width:100%">    
        
          
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

<?php
session_start();
$id =$_SESSION['id'];

    require_once "config.php";
     
    
    echo "<tr>";
    echo "<th> Titel </th>";
    echo "<th> Fachbereich </th>";
    echo "<th> Status </th>";
    echo "<tr>";


    require_once "config.php";
    $username = "";
    $query = $link->prepare('SELECT `username` FROM `users` WHERE id = ?');
    $query->bind_param('s', $id,);
    $query->execute();
    $query->store_result();
    $query->bind_result($username);

$username = "till.albert@hs-flensburg.de";


$result = mysqli_query($link,"SELECT * FROM abschlussarbeit WHERE Prof_Email = '$username' ");




if($query->num_rows == 1)
{
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Titel'] . "</td>";
        echo "<td>" . $row['Fachbereich'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "</tr>";
    }


    mysqli_close($link);
}
else
    echo "es ist ein Fehler aufgetreten";
if(isset($_POST["Anfrage_Beantworten"]))
{


require_once "config.php";
$student = $_POST['Student'];

  $sql = "UPDATE anfragen Set Status ='in bearbeitung";
  if($stmt = mysqli_prepare($link, $sql)){
      
      mysqli_stmt_bind_param($stmt, "s", $param_Status );
      
      // Parameter setzten
     
      $param_Status = 'In Bearbeitung';
      
      if(mysqli_stmt_execute($stmt)){
          
          echo '<script>alert("Status wurde verändert")</script>';
          
          
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
  }
}


?>
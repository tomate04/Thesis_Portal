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

    require_once "config.php";
     
    
    echo "<tr>";
    echo "<th> Student </th>";
    echo "<th> Thema </th>";
    echo "<th> Status </th>";
    echo "<tr>";
    
  
   
  
  
    $result = mysqli_query($link,"SELECT * FROM anfragen WHERE Betreuer = '$prof' ");
    
  
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Student'] . "</td>";
    echo "<td>" . $row['Thema'] . "</td>";
    echo "<td>" . $row['Status'] . "</td>";
    echo "</tr>";
    }
    
    
    mysqli_close($link);
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
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
     echo "<tr>";
     

     $result = mysqli_query($link,"SELECT * FROM anfragen WHERE Betreuer = 'Bloch';");
     
     
     
     while($row = mysqli_fetch_array($result))
     {
     echo "<tr>";
     echo "<td>" . $row['Student'] . "</td>";
     echo "<td>" . $row['Thema'] . "</td>";
  
     echo "</tr>";
     }
     
     
     mysqli_close($link);

  
     

?>
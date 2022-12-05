<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
</head>
<body>

<form method="post">
  <div>
        <img src="../Images/Fh Flensburg_Logo.png"/>
    </div>
    <h1 class="Title"> Status Portal Prof Ansicht </h1>  
    <div>
    <tr >
        <title>Anfrage</title>
        <form method="POST">

            <td >
                <h2 class="Suchfelder">Titel</h2>
                <p class="Suchfelder"> <input name="Titel" > </p>

            </td>
            <div >
                <input class="button-blau" name="Anfrage_Annehmen" type="submit" value="Annehmen" >
                <input class="button-orange" name="Anfrage_Ablehnen" type="submit" value="Ablehnen" >
            </div>
            <div>
                <input class="button3" name="abmelden" type="submit" value="abmelden" >
            </div>
        </form>
         
    <table name="suchergebnis" style="width:100%">

<style>

    .button3 {
        background-color: rgb(193, 47, 6);
        border: none;
        color: white;
        padding: 8px 35px;
        text-align: right;
        text-decoration: none;
        display: inline-block;
        font-size: 20px;
        border-radius: 18px;
        font-family: Arial, Helvetica, sans-serif;
        position: absolute;
        right: 10px;
        top: 5px;

    }
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
      .button-blau {
          background-color: rgb(43, 47, 136);
          border: none;
          color: white;
          padding: 8px 35px;
          text-align: right;
          text-decoration: none;
          display: inline-block;
          font-size: 10px;
          border-radius: 18px;
          font-family: Arial, Helvetica, sans-serif;

      }
      .button-orange {
          background-color: rgb(236, 103, 7);
          border: none;
          color: white;
          padding: 8px 35px;
          text-align: right;
          text-decoration: none;
          display: inline-block;
          border-radius: 18px;
          font-size: 10px;
          font-family: Arial, Helvetica, sans-serif;
      }
</style>            

<?php
session_start();
$id =$_SESSION['id'];
$username =$_SESSION['username'];


    require_once "config.php";
     
    
    echo "<tr>";
    echo "<th> Titel </th>";
    echo "<th> Fachbereich </th>";
    echo "<th> Status </th>";
    echo "<tr>";


    require_once "config.php";

    $result = mysqli_query($link,"SELECT * FROM abschlussarbeit WHERE Prof_Email = '".$username."' ");



    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['Titel'] . "</td>";
        echo "<td>" . $row['Fachbereich'] . "</td>";
        echo "<td>" . $row['Status'] . "</td>";
        echo "</tr>";
    }


    mysqli_close($link);


if(isset($_POST["Anfrage_Annehmen"]))
{

require_once "config.php";
$Titel = $_POST['Titel'];

  $sql = "UPDATE abschlussarbeit SET STATUS = 'In Bearbeitung' WHERE Titel = $Titel";


  if($stmt = mysqli_prepare($link, $sql)){

      if(mysqli_stmt_execute($stmt)){
          
          echo '<script>alert("Status wurde verändert")</script>';
          
          
      } else{
          echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
  }
}
if(isset($_POST["Anfrage_Ablehnen"]))
{

    require_once "config.php";
    $Titel = $_POST['Titel'];

    $sql = "UPDATE abschlussarbeit SET STATUS = 'In Bearbeitung' WHERE Titel = $Titel";


    if($stmt = mysqli_prepare($link, $sql)){

        mysqli_stmt_bind_param($stmt, "s", $param_Status );

        // Parameter setzten

        $param_Status = 'Abgelehnt';

        if(mysqli_stmt_execute($stmt)){

            echo '<script>alert("Status wurde verändert")</script>';


        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
if(isset($_POST["abmelden"]))
{

    session_destroy();
    header('location: ../index.php');

}
?>
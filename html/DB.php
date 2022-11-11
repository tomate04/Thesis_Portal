<!DOCTYPE html><html lang="de"><head></head><body>

<h1>Usere Übersicht </h1>
<?php

//Verbindung zur Datenbank herstellen
$host_name = '%admin';
$user_name = 'admin';
$password = 'admin';
$database = 'thesis portal';

$connect = mysqli_connect($host_name, $user_name, $password, $database);
mysqli_query($connect, "SET NAMES 'utf8'");


// Anzeige aller Datensätze der Tabelle
$abfrage = "SELECT * FROM user";

$result = mysqli_query($connect, $abfrage);

echo "<table border='1' cellpadding='3'>
      <tr>
      <th>UserID</th>
      <th>UserName</th>
      <th>UserPassword</th>

      </tr>";
echo "<form method='post'>";

echo "<table>";
?>



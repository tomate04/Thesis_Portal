<?php

function Anfrage_alles()
{
    require "config.php";
    
    
  
    echo "<tr>";
    echo "<th> Titel </th>";
    echo "<th> Professor </th>";
    echo "<th> Firma </th>";
    echo "<th> Fachbereich </th>";
    echo "<tr>";
    
    
    $result = mysqli_query($link,"SELECT * FROM abschlussarbeit ");
    
    
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Titel'] . "</td>";
    echo "<td>" . $row['Professor'] . "</td>";
    echo "<td>" . $row['Firma'] . "</td>";
    echo "<td>" . $row['Fachbereich'] . "</td>";
    echo "</tr>";
    }
    
    mysqli_close($link);
    
}


?>
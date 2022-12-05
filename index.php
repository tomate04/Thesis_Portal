<?php
?>
<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Thesis Portal </title>  
<style>  
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
.button3 {
  background-color: rgb(193, 47, 6);
  border: none;
  color: white;
  padding: 8px 35px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 10px;
}

.logo {
        position: relative;
       
    }
 .logo {
        position: absolute;

        
        
    }

.Title {

    font-family: Arial, Helvetica, sans-serif;
  }
.Suchfelder {
    float: left;

    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
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


</style>   
</head>    
<body>
  </div>
  <div class="imgContainer">
    <div>
        <img src="Images/Fh Flensburg_Logo.png"/>
    </div>
    <h1 class="Title"> Thesis Portal </h1>  
    <div>
      <h1 style="text-align:center;"></h1>
      <input class="button-blau" type="button" onclick="window.location.href='html/Login.php'" value="Login"/>
      <input class="button-orange" type="button" onclick="window.location.href='html/Registrieren.php'" value="Registreiern"/>
    </div>
</div>
    <form method="post">  
        <tr >
            <td >
                 <h2 class="Suchfelder">Titel</h2>
                 <p class="Suchfelder"> <input name="Titel_Suche" > </p>
                 
            </td>
            <td >
                <h2 class="Suchfelder">Professor</h2>
                <p class="Suchfelder"><input name="Professor_Suche"> </p>
           </td>
           <td>
            <h2 class="Suchfelder">Firma</h2>
            <p class="Suchfelder"><input name="Firma_Suche" placeholder="Nur wenn nötig"> </p>
        </td>
        </tr>
        <tr>
            <td>
                  <h2>Fachbereich</h2>
                  <p>
                    <select name="Fachbereich_Suche" class="">
                        <option value="alle">alle anzeigen</option>
                        <option value="ps1">Fachbereich 1: Maschinenbau, Verfahrenstechnik und Maritime Technologien</option>
                        <option value="ps2">Fachbereich 2: Energie und Biotechnologie</option>
                        <option value="ps3">Fachbereich 3: Information und Kommunikation</option>
                        <option value="ps4">Fachbereich 4: Wirtschaft</option>

                    </select>
                  </p>
            </td>
        <input name="Button_Suche" class="button3"  style="margin-top: 25px" type="submit" value="Suche starten" >  
    </form>
    <table name="suchergebnis" style="width:100%">
  
    <?php
    require "html/config.php";
    require "html/funktionen.php";

    
  
    echo "<tr>";
    echo "<th> Titel </th>";
    echo "<th> Professor </th>";
    echo "<th> Fachbereich </th>";
    echo "<tr>";

    $result = mysqli_query($link,"SELECT * FROM abschlussarbeit ");
    
    
    
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['Titel'] . "</td>";
    echo "<td>" . $row['Prof_Email'] . "</td>";
    echo "<td>" . $row['Fachbereich'] . "</td>";
    echo "</tr>";
    }
 
   
   

    if(isset($_POST["Button_Suche"])) 
    { 

        
        $Suche = $_POST['Titel_Suche'];
      

        $result = mysqli_query($link,"SELECT * FROM abschlussarbeit WHERE Titel = $Suche");
  
        while($row = mysqli_fetch_array($result))
            echo "<tr>";
        echo "<td>" . $row['Titel'] . "</td>";
        echo "<td>" . $row['Prof_Email'] . "</td>";
        echo "<td>" . $row['Fachbereich'] . "</td>";
        echo "</tr>";

 
   
     }

?>
    
</body>     
</html>  
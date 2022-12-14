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
            <h2 class="Suchfelder">Abstract</h2>
            <p class="Suchfelder"><input name="Abstract" > </p>
        </td>
        </tr>
        <tr>
            <td>
                  <h2>Fachbereich</h2>
                  <p>
                    <select name="Fachbereich_Suche" class="">
                        <option value="">alle anzeigen</option>
                        <option value="Fachbereich 1">Fachbereich 1: Maschinenbau, Verfahrenstechnik und Maritime Technologien</option>
                        <option value="Fachbereich 2">Fachbereich 2: Energie und Biotechnologie</option>
                        <option value="Fachbereich 3">Fachbereich 3: Information und Kommunikation</option>
                        <option value="Fachbereich 4">Fachbereich 4: Wirtschaft</option>
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
    echo "<th> Abstract </th>";
    echo "<th> Professor </th>";
    echo "<th> Fachbereich </th>";

    echo "<tr>";



    if(isset($_POST["Button_Suche"])) {



        // Verbindung zur Datenbank herstellen
        $conn = new mysqli("localhost", "root", "", "portal");

        // Variablen f??r Suchkriterien definieren
        $title = $_POST['Titel_Suche'];
        $department = $_POST['Fachbereich_Suche'];
        $abstract = $_POST['Abstract'];
        $professor = $_POST['Professor_Suche'];

        // Array f??r Suchkriterien erstellen
        $criteria = array();

        // F??ge Suchkriterien zum Array hinzu, wenn sie gesetzt sind
        if (!empty($title)) {
            $criteria[] = "Titel LIKE '%$title%'";
        }
        if (!empty($department)) {
            $criteria[] = "Fachbereich = '$department'";
        }
        if (!empty($abstract)) {
            $criteria[] = "Abstract LIKE '%$abstract%'";
        }
        if (!empty($professor)) {
            $criteria[] = "Prof_Email = '$professor'";
        }

        // SQL- Statement zusammensetzen
        $sql = "SELECT * FROM abschlussarbeit";

        // F??ge WHERE-Klausel und Suchkriterien zum SQL- Statement hinzu, wenn sie gesetzt sind
        if (!empty($criteria)) {
            $sql .= " WHERE " . implode(" AND ", $criteria);
        }

        // Statement vorbereiten
        $stmt = $conn->prepare($sql);

        // Statement ausf??hren
        $stmt->execute();


        // Ergebnisse abrufen
        $result = $stmt->get_result();

        // Ergebnisse durchlaufen und ausgeben
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Titel'] . "</td>";
            echo "<td>" . $row['Abstract'] . "</td>";
            echo "<td>" . $row['Prof_Email'] . "</td>";
            echo "<td>" . $row['Fachbereich'] . "</td>";
            echo "</tr>";
        }

        // Verbindung zur Datenbank schlie??en
        $conn->close();

    }

    ?>
    
</body>     
</html>  
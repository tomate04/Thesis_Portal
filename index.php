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
}
.button3 {
  background-color: rgb(193, 47, 6);
  border: none;
  color: white;
  padding: 8px 35px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  
  font-size: 10px;
}

.logo {
        position: relative;
       
    }
 .logo {
        position: absolute;
        top: 0px;
        right: 0px;
        size: 400;
        
        
    }

.Title {
    text-align: Top;
    text-align: center;
    font-size: 20;
    
  }
.Suchfelder {
    float: left;
    font-size: 10;
    text-align: center;
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
   
    if(isset($_POST["Button_Suche"])) 
    { require_once "C:/xampp/htdocs/Index-2/Index/html/config.php";
      
      $Titel=$_POST['Titel_Suche'];
      $Professor=$_POST['Professor_Suche'];
      $Firma=$_POST['Firma_Suche'];
      $Fachbereich=$_POST['Fachbereich_Suche'];
      
      echo "<tr>";
      echo "<td> Titel </td>";
      echo "<td> Fachbereich </td>";
      echo "<td> Studiengang </td>";
      echo "<tr>";
    

      $result = mysqli_query($link,"SELECT * FROM abschlussarbeit Where Titel = '$Titel'");
      
      
      
      while($row = mysqli_fetch_array($result))
      {
      echo "<tr>";
      echo "<td>" . $row['Titel'] . "</td>";
      echo "<td>" . $row['Fachbereich'] . "</td>";
      echo "<td>" . $row['Studiengang'] . "</td>";
      echo "</tr>";
      }
      echo "</table>";
      
      mysqli_close($link); }

?>
    
</body>     
</html>  
<?php
?>
<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Thesis Portal </title>  
<style>  
.button1 {
  background-color: rgb(6, 6, 193);
  border: none;
  color: white;
  padding: 8px 35px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-size: 10px
  
}
.button2 {
  background-color: rgb(193, 112, 6);
  border: none;
  color: white;
  padding: 8px 35px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  
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
        <img src="Images\Fh Flensburg_Logo.png"/>
    </div>
    <h1 class="Title"> Thesis Portal </h1>  
    <div>
      <h1 style="text-align:center;"></h1>
      <input class="button1" type="button" onclick="window.location.href='html/Login.php'" value="Login"/>
      <input class="button2" type="button" onclick="window.location.href='html/Registrieren.php'" value="Registreiern"/>
    </div>
</div>
    <form>  
        <tr >
            <td >
                 <h2 class="Suchfelder">Titel</h2>
                 <p class="Suchfelder"> <input name="Titel"> </p>
            </td>
            <td >
                <h2 class="Suchfelder">Professor</h2>
                <p class="Suchfelder"><input name="Titel"> </p>
           </td>
           <td>
            <h2 class="Suchfelder">Firma</h2>
            <p class="Suchfelder"><input name="Titel" placeholder="Nur wenn nötig"> </p>
        </td>
        </tr>
        <tr>
            <td>
                  <h2>Fachbereich</h2>
                  <p>
                    <select name="leistung" class="">
                        <option value="alle">alle anzeigen</option>
                        <option value="ps1">Fachbereich 1</option>
                        <option value="ps2">Fachbereich 2</option>
                        <option value="ps3">Fachbereich 3</option>
                        <option value="ps4">Fachbereich 4</option>
                        <option value="ps5">Fachbereich 5</option>
                    </select>
                  </p>
            </td>
        <input class="button3" style="margin-top: 25px" type="submit" value="Suche starten">  
    </form>
    <h2>Suchergebins</h2>
<table style="width:100%">
  <tr>
    <th>Titel</th>
    <th>Professor</th>
    <th>Fachberreich</th>
    <th>Abstract</th>
    <th>Firma</th>
  </tr>
  <tr>
    <td>Software entwicklung</td>
    <td>Kai Peters</td>
    <td>Fachbereich 4</td>
    <td>Wie sich Softwareentwicklung 4</td>
    <td>SAP</td>
  </tr>
</table>     
</body>     
</html>  
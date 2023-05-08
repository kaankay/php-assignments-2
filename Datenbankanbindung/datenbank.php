<!DOCTYPE html>
<html>
  <head>
    <title>Datenbank PHP Aufgabe</title>
  </head>
  <body>
    <?php

      $datenbank = mysqli_connect("127.0.0.1","root","","studium")
      or die("Keine Verbindung zum MySQL-Server...");

      $sql = "SELECT * FROM lehrveranstaltungen ORDER BY Name";
      //$sql = "SELECT * FROM lehrveranstaltungen WHERE dozent LIKE 'Pohle' ";
      $result = mysqli_query($datenbank, $sql)
      or die("Fehler: ".mysql_error());

      //$reihe = mysqli_fetch_assoc($result);
      echo "<h1>Lehrveranstaltungen</h1>";

      //while($reihe = mysqli_fetch_assoc($result)){
        while($reihe=$result->fetch_assoc()){
        $name = $reihe['name'];
        $typ = " (".$reihe['typ'].")";
        $erstezeile = $name.$typ;
        $dozent ="<strong>Dozent*in: </strong>". $reihe['dozent'];
        $semester ="<strong>Semester: </strong>". $reihe['semester'];
        $sws ="<strong>SWS: </strong>". $reihe['sws'];
        echo "<h2> $erstezeile </h2>";
        echo $dozent."<br>".$semester."<br>".$sws."<br>";
      }
      mysqli_close($datenbank);
      ?>
  </body>
</html>
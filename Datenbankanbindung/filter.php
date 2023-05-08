<!DOCTYPE html>
<html>
  <head>
    <title>Datenbank PHP Aufgabe</title>
  </head>
  <body>
    <?php

    //error_reporting(E_ALL);

      $dozent = $_GET['dozent'];
      //if($dozent=="") $dozent="%";
      $semester = $_GET['semester'];

      $datenbank = mysqli_connect("127.0.0.1","root","","studium")
      or die("Keine Verbindung zum MySQL-Server...");

      $tabelle = "lehrveranstaltungen";
      $query = "SELECT * FROM $tabelle WHERE (dozent LIKE '$dozent%' AND semester LIKE '$semester') ORDER BY dozent";

      //$result = mysqli_query($datenbank, $query)
      //or die("Fehler: ".mysql_error());
      $result=$datenbank->query($query);
      //$result->execute();


      //$reihe = mysqli_fetch_object($result);
      //$reihe = mysqli_fetch_all($result);
      
      //$reihe=$result->fetch_all(MYSQLI_ASSOC);
      //print_r($reihe);

      //$zeile = mysqli_num_rows($result);
      //echo $zeile;
      //$i=0;

      

      if($result->num_rows>0){
        echo "<h1>Meine Lehrveranstaltungen</h1>";
        while($reihe=$result->fetch_assoc()){
          $name = $reihe['name'];
          $typ = " (".$reihe['typ'].")";
          $erstezeile = $name.$typ;
          $dozentfilter ="<strong>Dozent*in: </strong>". $reihe['dozent'];
          $semesterfilter ="<strong>Semester: </strong>". $reihe['semester'];
          $sws ="<strong>SWS: </strong>". $reihe['sws'];
          echo "<h2> $erstezeile </h2>";
          echo $dozentfilter."<br>".$semesterfilter
          ."<br>".$sws."<br>";
        }
      }
      else{
        echo "Kein Ergebnis!";
      }

      

      /*foreach ($reihe as $zeile){
        $name = $zeile['name'];
        $typ = " (".$zeile['typ'].")";
        $dozentfilter ="<strong>Dozent*in: </strong>". $zeile['dozent'];
        $semesterfilter ="<strong>Semester: </strong>". $zeile['semester'];
        $sws ="<strong>SWS: </strong>". $zeile['sws'];
        echo "<h2> $name.$typ </h2>";
        echo $dozentfilter."<br>".$semesterfilter
        ."<br>".$sws."<br>";
      }*/
      mysqli_close($datenbank);
      ?>
  </body>
</html>
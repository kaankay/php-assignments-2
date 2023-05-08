<!DOCTYPE html>
<html>
  <head>
    <title>Datenbank PHP Aufgabe</title>
  </head>
  <body>
    <?php

    //error_reporting(E_ALL);

      
      $name = $_GET['lv'];
      $typ = $_GET['typ'];
      $dozent = $_GET['dozent'];
      $semester = $_GET['semester'];
      $sws = $_GET['sws'];

      switch($_GET['typ'])
      {
        case 'Seminaristischer Unterricht (SU)':
            $typneu = "SU";
            break;

        case 'Pflichtfach (P)':
            $typneu = "P";
            break;

        case '&Uuml;bung (&Uuml;)':
            $typneu = "&Uuml;";
            break;
      }

      switch($_GET['dozent'])
      {
        case 'Prof. Dr. F. Fuchs-Kittowski':
            $dozentneu = "Fuchs-Kittowski";
            break;

        case 'Dr. J&ouml;rg Pohle':
            $dozentneu = "Pohle";
            break;
      }
      switch($_GET['semester'])
      {
        case 'Sommer 2020':
            $semesterneu = "SoSe2020";
            break;

        case 'Winter 2020':
            $semesterneu = "WiSe2020";
            break;

        case 'Sommer 2021':
            $semesterneu = "SoSe2021";
            break;

        case 'Winter 2021':
            $semesterneu = "WiSe2021";
            break;
      }

      $datenbank = mysqli_connect("127.0.0.1","root","","studium")
      or die("Keine Verbindung zum MySQL-Server...");

      $tabelle = "lehrveranstaltungen";
      //$query = "SELECT * FROM $tabelle WHERE (dozent LIKE '$dozent%' AND semester LIKE '$semester') ORDER BY dozent";

      $query = "INSERT INTO $tabelle VALUES ('$name', '$typneu', '$dozentneu', '$semesterneu', '$sws');";
      //$result = mysqli_query($datenbank, $query)
      //or die("Fehler: ".mysql_error());
      $result=$datenbank->query($query);

      $sql = "SELECT * FROM lehrveranstaltungen ORDER BY Name";
      $ergebnis = mysqli_query($datenbank, $sql)
      or die("Fehler: ".mysql_error());

      echo "<h1>Lehrveranstaltungen</h1>";

      while($reihe=$ergebnis->fetch_assoc()){
        $nameend = $reihe['name'];
        $typend = " (".$reihe['typ'].")";
        $erstezeile = $nameend.$typend;
        $dozentend ="<strong>Dozent*in: </strong>". $reihe['dozent'];
        $semesterend ="<strong>Semester: </strong>". $reihe['semester'];
        $swsend ="<strong>SWS: </strong>". $reihe['sws'];
        echo "<h2> $erstezeile </h2>";
        echo $dozentend."<br>".$semesterend."<br>".$swsend."<br>";
      }

      //$result->execute();


      //$reihe = mysqli_fetch_object($result);
      //$reihe = mysqli_fetch_all($result);
      
      //$reihe=$result->fetch_all(MYSQLI_ASSOC);
      //print_r($reihe);

      //$zeile = mysqli_num_rows($result);
      //echo $zeile;
      //$i=0;

      

      /*if($result->num_rows>0){
        echo "<h1>Meine Lehrveranstaltungen</h1>";
        while($reihe=$result->fetch_assoc()){
          $name = $reihe['name'];
          $typ = " (".$reihe['typ'].")";
          $dozentfilter ="<strong>Dozent*in: </strong>". $reihe['dozent'];
          $semesterfilter ="<strong>Semester: </strong>". $reihe['semester'];
          $sws ="<strong>SWS: </strong>". $reihe['sws'];
          echo "<h2> $name.$typ </h2>";
          echo $dozentfilter."<br>".$semesterfilter
          ."<br>".$sws."<br>";
        }
      }
      else{
        echo "Kein Ergebnis!";
      }*/



      

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
<!DOCTYPE html>
<html>
  <head>
    <title>Zweite PHP Aufgabe</title>
  </head>
  <body>
    <?php
        $name = $_POST['vorname'];
        $alter = $_POST['alter'];
        $aktion = $_POST['test'];
        $geht = "Das kannst du machen! Viel Spaß ".$name."!";
        $gehtnicht = $name."! Dafür bist du leider noch zu jung!";

      switch ($_POST['test']) 
      {

         case 'tee':   
          echo $geht;
          break;

          case 'bier':
          if($alter>=16){
            echo $geht;
          }
          else{
          echo $gehtnicht;
          }
          break;

          case 'schnapps': 
          if($alter>=18){
            echo $geht;
          }
          else{
          echo $gehtnicht;
          }
          break;
          case 'zigaretten': 
            if($alter>=18){
              echo $geht;
            }
            else{
            echo $gehtnicht;
            }
            break;
          case 'techno': 
              if($alter>=21){
                echo $geht;
              }
              else{
              echo $gehtnicht;
              }
              break;
          

      }
    ?>
  </body>
</html>
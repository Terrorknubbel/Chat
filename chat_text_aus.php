<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Chat</h3>
    <?php
    /*Datei mit Chat-Daten auslesen*/
    $fp = @fopen("chat_text.txt","r");
    if($fp){
      echo "<table><tr><td><b>Zeit</b></td>"
      . "<td><b>Name</b></td>"
      . "<td><b>Beitrag</b></td></tr>";

      /*alle Zeilen lesen und ausgeben*/
      while(!feof($fp)){
        $tabzeile = fgets($fp,200);
        echo "$tabzeile";
      };

      echo "</table>";
      fclose($fp);
    }
     ?>
  </body>
</html>

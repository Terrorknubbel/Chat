<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

  </head>
  <body>
    <?php
      $con = mysqli_connect("", "root");
      mysqli_select_db($con, "chat");
      $res = mysqli_query($con, "SELECT * from daten order by zeit asc");

      if(mysqli_num_rows($res)>0){
        echo "<table><tr><td><b>Zeit</b></td>"
        . "<td><b>Name</b></td>"
        . "<td><b>Beitrag</b></td></tr>";

        while($dsatz = mysqli_fetch_assoc($res)){
          $z = $dsatz["zeit"];
          $zs = substr($z,8,2) . "." . substr($z,5,2) . "."
          . substr($z,0,4) . " " . substr($z,11);
          echo "<tr><td>$zs</td>"
          . "<td>" . $dsatz["nick"] . "</td>"
          . "<td>" . $dsatz["beitrag"] . "</td></tr>";
        }
        mysqli_close($con);
        echo "</table>";
      }
     ?>
  </body>
</html>

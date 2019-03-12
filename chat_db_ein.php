<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript">
      /*Chat-Anzeige aktualisieren*/
      function reload(){
        parent.eingabe.location.href = "chat_db_ein.php";
        parent.ausgabe.location.href = "chat_db_aus.php";
      };
    </script>
  </head>
  <body>
    <?php
      /*Anhängen des neuen Textes, falls vorhanden*/
      if(isset($_POST["beitrag"])){
        $con = mysqli_connect("", "root");
        mysqli_select_db($con, "chat");
        $nick = $_POST["nick"];
        $beitrag = $_POST["beitrag"];
        if($nick=="" OR $beitrag ==""){
          echo "<script type='text/javascript'>reload();</script>";
          exit;
        };
        mysqli_query($con, "INSERT INTO daten (nick, beitrag) values ('$nick', '$beitrag')");
        mysqli_close($con);

        /*Chat-Anzeige aktualisieren */
        echo "<script type='text/javascript'>reload();</script>";

      };
     ?>

     <form name"f" action="chat_db_ein.php" method="post">
       <table>
         <tr>
           <td>Ihr Name:</td>
           <td><input name="nick"
             <?php
             if(isset($_POST["nick"])){
               echo "value='" . $_POST["nick"] . "'";
             };
              ?>
              size="20" /></td>
              <input type="submit" align="center" name="" value="Senden">
         </tr>

         <tr>
           <td valign="top">Ihr Beitrag:</td>
           <td colspan="3"><textarea cols="50" rows="2" name="beitrag"></textarea></td>
         </tr>
      </table>
    </form>
  </body>
</html>

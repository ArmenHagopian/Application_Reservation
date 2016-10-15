<html>
<head>
<title> RESERVATION</title>
<link href='Style.css' rel='stylesheet'>

</head>
<body>

<?php

  $i=0;
  echo"<h1>DETAIL DES RESERVATIONS</h1>";

  echo"<p> <form method='post' action='previous.php'>";

      while($i < $_nbr_places)
        {
          echo "<br>
          <table>
              <tr>
                  <td>Nom</td>
                  <td><input type='text' name='Name' id='Name'/><br></td>
              </tr>

              <tr>
                  <td>Age</td>
                  <td><input type='text' name='Age' id='Age'/><br></td>
              </tr>
          </table>
            ";
          $i++;
        }

          echo"<br/><br/>
          <input type='submit' value='Etape suivante'/>
          <input type='submit' value='Retour à la page précédente' name='previous'/>
          <input type='submit' value='Annuler la reservation'/>

          </form>  </p>";

?>
</body>
</html>

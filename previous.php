<?php
session_start();
?>

<html>
      <head>
          <title>Reservation</title>
          <link href='Style.css' rel='stylesheet'>
      </head>

      <body>
        <center>
          <h1>RESERVATION</h1>

          <div>Le prix de la place est de 10 euros jusqu'à douze ans et ensuite de
            15 euros.<br>Le prix de l'assurance annulation est de 20 euros quel
              que soit le nombre de voyageurs.
          </div><br>

          <form method='Post' action='Buttons.php'>
            <table>
                <tr>
                  <td>Destination</td>
                  <td><input type='text' name='destination' value='<?php echo $_SESSION['destination']?>'><br></td>
                </tr>
                <tr>
                  <td>Nombre de places</td>
                  <td><input type='text' name='nbr_places' value='<?php echo $_SESSION['nbr_places'] ?>'><br></td>
                </tr>
                <tr>
                  <td>Assurance annulation</td>
                  <td><input type='checkbox' name='insurance'/><br></td>
                  <!-- <?php
                      if ($_SESSION['insurance2'] != '')
                      {
                        echo "<td><input type='checkbox' name='insurance' checked/><br></td>";
                      }
                      else
                      {
                        echo "<td><input type='checkbox' name='insurance'/><br></td>";
                        $_SESSION['insurance2'] = '';
                      }
                  ?> -->
                </tr>
              </table>

            <div>
              <input type='submit' name='send' value='Etape suivante'/>
              <input type='submit' name='abort' value='Annuler la reservation'/>
            </div>

          </form>
        </center>
      </body>
</html>

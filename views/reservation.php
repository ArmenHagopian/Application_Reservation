<html>
      <head>
          <title>Reservation</title>
          <link href='views/static/style.css' rel='stylesheet'>
      </head>

      <body>
        <center>

          <h1>RESERVATION</h1>
          <progress id="avancement" value="0" max="100"></progress>
          <div>Le prix de la place est de 10 euros jusqu'à douze ans et ensuite de
            15 euros.<br>Le prix de l'assurance annulation est de 20 euros quel
              que soit le nombre de voyageurs.
          <br>

          <form method='Post' action='index.php'>
            <table>
                <tr>
                  <td>Destination<br>
                    <?php if (isset($reservation))
                    echo "<error>".$reservation->getDestinationError()."</error>"?>
                  </td>
                  <td><input type='text' name='destination' maxlength="40"
                    value='<?php if (isset($reservation))
                    echo $reservation->getDestination()?>'
                    placeholder='Entrer la destination'/><br></td>
                </tr>
                <tr>
                  <td>Nombre de places<br>
                    <?php if (isset($reservation))
                    echo '<error>'.$reservation->getNbr_placesError().'</error>'?>
                  </td>
                  <td><input type='text' name='nbr_places' maxlength="2"
                    value='<?php if (isset($reservation))
                    echo $reservation->getNbr_places()?>'
                    placeholder='Entrer le nombre de places'/><br>
                  </td>
                </tr>
                <tr>
                  <td>Assurance annulation</td>
                  <td><input type='checkbox' name='insurance'
                    <?php if (isset($reservation))
                          echo $reservation->getCheckbox() ?>/><br></td>
                </tr>
              </table>

            <div>
              <input type='submit' name='details' value='Etape suivante'/>
              <input type='submit' name='cancel' value='Annuler la reservation'/>
            </div>

          </form>
        </div>
        </center>
      </body>
</html>

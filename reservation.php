<html>
      <head>
          <title>Reservation</title>
          <link href='style.css' rel='stylesheet'>
      </head>

      <body>
        <center>

          <h1>RESERVATION</h1>

          <div>Le prix de la place est de 10 euros jusqu'à douze ans et ensuite de
            15 euros.<br>Le prix de l'assurance annulation est de 20 euros quel
              que soit le nombre de voyageurs.
          </div><br>

          <form method='Post' action='controller.php'>
            <table>
                <tr>
                  <td>Destination<br>
                    <?php if (isset($reservation) &&
                    $reservation->getDestinationError() == 'true')
                    echo '<error>*Veuillez entrer une destination</error>'?>
                  </td>
                  <td><input type='text' name='destination' maxlength="40"
                    value='<?php if (isset($reservation))
                    echo $reservation->getDestination()?>'
                    placeholder='Entrer la destination'/><br></td>
                </tr>
                <tr>
                  <td>Nombre de places<br>
                    <?php if (isset($reservation) &&
                    $reservation->getNbr_placesError() == 'true' &&
                    (!is_numeric($reservation->getNbr_places()) ||
                    $reservation->getNbr_places() < 1 ||
                    $reservation->getNbr_places() > 10))
                    echo '<error>*Veuillez entrer un nombre <br>
                    supérieur à 0 et inférieur à 10</error>'?>
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
        </center>
      </body>
</html>

<html>
      <head>
          <title>Reservation</title>
          <link href='Style.css' rel='stylesheet'>
      </head>

      <body>
        <center>

          <h1>VALIDATION DES RESERVATIONS</h1>

          <form method='Post' action='Buttons.php'>
            <table>
                <tr>
                  <td>Destination</td>
                  <td><?php echo $info->getDestination(); ?></td>
                </tr>
                <tr>
                  <td>Nombre de places</td>
                  <td><?php echo $info->getNbr_places(); ?></td>
                </tr>

                <?php
                for ($i = 0; $i < $info->getNbr_places(); $i++)
                {
                  echo'<tr>
                         <td>Nom</td>
                         <td>'.$info->getName()[$i].'</td>
                       </tr>
                       <tr>
                         <td>Age</td>
                         <td>'.$info->getAge()[$i].'</td>
                       </tr>';
                }
                ?>

                <tr>
                  <td>Assurance annulation</td>
                  <td>OUI</td>
                </tr>
              </table>

            <div>
              <input type='submit' name='confirm' value='Confirmer'/>
              <input type='submit' name='backtodetails' value='Retour à la page précédente'/>
              <input type='submit' name='cancel' value='Annuler la reservation'/>
            </div>

          </form>
        </center>
      </body>
</html>

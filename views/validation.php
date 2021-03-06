<html>
  <head>
    <title>Validation des reservations</title>
    <link href='views/static/style.css' rel='stylesheet'>
  </head>

  <body>
    <center>
      <div>
        <h1>Validation des reservations</h1>
        <progress id="avancement" value="66" max="100"></progress>
        <form method='Post' action='index.php'>
          <!-- Display all information about the reservation -->
          <table>
            <tr>
              <td>Destination</td>
              <td><?php echo $reservation->getDestination(); ?></td>
            </tr>
            <tr>
              <td>Nombre de places</td>
              <td><?php echo $reservation->getNbr_places(); ?></td>
            </tr>

                <?php
                  for ($i = 0; $i < $reservation->getNbr_places(); $i++)
                  {
                      echo'<tr>
                             <td>Nom</td>
                             <td>'.$reservation->getName()[$i].'</td>
                           </tr>
                           <tr>
                             <td>Age</td>
                             <td>'.$reservation->getAge()[$i].'</td>
                           </tr>';
                  }
                ?>

            <tr>
              <td>Assurance annulation</td>
              <td><?php if(isset($reservation))
                        echo $reservation->getInsurance() ?>
              </td>
            </tr>
          </table>

          <input type='submit' name='confirm' value='Confirmer'/>
          <input type='submit' name='backtodetails' value='Retour à la page précédente'/>
          <input type='submit' name='cancel' value='Annuler la reservation'/>
        </form>
      </div>
    </center>
  </body>
</html>

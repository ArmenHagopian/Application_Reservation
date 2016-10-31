<html>
  <head>
    <title> RESERVATION</title>
    <link href='style.css' rel='stylesheet'>

  </head>

  <body>
      <center><h1>DETAIL DES RESERVATIONS</h1>
        <p> <form method='post' action='controller.php'>
    <?php
          if ($reservation->getName() != [] && $reservation->getAge() != [])
          {
            for($i=0; $i < $reservation->getNbr_places(); $i++)
              {
                echo "<br>
                <table>
                    <tr>
                        <td>Nom<br>";
                //Display error if there is a '' in the list because it
                //means the input is empty
                if (isset($reservation) && $reservation->getNameError() ==
                    'true' && $reservation->getName()[$i] == '')
                {
                  echo "<error>*Veuillez entrer un nom</error>";
                }
                echo "</td>
                        <td><input type='text' name='names[]' maxlength='40'
                        value='".$reservation->getName()[$i]."'/><br></td>
                    </tr>

                    <tr>
                        <td>Age<br>";
                $age = $reservation->getAge()[$i];
                //Display error if age < 1 or if there is a '' in the
                //list because it means the input is empty
                if (isset($reservation) && (($reservation->getAgeError() ==
                    'true' && $age == '') || ($reservation->getAgeError() ==
                    'true' && (!is_numeric($age) || $age < 1))))
                {
                  echo "<error>*Veuillez entrer un âge supérieur à 0</error>";
                }
                echo "</td>
                        <td><input type='text' name='ages[]' maxlength='3'
                        value='".$age."'/><br></td>
                    </tr>
                </table>
                  ";
              }
            }
          else
          {
            for($i=0; $i < $reservation->getNbr_places(); $i++)
              {
                echo "<br>
                <table>
                    <tr>
                        <td>Nom<br>";
                //Display error if there is a '' in the list because
                //it means the input is empty
                if (isset($reservation) && $reservation->getNameError() ==
                    'true')
                {
                  echo "<error>*Veuillez entrer un nom</error>";
                }
                echo "</td>
                        <td><input type='text' name='names[]'
                                    maxlength='40'/><br></td>
                    </tr>

                    <tr>
                        <td>Age<br>";
                //Display error if there is a '' in the list because
                //it means the input is empty

                if (isset($reservation) &&
                    $reservation->getAgeError() == 'true')
                {
                  echo "<error>*Veuillez entrer un age</error>";
                }
                echo "</td>
                        <td><input type='text' name='ages[]'
                                    maxlength='3'/><br></td>
                    </tr>
                </table>
                  ";
              }
          }

        ?>
              <br/><br/>
              <input type='submit' value='Etape suivante'
                      name='validation'/>
              <input type='submit' value='Retour à la page précédente'
                      name='backtofirst'/>
              <input type='submit' value='Annuler la reservation'
                      name='cancel'/>

              </form></p></center>

  </body>
</html>

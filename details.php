<html>
  <head>
    <title> RESERVATION</title>
    <link href='Style.css' rel='stylesheet'>

  </head>

  <body>
      <center><h1>DETAIL DES RESERVATIONS</h1>
        <p> <form method='post' action='Buttons.php'>
    <?php
          if ($reservation->getName() != [] && $reservation->getAge() != [])
          {
            for($i=0; $i < $reservation->getNbr_places(); $i++)
              {
                echo "<br>
                <table>
                    <tr>
                        <td>Nom<br>";
                //Display error if there is a '' in the list because it means the input is empty
                if (isset($reservation) && $reservation->getNameError() == 'true' && $reservation->getName()[$i] == '')
                {
                  echo "<error>*Veuillez entrer un nom</error>";
                }
                echo "</td>
                        <td><input type='text' name='names[]' value='".$reservation->getName()[$i]."'/><br></td>
                    </tr>

                    <tr>
                        <td>Age<br>";
                //Display error if there is a '' in the list because it means the input is empty
                if (isset($reservation) && $reservation->getAgeError() == 'true' && $reservation->getAge()[$i] == '')
                {
                  echo "<error>*Veuillez entrer un age</error>";
                }
                echo "</td>
                        <td><input type='text' name='ages[]' value='".$reservation->getAge()[$i]."'/><br></td>
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
                //Display error if there is a '' in the list because it means the input is empty
                if (isset($reservation) && $reservation->getNameError() == 'true')
                {
                  echo "<error>*Veuillez entrer un nom</error>";
                }
                echo "</td>
                        <td><input type='text' name='names[]'/><br></td>
                    </tr>

                    <tr>
                        <td>Age<br>";
                //Display error if there is a '' in the list because it means the input is empty
                if (isset($reservation) && $reservation->getAgeError() == 'true')
                {
                  echo "<error>*Veuillez entrer un age</error>";
                }
                echo "</td>
                        <td><input type='text' name='ages[]'/><br></td>
                    </tr>
                </table>
                  ";
              }
          }

        ?>
              <br/><br/>
              <input type='submit' value='Etape suivante' name='validation'/>
              <input type='submit' value='Retour à la page précédente' name='backtofirst'/>
              <input type='submit' value='Annuler la reservation' name='cancel'/>

              </form></p></center>

    <?php
        if(isset($_insurance))
        {
          echo "Prix de l'assurance : ".$_SESSION['insurance_value'];
        }
        else
        {
          echo 'pas d\'assurance';
        }
    ?>
  </body>
</html>

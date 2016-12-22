<html>
  <head>
    <title>Detail des reservations</title>
    <link href='views/static/style.css' rel='stylesheet'>

  </head>

  <body>
    <center>
      <div>
        <h1>Detail des reservations</h1>
        <progress id="avancement" value="33" max="100"></progress>
        <form method='post' action='index.php'>
          <?php
              $nameerror = $reservation->getNameErrors();
              $ageerror = $reservation->getAgeErrors();
              // Number of inputs depends on the number of places
              // Display errors and inputs
              for($i = 0; $i < $reservation->getNbr_places(); $i++)
              {
                  echo "<br>
                  <table>
                      <tr>
                        <td>Nom<br>
                          <error>".$nameerror[$i]."</error>
                        </td>
                        <td>
                          <input type='text' name='names[]' maxlength='40'
                          value='".$reservation->getName()[$i]."'
                          placeholder = 'Entrer le nom'/><br>
                        </td>
                      </tr>

                      <tr>
                        <td>Age<br>
                          <error>".$ageerror[$i]."</error>
                        </td>
                        <td><input type='text' name='ages[]' maxlength='3'
                          value='".$reservation->getAge()[$i]."' placeholder = 'Entrer l´âge'/>
                          <br>
                        </td>
                      </tr>
                  </table>
                    ";
              }
          ?>
          <br/><br/>
          <input type='submit' value='Etape suivante'
                  name='validation'/>
          <input type='submit' value='Retour à la page précédente'
                  name='backtofirst'/>
          <input type='submit' value='Annuler la reservation'
                  name='cancel'/>

        </form>
      </div>
    </center>
  </body>
</html>

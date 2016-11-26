<html>
  <head>
    <title> RESERVATION</title>
    <link href='style.css' rel='stylesheet'>

  </head>

  <body>
      <center><h1>DETAIL DES RESERVATIONS</h1>
        <progress id="avancement" value="33" max="100"></progress>
        <div>
          <form method='post' action='index.php'>
            <?php
                  for($i=0; $i < $reservation->getNbr_places(); $i++)
                    {
                      echo "<br>
                      <table>
                          <tr>
                              <td>Nom<br>
                              <error>".$reservation->getNameErrorsList()[$i]."</error>
                              </td>
                              <td><input type='text' name='names[]' maxlength='40'
                              value='".$reservation->getName()[$i]."'
                              placeholder = 'Entrer le nom'/><br></td>
                          </tr>

                          <tr>
                              <td>Age<br>
                              <error>".$reservation->getAgeErrorsList()[$i]."</error>
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

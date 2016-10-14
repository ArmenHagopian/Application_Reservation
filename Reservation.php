<html>
      <head>
          <title>Reservation</title>
          <link href="Style.css" rel="stylesheet">
      </head>

      <body>

          <h1>RESERVATION</h1>

          <div>Le prix de la place est de 10 euros jusqu'à douze ans et ensuite de
            15 euros.<br>Le prix de l'assurance annulation est de 20 euros quel
              que soit le nombre de voyageurs.
          </div><br>

          <form method="Post">
            <table>
                <tr>
                  <td>Destination</td>
                  <td><input type="test" name="reponses[]" /><br></td>
                </tr>
                <tr>
                  <td>Nombre de places</td>
                  <td><input type="test" name="reponses[]" /><br></td>
                </tr>
                <tr>
                  <td>Assurance annulation</td>
                  <td><input type="checkbox" name="reponses[]" /><br></td>
                </tr>
              </table>

            <input type="submit" name="Envoyer" value="Etape suivante" onClick="Button1.php"/>
            <input type="submit" name="Annuler la reservation" value="Annuler la reservation"/>

        </form>

        <form method="Post">
          <table>
              <tr>
                <td>Destination</td>
                <td><input type="test" name="rep[]" /><br></td>
              </tr>
              <tr>
                <td>Nombre de places</td>
                <td><input type="test" name="rep[]" /><br></td>
              </tr>
              <tr>
                <td>Assurance annulation</td>
                <td><input type="checkbox" name="rep[]" /><br></td>
              </tr>
            </table>

          <input type="submit" name="Envoyer" value="Etape suivante" onClick="Button1.php"/>
          <input type="submit" name="Annuler la reservation" value="Annuler la reservation"/>

      </form>

         <?php

           $listeReponses = $_POST['reponses'];
           foreach ($listeReponses as $reponse)
           {
               echo $reponse . '<br>';
           }
           echo "La seconde reponse : ".$_POST['reponses'][1];


         ?>


      </body>
</html>

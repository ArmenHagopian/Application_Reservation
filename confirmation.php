<html>
      <head>
          <title>Reservation</title>
          <link href='style.css' rel='stylesheet'>
      </head>

      <body>
        <center>

          <h1>CONFIRMATION DES RESERVATIONS</h1>
          <progress id="avancement" value="100" max="100"></progress>

          <div>

            Votre demande a bien été enregistrée.<br>Merci de bien
            vouloir verser la somme de <?php if (isset($reservation))
            echo $reservation->getPrice() ?> euros sur le compte 000-000000-00
            <br>

            <form method='Post' action='controller.php'>
              <input type='submit' name='cancel' value="Retour à la page d'accueil"/>
            </form>
          </div>
        </center>
      </body>
</html>

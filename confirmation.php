<html>
      <head>
          <title>Reservation</title>
          <link href='Style.css' rel='stylesheet'>
      </head>

      <body>
        <center>

          <h1>CONFIRMATION DES RESERVATIONS</h1>

          <div>Votre demande a bien été enregistrée.<br>Merci de bien vouloir verser la somme de <?php echo $reservation->getNbr_places()*100 ?> euros sur le compte 000-000000-00
          </div><br>

          <form method='Post' action='Buttons.php'>
            <div>
              <input type='submit' name='cancel' value="Retour à la page d'accueil"/>
            </div>
          </form>

        </center>
      </body>
</html>

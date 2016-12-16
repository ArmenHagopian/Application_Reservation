<?php
include_once 'models/model.php';

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (isset($_SESSION['Reservation']))
{
    $reservation = unserialize($_SESSION['Reservation']);
}

else
{
    $reservation = new Reservation();
}

if(isset($_POST['nbr_places']) && $_POST['nbr_places']!='' && isset($_POST["destination"]) && $_POST["destination"]!='' && isset($_POST['details']))
{
    //Verify if user has checked the checkbox
    if (isset($_POST['insurance']))
    {
         $reservation->setCheckbox('checked');
    }
    else
    {
         $reservation->setCheckbox('');
    }
    $reservation->setDestination($_POST['destination']);
    $reservation->setNbr_places($_POST['nbr_places']);
    // The number of places is valid
    if (is_numeric($reservation->getNbr_places()) && $reservation->getNbr_places() > 0 && $reservation->getNbr_places() < 10)
    {
         $reservation->setComeback('true');
         include 'views/details.php';
    }
    else
    {
         $reservation->setComeback('false');
         include 'views/reservation.php';
    }
}

// Both inputs (nbr_places and destination) are empty when he clicks on next
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']))
{
    //Verify if user has checked the checkbox
    if (isset($_POST['insurance']))
    {
         $reservation->setCheckbox('checked');
    }
    else
    {
         $reservation->setCheckbox('');
    }
    $reservation->setDestination('');
    $reservation->setNbr_places('');
    $reservation->setComeback('false');
    include 'views/reservation.php';
}

// Destination input is empty and the user wants to go forward
elseif(isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']) && $_POST['details']!='')
{
    //Verify if user has checked the checkbox
    if (isset($_POST['insurance']))
    {
         $reservation->setCheckbox('checked');
    }
    else
    {
         $reservation->setCheckbox('');
    }
    $reservation->setDestination($_POST['destination']);
    $reservation->setNbr_places($_POST['nbr_places']);
    $reservation->setComeback('false');
    include 'views/reservation.php';
}

// nbr_places input is empty and the user wants to go forward
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST['details']) && $_POST['details']!='')
{
    //Verify if user has checked the checkbox
    if (isset($_POST['insurance']))
    {
         $reservation->setCheckbox('checked');
    }
    else
    {
         $reservation->setCheckbox('');
    }
    $reservation->setNbr_places($_POST['nbr_places']);
    $reservation->setDestination($_POST['destination']);
    $reservation->setComeback('false');
    include 'views/reservation.php';
}

// The user cancels the reservation
elseif(isset($_POST['cancel']))
{
    session_destroy();
    unset($reservation);
    include 'views/reservation.php';
}

// The user comes back to the first page (reservation.php) from details.php page
elseif(isset($_POST['backtofirst']))
{
    $reservation->setName($_POST['names']);
    $reservation->setAge($_POST['ages']);
    include 'views/reservation.php';
}

// The user clicks the 'Etape suivante' button to go to validation.php page
elseif(isset($_POST['names']) && empty($_POST['cancel']) && isset($_POST['validation']))
{
    $reservation->setName($_POST['names']);
    $reservation->setAge($_POST['ages']);
    $empty_inputs = 0;
    //If there is an empty input, stay in same page and go to next page if not
    foreach ($reservation->getName() as $input)
    {
         if ($input == '')
         {
              $empty_inputs += 1;
         }
    }
    foreach ($reservation->getAge() as $input)
    {
         if ($input == '' || !is_numeric($input) || $input < 1)
         {
              $empty_inputs += 1;
         }
    }
    if ($empty_inputs == 0)
    {
         include 'views/validation.php';
    }

    else
    {
        $reservation->setComeback('false');
        include 'views/details.php';
    }
}

// Inputs are not empty and user wants to go to validation.php page
elseif(isset($_POST['names']) && $_POST['names']!=[] && isset($_POST["ages"]) && $_POST["ages"]!=[] && empty($_POST['cancel']) && isset($_POST['validation']))
{
    $reservation->setAge($_POST['ages']);
    $reservation->setName($_POST['names']);
    include 'views/validation.php';
}

// The user confirms his reseravation
elseif(empty($_POST['cancel']) && isset($_POST['confirm']))
{
    include_once 'models/model_db.php';

    // Save the reservation in a database
    if(!isset($db))
    {
         $db = new Database();
         $hostname = 'localhost';
         $database = 'testReservation';
         $username = 'root';
         $password = '';
         $db->connect($hostname, $database, $username, $password);
         $table = 'reserva';
         $db->table($table);
    }

    $db->updateOrAdd($reservation);
    include 'views/confirmation.php';
    session_destroy();
    unset($reservation);
}

// The user comes back to the details.php page
elseif(isset($_POST['backtodetails']))
{
    include 'views/details.php';
}

// The user ends his reseravation
elseif(isset($_POST['end']))
{
    session_destroy();
    unset($reservation);
    include 'views/reservation.php';
}

// Manager wants to modify a reservation
elseif (isset($_SESSION['Modification']))
{
      $modification = unserialize($_SESSION['Modification']);
      unset($modification);
      unset($_SESSION['Modification']);
      $reservation->setComeback('true');
      include 'views/reservation.php';
}

else
{
    session_destroy();
    unset($reservation);
    include 'views/reservation.php';
}

if (isset($reservation))
{
    $_SESSION['Reservation'] = serialize($reservation);
}
?>

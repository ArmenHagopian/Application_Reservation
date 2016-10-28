<?php
session_start();
include 'classe.php';

if (isset($_SESSION['Reservation']))
{
  $reservation = unserialize($_SESSION['Reservation']);
}

else
{
  $reservation = new Reservation();
}

if($reservation->getAge()!=[] && $reservation->getName()!=[] && isset($_POST['nbr_places']) && $_POST['nbr_places']!='' && isset($_POST["destination"]) && $_POST["destination"]!='' && empty($_POST['cancel']) && isset($_POST['details']))
{
  include 'details.php';
}

elseif(isset($_POST['nbr_places']) && $_POST['nbr_places']!='' && isset($_POST["destination"]) && $_POST["destination"]!='' && empty($_POST['cancel']) && isset($_POST['details']))
{
  $reservation->setDestination($_POST['destination']);
  $reservation->setNbr_places($_POST['nbr_places']);
  include 'details.php';
}

//Check if the user has written something in inputs of nbr_places and destination when he clicks on next
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']))
{
  // $destinationerror = 'true';
  $reservation->setDestination('');
  $reservation->setNbr_places('');
  $reservation->setDestinationError('true');
  $reservation->setNbr_placesError('true');
  include 'Reservation.php';
}

//Check if the user has written something in input of destination when he clicks on next
elseif(isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']) && $_POST['details']!='')
{
  // $destinationerror = 'true';
  $reservation->setDestination('');
  $reservation->setNbr_places($_POST['nbr_places']);
  $reservation->setNbr_placesError('false');
  $reservation->setDestinationError('true');
  include 'Reservation.php';
}

//Check if the user has written something in input of nbr_places when he clicks on next
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST['details']) && $_POST['details']!='')
{
  // $destinationerror = 'true';
  $reservation->setNbr_places('');
  $reservation->setDestination($_POST['destination']);
  $reservation->setDestinationError('false');
  $reservation->setNbr_placesError('true');
  include 'Reservation.php';
}

elseif(isset($_POST['cancel']))
{
  session_destroy();
  unset($reservation);
  // $reservation->setNbr_places('');
  // $reservation->setDestination('');
  // $reservation->setAge([]);
  // $reservation->setName([]);
  // $reservation->setDestinationError('false');
  include 'Reservation.php';
}

elseif(isset($_POST['backtofirst']))
{
  $reservation->setDestinationError('false');
  $reservation->setNbr_placesError('false');
  include 'Reservation.php';
}

elseif(isset($_POST['names']) && $_POST['names']!='' && isset($_POST["ages"]) && $_POST["ages"]!='' && empty($_POST['cancel']) && isset($_POST['validation']))
{
  $reservation->setAge($_POST['ages']);
  $reservation->setName($_POST['names']);
  include 'validation.php';
}

elseif(empty($_POST['cancel']) && isset($_POST['confirm']))
{
  include 'confirmation.php';
}

elseif(isset($_POST['backtodetails']))
{
  include 'details.php';
}

else
{
  var_dump($reservation);
  session_destroy();
  include 'Reservation.php';
}
if (isset($reservation))
{
  $_SESSION['Reservation'] = serialize($reservation);
}
?>

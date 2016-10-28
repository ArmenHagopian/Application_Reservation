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

elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']))
{
  $destinationerror = 'true';
  $placeserror = 'true';
  include 'Reservation.php';
}

elseif(isset($_POST['cancel']))
{
  $reservation->setNbr_places('');
  $reservation->setDestination('');
  $reservation->setAge([]);
  $reservation->setName([]);
  include 'Reservation.php';
}

elseif(isset($_POST['backtofirst']))
{
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
  session_destroy();

  include 'Reservation.php';
}

$_SESSION['Reservation'] = serialize($reservation);
?>

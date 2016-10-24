<?php
session_start();
include 'classe.php';

if (isset($info))
{
  $info;
}

else
{
  $info = new Reservation();
  $_SESSION['Reservation'] = $info;

}
if(isset($_SESSION['ages']) && isset($_SESSION['names']) && isset($_POST['nbr_places']) && $_POST['nbr_places']!='' && isset($_POST["destination"]) && $_POST["destination"]!='' && empty($_POST['cancel']) && isset($_POST['details']))
{
  $info->setDestination($_POST['destination']);
  $info->setNbr_places($_POST['nbr_places']);
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  $_SESSION['nbr_places'] = $nbr_places;
  $_SESSION['destination'] = $destination;
  $names = $_SESSION['names'];
  $ages = $_SESSION['ages'];
  include 'details.php';
}
elseif(isset($_POST['nbr_places']) && $_POST['nbr_places']!='' && isset($_POST["destination"]) && $_POST["destination"]!='' && empty($_POST['cancel']) && isset($_POST['details']))
{
  $info->setDestination($_POST['destination']);
  $info->setNbr_places($_POST['nbr_places']);
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  $_SESSION['nbr_places'] = $nbr_places;
  $_SESSION['destination'] = $destination;
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
  $nbr_places = '';
  $destination = '';
  $ages = '';
  $names = '';
  include 'Reservation.php';
}

elseif(isset($_POST['backtofirst']))
{

  $nbr_places = $_SESSION['nbr_places'];
  $destination = $_SESSION['destination'];
  include 'Reservation.php';
}

elseif(isset($_POST['names']) && $_POST['names']!='' && isset($_POST["ages"]) && $_POST["ages"]!='' && empty($_POST['cancel']) && isset($_POST['validation']))
{
  $nbr_places = $_SESSION['nbr_places'];
  $destination = $_SESSION['destination'];
  $info->setAge($_POST['ages']);
  $info->setName($_POST['names']);
  $names = $info->getName();
  $ages = $info->getAge();
  $_SESSION['names'] = $names;
  $_SESSION['ages'] = $ages;
  include 'validation.php';
}

elseif(empty($_POST['cancel']) && isset($_POST['confirm']))
{
  $nbr_places = $_SESSION['nbr_places'];
  $destination = $_SESSION['destination'];
  $names = $_SESSION['names'];
  $ages = $_SESSION['ages'];
  include 'confirmation.php';
}

elseif(isset($_POST['backtodetails']))
{
  $nbr_places = $_SESSION['nbr_places'];
  $destination = $_SESSION['destination'];
  $names = $_SESSION['names'];
  $ages = $_SESSION['ages'];
  include 'details.php';
}

else
{
  session_destroy();

  include 'Reservation.php';
}
?>

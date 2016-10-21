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

if(isset($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST['abort']))
{
  $info->setDestination($_POST['destination']);
  $info->setNbr_places($_POST['nbr_places']);
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  $_SESSION['nbr_places'] = $nbr_places;
  $_SESSION['destination'] = $destination;
  include 'details.php';
}

elseif(isset($_POST['abort']))
{
  $nbr_places = '';
  $destination = '';
  include 'Reservation.php';
}

elseif(isset($_POST['previous']))
{

  $nbr_places = $_SESSION['nbr_places'];
  $destination = $_SESSION['destination'];
  include 'Reservation.php';
}

else
{
  include 'Reservation.php';
}

?>

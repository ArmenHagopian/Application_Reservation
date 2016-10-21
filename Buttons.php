<?php
session_start();
include 'classe.php';
$info = new Reservation();
// if($_POST['nbr_places']!= "" && $_POST["destination"]!= "" && empty($_POST['abort']) && !isset($_POST['insurance']) && !isset($info))

if(isset($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST['abort']) && !isset($_POST['insurance']) && !isset($info))
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
  // $_SESSION['destination'] = $_destination;
  // $_SESSION['nbr_places'] = $_nbr_places;
  // $_SESSION['insurance'] = '';
  $info = new Reservation($_destination, $_nbr_places);
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  include 'details.php';
}
// elseif($_POST['nbr_places']!= "" && $_POST["destination"]!= "" && empty($_POST['abort']) && !isset($_POST['insurance']) && isset($info))

elseif(isset($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST['abort']) && !isset($_POST['insurance']) && isset($info))
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
  // $_SESSION['destination'] = $_destination;
  // $_SESSION['nbr_places'] = $_nbr_places;
  // $_SESSION['insurance'] = '';
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  include 'details.php';
}
// elseif($_POST['nbr_places']!= "" && $_POST["destination"]!= "" && empty($_POST['abort']) && isset($_POST['insurance']))
// {
//   $_destination = $_POST["destination"];
//   $_nbr_places = $_POST["nbr_places"];
//   $_insurance = 20;
//   // $_SESSION['destination'] = $_destination;
//   // $_SESSION['nbr_places'] = $_nbr_places;
//   // $_SESSION['insurance_value'] = $_insurance;
//   $_value = 'checked';
//   $_SESSION['insurance2'] = $_value;
//   $info = new Reservation($_destination, $_nbr_places);
//   $nbr_places = $info->getNbr_places();
//   $destination = $info->getDestination();
//   include 'details.php';}

elseif(isset($_POST['abort']))
{
  $_SESSION['destination'] = ' ';
  $_SESSION['nbr_places'] = ' ';
  $_SESSION['insurance'] = ' ';
  include 'Reservation.php';
}
elseif(isset($_POST['previous']) && isset($info))
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  include 'Reservation.php';
}
elseif(isset($_POST['previous']) && !isset($info))
{
  $info->setDestination($_POST["destination"]);
  $info->setNbr_places($_POST["nbr_places"]);
  $nbr_places = $info->getNbr_places();
  $destination = $info->getDestination();
  include 'Reservation.php';
}
else
{
  include 'Reservation.php';
}

?>

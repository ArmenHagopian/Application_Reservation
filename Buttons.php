<?php
session_start();
if($_POST['nbr_places']!= "" && $_POST["destination"]!= "" && empty($_POST['abort']) && !isset($_POST['insurance']))
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
  $_SESSION['destination'] = $_destination;
  $_SESSION['nbr_places'] = $_nbr_places;
  $_SESSION['insurance'] = '';
  include 'details.php';
}
elseif($_POST['nbr_places']!= "" && $_POST["destination"]!= "" && empty($_POST['abort']) && isset($_POST['insurance']))
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
  $_insurance = 20;
  $_SESSION['destination'] = $_destination;
  $_SESSION['nbr_places'] = $_nbr_places;
  $_SESSION['insurance_value'] = $_insurance;
  $_value = 'checked';
  $_SESSION['insurance2'] = $_value;
  include 'details.php';
}

elseif(isset($_POST['abort']))
{

  include 'Reservation.php';
}
elseif(isset($_POST['previous']))
{
  include 'previous.php';
}
else
{
  include 'Reservation.php';
}

?>

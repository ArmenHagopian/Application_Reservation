<?php

session_start();
if($_POST['nbr_places']!= "" && $_POST["destination"]!= "" && empty($_POST['abort']))
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
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

<?php

include "Reservation.php";
if($_POST['nbr_places']!= "" && $_POST["destination"]!= "")
{
  $_destination = $_POST["destination"];
  $_nbr_places = $_POST["nbr_places"];
  include("details.php");
}

else
{
  $_destination = "rien";
  $_nbr_places = 1;
  include("details.php");
}
?>

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
  $reservation->setDestination('');
  $reservation->setNbr_places('');
  $reservation->setDestinationError('true');
  $reservation->setNbr_placesError('true');
  include 'Reservation.php';
}

//Check if the user has written something in input of destination when he clicks on next
elseif(isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']) && $_POST['details']!='')
{
  $reservation->setDestination('');
  $reservation->setNbr_places($_POST['nbr_places']);
  $reservation->setNbr_placesError('false');
  $reservation->setDestinationError('true');
  include 'Reservation.php';
}

//Check if the user has written something in input of nbr_places when he clicks on next
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST['details']) && $_POST['details']!='')
{
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
  include 'Reservation.php';
}

elseif(isset($_POST['backtofirst']))
{
  $reservation->setName($_POST['names']);
  $reservation->setAge($_POST['ages']);
  $reservation->setAgeError('false');
  $reservation->setNameError('false');
  $reservation->setDestinationError('false');
  $reservation->setNbr_placesError('false');
  include 'Reservation.php';
}

elseif(isset($_POST['names']) && empty($_POST['cancel']) && isset($_POST['validation']))
{
  $reservation->setName($_POST['names']);
  $reservation->setAge($_POST['ages']);
  // $list2 = [];
  // $list = $reservation->getName();
  // //Check and remove if there is a '' in the list because it means the input is empty
  // for($i = 0; $i < count($reservation->getName()); $i++)
  // {
  //   if ($reservation->getName()[$i] == '')
  //   {
  //     $list[$i] = '';
  //     $list2 = $list;
  //     // print_r($list2);
  //   }
  // }
  // $reservation->setName($list2);
  // print_r($reservation->getName());
  // echo "<br>".count($reservation->getName());
  // echo "<br>".$reservation->getNbr_places();
  // if(count($reservation->getName()) < $reservation->getNbr_places())
  // {
  $empty_inputs = 0;
  //If there is an empty input, stay in same page and go to next page
  //if not
  foreach ($reservation->getName() as $input)
  {
    if ($input == '')
    {
      $empty_inputs += 1;
    }
  }
  foreach ($reservation->getAge() as $input)
  {
    if ($input == '')
    {
      $empty_inputs += 1;
    }
  }

  if ($empty_inputs == 0)
  {
    include 'validation.php';
  }

  else
  {
    $reservation->setAgeError('true');
    // echo $reservation->getAgeError();
    $reservation->setNameError('true');
    include 'details.php';
  }
}
elseif(isset($_POST['names']) && $_POST['names']!=[] && isset($_POST["ages"]) && $_POST["ages"]!=[] && empty($_POST['cancel']) && isset($_POST['validation']))
{
  $reservation->setAge($_POST['ages']);
  $reservation->setName($_POST['names']);
  $reservation->setNameError('true');

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
  unset($reservation);
  include 'Reservation.php';
}

if (isset($reservation))
{
  $_SESSION['Reservation'] = serialize($reservation);
}
?>

<?php
// session_start();
include_once 'model.php';
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
  echo('test');
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
  if (is_numeric($reservation->getNbr_places()) && $reservation->getNbr_places() > 0 && $reservation->getNbr_places() < 10)
  {
    // $reservation->setDestination($_POST['destination']);
    // $reservation->setNbr_places($_POST['nbr_places']);
    // $reservation->setNameErrorsList([]);
    $reservation->setComeback('true');
    include 'details.php';
  }
  else
  {
    // $reservation->setDestinationError('false');
    // $reservation->setNbr_placesError('true');
    include 'reservation.php';
  }
}

//Check if the user has written something in inputs of nbr_places and destination when he clicks on next
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']))
{
  echo('test1');

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
  // $reservation->setDestinationError('true');
  // $reservation->setNbr_placesError('true');
  include 'reservation.php';
}

//Check if the user has written something in input of destination when he clicks on next
elseif(isset($_POST["destination"]) && empty($_POST["destination"]) && isset($_POST['details']) && $_POST['details']!='')
{
  echo('test2');

  //Verify if user has checked the checkbox
  if (isset($_POST['insurance']))
  {
    $reservation->setCheckbox('checked');
  }
  else
  {
    $reservation->setCheckbox('');
  }
  // if (is_numeric($reservation->getNbr_places()) && $reservation->getNbr_places() > 0 && $reservation->getNbr_places() < 10)
  // {
  //   $reservation->setDestination('');
  //   $reservation->setNbr_places($_POST['nbr_places']);
  //   $reservation->setNbr_placesError('false');
  //   $reservation->setDestinationError('true');
  // }
  // else
  // {
  //   $reservation->setDestinationError('true');
  //   $reservation->setNbr_placesError('true');
    $reservation->setDestination($_POST['destination']);
    $reservation->setNbr_places($_POST['nbr_places']);
  // }
  include 'reservation.php';
}

//Check if the user has written something in input of nbr_places when he clicks on next
elseif(isset($_POST['nbr_places']) && empty($_POST['nbr_places']) && isset($_POST['details']) && $_POST['details']!='')
{
  //Verify if user has checked the checkbox
  echo "test3";
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
  // $reservation->setDestinationError('false');
  // $reservation->setNbr_placesError('true');
  include 'reservation.php';
}

elseif(isset($_POST['cancel']))
{
  session_destroy();
  unset($reservation);
  include 'reservation.php';
}

elseif(isset($_POST['backtofirst']))
{
  $reservation->setName($_POST['names']);
  $reservation->setAge($_POST['ages']);
  // $reservation->setAgeError('false');
  // $reservation->setNameError('false');
  // $reservation->setDestinationError('false');
  // $reservation->setNbr_placesError('false');
  include 'reservation.php';
}

elseif(isset($_POST['names']) && empty($_POST['cancel']) && isset($_POST['validation']))
{
  $reservation->setName($_POST['names']);
  $reservation->setAge($_POST['ages']);
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
    if ($input == '' || !is_numeric($input) || $input < 1)
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
    // $reservation->setAgeError('true');
    // $reservation->setNameError('true');
    $reservation->setComeback('false');
    include 'details.php';
  }
}
elseif(isset($_POST['names']) && $_POST['names']!=[] && isset($_POST["ages"]) && $_POST["ages"]!=[] && empty($_POST['cancel']) && isset($_POST['validation']))
{
  $reservation->setAge($_POST['ages']);
  $reservation->setName($_POST['names']);
  // $reservation->setNameError('true');

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
elseif(isset($_POST['end']))
{
  // include 'controller_db';
  include_once 'model_db.php';
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
  session_destroy();
  unset($reservation);
  include 'reservation.php';
}
// Manager wants to modify a reservation
elseif (isset($_SESSION['Modification']))
{

      $modification = unserialize($_SESSION['Modification']);
      unset($modification);
      unset($_SESSION['Modification']);
      include 'reservation.php';
}
else
{
  echo "testtest";
  session_destroy();
  unset($reservation);
  include 'reservation.php';
}

if (isset($reservation))
{
  $_SESSION['Reservation'] = serialize($reservation);
}
?>
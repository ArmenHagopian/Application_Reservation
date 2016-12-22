<?php

include_once 'models/model.php';
include_once 'models/model_db.php';
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$db = new Database();

$hostname = 'localhost';
$database = 'testReservation';
$username = 'root';
$password = '';

// Create new database or connect to an existing one
$db->connect($hostname, $database, $username, $password);
$table = 'reserva';

// Create new table or use an existing one
$db->table($table);

$found_button = 'false';

if (!empty($_POST['AddReservation']))
{
    $found_button == 'true';
    // Open a new form
    header('location:index.php');
}

$nbr_rows = $db->nbrRows();

// Check if user has selected a Modification or a Delete button and which Id
// it's linked to
for ($id = 1; $id <= $nbr_rows; $id++)
{
    $modif = "Modify_".$id;
    $delete = "Delete_".$id;

    if(isset($_POST[$modif]))
    {
         $found_button = 'true';
         $reservation = new Reservation();
         $result = $db->selectAll();
         foreach  ($result as $row)
         {
              if ($row["Id"] == $id)
              {
                   $reservation->setDestination($row["Destination"]);
                   $reservation->setNbr_places($row["Places"]);
                   if ($row["Assurance"] == "OUI")
                   {
                        $reservation->setCheckbox("checked");
                   }
                   else
                   {
                        $reservation->setCheckbox("");
                   }

                   $reservation->setName(explode(",", $row["Noms"]));
                   $reservation->setAge(explode(",", $row["Ages"]));
                   $reservation->setId($row["Id"]);
              }
          }
          $_SESSION['Reservation'] = serialize($reservation);
          $modification = "true";
          // Allows the other controller to know that we want a form with filled $reservation
          $_SESSION['Modification'] = serialize($modification);
          include 'controllers/controller.php';
    }
    elseif (isset($_POST[$delete]))
    {
         $found_button = 'true';
         $id_to_delete = $id;
         $db->delete_reservation($id_to_delete);
         include "views/manager.php";
    }
}

if ($found_button == 'false')
{
    include "views/manager.php";
}

?>

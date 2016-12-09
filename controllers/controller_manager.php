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
$db->connect($hostname, $database, $username, $password);
$table = 'reserva';
$db->table($table);

$found_button = 'false';
$nbr_rows = $db->nbrRows();
echo $nbr_rows;
for ($i = 1; $i <= $nbr_rows; $i++)
{
    $modif = "Modify_".$i;
    $delete = "Delete_".$i;

    if(isset($_POST[$modif]))
    {
        $found_button = 'true';
        $reservation = new Reservation();
        $result = $db->selectAll();
        foreach  ($result as $row)
        {
          if ($row["Id"] == $i)
          {
              $reservation->setDestination($row["Destination"]);
              $reservation->setNbr_places($row["Places"]);
              if ($row["Assurance"] == "OUI") {
                $reservation->setCheckbox("checked");
              }
              else
              {
                $reservation->setCheckbox("");
              }

              $reservation->setName(explode(",", $row["Noms"]));
              $reservation->setAge(explode(",", $row["Ages"]));
              $reservation->setId($row["Id"]);
              $reservation->setComeback('false');
          }
        }
        $_SESSION['Reservation'] = serialize($reservation);
        $a = "true";
        $_SESSION['Modification'] = serialize($a);
        include 'controllers/controller.php';
    }
    elseif (isset($_POST[$delete]))
    {
        $found_button = 'true';
        $id_to_delete = $i;
        $db->delete_reservation($id_to_delete);
        include "views/manager.php";
    }
}

if ($found_button == 'false')
{
    include "views/manager.php";
}

?>

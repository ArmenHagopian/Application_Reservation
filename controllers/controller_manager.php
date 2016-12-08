<?php
include_once 'model.php';
include 'model_db.php';
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
// if (isset($_SESSION['Database']))
// {
//   $db = $_SESSION['Database'];
// }

$db = new Database();


$hostname = 'localhost';
$database = 'testReservation';
$username = 'root';
$password = '';
$db->connect($hostname, $database, $username, $password);
$table = 'reserva';
$db->table($table);


// try
// {
// $db = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
// $table = 'reserva';
// $result = $db->query('SELECT * FROM reserva');
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql = "DELETE FROM 'reserva' WHERE 'id' = :id_to_delete";
// $query = $db->prepare( $sql );


// !!!!!!!! aller chercher $nbr_rows dans le model !!!!!!!!!!!!
$found_button = 'false';
$nbr_rows = 10;
for ($i = 1; $i <= 30; $i++)
{
    $modif = "Modify_".$i;
    $delete = "Delete_".$i;

    if(isset($_POST[$modif]))
    {
      $found_button = 'true';
      // unset($_SESSION['Reservation']);
// var_dump($reservation);

        $reservation = new Reservation();
// $_SESSION['Reservation'] = $reservation;
        // $sql = "SELECT Id, Destination, Places, Assurance, Noms, Ages, Prix FROM reserva";
        $result = $db->selectAll();
        foreach  ($result as $row)
        {
          if ($row["Id"] == $i)
          {
              $reservation->setDestination($row["Destination"]);
              // echo var_dump($reservation->getDestination())."<br>";
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
          }
        }
        $_SESSION['Reservation'] = serialize($reservation);
        $a = "true";
$_SESSION['Modification'] = serialize($a);
        // echo var_dump($reservation->getDestination());
        include 'index.php';
    }
    elseif (isset($_POST[$delete]))
    {
        $found_button = 'true';
        $id_to_delete = $i;
        $db->delete_reservation($id_to_delete);
        include "manager.php";
    }
}

if ($found_button == 'false')
{
    include "manager.php";
}
// }
// catch(PDOException $e)
// {
//   echo $e->getMessage();//Remove or change message in production code
// }

// if (isset($db))
// {
//   $_SESSION['Database'] = $db;
// }
?>

<?php
// session_start();
// include 'model_db.php';
include 'model.php';

$hostname = 'localhost';
$database = 'testReservation';
$username = 'root';
$password = '';
try
{
$db = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
$table = 'reserva';
$result = $db->query('SELECT * FROM reserva');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $sql = "DELETE FROM 'reserva' WHERE 'id' = :id_to_delete";
// $query = $db->prepare( $sql );


// !!!!!!!! aller chercher $nbr_rows dans le model !!!!!!!!!!!!
$nbr_rows = 10;
for ($i = 1; $i <= 10; $i++)
{
    $modif = "Modify_".$i;
    $delete = "Delete_".$i;

    if(isset($_POST[$modif]))
    {
      // unset($_SESSION['Reservation']);
// var_dump($reservation);

        $reservation = new Reservation();
$_SESSION['Reservation'] = $reservation;
        $sql = "SELECT Destination, Places, Assurance, Noms, Ages, Prix FROM reserva";
        $result = $db->query($sql);
        foreach  ($result as $row)
        {
          $reservation->setDestination($row["Destination"]);
          $reservation->setNbr_places($row["Places"]);
          if ($row["Assurance"] == "OUI") {
            $reservation->setCheckbox("checked");
          }
          else {
            $reservation->setCheckbox("");
          }

          $reservation->setName(explode(",", $row["Noms"]));
          $reservation->setAge(explode(",", $row["Ages"]));

        }
        include 'index.php';
    }
    elseif (isset($_POST[$delete]))
    {
        $id_to_delete = $i;
        $sql = "DELETE FROM reserva WHERE Id=$i";
        $db->query($sql);
        include "testBD.php";
    }

}
}
catch(PDOException $e)
{
  echo $e->getMessage();//Remove or change message in production code
}
?>

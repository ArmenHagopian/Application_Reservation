<?php
// try {
//     $db = new PDO("mysql:dbname=mydb;host=localhost", "root", "" );
// } catch(PDOException $e) {
//     echo $e->getMessage();
// }
//
// $table= "tcompany";
// $columns = "ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY, Prename VARCHAR( 50 ) NOT NULL, Name VARCHAR( 250 ) NOT NULL,
//  StreetA VARCHAR( 150 ) NOT NULL, StreetB VARCHAR( 150 ) NOT NULL, StreetC VARCHAR( 150 ) NOT NULL,
//  County VARCHAR( 100 ) NOT NULL, Postcode VARCHAR( 50 ) NOT NULL, Country VARCHAR( 50 ) NOT NULL " ;
//
//
// $createTable = $db->exec("CREATE TABLE IF NOT EXISTS mydb.$table ($columns)");
//
// if ($createTable)
// {
//     echo "Table $table - Created!<br /><br />";
// }
// else
// {
//   echo "Table $table not successfully created! <br /><br />";
// }
$hostname = 'localhost';
$database = 'testReservation';
$username = 'root';
$password = '';
try
{
    $db = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
    $table = 'reserva';
    $db->exec("CREATE TABLE IF NOT EXISTS $table(
        Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        Destination varchar(40) NOT NULL,
        Places int(2) NOT NULL,
        Assurance varchar(10)  NOT NULL,
        Noms varchar(400) NOT NULL,
        Ages varchar(50) NOT NULL,
        Prix int(11) NOT NULL
      )");
        print("Created $table Table.\n");

    $req = $db->prepare('INSERT INTO reserva (Id, Noms, Destination, Ages, Places, Prix, Assurance) VALUES (NULL, :names, :destination, :ages, :places, :prix, :assurance)');
    if (isset($reservation))
    {
        $req->execute(array(
          'names' =>implode( ",",$reservation->getName()),
          'destination' =>$reservation->getDestination(),
          'ages' => implode( ",",$reservation->getAge()),
          'places' => $reservation->getNbr_places(),
          'prix' =>$reservation->getPrice(),
          'assurance' => $reservation->getInsurance()
        ));
    }
}
catch(PDOException $e)
{
  echo $e->getMessage();//Remove or change message in production code
}

$sql =  'SELECT * FROM reserva';
        // print $row['names'] . "\t";
        // print  $row['id'] . "\t";
        // print $row['destination'] . "<br>";
        // echo "<head><link href='style.css' rel='stylesheet'></head><div>
        // <table>
        //   <tr>
        //     <td>".print $row['names']."
        //     </td>
        //   </tr>
        //   <tr>
        //     <td>".print  $row['id']."
        //
        //     </td>
        //
        //   </tr></table>";
          echo "<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 60%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<center>
<div>
          <form method='Post' action='controller_manager.php'>
<table>
  <tr>";
  $result = $db->query('SELECT * FROM reserva');
  $fields = array_keys($result->fetch(PDO::FETCH_ASSOC));
  foreach ($fields as $column)
  {
    echo "<th>".$column."</th>";
  }
  echo
  "
  <th></th>
  <th></th>
  ";
  $nbr_rows = 0;
  foreach  ($result as $row) {
    $nbr_rows += 1;
    echo "<tr>";
  foreach ($fields as $column) {

    echo"
    <td>".$row[$column]."</td>";}
    echo
    "
    <td><input type='submit' name='Modify_".$row['Id']."' value='Modifier'/></td>
    <td><input type='submit' name='Delete_".$row['Id']."' value='Supprimer'/></td></tr>";
}

  echo "

</table>
</form>
</div>
</center>
</body>
</html>";

$result = $db->query('select * from reserv');
$fields = array_keys($result->fetch(PDO::FETCH_ASSOC));
foreach ($fields as $column) {
  echo $column.'<br>';
  # code...
}
// $reponse = $db->query('SELECT names FROM reserv');
// while ($donnees = $reponse->fetch())
// {
//     echo $donnees['names']."<br/>";
//     <div>Le prix de la place est de 10 euros jusqu'à douze ans et ensuite de
//       15 euros.<br>Le prix de l'assurance annulation est de 20 euros quel
//         que soit le nombre de voyageurs.
//     <br>
//
//     <form method='Post' action='index.php'>
//       <table>
//           <tr>
//             <td>Destination<br>
//             </td>
//             <td><input type='text' name='destination' maxlength="40"
//               value=
//               placeholder='Entrer la destination'/><br></td>
//           </tr>
//           <tr>
//             <td>Nombre de places<br>
//
//             </td>
//             <td><input type='text' name='nbr_places' maxlength="2"
//               value=
//               placeholder='Entrer le nombre de places'/><br>
//             </td>
//           </tr>
//           <tr>
//             <td>Assurance annulation</td>
//             <td><input type='checkbox' name='insurance'/><br></td>
//           </tr>
//         </table>
//
//       <div>
// }



// $table = "tcompany";
// try {
//      $db = new PDO("mysql:dbname=testReservation;host=localhost", "root", "" );
//      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );//Error Handling
//      $sql ="CREATE table $table(
//      ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
//      Prename VARCHAR( 50 ) NOT NULL,
//      Name VARCHAR( 250 ) NOT NULL,
//      StreetA VARCHAR( 150 ) NOT NULL,
//      StreetB VARCHAR( 150 ) NOT NULL,
//      StreetC VARCHAR( 150 ) NOT NULL,
//      County VARCHAR( 100 ) NOT NULL,
//      Postcode VARCHAR( 50 ) NOT NULL,
//      Country VARCHAR( 50 ) NOT NULL);" ;
//      $db->exec($sql);
//      print("Created $table Table.\n");
//
// } catch(PDOException $e) {
//     echo $e->getMessage();//Remove or change message in production code
// }
?>

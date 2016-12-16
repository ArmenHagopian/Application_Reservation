<?php
class Database
{
    private $destination;
    public function __construct()
    {
         $this->db = '';
         $this->columns = [];
         $this->rows = [];
         $this->table = '';
    }
         public function connect($hostname, $database, $username, $password = '')
         {
              $this->db = new PDO("mysql:host=$hostname", $username, $password);
              $this->db->query("CREATE DATABASE IF NOT EXISTS $database");
              $this->db->query("use $database");
         }
         public function table($table)
         {
              $this->table = $table;
              $this->db->exec("CREATE TABLE IF NOT EXISTS $this->table(
                  Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                  Destination varchar(40) NOT NULL,
                  Places int(2) NOT NULL,
                  Assurance varchar(10)  NOT NULL,
                  Noms varchar(400) NOT NULL,
                  Ages varchar(50) NOT NULL,
                  Prix int(11) NOT NULL
                )");
         }

         public function getColumns()
         {
              $this->columns = ['Id', 'Destination', 'Places', 'Assurance', 'Noms', 'Ages', 'Prix'];
              $result = $this->db->query("SELECT * FROM $this->table");
              if (count($result) > 1)
              {
                  $this->columns = [];
                  $fields = array_keys($result->fetch(PDO::FETCH_ASSOC));
                  $fields = $result->fetch_array(PDO::FETCH_ASSOC);
                  foreach ($fields as $column)
                  {
                      array_push($this->columns, $column);
                  }
              }
            return $this->columns;
         }
         public function getRows()
         {
              $this->rows = [];
              $result = $this->db->query("SELECT * FROM $this->table");
              if (count($result) > 0)
              {
                   $sql = "SELECT COUNT(*) FROM $this->table";
                   foreach  ($result as $row)
                   {
                        array_push($this->rows, $row);
                   }
              }
              return $this->rows;
         }

         public function selectAll()
         {
              $sql = "SELECT Id, Destination, Places, Assurance, Noms, Ages, Prix FROM $this->table";
              $result = $this->db->query($sql);
              return $result;
         }

         public function updateOrAdd($reservation)
         {
              $req = $this->db->prepare("INSERT INTO $this->table (Id, Noms, Destination, Ages, Places, Prix, Assurance) VALUES (NULL, :names, :destination, :ages, :places, :prix, :assurance)");
              if ($reservation->id != 0)
              {
                   $sql = "UPDATE $this->table SET Noms = :names,
                            Destination = :destination,
                            Ages = :ages,
                            Places = :places,
                            Assurance = :insurance,
                            Prix = :price
                            WHERE Id = $reservation->id";
                   // Prepare statement
                   $stmt = $this->db->prepare($sql);
                   $stmt->bindParam(':names', implode( ",",$reservation->getName()));
                   $stmt->bindParam(':destination', $reservation->getDestination());
                   $stmt->bindParam(':ages', implode( ",",$reservation->getAge()));
                   $stmt->bindParam(':places', $reservation->getNbr_places());
                   $stmt->bindParam(':insurance', $reservation->getInsurance());
                   $stmt->bindParam(':price', $reservation->getPrice());
                   // execute the query
                   $stmt->execute();
              }
              else
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

         public function delete_reservation($id)
         {
              $sql = "DELETE FROM $this->table WHERE Id=$id";
              $this->db->query($sql);
         }

         public function nbrRows()
         {
              $test = 0;
              $table = $this->table;
              $sql = "SELECT MAX(Id) FROM $table";
              $statement = $this->db->prepare($sql);
              $statement->execute();
              $nbr = $statement->fetchColumn();
              return $nbr;
         }
}
?>

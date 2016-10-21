<?php
class Reservation
{
  private $destination;
  private $nbr_places;
  private $name;
  private $age;

  public function __construct($destination='', $nbr_places=0, $name='', $age=0)
  {

    $this->destination = $destination;
    $this->nbr_places = $nbr_places;
    $this->name = $name;
    $this->age = $age;

  }

  public function getDestination()
  {
    return $this->destination;
  }

  public function setDestination($newdestination)
  {
    $this->destination = $newdestination;
  }

  public function getNbr_places()
  {
    if ($this->nbr_places == 0)
    {
      return '';
    }
    return $this->nbr_places;
  }

  public function setNbr_places($newnbr)
  {
    $this->nbr_places = $newnbr;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setName($newname)
  {
    $this->name = $newname;
  }

  public function getAge()
  {
    if ($this->age == 0)
    {
      return '';
    }
    return $this->age;
  }
  public function setAge($newage)
  {
    $this->age = $newage;
  }
}
?>

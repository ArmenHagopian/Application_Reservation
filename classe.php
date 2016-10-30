<?php
class Reservation
{
  private $destination;
  private $nbr_places;
  private $name;
  private $age;
  private $destinationerror;

  public function __construct($destination='', $nbr_places=0)
  {

    $this->destination = $destination;
    $this->nbr_places = $nbr_places;
    $this->name = [];
    $this->age = [];
    $this->destinationerror = "false";
    $this->nbr_placeserror = "false";
    $this->name_error = "false";
    $this->age_error = "false";
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
    return $this->age;
  }
  public function setAge($newage)
  {
    $this->age = $newage;
  }
  public function getDestinationError()
  {
    return $this->destinationerror;
  }
  public function setDestinationError($error)
  {
    $this->destinationerror = $error;
  }
  public function getNbr_placesError()
  {
    return $this->nbr_placeserror;
  }
  public function setNbr_placesError($error)
  {
    $this->nbr_placeserror = $error;
  }

  public function getNameError()
  {
    return $this->name_error;
  }
  public function setNameError($error)
  {
    $this->name_error = $error;
  }

  public function getAgeError()
  {
    return $this->age_error;
  }
  public function setAgeError($error)
  {
    $this->age_error = $error;
  }
}
?>

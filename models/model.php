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
    $this->id = 0;
    $this->destination = $destination;
    $this->nbr_places = $nbr_places;
    $this->name = [];
    $this->age = [];
    $this->checkbox = '';
    $this->name_errorslist = [];
    $this->age_errorslist = [];
    $this->destination_error_display = '';
    $this->nbr_places_error_display = '';
    $this->comeback = "false";
  }

  public function getId()
  {
    return $this->id;
  }
  public function setId($newid)
  {
    $this->id = $newid;
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
    if ($this->nbr_places == 0 || $this->nbr_places < 1 || $this->nbr_places > 9)
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
    //Add '' when the input is empty
    while (count($this->name) < $this->nbr_places)
    {
      array_push($this->name, '');
    }
    return $this->name;
  }
  public function setName($newname)
  {
    $this->name = $newname;
  }

  public function getAge()
  {
    //Add '' when the input is empty, < 1, or not a number
    while (count($this->age) < $this->nbr_places)
    {
      array_push($this->age, '');
    }
    for($i = 0; $i < count($this->age); $i++)
    {
      if (!is_numeric($this->age[$i]) || $this->age[$i] < 1)
      {
        $this->age[$i] = '';
      }
    }
    return $this->age;
  }
  public function setAge($newage)
  {
    $this->age = $newage;
  }
  public function getCheckbox()
  {
    return $this->checkbox;
  }
  public function setCheckbox($value)
  {
    if ($value == 'checked')
    {
      $this->checkbox = 'checked';
    }
    else
    {
      $this->checkbox = '';
    }
  }
  public function getInsurance()
  {
    if ($this->checkbox == 'checked')
    {
      return 'OUI';
    }
    else
    {
      return 'NON';
    }
  }

  public function getPrice()
  {
    $price = 0;
    foreach ($this->age as $age)
    {
      if (is_numeric($age) && $age < 13)
      {
        $price += 10;
      }
      elseif (is_numeric($age) && $age > 12)
      {
        $price += 15;
      }
    }
    if ($this->checkbox == 'checked')
    {
      return $price + 20;
    }
    else
    {
      return $price;
    }

  }

  // Allows to know if the user is coming back to a page so
  // we don't display errors
  public function setComeback($come)
  {
      $this->comeback = $come;
  }

  public function getNameErrors()
  {
    if ($this->comeback == 'true')
    {

      for($i = 0; $i < $this->nbr_places; $i++)
      {

              $this->name_errorslist[$i] = "";

      }
      return $this->name_errorslist;

    }
    if ($this->name != [])
    {

        for($i = 0; $i < $this->nbr_places; $i++)
        {
          if ($this->name[$i] == '')
          {
              //Add '*Veuillez entrer un nom' when input is empty
              $this->name_errorslist[$i] = '*Veuillez entrer <br> un nom';
          }
          else
          {
              $this->name_errorslist[$i] = '';
          }
        }
    }
    else
    {
        for($i = 0; $i < $this->nbr_places; $i++)
        {
          $this->name_errorslist[$i] = '';
        }
    }
    return $this->name_errorslist;
  }


  public function getAgeErrors()
  {
      if ($this->comeback == 'true')
      {

        for($i = 0; $i < $this->nbr_places; $i++)
        {

                $this->age_errorslist[$i] = "";

        }
        return $this->age_errorslist;

      }

      if ($this->age != [])
      {

        for($i = 0; $i < $this->nbr_places; $i++)
        {
            //Display error if age < 1 or if there is a '' in the
            //list because it means the input is empty
            if (
                $this->age[$i] == '' || (!is_numeric($this->age[$i]) || $this->age[$i] < 1))
            {
                $this->age_errorslist[$i] = "*Veuillez entrer un <br> âge supérieur à 0";
            }
            else
            {
                $this->age_errorslist[$i] = '';
            }
        }
      }
      else
      {
          for($i = 0; $i < $this->nbr_places; $i++)
          {
            $this->age_errorslist[$i] = '';
          }
      }
      return $this->age_errorslist;
  }

  public function getDestinationError()
  {
      if ($this->comeback == 'true')
      {
          $this->destination_error_display = '';
          return $this->destination_error_display;
      }
      if ($this->destination == '' )
      {
      $this->destination_error_display = '*Veuillez entrer une destination';
      }
      else
      {
          $this->destination_error_display = '';
      }
      return $this->destination_error_display;
  }
  public function getNbr_placesError()
  {
      if ($this->comeback == 'true')
      {
          $this->nbr_places_error_display = '';
          return $this->nbr_places_error_display;
      }
      if (
      (!is_numeric($this->nbr_places) ||
      $this->nbr_places < 1 ||
      $this->nbr_places > 10))
      {
      $this->nbr_places_error_display = '*Veuillez entrer un nombre <br>
      supérieur à 0 et inférieur à 10';
      }
      else
      {
          $this->nbr_places_error_display = '';
      }
      return $this->nbr_places_error_display;
  }
}
?>

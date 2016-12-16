<html>
  <head>
    <title>Liste des reservations</title>
    <link href='views/static/style.css' rel='stylesheet'>
  </head>
  <body>
    <center>
      <div id='manager'>

        <h1>Liste des reservations</h1>
        <form method='Post' action='index.php?name=manager'>
          <table>
            <div id='AddButton'><input type='submit' name='AddReservation'
              value='Ajouter une réservation'/>
            </div>

            <?php

                  $columns = $db->getColumns();
                  foreach ($columns as $column)
                  {
                      echo "<th>".$column."</th>";
                  }
                  echo
                  "
                  <th></th>
                  <th></th>
                  ";
                  $rows = $db->getRows();
                  foreach ($rows as $row)
                  {
                       echo "
                       <tr>";
                       foreach ($columns as $column)
                       {
                            echo"<td>".$row[$column]."</td>";
                       }
                       echo "
                         <td><input type='submit' name='Modify_".$row['Id']."' value='Modifier'/></td>
                         <td><input type='submit' name='Delete_".$row['Id']."' value='Supprimer'/></td>
                       </tr>";
                  }
            ?>
          </table>
        </form>
      </div>
    </center>
  </body>
</html>

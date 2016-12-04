<?php

$mysqli = new mysqli("localhost", "root", "", "reservation") or die("Could not select database");
if ($mysqli->connect_errno)
{
  echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ")" . $mysqli->connect_errno;
}

// Execute SQL requests
$query = "SELECT * FROM users";
$result = $mysqli->query($query) or die("Query failed");

if ($result->num_rows == 0)
{
    echo "Auncune ligne trouvée, rien à afficher.";
    exit;
}

// Display results


// Results released
$result->close();

// Close the connection
$mysqli->close();

// Affichage des entêtes de colonnes
echo "<table>\n<tr>";
while ($finfo = $result->fetch_field())
{
    echo '<th>'. $finfo->name .'</th>';
}
echo "</tr>\n";
// Afficher des résultats en HTML
while ($line = $result->fetch_assoc())
{
    echo "\t<tr>\n";
    foreach ($line as $col_value)
    {
        echo "\t\t<td>$col_value</td>\n"; }
        echo "\t</tr>\n";
    }
    echo "</table>\n";
// Récupération du résultat sous forme d'un tableau associatif
$result = $mysqli->query($query) or die("Query failed");
while ($line = $result->fetch_array(MYSQLI_ASSOC))
{
    echo $line['lastname'].'<BR>';
}

// Insertion d'un enregistrement
$sql = "INSERT INTO "test"."users" ("id", "lastname", "firstname", "email", "Mobile") VALUES (NULL, 'Doe ', 'John', 'j.doe@ecam.be', '0478/65.32.89');";
if ($mysqli->query($sql) === TRUE)
{
    echo "Record updated successfully";
    $id_insert = $mysqli->insert_id;
}
else
{
    echo "Error inserting record: " . $mysqli->error;
}
// Récupération de l'id de la dernière insertion
$id_user = $mysqli->insert_id;

// Mise à jour d'un enregistrement
$sql = "UPDATE users SET lastname='Dardenne' WHERE id=2";
if ($mysqli->query($sql) === TRUE)
{
    echo "Record inserted successfully";
}
else
{
    echo "Error updating record: " . $mysqli->error;
}

?>

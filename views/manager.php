<html>
<head>
<style>
input[type=submit] {
width: 100%;
background-color: #4099FF;
color: white;
padding: 8px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;
cursor: pointer;
/*box-shadow: 0 3px #999;*/

}

input[type=submit]:hover {
background-color: #3B5998;
}
table {
border: 1px solid black;
border-collapse: separate;
border-radius: 5px;
border-spacing: 0px;
font-family: arial, sans-serif;

}

td, th {
border: 0.5px solid black;

text-align: middle;
padding: 3px;
}

tr:nth-child(even) {
background-color: #dddddd;
}
</style>
</head>
<body>
<center>
<div>
<form method='Post' action='index.php?name=manager'>
<table>
<tr>
<?php
// var_dump($db->getColumns());

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
        echo "<tr>";
        foreach ($columns as $column)
        {
            echo"<td>".$row[$column]."</td>";
        }
        echo "

    <td><input type='submit' name='Modify_".$row['Id']."' value='Modifier'/></td>
    <td><input type='submit' name='Delete_".$row['Id']."' value='Supprimer'/></td></tr>";
    }
?>
</table>
</form>
</div>
</center>
</body>
</html>

<strong>New Values after Delete: </strong>
<html>
<body>
<hr>
<head>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>
<style>
table {
  border-spacing: 0;
  width: 70%;
  border: 2px solid #000000;
}

th {
  cursor: pointer;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #A1C4FE
}
table.center{
 margin-left: auto;
 margin-right: auto;
}
</style>

<?php

include 'connectdb.php';

$westernnum =   $_POST["westernnum"];

echo "Western CS Course: " . $westernnum . " has been deleted.<br><br>";

$query = "DELETE FROM westerncourse WHERE westernnum = '" . $westernnum . "';";

$newresult = mysqli_query($connection, $query);

$query2 = "SELECT * FROM westerncourse;";

$finalresult = mysqli_query($connection, $query2);

while ($row2 = mysqli_fetch_assoc($finalresult))
{
    echo "<tr>";
    echo "<td>" . $row2['westernname'] . "</td><br>";
    echo "<td>" . $row2['westernnum'] . "</td><br>";
    echo "<td>" . $row2['weight'] . "</td><br>";
    echo "<td>" . $row2['suffix'] . "</td><br><br>";
    echo "</tr>";
}

mysqli_close($connection);
$mylink = "http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php";
echo "<br>Back to main page: ";
echo "<a href='$mylink'>Main Page</a>";
?>
</html>
</body>

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

$westernnum = 	$_POST["westernnum"];
$westernname = 	$_POST["westernname"];
$suffix = 	$_POST["suffix"];
$weight = 	$_POST["weight"];

$query = 	"SELECT * FROM westerncourse";
$result = 	mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}

echo "Entered Values: <br><br>";
echo "western num: " . $westernnum . "<br>";
echo "western name: " . $westernname . "<br>";
echo "suffix: " . $suffix . "<br>";
echo "weight: " . $weight . "<br><br>";
$dbTable = 'westerncourse';
$dbName = 'lreid2assign2db';

$row = mysqli_fetch_assoc($result);

$query2 = 'UPDATE westerncourse SET westernname = "' . $westernname . '" , suffix = "' . $suffix . '" , weight = "' . $weight . '" WHERE westernnum = "' . $westernnum . '";';

if (!mysqli_query($connection, $query2)) {
        die("Error: update failed " . mysqli_error($link));
    }

$newresult = mysqli_query($connection, $query2);

$query3 = "SELECT * FROM westerncourse";

$finalresult = mysqli_query($connection, $query3);

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
?>
</body>
</html>

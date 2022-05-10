<strong>New courses after deleted course:</strong>
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

$westernnumber = $_POST["westernnum"];

$query = "SELECT * FROM westerncourse";
$result = mysqli_query($connection, $query);

echo "You have decided to delete the Western CS Course: " . $westernnumber . "<br><br>";

$query2 = "SELECT westernnum FROM equivalentto WHERE westernnum = '" . $westernnumber . "';";

$checkresult = mysqli_query($connection, query2);

if($checkresult): ?>

<form action="delete.php" method="post">
    Are you sure you want to delete this course?
    <input type="submit" name="confirm" value="Yes">
    <input type="button" onclick="window.location.href='http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php';"  name="confirm" value="No">
 
<?php else:

echo "Western CS Course: " . $westernnumber . " has been deleted.<br><br>";

$query3 = "DELETE FROM westerncourse WHERE westernnum = '" . $westernnumber . "';";

$newresult = mysqli_query($connection, $query3);

$query4 = "SELECT * FROM westerncourse;";

$finalresult = mysqli_query($connection, $query4);

while ($row2 = mysqli_fetch_assoc($finalresult))
{
    echo "<tr>";
    echo "<td>" . $row2['westernname'] . "</td><br>";
    echo "<td>" . $row2['westernnum'] . "</td><br>";
    echo "<td>" . $row2['weight'] . "</td><br>";
    echo "<td>" . $row2['suffix'] . "</td><br><br>";
    echo "</tr>";
}

endif;
mysqli_close($connection);
?>

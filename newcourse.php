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
$westernname =  $_POST["westernname"];
$suffix =       $_POST["suffix"];
$weight =       $_POST["weight"];

$query =        "SELECT * FROM westerncourse";
$result =       mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
$mylink = "http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php";

echo "<strong>Entered Values: </strong><br><br>";
echo "western num: " . $westernnum . "<br>";
echo "western name: " . $westernname . "<br>";
echo "suffix: " . $suffix . "<br>";
echo "weight: " . $weight . "<br>";

$coursenum_query = 'SELECT westernnum FROM westerncourse WHERE westernnum = "' . $westernnum . '";'; 
$coursenum_result = mysqli_query($connection, $coursenum_query);

$if_empty = mysqli_fetch_row($coursenum_result);

if(!($if_empty==null)){
	echo '<script>alert("Course already exists. Please return to main page.")</script>';
        echo "Back to main page: ";
        echo "<a href='$mylink'>Main Page</a>";
        exit;
}

$string=$westernnum;
$firstcharacter = $string[0];
$secondcharacter = $string[1];
if(!((($string[0] == "c") And ($string[1] == "s")) || (($string[0] == "C") And ($string[1] == "S")))){
	echo '<script>alert("Invalid UWO course number! (must start with cs)")</script>';
	echo "Back to main page: ";
	echo "<a href='$mylink'>Main Page</a>";
	exit;
}

echo "<br><strong>Course Added!</strong><br<br>";

$query2 = 'INSERT westerncourse SET westernname = "' . $westernname . '" , suffix = "' . $suffix . '" , weight = "' . $weight . '",  westernnum = "' . $westernnum . '";';

$newresult = mysqli_query($connection, $query2);

$query3 = "SELECT * FROM westerncourse";

$finalresult = mysqli_query($connection, $query3);

while ($row2 = mysqli_fetch_assoc($finalresult))
{
    echo "<tr>";
    echo "<td><br><br>" . $row2['westernname'] . "</td><br>";
    echo "<td>" . $row2['westernnum'] . "</td><br>";
    echo "<td>" . $row2['weight'] . "</td><br>";
    echo "<td>" . $row2['suffix'] . "</td><br>";
    echo "</tr>";
}

mysqli_close($connection);
?>
<?php
        $mylink = "http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php";
        echo "<br>Back to main page: ";
        echo "<a href='$mylink'>Main Page</a>";
?>
</html>
</body>

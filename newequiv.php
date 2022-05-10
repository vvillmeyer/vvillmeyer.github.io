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
$outsidenum =  $_POST["outsidenum"];
$uniid =       $_POST["uniid"];

$query =        "SELECT * FROM equivalentto;";
$result =       mysqli_query($connection,$query);
if (!$result) {
     die("databases query failed.");
}
$mylink = "http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php";

echo "Entered Values: " . gmdate("Y-m-d") . "<br><br>";
echo "Western course number: " . $westernnum . "<br>";
echo "Outside course number: " . $outsidenum . "<br>";
echo "Outside University ID: " . $uniid . "<br><br>";

$equiv_query = 'SELECT outsidenum,westernnum,uniid FROM equivalentto WHERE westernnum = "' . $westernnum . '" AND outsidenum = "' . $outsidenum .'" AND uniid = "' . $uniid . '";';
$equiv_result = mysqli_query($connection, $equiv_query);

$if_empty = mysqli_fetch_assoc($equiv_result);

if($if_empty==null){

	$exist_query = 'INSERT INTO equivalentto VALUES ("'.$westernnum.'","'.$outsidenum.'","'.$uniid.'","' . gmdate("Y-m-d") . '");';
        $newresult = mysqli_query($connection, $exist_query);
	echo "Equivalence Added! <br><br>";
		
	$insert_query = "SELECT * FROM equivalentto;";

	$insert_result = mysqli_query($connection, $insert_query);

	while ($row2 = mysqli_fetch_assoc($insert_result)){
    		echo "<tr>";
    		echo "<td><br>" . $row2['westernnum'] . "</td><br>";
    		echo "<td>" . $row2['outsidenum'] . "</td><br>";
    		echo "<td>" . $row2['uniid'] . "</td><br>";
    		echo "<td>" . $row2['evaluateddate'] . "</td><br><br>";
    		echo "</tr>";
	}
	
	echo "Back to main page: ";
	echo "<a href='$mylink'>Main Page</a>";
	exit();
}

$query2 = 'UPDATE equivalentto SET evaluateddate ="'. gmdate("Y-m-d") .'" WHERE westernnum = "' . $westernnum . '" , outsidenum = "' . $outsidenum . '" , uniid = "' . $uniid . '";';

$result = mysqli_query($connection, $query2);

$query3 = "SELECT * FROM equivalentto;";

$finalresult = mysqli_query($connection, $query3);

while ($row2 = mysqli_fetch_assoc($finalresult))
{
    echo "<tr>";
    echo "<td>" . $row2['westernnum'] . "</td><br>";
    echo "<td>" . $row2['outsidenum'] . "</td><br>";
    echo "<td>" . $row2['uniid'] . "</td><br>";
    echo "<td>" . $row2['evaluateddate'] . "</td><br><br>";
    echo "</tr>";
}

echo "Back to main page: ";
echo "<a href='$mylink'>Main Page</a>";
mysqli_close($connection);

?>

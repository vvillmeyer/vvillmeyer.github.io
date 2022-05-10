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
  width: 45%;
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

<table id= "Outside Table">

 <tr>
    <th><strong>University Name</strong></th>
    <th><strong>Nick Name</strong></th>
  </tr>

<?php
include 'connectdb.php';

$prov =   $_POST["prov"];

$query = 'SELECT uniname,nickname FROM university WHERE prov = "' . $prov . '";';
$result = mysqli_query($connection, $query);
echo "<br><strong>University Information for the Province of: </strong>".$prov. "<br><br>";
while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
	echo "<th>".$row['uniname']."</th>";
        echo "<th>".$row['nickname']."</th>";
	echo "</tr>";
}
?>
</table>
<?php
        $mylink = "http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php";
        echo "<br>Back to main page: ";
        echo "<a href='$mylink'>Main Page</a>";
	mysqli_close($connection);
?>
</body>
</html>

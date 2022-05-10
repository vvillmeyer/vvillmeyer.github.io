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

<table id= "Outside Table">

 <tr>
    <th>Outside Course Number</th>
    <th>Outside Course Name</th>
    <th>Course Year</th>
    <th>Course Weight</th>
    <th>University ID</th>
  </tr>

<?php
include 'connectdb.php';

$uniname =   $_POST["uniname"];

$query = 'SELECT * FROM university WHERE uniname = "' . $uniname . '";';
$result = mysqli_query($connection, $query);
echo "<br><strong>University Information:</strong><br><br>";
while ($row = mysqli_fetch_assoc($result)) {
     	echo "<strong>University ID: </strong>".$row['uniid']."<br>";
	echo "<strong>University Name: </strong>".$row['uniname']."<br>";
  	echo "<strong>City: </strong>".$row['city']."<br>";
     	echo "<strong>Province: </strong>".$row['prov']."<br>";
     	echo "<strong>Nickname: </strong>".$row['nickname']."<br><br>";
}
$uniid = $row['uniid'];

$query2 = 'SELECT uniid FROM university WHERE uniname = "' . $uniname . '";';

$uniid_result = mysqli_query($connection, $query2);
if (!$uniid_result) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}
$result2 = mysqli_fetch_array($uniid_result);
if (!$result2) {
    printf("Error: %s\n", mysqli_error($connection));
    exit();
}

$query3 = 'SELECT * FROM outsidecourse WHERE uniid = "' . $result2[uniid] . '";';

$course_result = mysqli_query($connection, $query3);

echo "<strong>University's CS Courses:</strong><br>";
while ($row = mysqli_fetch_assoc($course_result)){
        echo "<tr>";
        echo "<td>".$row['outsidenum']."</td>";
        echo "<td>".$row['outsidename']."</td>";
        echo "<td>".$row['whichyear']."</td>";
        echo "<td>".$row['weight']."</td>";
        echo "<td>".$row['uniid']."</td>";
	echo "</tr>";      
}
?>
</hr>
</table>
<?php
        $mylink = "http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php";
        echo "<br>Back to main page: ";
        echo "<a href='$mylink'>Main Page</a>";
mysqli_close($connection);
?>
</body>
</html>


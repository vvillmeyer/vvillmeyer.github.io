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
  width: 80%;
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
    <th><strong>UWO Course Number</strong></th>
    <th><strong>UWO Course Name</strong></th>
    <th><strong>UWO Course Weight</strong></th>
    <th><strong>Equivalent Course University Name</strong></th>
    <th><strong>Equivalent Course Name</strong></th>
    <th><strong>Equivalent Course Number</strong></th>
    <th><strong>The Date this Equivalence was Created</strong></th>
</tr>

<?php
include 'connectdb.php';
$evaluateddate =   $_POST["evaluateddate"];

$join_query = 'SELECT westerncourse.westernnum, westerncourse.westernname, westerncourse.weight, university.uniname, outsidecourse.outsidename, equivalentto.outsidenum, equivalentto.evaluateddate FROM westerncourse, outsidecourse, equivalentto, university WHERE equivalentto.evaluateddate <= "' . $evaluateddate . '" AND outsidecourse.uniid = equivalentto.uniid AND equivalentto.outsidenum = outsidecourse.outsidenum AND equivalentto.westernnum = westerncourse.westernnum AND university.uniid = equivalentto.uniid;';

$result2 = mysqli_query($connection, $join_query);
echo "<br><strong>Equivalent Information prior to: </strong>".$evaluateddate. "<br><br>";
while ($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<th>".$row['westernnum']."</th>";
        echo "<th>".$row['westernname']."</th>";
        echo "<th>".$row['weight']."</th>";
        echo "<th>".$row['uniname']."</th>";
        echo "<th>".$row['outsidename']."</th>";
        echo "<th>".$row['outsidenum']."</th>";
        echo "<th>".$row['evaluateddate']."</th>";
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


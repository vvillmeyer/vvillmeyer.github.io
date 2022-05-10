
<!DOCTYPE html>
<html>
<head>
        <title>CS3319 Assignment 3 Will Meyer</title>
        <link rel="stylesheet" type="text/css" href="style1.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<meta charset="utf-8">
<title>Western Courses</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<style>
h1{text-align:center;}
h2{text-align:center;}
</style>
<h1>Western's Computer Science Courses</h1>
<h2>Welcome</h2>
<?php
include 'getdata.php';
?>
<style>
p {text-align:center;}
</style>
<p><strong> Task #2: - Modify UWO Course</strong><p>
<p><strong> To change the name, weight or suffix of a course please fill out the list below: </stong></p>

<form action="task2.php" method="post">
Enter the course number of the course you would like to modify: <input type="text" name="westernnum"><br><br>
Enter new name (or leave blank): <input type="text" name="westernname" value="<?php $westernname ?>"><br><br>
Enter new suffix (or leave blank): <input type="text" name="suffix" value="<?php $suffix ?>"><br><br>
<label for="weight">Choose new weight:</label>
<select name="weight" id="weight" value="<?php $weight ?>">
<option value="NULL">Select one of the options</option>
<option value="0.5">0.5</option>
<option value="1.0">1.0</option>
</select>
<br><br>
<input type="submit" name ="submit" value="Modify Course">
</form>

<form action="sured.php" method="post">
<p><strong> Task #3: - Delete UWO Course</strong><br>
<div class="b">
Enter the course number of the course you would like to delete: <input type="text" name="westernnum" value="<?php $westernnum ?>"><br><br>
<input type="submit" name ="submit" value="Delete Course"><br>
</div>
</form>

<form action="newcourse.php" method="post">
<p><strong> Task #4 - Add UWO Course:</strong><br>
<div class="b">
Enter the course number of the course you would like to insert: <input type="text" name="westernnum" value="<?php $westernnum ?>"><br><br>
Enter new name (or leave blank): <input type="text" name="westernname" value="<?php $westernname ?>"><br><br>
Enter new suffix (or leave blank): <input type="text" name="suffix" value="<?php $suffix ?>"><br><br>
<label for="weight">Choose new weight:</label>
<select name="weight" id="weight" value="<?php $weight ?>">
<option value="NULL">Select one of the options</option>
<option value="0.5">0.5</option>
<option value="1.0">1.0</option>
</select>
<br><br>
<input type="submit" name ="submit" value="Add Course"><br>
</div>
</form>

<form action="displayuniinfo.php" method="post">
<p><strong> Task #5 - University Info:</strong><br>
<div class="b">
Please choose a University form the list:
<select name="uniname" id="uniname" value="<?php $uniname ?>">
<?php
include 'connectdb.php';
$result = mysqli_query($connection, "SELECT uniname  FROM university ORDER BY prov;");
while($row = mysqli_fetch_array($result)) {
    echo("<option value='".$row['uniname']."'>".$row['uniname']."</option>");
}
?>
<label for="dropdown">Select</label>
</select>
<button type="submit">Get Info</button>
</form><br><br>
</div>

<form action="showprov.php" method="post">
<p><strong> Task #6 - University Info By Province:</strong><br>
<div class="b">
Please choose a province from the list:
<select name="prov" id="prov" value="<?php $prov ?>">
<?php

$connection = mysqli_connect("localhost", "root", "cs3319", "lreid2assign2db");
$result = mysqli_query($connection, "SELECT prov FROM university GROUP BY prov;");
while($row = mysqli_fetch_array($result)) {
    echo("<option value='".$row['prov']."'>".$row['prov']."</option>");
}
?>
<label for="dropdown">Select</label>
</select>
<button type="submit">Get Info</button>
</form><br><br>
</div>

<form action="equivcourse.php" method="post">
<p><strong> Task #7 - UWO Course Equivalents:</strong><br>
<div class="b">
Please choose a course number from the list:
<select name="westernnum" id="westernnum" value="<?php $westernnum ?>">
<?php

$connection = mysqli_connect("localhost", "root", "cs3319", "lreid2assign2db");
$result = mysqli_query($connection, "SELECT westernnum FROM westerncourse;");
while($row = mysqli_fetch_array($result)) {
    echo("<option value='".$row['westernnum']."'>".$row['westernnum']."</option>");
}
?>
<label for="dropdown">Select</label>
</select>
<button type="submit">Get Info</button>
</form><br><br>
</div>

<form action="equivdate.php" method="post">
<p><strong> Task #8 - Equivalents Prior to Inputed Date:</strong><br>
<div class="b">
<label for="evaluateddate">Enter Date:</label>
  <input type="date" id="evaluateddate" name="evaluateddate" value = "<?php $evaluateddate ?>">
  <input type="submit">
</form><br><br>
</div>

<form action="newequiv.php" method="post">
<p><strong> Task #9 - Add Course Equivalent:</strong><br>
<div class="b">
Enter the Western Course Number: <input type="text" name="westernnum" value="<?php $westernnum ?>"><br><br>
Enter the Outside Course Number: <input type="text" name="outsidenum" value="<?php $outsidenum ?>"><br><br>
Enter Outside Course University ID: <input type="text" name="uniid" value="<?php $uniid ?>"><br><br>
 <input type="submit" name ="submit" value="Add Equivalent"><br>
</div>
</form>

<?php
include 'nocourse.php';
?>
</body>
</html>

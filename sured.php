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

$query= 'SELECT westernnum FROM equivalentto WHERE westernnum="'.$westernnum.'";';

$result= mysqli_query($connection,$query);

$if_empty= mysqli_fetch_row($result);

if($if_empty == null): ?>

	<form action="delete.php" method="post">
	Are you sure you want to delete: <?php echo " $westernnum" ?>?<br>
	If you are sure please type in course number again and hit 'I am sure'.<br>
	<input type="text" name="westernnum" value="<?php $westernnum ?>"><br><br>
	<input type="submit" name ="submit" value="I am sure">
	</form>
        <br>Back to main page:
        <a href="http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php">Main Page</a>
<?php else : ?>

	<form action="delete.php" method="post">
	Are you sure you want to delete: <?php echo " $westernnum  " ?>  there is an equivalent course at another university.<br>
	If you are sure please type in course number again and hit 'I am sure'.<br>
	<input type="text" name="westernnum" value="<?php $westernnum ?>"><br><br>
	<input type="submit" name ="submit" value="I am sure">
	</form>
        <br>Back to main page:
        <a href="http://cs3319.gaul.csd.uwo.ca/vm147/a3kurtis/main.php">Main Page</a>

<?php endif;
mysqli_close($connection);
?>
</html>
</body>

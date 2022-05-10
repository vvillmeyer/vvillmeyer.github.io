<html>
<body>
<style>
table {
  border-spacing: 0;
  width: 70%;
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
<p><strong>Task #10: - Universities that don't have CS Courses</strong><p>
<table id= "OutsideTable">

 <tr>
    <th><strong>University Name</strong></th>
    <th><strong>University Nickname</strong></th>
  </tr>

<?php
include 'connectdb.php';

$query = 'SELECT university.uniname, university.nickname FROM university, outsidecourse WHERE NOT EXISTS (SELECT null FROM outsidecourse WHERE 
university.uniid = outsidecourse.uniid) GROUP BY university.uniname;';

$result = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>" . $row['uniname'] . "</td>";
    echo "<td>" . $row['nickname'] . "</td>";
    echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($connection);
?>
</table>
</body>
</html>


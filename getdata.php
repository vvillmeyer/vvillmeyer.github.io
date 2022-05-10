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
<p><strong>Task #1: - Organize Western CS Courses</strong><p>
<p>Click on headers to sort table.<p>
<table id= "WesternTable">
 
 <tr>  
	<th onclick="sortTable(0)">Western Course Name↕</th>
    	<th onclick="sortTable(1)">Western Course Number↕</th>    
	<th onclick="sortTable(2)">Course Weight↕</th>
    	<th onclick="sortTable(3)">Course Suffix↕</th>
  </tr>
<?php
include 'connectdb.php';

$query = "SELECT * FROM westerncourse;";

$result = mysqli_query($connection,$query);

while ($row = mysqli_fetch_assoc($result))
{
    echo "<tr>";
    echo "<td>" . $row['westernname'] . "</td>";
    echo "<td>" . $row['westernnum'] . "</td>";
    echo "<td>" . $row['weight'] . "</td>";
    echo "<td>" . $row['suffix'] . "</td>";
    echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($connection);
?>
</table>
<! -- Script from https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sort_table_desc -->
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("WesternTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
</body>
</html>


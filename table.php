<?php
session_start();
?>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-
theme.min.css" >
<link rel="stylesheet" href="styles.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<div class="row">
<h2>Table</h2>





<?php
$con=mysqli_connect("localhost","root","gameofthrones","DATABASE_NAME_HERE");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM TABLE_HERE");

echo "<table border='1'class='table table-striped'>
<thead>
<tr>
<th>id</th>
<th>time</th>
<th>ip_address</th>
<th>org</th>
<th>cur_url</th>
<th>pre_url</th>
<th>xff_headers</th>
<th>country</th>
<th>city</th>
</thead>

</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<th scope='row'>" . $row['id'] . "</th>";
echo "<td>" . $row['time'] . "</td>";
echo "<td>" . $row['ip_address'] . "</td>";
echo "<td>" . $row['hostname'] . "</td>";
echo "<td>" . $row['cur_url'] . "</td>";
echo "<td>" . $row['pre_url'] . "</td>";
echo "<td>" . $row['xff_headers'] . "</td>";
echo "<td>" . $row['country'] . "</td>";

echo "<td>" . $row['city'] . "</td>";


echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>

<a class="btn btn-primary" href="logout.php">Logout</a>
</div>
</body>
</html>

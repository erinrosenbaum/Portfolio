<!DOCTYPE html>
<html>
<head>
	<title>Vehicles</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>

<h1 class="title">Vehicles</h1>
<a class="btn btn-success mybttn" href="./new_vehicle.php">New Vehicle</a><br>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Unit Number</td>
			<td>Year</td>
			<td>Make</td>
			<td>Model</td>
			<td>Trailer Unit</td>
			<td>Employee</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT v.id, v.unit_number, year, make, model, e.unit_number, e.description, em.first_name, em.last_name FROM vehicles v LEFT JOIN Equipment e ON v.trailer_id = e.id LEFT JOIN employees em ON em.truck_id = v.id ORDER BY v.unit_number * 1 ASC"))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $unit_number, $year, $make, $model, $trailer_id, $description, $first, $last )){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $id . "</td>\n
			<td>" . $unit_number . "</td>\n
			<td>" . $year . "</td>\n
			<td>" . $make . "</td>\n
			<td>" . $model . "</td>\n
			<td>" . $description . " " . $trailer_id . "</td>\n
			<td>" . $first . " " . $last . "</td>\n
			<td><a class='btn btn-info' href=\"./vehicle.php?id=$id&unit_number=$unit_number\">View</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>
<a class="btn btn-success" href="./new_vehicle.php">New Vehicle</a><br><br>
<img id="fleet" style="width: 50%" src="../static/truck.jpg">
</div>
</body>
</html>
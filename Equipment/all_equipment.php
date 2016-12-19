<!DOCTYPE html>
<html>
<head>
	<title>Equipment</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>

<h1 class="title">Equipment</h1>
<a class="btn btn-success mybttn" href="./new_unit.php">New Unit</a><br>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Unit Number</td>
			<td>Description</td>
			<td>Truck Number</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT e.id, e.Unit_Number, e.Description, v.unit_number FROM Equipment e LEFT JOIN vehicles v ON v.trailer_id = e.id ORDER BY e.Unit_Number"))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $Unit_Number, $Description, $vehicle_number)){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $id . "</td>\n
			<td>" . $Unit_Number . "</td>\n
			<td>" . $Description . "</td>\n
			<td>" . $vehicle_number . "</td>\n
			<td><a class='btn btn-info' href=\"./unit.php?id=$id&Unit_Number=$Unit_Number&Description=$Description\">View</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>
<a class="btn btn-success" href="./new_unit.php">New Unit</a><br><br>

<img style="width: 50%" src="../static/frac.jpg">
</div>
</body>
</html>
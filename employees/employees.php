<!DOCTYPE html>
<html>
<head>
	<title>Employees</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
<h1 class="title">Employees</h1>
<a class="btn btn-success mybttn" href="./new_employee.php">New Employee</a><br>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Last Name</td>
			<td>First Name</td>
			<td>Email</td>
			<td>Phone</td>
			<td>Crew</td>
			<td>Position</td>
			<td>Vehicle</td>
			<td>Equipment</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT e.id, first_name, last_name, email, phone, c.name, p.title, v.unit_number, eq.Unit_Number, eq.Description FROM employees e LEFT JOIN crews c ON e.crew_id = c.id LEFT JOIN positions p ON e.position_id = p.id LEFT JOIN vehicles v ON e.truck_id = v.id LEFT JOIN Equipment eq ON v.trailer_id = eq.id ORDER BY last_name "))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $first_name, $last_name, $email, $phone, $crew_id, $position_id, $truck_id, $unit_number, $desciption)){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $id . "</td>\n
			<td>" . $last_name . "</td>\n
			<td>" . $first_name . "</td>\n
			<td>" . $email . "</td>\n
			<td>" . $phone . "</td>\n
			<td>" . $crew_id . "</td>\n
			<td>" . $position_id . "</td>\n
			<td>" . $truck_id . "</td>\n
			<td>" . $desciption . ' ' . $unit_number . "</td>\n
			<td><a class='btn btn-info' href=\"./employee.php?id=$id&first_name=$first_name&last_name=$last_name&truck_id=$truck_id&desciption=$desciption&unit_number=$unit_number\">View</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>
<a class="btn btn-success" href="./new_employee.php">New Employee</a><br><br>
<img id="fleet" src="../static/baseball_team.jpg">
</div>
</body>
</html>
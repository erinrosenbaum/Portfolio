<?php require_once('../mysqli_connect.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Employee:  " . $_GET['last_name'] . ", " . $_GET['first_name'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>First Name</td>
				<td>Last Name</td>
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
			<?php
			$employee_id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT e.id, first_name, last_name, email, phone, c.name, p.title, v.unit_number, eq.Unit_Number, eq.Description FROM employees e LEFT JOIN crews c ON e.crew_id = c.id LEFT JOIN positions p ON e.position_id = p.id LEFT JOIN vehicles v ON e.truck_id = v.id LEFT JOIN Equipment eq ON v.trailer_id = eq.id WHERE e.id=$employee_id"))){
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
				<td>" . $first_name . "</td>\n
				<td>" . $last_name . "</td>\n
				<td>" . $email . "</td>\n
				<td>" . $phone . "</td>\n
				<td>" . $crew_id . "</td>\n
				<td>" . $position_id . "</td>\n
				<td>" . $truck_id . "</td>\n
				<td>" . $desciption . ' ' . $unit_number . "</td>\n
				<td><a class='btn btn-info' href=\"./edit_employee.php?id=$id&first_name=$first_name&last_name=$last_name&email=$email&phone=$phone&crew_id=$crew_id&position_id=$position_id&truck_id=$truck_id\">Edit</a>  <a class='btn btn-info' href=\"./delete_employee.php?id=$id&first_name=$first_name&last_name=$last_name\">Delete</a></td>\n 
				</tr>";
			}
			$query->close();
			?>		
		</tbody>
	</table>
	<br>
	<?php echo "<h1>Certifications for:  " . $_GET['last_name'] . ", " . $_GET['first_name'] . "</h1>";?>


	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Cert ID</td>
				<td>Name</td>
				<td>Position</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody>
			<?php require_once('../mysqli_connect.php');?>
			<?php
			if(!($query = $mysqli->prepare("SELECT c.id, first_name, last_name, title, date FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id WHERE e.id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $first_name, $last_name, $position_id, $date)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			$dt = new DateTime($date);

			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $last_name . ', ' . $first_name . "</td>\n
				<td>" . $position_id . "</td>\n
				<td>" .  $dt->format('m-d-Y') . "</td>\n
				</tr>";
			}
			$query->close();
			?>
		</tbody>
	</table>
	<br>


	<a class ='btn btn-info' href="./employees.php">Go Back</a><br><br>
	<img id="fleet" src="../static/jordan.jpg">
</div>
</body>
</html>
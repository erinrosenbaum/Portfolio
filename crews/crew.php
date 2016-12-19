<?php
require_once('../mysqli_connect.php');
$id=$_GET['id'];
$name=$_GET['name'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Crew</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>" . $_GET['name'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Name</td>
				<td>Title</td>
				<td>Vehicle</td>
				<td>Equipment</td>
				<td>Crew</td>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!($query = $mysqli->prepare("SELECT e.id, e.last_name, e.first_name, p.title, v.unit_number, eq.Description, eq.Unit_Number, c.name FROM employees e LEFT JOIN positions p ON e.position_id = p.id LEFT JOIN vehicles v ON e.truck_id = v.id LEFT JOIN Equipment eq ON v.trailer_id = eq.id LEFT JOIN crews c ON e.crew_id = c.id WHERE c.id=$id ORDER BY p.id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $last_name, $first_name, $title, $unit_number, $description, $Unit_Number, $name)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $last_name . ', ' .$first_name . "</td>\n
				
				<td>" . $title . "</td>\n
				<td>" . $unit_number . "</td>\n
				<td>" . $description . ' ' . $Unit_Number . "</td>\n
				<td>" . $name . "</td>\n
				</tr>";
			}
			$query->close();
			?>
		</tbody>
	</table><br>


	<?php echo "<h1>" . $_GET['name'] . " Certifications" . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Cert ID</td>
				<td>Name</td>
				<td>Position</td>
				<td>Date</td>
				<td>Crew</td>
			</tr>
		</thead>
		<tbody>
			<?php require_once('../mysqli_connect.php');?>
			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT c.id, first_name, last_name, title, date, cr.name FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id ORDER BY last_name"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $first_name, $last_name, $position_id, $date, $cr_name)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}

			$dt = new DateTime($date);

			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $last_name . ', ' . $first_name . "</td>\n
				<td>" . $position_id . "</td>\n
				<td>" .  $dt->format('m-d-Y') . "</td>\n
				<td>" .  $cr_name . "</td>\n
				</tr>";
			}
			$query->close();
			?>
		</tbody>
	</table><br>

	<?php echo "<h1>" . $_GET['name'] . " Certifications Per Position" . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Title</td>
				<td>Crew</td>
				<td>Count</td>
			</tr>
		</thead>
		<tbody>
			<?php require_once('../mysqli_connect.php');?>
			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 1"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 2"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 3"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 4"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 5"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 6"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 7"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 8"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 9"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 10"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 11"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 12"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 13"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			$id=$_GET['id'];
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = $id AND p.id = 14"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $crew, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $crew . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

		</tbody>
	</table><br>

		<?php echo "<a class='btn btn-info' href=\"./crews.php\">Go Back</a>"?>
			<br><br>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Certifications</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>


<h1 class="title">Certifications Per Position</h1>
<a class="btn btn-success mybttn" href="./new_certification.php">New Certification</a><br>
<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Title</td>
				<td>Count</td>
			</tr>
		</thead>
		<tbody>
			<?php require_once('../mysqli_connect.php');?>
			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 1"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 2"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 3"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 4"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 5"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 6"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 7"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 8"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 9"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 10"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 11"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 12"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 13"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE p.id = 14"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title, $p_count)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $title . "</td>\n
				<td>" . $p_count . "</td>\n
				</tr>";
			}
			$query->close();
			?>

		</tbody>
	</table><br>


<h1>Certifications</h1>

<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>Cert ID</td>
			<td>Name</td>
			<td>Position</td>
			<td>Date</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT c.id, first_name, last_name, title, date FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id ORDER BY last_name"))){
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
			<td><a class='btn btn-info' href=\"./delete_certification.php?id=$id\">Delete</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>


<br>
<a class="btn btn-success" href="./new_certification.php">New Certification</a>

</div>
</body>
</html>
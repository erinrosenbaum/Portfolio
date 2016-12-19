<!DOCTYPE html>
<html>
<head>
	<title>Crews</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
<h1>Crews</h1>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT id, name FROM crews"))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $name)){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $id . "</td>\n
			<td>" . $name . "</td>\n
			<td><a class='btn btn-info' href=\"./crew.php?id=$id&name=$name\">View</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>


<h1>Certifications Per Position Crew A</h1>
<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Title</td>
				<td>Crew</td>
				<td>Count</td>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 1"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 2"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 3"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 4"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 5"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 6"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 7"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 8"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 9"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 10"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 11"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 12"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 13"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 1 AND p.id = 14"))){
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


<h1>Certifications Per Position Crew B</h1>
<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Title</td>
				<td>Crew</td>
				<td>Count</td>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 1"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 2"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 3"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 4"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 5"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 6"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 7"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 8"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 9"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 10"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 11"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 12"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 13"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 2 AND p.id = 14"))){
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


<h1>Certifications Per Position Crew C</h1>
<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>Title</td>
				<td>Crew</td>
				<td>Count</td>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 1"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 2"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 3"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 4"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 5"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 6"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 7"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 8"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 9"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 10"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 11"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 12"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, IFNULL(COUNT(p.title),0) as p_count FROM certifications c INNER JOIN employees e on c.employee_id = e.id RIGHT JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 13"))){
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
			if(!($query = $mysqli->prepare("SELECT p.id, p.title, cr.name, COUNT(p.title) FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id INNER JOIN crews cr ON cr.id = e.crew_id WHERE cr.id = 3 AND p.id = 14 GROUP BY p.title"))){
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


<a class="btn btn-success" href="./new_crew.php">New Crew</a><br><br>
<img id="fleet" style="width: 30%" src="../static/crew.jpg">
</div>
</body>
</html>
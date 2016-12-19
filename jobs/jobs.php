<!DOCTYPE html>
<html>
<head>
	<title>Jobs</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
<h1 class="title">Jobs</h1> 
<a class="btn btn-success mybttn" href="./new_job.php">New Job</a><br>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Number</td>
			<td>Map Directions</td>
			<td>Start Date</td>
			<td>Description</td>
			<td>Completed</td>
			<td>Customer</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT j.id, j.name, numb, map_directions, start_date, description, completed, c.name as customer FROM jobs j INNER JOIN customers c ON j.customer_id = c.id"))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $name, $numb, $map_directions, $start_date, $description, $completed, $customer_id)){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $id . "</td>\n
			<td>" . $name . "</td>\n
			<td>" . $numb . "</td>\n
			<td>" . $map_directions . "</td>\n
			<td>" . $start_date . "</td>\n
			<td>" . $description . "</td>\n
			<td>" . $completed . "</td>\n
			<td>" . $customer_id . "</td>\n
			<td><a class='btn btn-info' href=\"./job.php?id=$id&name=$name&numb=$numb\">View</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>




<h1 class="title">Crew - Jobs</h1>
<a class="btn btn-success mybttn" href="./crew_job.php">Assign Job</a><br>
<table class="pure-table pure-table-bordered">
	<thead>
		<tr>
			<td>Job</td>
			<td>Crew</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT cj.id, j.name, j.numb, c.name FROM crew_jobs cj INNER JOIN crews c ON cj.crew_id = c.id INNER JOIN jobs j ON cj.job_id = j.id ORDER BY j.name"))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $jname, $jnumber, $cname)){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $jname . " " . $jnumber . "</td>\n
			<td>" . $cname . "</td>\n
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>



<img id="fleet" src="../static/job.jpg">
</div>
</body>
</html>
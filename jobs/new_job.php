<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["customer_id"])) {
		    $num_error++;
		    $error = "Customer is required";
		  } else {
		    $customer_id = $_POST["customer_id"];
		  }

		if ($num_error == 0){
			$query = "INSERT INTO jobs (name, numb, map_directions, start_date, description, completed, customer_id) VALUES(?,?,?,?,?,?,?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "ssssssi", $_POST['name'], $_POST['numb'], $_POST['map_directions'], $_POST['start_date'], $_POST['description'], $_POST['completed'], $_POST['customer_id']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./jobs.php"));
		}
} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Job</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Job</h2>
	<form action="./new_job.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="name">Name</label>
			<input type="text" name="name" class="pure-control-group">
		</div>
		<div class="pure-control-group">
			<label for="numb">Number</label>
			<input type="text" name="numb" class="pure-control-group">
		</div>
		<div class="pure-control-group">
			<label for="map_directions">Map Directions</label>
			<input type="text" name="map_directions" size="100" class="pure-control-group">
		</div>
		<div class="pure-control-group">
			<label for="start_date">Start Date</label>
			<input type="text" name="start_date" class="pure-control-group">
		</div>
		<div class="pure-control-group">
			<label for="description">Description</label>
			<input type="text" name="description" class="pure-control-group">
		</div>

		<div class="pure-control-group">
			<label for="completed">Completed</label>
			<select name="completed" class="pure-control-group">
				<option value="" selected></option>
				<option value="N">Not Completed</option>
				<option value="Y">Completed</option>
			</select>
		</div>

		<div class="pure-control-group">
			<label for="customer_id">Customer</label>
			<select name="customer_id">
				<option disabled selected value></option>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, name FROM customers"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $name)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while ($query->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . '</option>';
				}
				$query->close();
				?>
			</select>
			<?php echo "<span class='error'>$error</span> "; ?>
		</div>
		<div class="pure-controls">
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Job">
			<a class="btn btn-info" href="jobs.php">Nevermind</a>
		</div>
		</fieldset>
	</form><br>
</div>
</body>
</html>
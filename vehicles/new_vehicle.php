<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["unit_number"])) {
		    $num_error++;
		    $error = "Unit Number is required";
		  } else {
		    $unit_number = $_POST["unit_number"];
		  }
		if ($num_error == 0){
			$query = "INSERT INTO vehicles (unit_number, year, make, model) VALUES(?,?,?,?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "ssss", $_POST['unit_number'], $_POST['year'], $_POST['make'], $_POST['model']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./vehicles.php"));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Vehicle</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Vehicle</h2>
	<form action="./new_vehicle.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="unit_number">Unit Number</label>
			<input type="text" name="unit_number" class="pure-control-group">
			<?php echo "<span class='error'>$error</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="year">Year</label>
			<input type="text" name="year" class="pure-control-group">
		</div>
		<div class="pure-control-group">
			<label for="make">Make</label>
			<input type="text" name="make" class="pure-control-group">
		</div>
		<div class="pure-control-group">
			<label for="model">Model</label>
			<input type="text" name="model" class="pure-control-group">
		</div>
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Vehicle">
			<a class="btn btn-info" href="vehicles.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
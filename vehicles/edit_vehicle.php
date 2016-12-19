<?php
require_once('../mysqli_connect.php');
$error = "";
$num_error = 0;
$id=$_GET['id'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$is_post = 1;
		$unit_number = $_POST['unit_number'];
		$year = $_POST['year'];
		$make = $_POST['make'];
		$model = $_POST['model'];
		$trailer_id = $_POST['trailer_id'];



		if (empty($_POST["unit_number"])) {
		    $num_error++;
		    $error = "Unit number is required";
		  } else {
		    $unit_number = $_POST["unit_number"];
		  }

		if($num_error == 0){

			if ($_POST['trailer_id'] === '') {
				$query = "UPDATE vehicles SET unit_number=?, year=?, make=?, model=?, trailer_id=NULL WHERE id=$id";


			if(!($stmt = $mysqli->prepare($query))){
				echo "Prepare failed: ";
				}
				if (!$stmt) {
				    throw new Exception($mysqli->error, $mysqli->errno);
				}
				if(!($stmt->bind_param("ssss", $unit_number, $year, $make, $model))){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				exit(header("Location: ./vehicles.php"));


			} else {
				$query = "UPDATE vehicles SET unit_number=?, year=?, make=?, model=?, trailer_id=? WHERE id=$id";


				if(!($stmt = $mysqli->prepare($query))){
					echo "Prepare failed: ";
				}
				if (!$stmt) {
				    throw new Exception($mysqli->error, $mysqli->errno);
				}
				if(!($stmt->bind_param("ssssi", $unit_number, $year, $make, $model, $trailer_id))){
					echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
				}
				if(!$stmt->execute()){
					echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
				}
				exit(header("Location: ./vehicles.php"));


			}

		}
	} else {
	$id = $_GET['id'];
	$unit_number = $_GET['unit_number'];
	$year = $_GET['year'];
	$make = $_GET['make'];
	$model = $_GET['model'];
	$trailer_id = $_GET['trailer_id'];
	$is_post = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Vehicle</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
	<div class="container">
	<?php include('../header.php');?>
	<h1>Edit Vehicle</h1>
	<form action="./edit_vehicle.php?id=<?php echo $id;?>" method="POST" class="pure-form pure-form-aligned">
		<fieldset>
			<div class="pure-control-group">
			<label for="unit_number">Unit Number</label>
			<input type="text" name="unit_number" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$unit_number\"";} ?> >
				<?php echo "<span class='error'>$error</span> "; ?>
			</div>
			<div class="pure-control-group">
				<label for="year">Year</label>
				<input type="text" name="year" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$year\"";} ?> >
			</div>
			<div class="pure-control-group">
				<label for="make">Make</label>
				<input type="text" name="make" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$make\"";} ?> >
			</div>
			<div class="pure-control-group">
				<label for="model">Model</label>
				<input type="text" name="model" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$model\"";} ?> >
			</div>


		<div class="pure-control-group">
			<label for="trailer_id">Trailer Unit</label>
			<select name="trailer_id">
			<!-- If the value of the option is NULL, selected option is blank -->
				<?php if($trailer_id == NULL){
				echo '<option value="" selected="selected"></option>';
				}
				?>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, Unit_Number, Description FROM Equipment ORDER BY Unit_Number"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $unit_number, $description)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}

				while ($query->fetch()){
					if($unit_number == $trailer_id){
						echo '<option selected="selected" value=" '. $id . ' "> ' . $description . ' ' . $unit_number . '</option>';
					} else {
						echo '<option value=" '. $id . ' "> ' . $description . ' ' . $unit_number . '</option>';
					}
				}
				$query->close();
				?>
				<option value=''>None</option>
			</select>
		</div>


			<div class="pure-controls">
				<input class="btn btn-success" type="submit" name="update_vehicle" value="Update Vehicle">
				<a class="btn btn-info" href="vehicles.php">Nevermind</a>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>
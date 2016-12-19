<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$name_error = "";
$position_error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["employee_id"])) {
		    $num_error++;
		    $name_error = "Employee is required";
		  } else {
		    $employee_id = $_POST["employee_id"];
		  }
		if (empty($_POST["position_id"])) {
		    $num_error++;
		    $position_error = "Position is required";
		  } else {
		    $position_id = $_POST["position_id"];
		  }
		if ($num_error == 0){
			$query = "INSERT INTO certifications (employee_id, position_id, date) VALUES(?,?, now())";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "ii", $_POST['employee_id'], $_POST['position_id']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./certifications.php"));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Cerification</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Cerification</h2>
	<form action="./new_certification.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="employee_id">Employee</label>
			<select name="employee_id">
				<option disabled selected value></option>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, first_name, last_name FROM employees ORDER BY last_name"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $first_name, $last_name)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while ($query->fetch()){
					echo '<option value=" '. $id . ' "> ' . $first_name . ' ' . $last_name . '</option>';
				}
				$query->close();
				?>
			</select>
			<?php echo "<span class='error'>$name_error</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="position_id">Position</label>
			<select name="position_id">
				<option disabled selected value></option>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, title FROM positions"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $title)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while ($query->fetch()){
					echo '<option value=" '. $id . ' "> ' . $title . '</option>';
				}
				$query->close();
				?>
			</select>
			<?php echo "<span class='error'>$position_error</span> "; ?>
		</div>
		<div>
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Cerification">
			<a class="btn btn-info" href="certifications.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
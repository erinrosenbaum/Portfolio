<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$job_error = "";
$crew_error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["job_id"])) {
		    $num_error++;
		    $job_error = "Job is required";
		  } else {
		    $job_id = $_POST["job_id"];
		  }
		if (empty($_POST["crew_id"])) {
		    $num_error++;
		    $crew_error = "Crew is required";
		  } else {
		    $crew_id = $_POST["crew_id"];
		  }
		if ($num_error == 0){
			$query = "INSERT INTO crew_jobs (job_id, crew_id) VALUES(?,?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "ii", $_POST['job_id'], $_POST['crew_id']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./jobs.php"));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Assign Job</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Assign Job</h2>
	<form action="./crew_job.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="job_id">Job</label>
			<select name="job_id">
				<option disabled selected value></option>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, name, numb FROM jobs ORDER BY name"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $name, $numb)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while ($query->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . ' ' . $numb . '</option>';
				}
				$query->close();
				?>
			</select>
			<?php echo "<span class='error'>$job_error</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="crew_id">Crew</label>
			<select name="crew_id">
				<option disabled selected value></option>
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
					echo '<option value=" '. $id . ' "> ' . $name . '</option>';
				}
				$query->close();
				?>
			</select>
			<?php echo "<span class='error'>$crew_error</span> "; ?>
		</div>
		<div>
			<input class="btn btn-success" type="submit" name="submit_new" value="Assign Crew">
			<a class="btn btn-info" href="jobs.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
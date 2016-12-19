<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$unit_error = $desc_error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["Unit_Number"])) {
		    $num_error++;
		    $unit_error = "Unit number is required";
		  } else {
		    $Unit_Number = $_POST["Unit_Number"];
		  }
		if (empty($_POST["Description"])) {
		    $num_error++;
		    $desc_error = "Description is required";
		  } else {
		    $Description = $_POST["Description"];
		  }
		if ($num_error == 0){
			$query = "INSERT INTO Equipment (Unit_Number, Description) VALUES(?,?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "is", $_POST['Unit_Number'], $_POST['Description']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./all_equipment.php"));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Unit</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Unit</h2>
	<form action="./new_unit.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="Unit_Number">Unit Number</label>
			<input type="text" name="Unit_Number" class="pure-control-group">
			<?php echo "<span class='error'>$unit_error</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="Description">Description</label>
			<input type="text" name="Description" class="pure-control-group">
			<?php echo "<span class='error'>$desc_error</span> "; ?>
		<div class="pure-controls">
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Unit">
			<a class="btn btn-info" href="all_equipment.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
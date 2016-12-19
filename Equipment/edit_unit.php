<?php
require_once('../mysqli_connect.php');
$unit_error = $desc_error = "";
$num_error = 0;
$id=$_GET['id'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$is_post = 1;
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
		if($num_error == 0){
			$query = "UPDATE Equipment SET Unit_Number=?, Description=? WHERE id=$id";
			if(!($stmt = $mysqli->prepare($query))){
				echo "Prepare failed: ";
			}
			if (!$stmt) {
			    throw new Exception($mysqli->error, $mysqli->errno);
			}
			if(!($stmt->bind_param("is", $Unit_Number, $Description))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			}
			exit(header("Location: ./all_equipment.php"));
		}
	} else {
	$id = $_GET['id'];
	$Unit_Number = $_GET['Unit_Number'];
	$Description = $_GET['Description'];
	$is_post = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Unit</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
	<div class="container">
	<?php include('../header.php');?>
	<h1>Edit Unit</h1>
	<form action="./edit_unit.php?id=<?php echo $id;?>" method="POST" class="pure-form pure-form-aligned">
		<fieldset>
			<div class="pure-control-group">
			<label for="Unit_Number">Unit Number</label>
			<input type="text" name="Unit_Number" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$Unit_Number\"";} ?> >
				<?php echo "<span class='error'>$unit_error</span> "; ?>
			</div>
			<div class="pure-control-group">
				<label for="Description">Description</label>
				<input type="text" name="Description" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$Description\"";} ?> >
				<?php echo "<span class='error'>$desc_error</span> "; ?>
			</div>
			<div class="pure-controls">
				<input class="btn btn-success" type="submit" name="update_unit" value="Update Unit">
				<a class="btn btn-info" href="all_equipment.php">Nevermind</a>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>
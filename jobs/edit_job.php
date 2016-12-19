<?php
require_once('../mysqli_connect.php');
$error = "";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$is_post = 1;
	$num_error = 0;

	$id = $_GET['id'];
	$name = $_POST['name'];
	$numb = $_POST['numb'];
	$map_directions = $_POST['map_directions'];
	$start_date = $_POST['start_date'];
	$description = $_POST['description'];
	$completed = $_POST['completed'];

	if($num_error == 0){
		$query = "UPDATE jobs SET name=?, numb=?, map_directions=?, start_date=?, description=?, completed=? WHERE id=$id";
		if(!($stmt = $mysqli->prepare($query))){
			echo "Prepare failed: ";
		}
		if (!$stmt) {
		    throw new Exception($mysqli->error, $mysqli->errno);
		}
		if(!($stmt->bind_param("ssssss", $name, $numb, $map_directions, $start_date, $description, $completed))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		exit(header("Location: ./jobs.php"));
	}

} else {
	$name = $_GET['name'];
	$numb = $_GET['numb'];
	$map_directions = $_GET['map_directions'];
	$start_date = $_GET['start_date'];
	$description = $_GET['description'];
	$completed = $_GET['completed'];
	$customer_id = $_GET['customer_id'];
	$is_post = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Job Info</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
	<div class="container">
	<?php include('../header.php');?>
	<h1>Edit Job Info</h1>
	<form action="./edit_job.php?id=<?php echo $id;?>" method="POST" class="pure-form pure-form-aligned">
		<fieldset>
			<div class="pure-control-group">
			<label for="name">Name</label>
			<input type="text" name="name" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$name\"";} ?> >
			</div>
			<div class="pure-control-group">
				<label for="numb">Number</label>
				<input type="text" name="numb" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$numb\"";} ?> >
			</div>
			<div class="pure-control-group">
				<label for="map_directions">Map Directions</label>
				<input type="text" name="map_directions" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$map_directions\"";} ?>>
			</div>
			<div class="pure-control-group">
				<label for="start_date">Start Date</label>
				<input type="text" name="start_date" class="pure-control-group" <?php if($is_post==0) echo "value=\"$start_date\""; ?>>
			</div>
			<div class="pure-control-group">
				<label for="description">Description</label>
				<input type="text" name="description" class="pure-control-group" <?php if($is_post==0) echo "value=\"$description\""; ?>>
			</div>

			<div class="pure-control-group">
				<label for="completed">Completed</label>
				<select name="completed" class="pure-control-group">
					<option value="N"<?php if($completed == "N"): ?> selected="selected"<?php endif; ?>>Not completed</option>
					<option value="Y"<?php if($completed == "Y"): ?> selected="selected"<?php endif; ?>>Completed</option>
				</select>
			</div>

			<div class="pure-controls">
				<input class="btn btn-success" type="submit" name="update_job" value="Update Job">
				<a class="btn btn-info" href="jobs.php">Nevermind</a>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>
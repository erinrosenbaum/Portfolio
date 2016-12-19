<?php
require_once('../mysqli_connect.php');
$error = $desc_error = "";
$num_error = 0;
$id=$_GET['id'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$is_post = 1;
		if (empty($_POST["name"])) {
		    $num_error++;
		    $error = "Name is required";
		  } else {
		    $name = $_POST["name"];
		  }
		if($num_error == 0){
			$query = "UPDATE crews SET name=? WHERE id=$id";
			if(!($stmt = $mysqli->prepare($query))){
				echo "Prepare failed: ";
			}
			if (!$stmt) {
			    throw new Exception($mysqli->error, $mysqli->errno);
			}
			if(!($stmt->bind_param("s", $name))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			}
			exit(header("Location: ./crews.php"));
		}
	} else {
	$id = $_GET['id'];
	$name = $_GET['name'];
	$is_post = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Crew</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
	<div class="container">
	<?php include('../header.php');?>
	<h1>Edit Crew</h1>
	<form action="./edit_crew.php?id=<?php echo $id;?>" method="POST" class="pure-form pure-form-aligned">
		<fieldset>
			<div class="pure-control-group">
				<label for="name">Title</label>
				<input type="text" name="name" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$name\"";} ?> >
				<?php echo "<span class='error'>$error</span> "; ?>
			</div>
			<div class="pure-controls">
				<input class="btn btn-success" type="submit" name="update_crew" value="Update Crew">
				<a class="btn btn-info" href="crews.php">Nevermind</a>
			</div>
		</fieldset>
	</form>
</div>
</body>
</html>
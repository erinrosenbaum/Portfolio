<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])) {
		    $num_error++;
		    $error = "Name is required";
		  } else {
		    $name = $_POST["name"];
		  }
		if ($num_error == 0){
			$query = "INSERT INTO crews (name) VALUES(?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "s", $_POST['name']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./crews.php"));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Crew</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Crew</h2>
	<form action="./new_crew.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="name">Name</label>
			<input type="text" name="name" class="pure-control-group">
			<?php echo "<span class='error'>$error</span> "; ?>
		</div>
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Crew">
			<a class="btn btn-info" href="crews.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
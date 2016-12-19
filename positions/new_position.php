<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$error = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["title"])) {
		    $num_error++;
		    $error = "Title is required";
		  } else {
		    $title = $_POST["title"];
		  }
		if ($num_error == 0){
			$query = "INSERT INTO positions (title) VALUES(?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "s", $_POST['title']);
			mysqli_stmt_execute($stmt);
			exit(header("Location: ./positions.php"));
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Position</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Position</h2>
	<form action="./new_position.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="title">Title</label>
			<input type="text" name="title" class="pure-control-group">
			<?php echo "<span class='error'>$error</span> "; ?>
		</div>
		<div>
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Position">
			<a class="btn btn-info" href="positions.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
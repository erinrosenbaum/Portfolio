<?php
$id = $_GET['id'];
require_once('../mysqli_connect.php');
if($_POST && isset($_POST['confirm_delete'])){
	$query = "DELETE FROM jobs WHERE id = $id";
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: ";
	}
	if(!$stmt){
		throw new Exception($mysqli->error, $mysqli->errno);
	}
	if(!$stmt->execute()){
		echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
	}
	exit(header("Location: ./jobs.php"));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Job</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Job:  " . $_GET['name'] . ' '. $_GET['numb'] . "</h1>";?>

	<?php require_once('../mysqli_connect.php');?>
	<?php
	if(!($query = $mysqli->prepare("SELECT id, name, numb, map_directions, start_date, description, completed, customer_id FROM jobs WHERE id=$id"))){
		echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$query->execute()){
		echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$query->bind_result($id, $name, $numb, $map_directions, $start_date, $description, $completed, $customer_id)){
		echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while ($query->fetch()){
		echo "<h4 class=\"ilb\">ID:</h4><p class=\"ilb\"> " . $id . "</p><br>\n
		<h4 class=\"ilb\">Name:</h4><p class=\"ilb\"> " . $name . "</p><br>\n
		<h4 class=\"ilb\">Number:</h4><p class=\"ilb\"> " . $numb . "</p><br>\n
		<h4 class=\"ilb\">Directions:</h4><p class=\"ilb\"> " . $map_directions . "</p><br>\n
		<h4 class=\"ilb\">Start Date:</h4><p class=\"ilb\"> " . $start_date . "</p><br>\n
		<h4 class=\"ilb\">Description:</h4><p class=\"ilb\"> " . $description . "</p><br>\n
		<h4 class=\"ilb\">Completed:</h4><p class=\"ilb\"> " . $completed . "</p><br>\n
		<h4 class=\"ilb\">Customer:</h4><p class=\"ilb\"> " . $customer_id . "</p><br>\n
		<br>";
	}
	$query->close();
	?>
	<h2>Confirm Delete</h2>
	<form method="POST" action="./delete_job.php?id=<?php echo $id ?> ">
		<input class="btn btn-warning" type="submit" name="confirm_delete" value="Delete Job">
		<a class="btn btn-info" href="./jobs.php">Nevermind</a>
	</form>

</div>
</body>
</html>
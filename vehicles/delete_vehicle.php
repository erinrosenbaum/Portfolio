<?php
$id = $_GET['id'];
require_once('../mysqli_connect.php');
if($_POST && isset($_POST['confirm_delete'])){
	$query = "DELETE FROM vehicles WHERE id = $id";
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: ";
	}
	if(!$stmt){
		throw new Exception($mysqli->error, $mysqli->errno);
	}
	if(!$stmt->execute()){
		echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
	}
	exit(header("Location: ./vehicles.php"));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Vehicle</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Vehicle:  " . $_GET['unit_number'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Unit Number</td>
				<td>Year</td>
				<td>Make</td>
				<td>Model</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT id, unit_number, year, make, model FROM vehicles WHERE id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $unit_number, $year, $make, $model)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $unit_number . "</td>\n
				<td>" . $year . "</td>\n
				<td>" . $make . "</td>\n
				<td>" . $model . "</td>\n
				</tr></tbody></table><br>";
			}
			$query->close();
	?>
	<h2>Confirm Delete</h2>
	<form method="POST" action="./delete_vehicle.php?id=<?php echo $id ?> ">
		<input class="btn btn-warning" type="submit" name="confirm_delete" value="Delete Vehicle">
		<a class="btn btn-info" href="./vehicles.php">Nevermind</a>
	</form>
</div>
</body>
</html>
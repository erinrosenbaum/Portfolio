<?php
$id = $_GET['id'];
require_once('../mysqli_connect.php');
if($_POST && isset($_POST['confirm_delete'])){
	$query = "DELETE FROM Equipment WHERE id = $id";
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: ";
	}
	if(!$stmt){
		throw new Exception($mysqli->error, $mysqli->errno);
	}
	if(!$stmt->execute()){
		echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
	}
	exit(header("Location: ./all_equipment.php"));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Unit</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Unit:  " . $_GET['Description'] . " " . $_GET['Unit_Number'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Unit Number</td>
				<td>Description</td>
				<td>Action</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT id, Unit_Number, Description FROM Equipment WHERE id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $Unit_Number, $Description)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $Unit_Number . "</td>\n
				<td>" . $Description . "</td>\n
				<td><a class='btn btn-info' href=\"./cust_jobs.php?id=$id\">Jobs</a></td>\n
				</tr></tbody></table><br>";
			}
			$query->close();
	?>
	<h2>Confirm Delete</h2>
	<form method="POST" action="./delete_unit.php?id=<?php echo $id ?> ">
		<input class="btn btn-warning" type="submit" name="confirm_delete" value="Delete Unit">
		<a class="btn btn-info" href="./all_equipment.php">Nevermind</a>
	</form>

</div>
</body>
</html>
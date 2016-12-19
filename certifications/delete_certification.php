<?php
$id = $_GET['id'];
require_once('../mysqli_connect.php');
if($_POST && isset($_POST['confirm_delete'])){
	$query = "DELETE FROM certifications WHERE id = $id";
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: ";
	}
	if(!$stmt){
		throw new Exception($mysqli->error, $mysqli->errno);
	}
	if(!$stmt->execute()){
		echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
	}
	exit(header("Location: ./certifications.php"));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Certification</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Certification:  " . $_GET['id'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Position</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!($query = $mysqli->prepare("SELECT c.id, first_name, last_name, title, date FROM certifications c INNER JOIN employees e on c.employee_id = e.id INNER JOIN positions p ON c.position_id = p.id WHERE c.id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $first_name, $last_name, $title, $date)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $first_name . "</td>\n
				<td>" . $last_name . "</td>\n
				<td>" . $title . "</td>\n
				<td>" . $date . "</td>\n
				</tr></tbody></table><br>";
			}
			$query->close();
	?>
	<h2>Confirm Delete</h2>
	<form method="POST" action="./delete_certification.php?id=<?php echo $id ?> ">
		<input class="btn btn-warning" type="submit" name="confirm_delete" value="Delete Certification">
		<a class="btn btn-info" href="./certifications.php">Nevermind</a>
	</form>
</div>
</body>
</html>
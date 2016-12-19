<?php
require_once('../mysqli_connect.php');
if($_POST && isset($_POST['confirm_delete'])){
	$id = $_GET['id'];
	$query = "DELETE FROM employees WHERE id = $id";
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: ";
	}
	if(!$stmt){
		throw new Exception($mysqli->error, $mysqli->errno);
	}
	if(!$stmt->execute()){
		echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
	}
	exit(header("Location: ./employees.php"));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Employee</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');
	$first_name = $_GET['first_name'];
	$last_name = $_GET['last_name'];
?>
	<?php echo "<h1>Employee:  " . $_GET['last_name'] . ", " . $_GET['first_name'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>First Name</td>
				<td>Last Name</td>
				<td>Email</td>
				<td>Phone</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$employee_id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT id, first_name, last_name, email, phone FROM employees WHERE id = $employee_id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $first_name, $last_name, $email, $phone)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $first_name . "</td>\n
				<td>" . $last_name . "</td>\n
				<td>" . $email . "</td>\n
				<td>" . $phone . "</td>\n
				</tr>";
			}
			$query->close();
			?>		
		</tbody>
	</table>
	<br>	
	<h2>Confirm Delete</h2>
	<form method="POST" action="./delete_employee.php?id=<?php echo $_GET['id'];?>">
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
		<input class="btn btn-warning" type="submit" name="confirm_delete" value="Delete Employee">
		<a class="btn btn-info" href="./employee.php?id=<?php echo $id .'&first_name=' . $first_name . '&last_name=' . $last_name ?>">Nevermind</a>
	</form>
</div>
</body>
</html>
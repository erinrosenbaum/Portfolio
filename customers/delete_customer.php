<?php
$id = $_GET['id'];
require_once('../mysqli_connect.php');
if($_POST && isset($_POST['confirm_delete'])){
	$query = "DELETE FROM customers WHERE id = $id";
	if(!($stmt = $mysqli->prepare($query))){
		echo "Prepare failed: ";
	}
	if(!$stmt){
		throw new Exception($mysqli->error, $mysqli->errno);
	}
	if(!$stmt->execute()){
		echo "Execute failed: " . $stmt->errno . " " . $stmt->error;
	}
	exit(header("Location: ./customers.php"));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Customer:  " . $_GET['name'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
				<td>Phone</td>
				<td>Contact Person</td>
				<td>Email</td>
				<td>Street</td>
				<td>City</td>
				<td>State</td>
				<td>Zip</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT name, phone, contact_person, email, street, city, state, zip FROM customers WHERE id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($name, $phone, $contact_person, $email, $street, $city, $state, $zip)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $name . "</td>\n
				<td>" . $phone . "</td>\n
				<td>" . $contact_person . "</td>\n
				<td>" . $email . "</td>\n
				<td>" . $street . "</td>\n
				<td>" . $city . "</td>\n
				<td>" . $state . "</td>\n
				<td>" . $zip . "</td>\n 
				</tr>";
			}
			$query->close();
			?>		
		</tbody>
	</table>
	<br>	
	<h2>Confirm Delete</h2>
	<form method="POST" action="./delete_customer.php?id=<?php echo $id.'&name='.$name ?> ">
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
		<input class="btn btn-warning" type="submit" name="confirm_delete" value="Delete Customer">
		<a class="btn btn-info" href="./customer.php?id=<?php echo $id.'&name='.$name ?>">Nevermind</a>
	</form>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Customers</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
<h1 class="title">Customers</h1>
<a class="btn btn-success mybttn" href="./new_customer.php">New Customer</a><br>
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
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php require_once('../mysqli_connect.php');?>
		<?php
		if(!($query = $mysqli->prepare("SELECT id, name, phone, contact_person, email, street, city, state, zip FROM customers"))){
			echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->execute()){
			echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		if(!$query->bind_result($id, $name, $phone, $contact_person, $email, $street, $city, $state, $zip)){
			echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
		}
		while ($query->fetch()){
			echo "<tr>\n<td>" . $id . "</td>\n
			<td>" . $name . "</td>\n
			<td>" . $phone . "</td>\n
			<td>" . $contact_person . "</td>\n
			<td>" . $email . "</td>\n
			<td><div class='fixed_cell'>" . $street . "</div></td>\n
			<td>" . $city . "</td>\n
			<td>" . $state . "</td>\n
			<td>" . $zip . "</td>\n
			<td><a class='btn btn-info' href=\"./customer.php?id=$id&name=$name\">View</a></td>\n 
			</tr>";
		}
		$query->close();
		?>
	</tbody>
</table>
<br>

<img style="width: 50%" src="../static/coil.jpg">
</div>
</body>
</html>
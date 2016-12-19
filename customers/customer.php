<?php require_once('../mysqli_connect.php'); $name=$_GET['id'];?>
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
				<td>Action</td>
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
				<td><a class='btn btn-info' href=\"./cust_jobs.php?id=$id&name=$name\">Jobs</a></td>\n
				</tr></tbody></table><br><a class='btn btn-info' href=\"./edit_customer.php?id=$id&name=$name&phone=$phone&contact_person=$contact_person&email=$email&street=$street&city=$city&state=$state&zip=$zip\">Edit</a>  <a class='btn btn-info' href=\"./delete_customer.php?id=$id&name=$name\">Delete</a>  <a class='btn btn-info' href=\"./customers.php\">Go Back</a>";
			}
			$query->close();
			?>		

</div>
</body>
</html>
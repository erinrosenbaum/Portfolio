<?php
require_once('../mysqli_connect.php');
$err_name = $err_ph = "";
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$is_post = 1;
	$num_error = 0;

  if (empty($_POST["name"])) {
  	$name_err = 1;
    $num_error++;
    $err_name = "Company name is required";
  } else {
  	$name_err = -1;
    $name = $_POST["name"];
  }
  if (empty($_POST["phone"])) {
  	$ph_err = 1;
  	$num_error++;
    $err_ph = "Phone number is required";
  } else {
  	$ph_err = -1;
    $phone = $_POST["phone"];
  }

	$id = $_GET['id'];
	$contact_person = $_POST['contact_person'];
	$email = $_POST['email'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];

	if($num_error == 0){
		$query = "UPDATE customers SET name=?, phone=?, contact_person=?, email=?, street=?, city=?, state=?, zip=? WHERE id=$id";
		if(!($stmt = $mysqli->prepare($query))){
			echo "Prepare failed: ";
		}
		if (!$stmt) {
		    throw new Exception($mysqli->error, $mysqli->errno);
		}
		if(!($stmt->bind_param("sssssssi", $name, $phone, $contact_person, $email, $street, $city, $state, $zip))){
			echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
		}
		if(!$stmt->execute()){
			echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
		}
		exit(header("Location: ./customers.php"));
	}
} else {
	$name = $_GET['name'];
	$phone = $_GET['phone'];
	$contact_person = $_GET['contact_person'];
	$email = $_GET['email'];
	$street = $_GET['street'];
	$city = $_GET['city'];
	$state = $_GET['state'];
	$zip = $_GET['zip'];
	$is_post = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Customer Info</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
	<div class="container">
	<?php include('../header.php');?>
	<h1>Edit Customer Info</h1>
	<form action="./edit_customer.php?id=<?php echo $id;?>" method="POST" class="pure-form pure-form-aligned">
	<fieldset>
			<div class="pure-control-group">
			<label for="first_name">Name</label>
			<input type="text" name="name" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$name\"";} ?> >
			<?php echo "<span class='error'>$err_name</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="phone">Phone</label>
			<input type="text" name="phone" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$phone\"";} ?> >
			<?php echo "<span class='error'>$err_ph</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="contact_person">Contact Person</label>
			<input type="text" name="contact_person" class="pure-control-group" <?php if($is_post==0) {echo "value=\"$contact_person\"";} ?>>
		</div>
		<div class="pure-control-group">
			<label for="email">email</label>
			<input type="text" name="email" class="pure-control-group" <?php if($is_post==0) echo "value=\"$email\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="street">Street</label>
			<input type="text" name="street" class="pure-control-group" <?php if($is_post==0) echo "value=\"$street\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="city">city</label>
			<input type="text" name="city" class="pure-control-group" <?php if($is_post==0) echo "value=\"$city\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="state">State</label>
			<input type="text" name="state" class="pure-control-group" <?php if($is_post==0) echo "value=\"$state\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="zip">zip</label>
			<input type="text" name="zip" class="pure-control-group" <?php if($is_post==0) echo "value=\"$zip\""; ?>>
		</div>
		<div class="pure-controls">
			<input class="btn btn-success" type="submit" name="update_cust" value="Update Customer">
			<a class="btn btn-info" href="customers.php">Nevermind</a>
		</div>
	</fieldset>
</form>
</div>
</body>
</html>

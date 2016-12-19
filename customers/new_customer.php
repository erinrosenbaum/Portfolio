<?php
require_once('../mysqli_connect.php');
$contact_person=$email=$street=$city=$state=$zip = "";
$num_error = 0;
$err_name = $err_ph = $err_ph = "";
$name_err = $ph_err = 0;
if($_POST && isset($_POST['submit_new'], $_POST['name'], $_POST['phone'], $_POST['contact_person'], $_POST['email'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip'])) {

	$name = $_POST['name'];
	$phone = $_POST['phone'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
	  if(!empty($_POST["contact_person"])) {$contact_person = $_POST["contact_person"];}
	  if(!empty($_POST["email"])) {$email = $_POST["email"];}
	  if(!empty($_POST["street"])) {$street = $_POST["street"];}
	  if(!empty($_POST["city"])) {$city = $_POST["city"];}
	  if(!empty($_POST["state"])) {$state = $_POST["state"];}
	  if(!empty($_POST["zip"])) {$zip = $_POST["zip"];}
	  if ($num_error == 0) {
			$query = "INSERT INTO customers (name, phone, contact_person, email, street, city, state, zip) VALUES(?,?,?,?,?,?,?,?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "sssssssi", $_POST['name'], $_POST['phone'], $_POST['contact_person'], $_POST['email'], $_POST['street'], $_POST['city'], $_POST['state'], $_POST['zip']);
			mysqli_stmt_execute($stmt);
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			if($affected_rows == 1){
			    // create flash success msg
			    mysqli_stmt_close($stmt);
			    mysqli_close($mysqli);
			}else{
			echo 'Error Occurred<br />';
			    echo mysqli_error();
			    mysqli_stmt_close($stmt);
			    mysqli_close($mysqli);
			}
			exit(header("Location: ./customers.php"));
	  }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Customer</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Customer</h2>
	<form action="./new_customer.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="first_name">Name</label>
			<input type="text" name="name" class="pure-control-group" <?php if($name_err==-1){echo "value=\"$name\"";} ?> >
			<?php echo "<span class='error'>$err_name</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="phone">Phone</label>
			<input type="text" name="phone" class="pure-control-group" <?php if($ph_err==-1){echo "value=\"$phone\"";} ?> >
			<?php echo "<span class='error'>$err_ph</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="contact_person">Contact Person</label>
			<input type="text" name="contact_person" class="pure-control-group" <?php echo "value=\"$contact_person\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="pure-control-group" <?php echo "value=\"$email\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="phone">Street</label>
			<input type="text" name="street" class="pure-control-group" <?php echo "value=\"$street\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="city">City</label>
			<input type="text" name="city" class="pure-control-group" <?php echo "value=\"$city\""; ?>>
		</div>
		<div class="pure-control-group">
			<label for="state">State</label>
			<select class="pure-control-group" name="state">
				<option value="" selected></option>
				<option value="AL">AL</option>
				<option value="AK">AK</option>
				<option value="AZ">AZ</option>
				<option value="AR">AR</option>
				<option value="CA">CA</option>
				<option value="CO">CO</option>
				<option value="CT">CT</option>
				<option value="DE">DE</option>
				<option value="DC">DC</option>
				<option value="FL">FL</option>
				<option value="GA">GA</option>
				<option value="HI">HI</option>
				<option value="ID">ID</option>
				<option value="IL">IL</option>
				<option value="IN">IN</option>
				<option value="IA">IA</option>
				<option value="KS">KS</option>
				<option value="KY">KY</option>
				<option value="LA">LA</option>
				<option value="ME">ME</option>
				<option value="MD">MD</option>
				<option value="MA">MA</option>
				<option value="MI">MI</option>
				<option value="MN">MN</option>
				<option value="MS">MS</option>
				<option value="MO">MO</option>
				<option value="MT">MT</option>
				<option value="NE">NE</option>
				<option value="NV">NV</option>
				<option value="NH">NH</option>
				<option value="NJ">NJ</option>
				<option value="NM">NM</option>
				<option value="NY">NY</option>
				<option value="NC">NC</option>
				<option value="ND">ND</option>
				<option value="OH">OH</option>
				<option value="OK">OK</option>
				<option value="OR">OR</option>
				<option value="PA">PA</option>
				<option value="RI">RI</option>
				<option value="SC">SC</option>
				<option value="SD">SD</option>
				<option value="TN">TN</option>
				<option value="TX">TX</option>
				<option value="UT">UT</option>
				<option value="VT">VT</option>
				<option value="VA">VA</option>
				<option value="WA">WA</option>
				<option value="WV">WV</option>
				<option value="WI">WI</option>
				<option value="WY">WY</option>
			</select>
		</div>

		<div class="pure-control-group">
			<label for="zip">Zip</label>
			<input type="text" name="zip" class="pure-control-group" <?php echo "value=\"$zip\""; ?>>
		</div>
		<div class="pure-controls">
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Customer">
			<a class="btn btn-info" href="customers.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
</div>
</body>
</html>
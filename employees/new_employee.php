<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$err_fname = $err_lname = $err_email = $err_ph = "";
$fname_err = $lname_err = $email_err = $ph_err = 0;
if($_POST && isset($_POST['submit_new'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'])) {

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["first_name"])) {
	  	$fname_err = 1;
	    $num_error++;
	    $err_fname = "First name is required";
	  } else {
	  	$fname_err = -1;
	    $first_name = $_POST["first_name"];
	  }
	  if (empty($_POST["last_name"])) {
	  	$lname_err = 1;
	  	$num_error++;
	    $err_lname = "Last name is required";
	  } else {
	  	$lname_err = -1;
	    $last_name = $_POST["last_name"];
	  }
	  if (empty($_POST["email"])) {
	  	$email_err = 1;
	  	$num_error++;
	    $err_email = "Email is required";
	  } else {
	  	$email_err = -1;
	    $email = $_POST["email"];
	  }
	  if (empty($_POST["phone"])) {
	  	$ph_err = 1;
	  	$num_error++;
	    $err_ph = "Phone number is required";
	  } else {
	  	$ph_err = -1;
	    $phone = $_POST["phone"];
	  }
	  if ($num_error == 0) {
			$query = "INSERT INTO employees (first_name, last_name, email, phone, crew_id, position_id) VALUES(?,?,?,?,?,?)";
			$stmt = mysqli_prepare($mysqli, $query);
			mysqli_stmt_bind_param($stmt, "ssssii", $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['crew_id'], $_POST['position_id']);
			mysqli_stmt_execute($stmt);
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			if($affected_rows == 1){
			    // create flash success msg
			    mysqli_stmt_close($stmt);
			    mysqli_close($mysqli);
			}else{
			// echo 'Error Occurred<br />';
			// create failure msg 
			    // echo mysqli_error();
			    mysqli_stmt_close($stmt);
			    mysqli_close($mysqli);
			}
			exit(header("Location: ./employees.php"));
	  }
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Employee</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('../header.php');?>
	<h2>Enter New Employee</h2>
	<form action="./new_employee.php" method="POST" class="pure-form pure-form-aligned">
	    <fieldset>
		<div class="pure-control-group">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" class="pure-control-group" <?php if($fname_err==-1){echo "value=\"$first_name\"";} ?> >
			<?php echo "<span class='error'>$err_fname</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" class="pure-control-group" <?php if($lname_err==-1){echo "value=\"$last_name\"";} ?> >
			<?php echo "<span class='error'>$err_lname</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="pure-control-group" <?php if($email_err==-1){echo "value=\"$email\"";} ?>>
			<?php echo "<span class='error'>$err_email</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="phone">Phone</label>
			<input type="text" name="phone" class="pure-control-group" <?php if($ph_err==-1){echo "value=\"$phone\"";} ?>>
			<?php echo "<span class='error'>$err_ph</span> "; ?>
		</div>


		<div class="pure-control-group">
			<label for="crew_id">Crew</label>
			<select name="crew_id">
				<option disabled selected value></option>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, name FROM crews"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $name)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while ($query->fetch()){
					echo '<option value=" '. $id . ' "> ' . $name . '</option>';
				}
				$query->close();
				?>
			</select>
		</div>


		<div class="pure-control-group">
			<label for="position_id">Position</label>
			<select name="position_id">
				<option disabled selected value></option>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, title FROM positions"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $title)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				while ($query->fetch()){
					echo '<option value=" '. $id . ' "> ' . $title . '</option>';
				}
				$query->close();
				?>
			</select>
		</div>




		<div class="pure-controls">
			<input class="btn btn-success" type="submit" name="submit_new" value="Create Employee">
			<a class="btn btn-info" href="employees.php">Nevermind</a>
		</div>
		</fieldset>
	</form>
	<img id="fleet" src="../static/gibson.jpg">
</div>
</body>
</html>
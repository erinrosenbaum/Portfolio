<?php
require_once('../mysqli_connect.php');
$num_error = 0;
$err_fname = $err_lname = $err_email = $err_ph = "";
$fname_err = $lname_err = $email_err = $ph_err = 0;
if($_POST && isset($_POST['submit_edit'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'])) {

	$id = $_GET['id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$crew_id = $_POST['crew_id'];
	$position_id = $_POST['position_id'];
	$truck_id = $_POST['truck_id'];

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

	  	if ($_POST['truck_id'] === ''){
		  	$query = "UPDATE employees SET first_name=?, last_name=?, email=?, phone=?, crew_id=?, position_id=?, truck_id=NULL WHERE id=$id";
			if(!($stmt = $mysqli->prepare($query))){
				echo "Prepare failed: ";
			}
			if (!$stmt) {
			    throw new Exception($mysqli->error, $mysqli->errno);
			}
			if(!($stmt->bind_param("ssssii", $first_name, $last_name, $email, $phone, $crew_id, $position_id))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				// echo "Added " . $stmt->affected_rows . " rows to bsg_people.";
			}
			exit(header("Location: ./employees.php"));
	  	} else {
		  	$query = "UPDATE employees SET first_name=?, last_name=?, email=?, phone=?, crew_id=?, position_id=?, truck_id=? WHERE id=$id";
			if(!($stmt = $mysqli->prepare($query))){
				echo "Prepare failed: ";
			}
			if (!$stmt) {
			    throw new Exception($mysqli->error, $mysqli->errno);
			}
			if(!($stmt->bind_param("ssssiii", $first_name, $last_name, $email, $phone, $crew_id, $position_id, $truck_id))){
				echo "Bind failed: "  . $stmt->errno . " " . $stmt->error;
			}
			if(!$stmt->execute()){
				echo "Execute failed: "  . $stmt->errno . " " . $stmt->error;
			} else {
				// echo "Added " . $stmt->affected_rows . " rows to bsg_people.";
			}
			exit(header("Location: ./employees.php"));
		  }
	  }
	} 
} else {
		$first_name = $_GET['first_name'];
		$last_name = $_GET['last_name'];
		$email = $_GET['email'];
		$phone = $_GET['phone'];
		$crew_id = $_GET['crew_id'];
		$position_id = $_GET['position_id'];
		$truck_id = $_GET['truck_id'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee Info</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
	<div class="container">
	<?php include('../header.php');?>
	<h1>Edit Employee Info</h1>
	<form action="./edit_employee.php?id=<?php echo $_GET['id'];?>" method="POST" class="pure-form pure-form-aligned">
	<fieldset>
		<div class="pure-control-group">
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" class="pure-control-group" <?php if($fname_err!=1){echo "value=\"$first_name\"";} ?> >
			<?php echo "<span class='error'>$err_fname</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="last_name">Last Name</label>
			<input type="text" name="last_name" class="pure-control-group" <?php if($lname_err!=1){echo "value=\"$last_name\"";} ?> >
			<?php echo "<span class='error'>$err_lname</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="pure-control-group" <?php if($email_err!=1){echo "value=\"$email\"";} ?>>
			<?php echo "<span class='error'>$err_email</span> "; ?>
		</div>
		<div class="pure-control-group">
			<label for="phone">Phone</label>
			<input type="text" name="phone" class="pure-control-group" <?php if($ph_err!=1){echo "value=\"$phone\"";} ?>>
			<?php echo "<span class='error'>$err_ph</span> "; ?>
		</div>


		<div class="pure-control-group">
			<label for="crew_id">Crew</label>
			<select name="crew_id">

				<?php if($crew_id == NULL){
				echo '<option value="" selected="selected"></option>';
				}
				?>

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
					if($name == $crew_id){
						echo '<option selected="selected" value=" '. $id . ' "> ' . $name . '</option>';
					} else {
						echo '<option value=" '. $id . ' "> ' . $name . '</option>';
					}
				}
				$query->close();
				?>
			</select>
		</div>


		<div class="pure-control-group">
			<label for="position_id">Position</label>
			<select name="position_id">

			<!-- If the value of the option is NULL, selected option is blank -->
				<?php if($position_id == NULL){
				echo '<option value="" selected="selected"></option>';
				}
				?>
				<?php
				if(!($query = $mysqli->prepare("SELECT id, title FROM positions"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($pid, $title)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}

				while ($query->fetch()){
					if($title == $position_id){
						echo '<option selected="selected" value=" '. $pid . ' "> ' . $title . '</option>';
					} else {
						echo '<option value=" '. $pid . ' "> ' . $title . '</option>';
					}
				}
				$query->close();
				?>
			</select>
		</div>

		<div class="pure-control-group">
			<label for="truck_id">Vehicle</label>
			<select name="truck_id">
			<!-- If the value of the option is NULL, selected option is blank -->
				<?php if($truck_id == NULL){
				echo '<option value="" selected="selected"></option>';
				}
				?>
				<?php
				if(!($query = $mysqli->prepare("SELECT v.id, v.unit_number, e.Description, e.Unit_Number FROM vehicles v LEFT JOIN Equipment e ON v.trailer_id = e.id ORDER BY v.unit_number * 1 ASC"))){
					echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->execute()){
					echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}
				if(!$query->bind_result($id, $unit_number, $Description, $Unit_Number)){
					echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
				}

				while ($query->fetch()){
					if($unit_number == $truck_id){
						echo '<option selected="selected" value=" '. $id . ' "> ' . $unit_number . ' ' . $Description . ' ' . $Unit_Number . '</option>';
					} else {
						echo '<option value=" '. $id . ' "> ' . $unit_number . ' ' . $Description . ' ' . $Unit_Number . '</option>';
					}
				}
				$query->close();
				?>
				<option value=''>None</option>
			</select>
		</div>

		<div class="pure-controls">
			<input class="btn btn-success" type="submit" name="submit_edit" value="Submit">
			<a class="btn btn-info" href="./employee.php?id=<?php echo $id .'&first_name=' . $first_name . '&last_name=' . $last_name ?>">Nevermind</a>
		</div>
	</fieldset>
</form>

</div>
</body>
</html>
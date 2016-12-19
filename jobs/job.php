<?php require_once('../mysqli_connect.php');
$name=$_GET['name'];
$num=$_GET['numb'];
$id=$_GET['id'];?>
<!DOCTYPE html>
<html>
<head>
	<title>Job</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Job:  " . $_GET['name'] . ' '. $_GET['numb'] . "</h1>";?>

	<?php require_once('../mysqli_connect.php');?>
	<?php
	if(!($query = $mysqli->prepare("SELECT j.id, j.name, numb, map_directions, start_date, description, completed, c.name as customer FROM jobs j INNER JOIN customers c ON j.customer_id = c.id WHERE j.id=$id"))){
		echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$query->execute()){
		echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	if(!$query->bind_result($id, $name, $numb, $map_directions, $start_date, $description, $completed, $customer_id)){
		echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
	while ($query->fetch()){
		echo "<h4 class=\"ilb\">ID:</h4><p class=\"ilb\"> " . $id . "</p><br>\n
		<h4 class=\"ilb\">Name:</h4><p class=\"ilb\"> " . $name . "</p><br>\n
		<h4 class=\"ilb\">Number:</h4><p class=\"ilb\"> " . $numb . "</p><br>\n
		<h4 class=\"ilb\">Directions:</h4><p class=\"ilb\"> " . $map_directions . "</p><br>\n
		<h4 class=\"ilb\">Start Date:</h4><p class=\"ilb\"> " . $start_date . "</p><br>\n
		<h4 class=\"ilb\">Description:</h4><p class=\"ilb\"> " . $description . "</p><br>\n
		<h4 class=\"ilb\">Completed:</h4><p class=\"ilb\"> " . $completed . "</p><br>\n
		<h4 class=\"ilb\">Customer:</h4><p class=\"ilb\"> " . $customer_id . "</p><br>\n
		<br>\n
		<a class='btn btn-info' href=\"./edit_job.php?id=$id&name=$name&numb=$numb&map_directions=$map_directions&start_date=$start_date&description=$description&completed=$completed&customer_id=$customer_id\">Edit</a>\n
		<a class='btn btn-info' href=\"./delete_job.php?id=$id&name=$name&numb=$numb\">Delete</a>  <a class='btn btn-info' href=\"./jobs.php\">Go Back</a><br>";

	}
	$query->close();
	?>
</div>
</body>
</html>
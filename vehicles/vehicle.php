<?php require_once('../mysqli_connect.php'); 
$id=$_GET['id'];
$unit_number=$_GET['unit_number'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Vehicle</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Vehicle:  " . $_GET['unit_number'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Unit Number</td>
				<td>Year</td>
				<td>Make</td>
				<td>Model</td>
				<td>Trailer Unit</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT v.id, v.unit_number, year, make, model, e.unit_number, e.description FROM vehicles v LEFT JOIN Equipment e ON v.trailer_id = e.id WHERE v.id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $unit_number, $year, $make, $model, $trailer_id, $description)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $unit_number . "</td>\n
				<td>" . $year . "</td>\n
				<td>" . $make . "</td>\n
				<td>" . $model . "</td>\n
				<td>" . $description . " " . $trailer_id . "</td>\n
				</tr></tbody></table><br><a class='btn btn-info' href=\"./edit_vehicle.php?id=$id&unit_number=$unit_number&year=$year&make=$make&model=$model&trailer_id=$trailer_id&description=$description\">Edit</a>  <a class='btn btn-info' href=\"./delete_vehicle.php?id=$id&unit_number=$unit_number\">Delete</a>  <a class='btn btn-info' href=\"./vehicles.php\">Go Back</a>";
			}
			$query->close();
			?>		

</div>
</body>
</html>
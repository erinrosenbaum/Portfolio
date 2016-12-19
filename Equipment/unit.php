<?php
require_once('../mysqli_connect.php');
$id=$_GET['id'];
$Unit_Number=$_GET['Unit_Number'];
$Description=$_GET['Description'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Unit</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Unit:  " . $_GET['Description'] . " " . $_GET['Unit_Number'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Unit Number</td>
				<td>Description</td>
			</tr>
		</thead>
		<tbody>
			<?php
			$id = $_GET['id'];
			if(!($query = $mysqli->prepare("SELECT id, Unit_Number, Description FROM Equipment WHERE id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $Unit_Number, $Description)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $Unit_Number . "</td>\n
				<td>" . $Description . "</td>\n
				</tr></tbody></table><br><a class='btn btn-info' href=\"./edit_unit.php?id=$id&Unit_Number=$Unit_Number&Description=$Description\">Edit</a>  <a class='btn btn-info' href=\"./delete_unit.php?id=$id&Unit_Number=$Unit_Number&Description=$Description\">Delete</a>  <a class='btn btn-info' href=\"./all_equipment.php\">Go Back</a>";
			}
			$query->close();
			?>
			<br><br>
			<img style="width: 50%" id="fleet" src="../static/blender.jpg">
</div>
</body>
</html>
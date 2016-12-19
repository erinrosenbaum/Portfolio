<?php
require_once('../mysqli_connect.php');
$id=$_GET['id'];
$name=$_GET['title'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Position</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='../static/styles.css'>
</head>
<body>
<div class="container">
<?php include('../header.php');?>
	<?php echo "<h1>Position:  " . $_GET['title'] . "</h1>";?>
	<table class="pure-table pure-table-bordered">
		<thead>
			<tr>
				<td>ID</td>
				<td>Name</td>
			</tr>
		</thead>
		<tbody>
			<?php
			if(!($query = $mysqli->prepare("SELECT id, title FROM positions WHERE id=$id"))){
				echo "Connection error, Prepare failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->execute()){
				echo "Connection error, Execute failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			if(!$query->bind_result($id, $title)){
				echo "Connection error, Bind failed " . $mysqli->connect_errno . " " . $mysqli->connect_error;
			}
			while ($query->fetch()){
				echo "<tr>\n<td>" . $id . "</td>\n
				<td>" . $title . "</td>\n
				</tr></tbody></table><br><a class='btn btn-info' href=\"./edit_position.php?id=$id&title=$title\">Edit</a>  <a class='btn btn-info' href=\"./delete_position.php?id=$id&title=$title\">Delete</a>  <a class='btn btn-info' href=\"./positions.php\">Go Back</a>";
			}
			$query->close();
			?>
			<br><br>
</div>
</body>
</html>
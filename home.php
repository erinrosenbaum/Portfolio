
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u' crossorigin='anonymous'>
	<link rel='stylesheet' href='http://yui.yahooapis.com/pure/0.6.0/pure-min.css'>
	<link rel='stylesheet' type='text/css' href='./static/styles.css'>
</head>
<body>
<div class="container">
	<?php include('./header.php');?><br>


<div class="jumbotron">
  <h3>Welcome</h3>
	 <p>This application allows users to manage data for a service company that fractures oil and gas wells. Users can create, edit, view, and delete customers, employees, jobs, crews, vehicles, equipment, positions, and employee certifications. 
	</p>
	<p>Employees are assigned to a crew and also to a piece of equipment, and every piece of equipment is transported by truck, and that truck is normally assigned to the same employee. Supervisors and engineers have their own company pickup trucks. Jobs can last from a few hours to over a month and can involve up to 40 different pieces of equipment. Crews usually work in rotating shifts. Two crews are on-duty while one crew is off-duty. An on-duty crews is assigned to work day shifts, and the other works night shifts while a single job is completed. 
	</p>
	<p>Employees start as operators at the lowest level piece of equipment and then progress through learning the other pieces of equipment. Pay grade increases when an operator is certified on a piece of equipment. Each job is any number of stages, based on the geological zone that is being targeted, and each stage is designed to pump a specific amount of material that needs to be ordered, measured, pumped, tracked, re-measured, and invoiced. The process of estimating and documenting the amounts of sand, water, and chemicals used in a stage can occur as frequently as every hour, and a job can use dozens or hundreds of truckloads of water and sand daily. A 40-stage well can take millions of pounds of sand and millions of gallons of water. The job duties of tracking inventory have not been designed or implemented into this web application, but would make a nice addition.  
	</p>
	<p>Jobs are for a particular customer and customers can have many jobs. Multiple crews can be assigned to multiple jobs, and neither are required. Crews are comprised of many employees, and an employee can be on only one crew. Employees have exactly one position. Multiple employees can have the same position, and not all positions must be filled. Employees can also be certified for zero or more positions. An employee can be assigned to zero or one vehicle. Zero or more employees can be assigned the same vehicle, and the same piece of equipment can be assigned to zero or more vehicles.  
	</p>
	<p>By assigning crews to jobs, employees to crews, vehicles to employees, and equipment to vehicles, personnel and equipment for a job are displayed together and counted, simplifying the process of managing and accounting for multiple jobs and crews. The display of the number of certifications per position per crew has been implemented as a way to help a manager balance crews and to help ensure that an adequate number of trained personnel are scheduled for each job.
	</p>
</div>
</div>
</body>
</html>
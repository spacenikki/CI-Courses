<html>
<head>
	<title>Delete a course</title>
</head>
<body>
	<?php  
// for testing:
// when calling out the content -> just do $ + key of the associated array
// no need to call the associate array name :)
		// var_dump($data);
	?>
	<?php var_dump($data) ?> <!-- for testing --> 
	<h2>Are you sure you want to delete this?</h2>
	<h3>Name: <?php echo $data['name'] ?> </h3>
	<h3>Description: <?php echo $data['description'] ?> </h3>

	<form action='/courses/index' method='post'>
	<!-- if no -> go back to controller /courses/ function index -> where -->
	<!-- it will bring user to index view page -->
		<input type='submit' value='No'>  
	</form>

<!-- u must pass id to controller courses's function remove' -> 
	as it's expecting $id as input // remember calling php variable inbed 
	with html? { } -->
	<form action='<?php echo "/courses/remove/{$data['id']}"?>' method='post'>
		<!-- if yes -> contact database and delete it and go back to courses view page -->
		<input type='submit' value='Yes! I want to delete this'>
	</form>

</body>
</html>
<html>
<head>
	<title>Courses</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
<body>
	<div>
		<h3>Add a new course</h3> 
		<form action='/courses/add' method='post'>
			Name: <input type='text' name='name'>
			Description: <input type='text' name='description'>
			<!-- user's input gonna be post('name') ->$name = $this->input->post('full_name') -->
			<input type='submit' value='Add'>
		</form>
	</div>

	<h4>Courses</h4>
	<div>
		<table class="table table-striped tablle-bordered table-hover">
		    <thead>
		        <tr>
		          <th>Course Name</th>
		          <th>Description</th>
		          <th>Date Added</th>
		          <th>Actions</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php  
		    	// only have to call $ + key of the associated array
		    		// var_dump($courses);
			    	foreach ($courses as $course) 
			    	{
			    		$course_id = $course['id'];
			    		echo "<tr>";
				        echo "   <td>".$course['name']."</td>
				                 <td>".$course['description']. "</td>
				                 <td>".$course['created_at']."</td>";
				        echo "   <td><form action='/courses/destroy/".$course_id."' method='post'>
				        <input type='submit' name='remove' value='remove'>
				        </form></td>";
				// form can be replaced by  <a href="/courses/destroy/id/name/description"></a>
		        // powerful thing: $course_id -> will be passed AS AN VALUE to pass to
		        // controller 'courses' -> function 'destroy' -> to replace $id 
			    	}
						echo "</tr>";		        
    // don't forget to add course id with it so u can add to remove button
    // select * from database -> which is done by calling model's get_all_courses() function
				?> 	    	
		    </tbody>
		</table>

	</div>
</body>
</html>








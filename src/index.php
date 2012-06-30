<?php 
	include('classes.php'); 
	// OAuth token verification 
?>

<!DOCTYPE html>


<html>
<head>
	<title>PurpleState Code Viewer</title>
	<link href="google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
	<link href="styles.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="google-code-prettify/prettify.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>

<body onload="prettyPrint();">
	<div id='wrapper'>

		<h1>PurpleState Code Viewer</h1>
		<hr />

		<?php
			
				
			// Test values
			$authenticated = false;
			$p1 = "Test 1";
			// indentation is picked up by pre tags
			$p1c = "function foo(){
	alert('Testing stuff');
	var foo = 'bar';
	dance('trot');
} // end foo()";

			$p2 = "Test 2";
			// indentation is picked up by pre tags
			$p2c = "function foo(){
	alert('Testing stuff again');
	var foo = 'baz';
	dance('mamba');
}";

			$projects = array();
			$projects[$p1] = new Project($p1);
			$projects[$p1]->addFile($p1, $p1c);
			//$projects[$p2] = new Project($p2);
			$projects[$p1]->addFile($p2, $p2c);
		   
		   
			if ($authenticated) // bool based on token access
			{
				// get project list, based on token permissions
				echo "<p>Select an available project: </p>";
				echo "<select onchange='selectProject()'>";
				
				foreach ($projects as $project) // project selection list
				{
					echo "<option value='$project->name'>$project->name</option>";	
				}
				echo "</select>";
				echo "<hr />";
				
				echo "<p id='showall'>Show/Hide all files.</p>";
				
				// testing values
				$selectedProject = $projects[$p1];
				
				// foreach file in selected project, display name and content
				foreach ($selectedProject->files as $file){
					echo "<h3 class='filename'> $file->name </h3>";
					
					echo '<pre class="prettyprint linenums filecontent">';
						echo $file->content;
					echo '</pre>';
					
					echo '<hr />';
				}

			} // end if $authenticated
			else
			{
				echo '<h2>You do not have permission to access this resource.</h2><hr />';
				
				echo '</p>If you feel this is in error, please contact the user who assigned you the key, or select the contact support link below.</p>';		
			}
		?>

		<div id='footer'>
			<a href='http://www.purplestate.info/contact/'><h4>Contact Support</h4></a> <!-- contact/feedback dropdown -->
		</div> <!-- end of footer -- >
	</div> <!-- end of wrapper -->
</body>
</html>


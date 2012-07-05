<?php 
	include('classes.php'); 
	include('resources/db.php');
	include('resources/lib/oauthsimple.php');
	// OAuth token verification
	// Step 1: Unlimited access - DONE
	// Step 2: Restricted Unlimited Access
	// Step 3: Restricted Selective Access
?>

<!DOCTYPE html>


<html>
<head>
	<title>PurpleState Code Viewer</title>
	<link href="resources/lib/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
	<link href="styles.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="resources/lib/google-code-prettify/prettify.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
	
	<!-- Code Content Toggle -->
	<script type="text/javascript"> 
		function toggleCode(selector){
			$( selector ).toggle();
			return false;
		}
	</script>
</head>

<body onload="prettyPrint();">
	<div id='wrapper'>

		<h1>PurpleState Code Viewer</h1>
		<hr />

		<?php
			$authenticated = true; // test bool
			
			// Fetch authorized projects
			if ($authenticated) // bool based on token access
			{
				$projects = getProjects();
				
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
					echo "<a href='#' class='filename' onclick='toggleCode($file->name)'><h3> $file->name </h3></a>";
					
					echo "<pre class='prettyprint linenums filecontent ' id='$file->name' style='display:none;'>";
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
		</div> <!-- end of footer -->
	</div> <!-- end of wrapper -->
</body>
</html>


<html lang="en-US">

<head>
	<title> Assignment5 courses </title>
	<link rel="stylesheet" type="text/css" href="css/assign5courses.css">
</head>

<body>
	<table>
		<tr>
			<td>
				<h2> <a href ="/index.php"> Main Page </a> </h2>
			</td>
		</tr>
	</table>
	
	<br>

	<table>
		<tr>
			<td>
				<h2> Courses Taken </h2>
			</td>
		</tr>
	</table>
	<?php
	include_once ".env.php";
	$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DATABASE);
	if (!$con)
		exit("<p class='error'> Connection error: " . mysqli_connect_error() . "</p>");

	$stmt = mysqli_stmt_init($con);
	if (!$stmt)
		exit("<p class='error'> Failed to initialize statement</p>");
	if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
		$delete_id = $_GET['id'];
		$delete_query = "DELETE FROM coursestaken WHERE id = $delete_id";
		if (!mysqli_stmt_prepare($stmt, $delete_query))
			echo "<p class='error'> Failed to prepare delete statement </p>";
		mysqli_stmt_bind_param($stmt, "i", $delete_id);
		if (!mysqli_stmt_execute($stmt))
			echo "<p class='error'> Failed to execute delete statement </p>";
	}
	$insert_query = "INSERT INTO coursestaken (course_name, course_number, description, final_grade, currently_enrolled) VALUES (?, ?, ?, ?, ?)";
	if (!mysqli_stmt_prepare($stmt, $insert_query))
		echo "<p class='error'> Failed to prepare insert statement</p>";

	mysqli_stmt_bind_param($stmt, "sissi", $course_name, $course_number, $description, $final_grade, $currently_enrolled);

	$course_name = $_POST['course_name'];
	$course_number = $_POST['course_number'];
	$description = $_POST['description'];
	$final_grade = $_POST['final_grade'];
	$course_name = ucwords($course_name);
	
	$description = ucfirst($description);
	$final_grade = strtoupper($final_grade);
	$currently_enrolled = (isset($_POST['currently_enrolled']) ? 1 : 0);
	if (!empty($_POST)) {
		if (is_numeric($course_number)) {
			if (!is_numeric($final_grade)) {
				if (!mysqli_stmt_execute($stmt))
					echo "<p class='error'> Failed to execute insert course</p>";
			}
			else
				echo "<p class='error'> Failed to execute insert course. Please enter a letter grade. </p>";
		}
		else
			echo "<p class='error'> Failed to execute insert course. Please enter a number for course_number. </p>";
	}
	$select_query = "SELECT course_name, course_number, description, final_grade, currently_enrolled, id FROM coursestaken";
	if (!mysqli_stmt_prepare($stmt, $select_query))
		echo "<p class='error'> Failed to prepare select statement </p>";
	if (!mysqli_stmt_execute($stmt))
		echo "<p class='error'> Failed to execute select statement </p>";
	
	mysqli_stmt_bind_result($stmt, $course_name, $course_number, $description, $final_grade, $currently_enrolled, $id);
	echo "<table>
		<tr>
			<th>
			Course number
			</th>
			<th>
			Course name
			</th>
			<th>
			Description
			</th>
			<th>
			Final grade
			</th>
			<th>
			Remove course
			</th>
		</tr>";
	$bold_count = 0;
	while(($row = mysqli_stmt_fetch($stmt)) != NULL) {
		?>
		<tr class="
			<?php 
			if ($currently_enrolled==1) 
				echo "enrolled"; 
			else
				echo "notenrolled"; 
			?>">
			<td class='tcells<?php 
			if ($bold_count % 2 == 1)
				echo " bold";
			else
				echo " notbold";
			?>'>
			<?php	echo "$course_number
			</td>";
			?>
			<td class='tcells left<?php
			if ($bold_count % 2 == 1)
				echo " bold";
			else
				echo " notbold";
			?>'>
			<?php	echo "$course_name
			</td>";
			?>
			<td class='tcells left<?php
			if ($bold_count % 2 == 1)
				echo " bold";
			else
				echo " notbold";
			?>'>
			<?php	echo "$description
			</td>";
			?>
			<td class='tcells<?php
			if ($bold_count % 2 == 1)
				echo " bold";
			else
				echo " notbold";
			?>'>
			<?php	echo "$final_grade
			</td>";
			?>
			<td class='tcells'>
			<?php	echo "<a href='/courses.php?action=delete&id=$id'> Remove </a>
			</td>";
			$bold_count = $bold_count + 1;
			?>
		</tr>
	<?php
	}
	echo "</table>";
	mysqli_stmt_close($stmt);
	mysqli_close($con);
	?>
	<div>
		<table>
		<h4 class="courseformheader"> Course Form </h4>
		<form action="courses.php" method="post">
			<tr>
				<ul>
					<td class="courseform"> <li> <label for="course_name">Course name <br></label> <input type="text" id="course_name" name="course_name"> </li>
					</td>
					<td class="courseform"><li> <label for="course_number">Course number <br></label> <input type="text" id="course_number" name="course_number"> </li>
					</td>
					<td class="courseform"><li> <label for="final_grade">Final grade <br></label> <input type="text" id="final_grade" name="final_grade"> </li>
					</td>
				</ul>
			</tr>
			<tr>
				<td class="courseform"> <li>Description<br><textarea name="description"></textarea></li>
				</td>
				<td class="courseform"> <li> <label for="currently_enrolled"> Currently Enrolled </label> <input type ="checkbox" id="currently_enrolled" name="currently_enrolled"> </li>
				</td>
			</tr>
			<tr>
				<td class="courseform">
					<button type="submit" value="Add Course"> Add course </button>
				</td>
			</tr>
		</form>
		</table>
	</div>
</body>

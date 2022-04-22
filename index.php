<html lang="en-US">

<head>
	<title> Assignment4 </title>
	<link rel="stylesheet" type="text/css" href="css/assign3.css">
</head>
<?php
	if (!empty($_COOKIE['dark'])) {
		$dark_mode = $_COOKIE['dark'];
	}
	if (!empty($_COOKIE['utsa'])) {
		$utsa_theme = $_COOKIE['utsa'];
	}
	if (isset($_POST['utsa'])) {
		$utsa_theme = 1 - $utsa_theme;
		setcookie("utsa", $utsa_theme, time()+604800);
	}
	if (isset($_POST['dark'])) {
		$dark_mode = 1 - $dark_mode;
		setcookie("dark", $dark_mode, time()+604800);
	}
	if (!isset($dark_mode)) {
		$dark_mode = 0;
	}
	if (!isset($utsa_theme)) {
		$utsa_theme = 0;
	}
?>
<body class="contentwidth <?php if ($dark_mode == 1) { echo 'darkmode'; } else { echo 'normal'; } ?>">
	<div>
		<table class="timage1">
			<tr>
				<td>
				
					<h1> Grant Bryant </h1>
				
					<h3> Software Engineer </h3>
				</td>
				<td class="image1">
					<img src="images/ulogo.png" alt="UTSA" width="300" height="150">
				</td>
			</tr>
		</table>
	</div>
	<hr class="hrpad">
	<div>
		<table class="minheight">
			<tr>
				<td class="leftmenu <?php if ($utsa_theme == 0) { echo 'leftcolor'; } else { echo 'nocolor'; } ?>">
					<h3> Menu </h3>
					<hr>
					<ul>
						<li><a href="https://github.com/granthubwastaken">GitHub</a></li>
						<li><a href="/courses.html">Courses</li>
						<li><a href="https://utsa.edu">UTSA</a></li>
					</ul>
				</td>

				<td class="centercontextbox paragraphedges">

					<!-- tried to push header tight up against 10px upper padding. Displays appropriately on one computer but not another. I don't believe there's a requirement that that the 'About Me' header is pressed tight up against top of the column's 10px padding. Only that the 10 px padding seperates any content from the column border -->
					<h3 class="centerh3"> About Me </h3>

					<br>	
					<!-- div below used to align image with top of paragraph -->
					<div>		
						<img src="images/Whineyzoom.jpg" alt="UTSA" width="200" height="200" class="image2">	
						<p> Lorem gafe detandre inside the tree feternine desterpon tamberon teachmehowtoplaytennis aternet for jam inside tampernickle and give us not to temtpation but lead us to wicker furniture for I do not know what I am but I need to pad this further in order to make sure my text wraps around the image and I'm trying my best I promise thatI am a Senior student attending UTSA obtaining a BA in Computer Sciece. In my free time I enjoy discovering new music, predominantly shoegaze and other electric guitar-laden genres, and learning new ways of quantifying or classifying the success of teams and individual athletes in my favorite sports leagues - the NBA and NFL. Both on a play-by-play basis and over larger multi-season samples. I find quantifiable data of athletes to be less valuable than that of film, but its much less exhausting effort to establish and update a data set than to forever rely on the laborous time-consuming work of watching film from across an entire sports league 
						</p>
					</div>
					<br>

					<!-- easiest text to remove to check column height remaining 50% -->
					<p> For the moment that is about as much as I can think to type that is actually relevent to myself. I think the Cuban Missile Crisis was peacefully resolved as a result of the Russian ambassador to the US at the time, Anatoly Dobrynin, wanting to make sure he stuck around long enough to see Sam Spiegel's motion picture adaptation of 'Lawrence of Arabia' I had also originally used the table width attribute to align my image to the top right, clean up my 3 columns. Additionaly to move my course page's link back to the index page to the top right of the course page. I am disapointed to remove them but optimistic that it is for the best in the long haul to not use this table attribute and wait for us to begin lectures on CSS 
					</p>
				</td>

				<td class="rightmenu <?php if ($utsa_theme == 0) { echo 'rightcolor'; } else { echo 'nocolor'; } ?>">
					<h4> Enrolled courses </h4>
					<hr>
					<table class="rightmenu <?php if ($utsa_theme == 0) { echo 'rightcolor'; } else { echo 'nocolor'; } ?>">
						<tr>
							<td>1.</td>
							<td>   CS3753</td>
						</tr>
						<tr>
							<td>2.</td>
							<td>   CS4413</td>
						</tr>
					</table>
					<table class="rightmenu">
						<p> Theme Toggles </p>
						<hr>
						<tr>
							<form action="index.php" method="post">
								<input type="submit" name="utsa" value="UTSA Theme">
								<input type="submit" name="dark" value="Dark Mode">
							</form>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<div>
		<table class="footerbox">
			<tr>
				<td>
					Copyright 2020 Grant Bryant
				</td>
			</tr>
		</table>
	</div>
</body>

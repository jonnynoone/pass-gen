<?php

$password = "";

$lowercase = array(
	'a','b','c','d','e','f','g','h','i','j','k','l','m',
	'n','o','p','q','r','s','t','u','v','w','x','y','z'
);

$uppercase = array(
	'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
	'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'	
);

$symbol = array(
	'!', '£', '$', '%', '^', '&', '*', '(', ')', '_', '-', '+', '=',
	'{', '}', '[', ']', ':', ';', '@', '#', '~', '<', '>', '?', '/',
	'|', '\\'
);

if (isset($_POST['submit'])) {
	$pass_length = intval($_POST['charSelect']);

	for ($i = 0; $i < $pass_length; $i++) {
		$char_select = rand(0, 3);

		if ($char_select == 0) {
			$random = rand(0, 25);
			$password .= $lowercase[$random];
		} elseif ($char_select == 1) {
			$random = rand(0, 25);
			$password .= $uppercase[$random];
		} elseif ($char_select == 2) {
			$random = rand(0, 9);
			$password .= $random;
		} elseif ($char_select == 3) {
			$random = rand(0, 27);
			$password .= $symbol[$random];
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Password Generator</title>

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
	<!-- Custom Styles -->
	<link href="css/custom.css" rel="stylesheet">
</head>

<body>
	<form class="form-signin" action="index.php" method="post">
		<div class="text-center mb-4">
			<i class="fas fa-key"></i>

			<h1 class="h3 mb-3 font-weight-normal">Password Generator</h1>

			<p><?php echo $password; ?></p>
		</div>

		<!--
		<div class="form-label-group">
			<input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>
			<label for="inputName">Name</label>
		</div>
		-->

		<!--
		<div class="checkbox mb-3">
			<label>
				<input type="checkbox" value="include-numbers"> Include symbols?
			</label>
		</div>
		-->

		<div class="form-check">
			<label><input type="radio" name="charSelect" value="12" 
				<?php if(isset($_POST['submit'])) { 
					echo ($_POST['charSelect'] == 12) ? "checked" : "";
				} else {
					echo "checked";
				} ?>
			> 12 Characters</label>
			<label><input type="radio" name="charSelect" value="16"
				<?php if(isset($_POST['submit'])) { 
					echo ($_POST['charSelect'] == 16) ? "checked" : "";
				} ?>
			> 16 Characters</label>
			<label><input type="radio" name="charSelect" value="20"
				<?php if(isset($_POST['submit'])) { 
					echo ($_POST['charSelect'] == 20) ? "checked" : "";
				} ?>
			> 20 Characters</label>
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Generate!</button>
	</form>
</body>

</html>
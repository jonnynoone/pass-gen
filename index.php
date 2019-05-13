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
	'&#33;', '&#163;', '&#36;', '&#37;', '&#94;', '&#38;', '&#42;', '&#40;',
	'&#41;', '&#95;', '&#45;', '&#43;', '&#61;', '&#123;', '&#125;', '&#91;',
	'&#93;', '&#58;', '&#59;', '&#64;',	'&#35;', '&#126;', '&#60;', '&#62;',
	'&#63;', '&#47;', '&#124;', '&#46;', '&#44;'
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
			if (isset($_POST['incSymbols'])) {
				$random = rand(0, 26);
				$password .= $symbol[$random];
			} else {
				$i--;
			}
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
		</div>

		<div class="form-check">
			<label>
				<input type="checkbox" name="incSymbols" value="true"
					<?php echo (isset($_POST['incSymbols'])) ? "checked" : "" ?>
				> Include Symbols
			</label>
		</div>

		<div class="form-check">
			<span>Characters:</span>
			<label><input type="radio" name="charSelect" value="12" 
				<?php if(isset($_POST['submit'])) { 
					echo ($_POST['charSelect'] == 12) ? "checked" : "";
				} else {
					echo "checked";
				} ?>
			> 12</label>
			<label><input type="radio" name="charSelect" value="16"
				<?php if(isset($_POST['submit'])) { 
					echo ($_POST['charSelect'] == 16) ? "checked" : "";
				} ?>
			> 16</label>
			<label><input type="radio" name="charSelect" value="20"
				<?php if(isset($_POST['submit'])) { 
					echo ($_POST['charSelect'] == 20) ? "checked" : "";
				} ?>
			> 20</label>
		</div>

		<button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Generate!</button>

		<?php if ($password > "") {
			echo "
			<div class=\"form-label-group\">
	            <input type=\"text\" id=\"passDisplay\" class=\"form-control\" value=\"$password\">
	            <label for=\"passDisplay\">Password</label>
	        </div>

			<button type=\"button\" id=\"passCopy\" class=\"btn btn-lg btn-primary btn-block\">Copy</button>
	        "; 
    	} ?>
	</form>

	<?php if ($password > "") { ?>
	<script>
		var copy = () => {
			var password = document.querySelector('#passDisplay');
			password.select();
			document.execCommand('copy');
		};

		var el = document.querySelector('#passCopy');
		el.addEventListener('click', copy);
	</script>
	<?php } ?>
</body>

</html>
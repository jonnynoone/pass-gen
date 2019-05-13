<?php 

if (isset($_POST['submit'])) {
	$mobile = '07';

	for ($i = 1; $i <= 9; $i++) {
		$random = rand(0, 9);
		$mobile .= $random;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Number Generator</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="css/custom.css" rel="stylesheet">
</head>

<body>
    <form class="form-signin" method="post" action="index.php">
        <div class="text-center mb-4">
            <i class="fas fa-phone"></i></i>

            <h1 class="h3 mb-3 font-weight-normal">Mobile Number Generator</h1>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Generate!</button>

        <?php if (isset($_POST['submit'])) {
        	echo "
	        <div class=\"form-label-group\">
	            <input type=\"text\" id=\"mobNumber\" class=\"form-control\" value=\"$mobile\">
	            <label for=\"mobNumber\">Mobile Number</label>
	        </div>

        	<button class=\"btn btn-lg btn-primary btn-block\" type=\"button\" id=\"copyNum\">Copy</button>
        	";
    	} ?>

    	<?php if (isset($_POST['submit'])) { ?>
    		<script>
    			var copy = () => {
	    			var mobNo = document.querySelector("#mobNumber");
	    			mobNo.select();
	    			document.execCommand('copy');
    			};

    			var button = document.querySelector("#copyNum");
    			button.addEventListener('click', copy);
    		</script>
    	<?php } ?>
    </form>
</body>

</html>
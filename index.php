<?php 

if (isset($_POST['submit'])) {
    $numbers = array();
    $amount = intval($_POST['amount']);

    for ($i = 0; $i < $amount; $i++) {
        $mobile = '07';

        for ($j = 1; $j <= 9; $j++) {
            $random = rand(0, 9);
            $mobile .= $random;
        }

        array_push($numbers, $mobile);
    }

    $number_list = implode(", \n", $numbers);
} else {
    $amount = 1;
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

        <div class="form-label-group">
            <select class="form-control" name="amount">
                <option value="1" <?php echo ($amount == 1) ? "selected='true'" : ""; ?>>1</option>
                <option value="5" <?php echo ($amount == 5) ? "selected='true'" : ""; ?>>5</option>
                <option value="10" <?php echo ($amount == 10) ? "selected='true'" : ""; ?>>10</option>
                <option value="100" <?php echo ($amount == 100) ? "selected='true'" : ""; ?>>100</option>
            </select>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Generate!</button>

        <?php 

        if (isset($_POST['submit'])) {
            if ($amount == 1) {
                echo "
                <div class=\"form-label-group\">
                    <input type=\"text\" id=\"mobNumber\" class=\"form-control\" value=\"$mobile\">
                    <label for=\"mobNumber\">Mobile Number</label>
                </div>
                ";
            } else {
                echo "
                <div class=\"form-label-group\">
                    <textarea id=\"mobNumber\" class=\"form-control\" rows=\"6\">$number_list</textarea>
                </div>
                ";
            }

            echo "
            <button class=\"btn btn-lg btn-primary btn-block\" type=\"button\" id=\"copyNum\">Copy</button>
            ";
    	}

        ?>

    	<?php if (isset($_POST['submit'])) { ?>
    		<script>
    			var copy = () => {
	    			var mobNo = document.querySelector("#mobNumber");
	    			mobNo.select();
	    			document.execCommand('copy');
                    document.getSelection().removeAllRanges();
    			};

    			var button = document.querySelector("#copyNum");
    			button.addEventListener('click', copy);
    		</script>
    	<?php } ?>
    </form>
</body>

</html>
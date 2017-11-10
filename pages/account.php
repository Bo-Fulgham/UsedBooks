<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>About</title>
	</head>
	<body>
		<p>This is the account page</p>
		<?php require '../functions/pagesbar.php';?>
		<p>Delete Account</p>

		<?php 
			if ($_SESSION['logged_in'] == false){
			header('Location: home.php');
		}
		    // is an Admin logged in?
            if($_SESSION['isAdmin'] == 1){
                echo "admin stuff";
            }
        ?>

        <?php include '../functions/footer.php';?>
	</body>
</html>
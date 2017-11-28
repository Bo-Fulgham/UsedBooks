<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Account</title>
	</head>
	<body>
		<p>This is the account page</p>
		<?php require '../functions/pagesbar.php';?>
		

		<?php 
			if ($_SESSION['logged_in'] == false){
			header('Location: home.php');
		}
		    // is an Admin logged in?
            if($_SESSION['isAdmin'] == 1){
				echo "<h3><a href='adminControls.php'>Admin Controls</a> </h3>";
            }

        ?>
        <button onclick="window.location.href='delete_page.php'">Delete Account</button>  
	</body>
</html>
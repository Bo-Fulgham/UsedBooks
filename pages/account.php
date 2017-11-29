<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Account</title>
		<link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
		
	</head>
	<body>
		<p>This is the account page</p>
		<?php require '../functions/pagesbar.php';?>
		<p><button onclick="window.location.href='delete_page.php'">Delete Account</button></p>

		<?php
			if ($_SESSION['logged_in'] == false){
			header('Location: home.php');
		}
		    // is an Admin logged in?
            if($_SESSION['isAdmin'] == 1){
				echo "<h3><a href='adminAddBook.php'>Add Books</a> </h3>";
				echo "<h3><a href='adminRemoveBook.php'>Remove Books</a> </h3>";
            }
        ?>

        <?php include '../functions/footer.php';?>
	</body>
</html>
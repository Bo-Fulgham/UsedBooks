<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Search</title>
	</head>
	<body>
		<?php require '../functions/header.php';?>
		<h2>this is the search page</h2>
		<?php require '../functions/pagesbar.php';?>

		<?php

            session_start();
            // is an Admin logged in?
            if($_SESSION['logged_in'] == true){
                if ($_SESSION['type'] == 'user') {
                    header('Location: user_page.php');
                }
                echo "admin stuff";
            }
            else {
                echo "You are not logged in. <br>" . '<a href="login_page.php">Log in here</a>';
            }         

        ?>

		<?php include '../functions/footer.php';?>
	</body>
</html>
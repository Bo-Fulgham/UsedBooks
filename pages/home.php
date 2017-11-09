<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<title>Home Page</title>
	</head>
	<body>
		<h2>this is the home page</h2>
		<?php require '../functions/pagesbar.php';?>

		<h2 id="specials">Specials Right Now</h2>
		<p>Half off of some stuff<br><br>Free shipping on stuff</p>

		<h2 id="why">Why choose us?</h2>
		<p>Better prices, better service, and faster delivery!</p>

		<?php
            // is an Admin logged in?
            if($_SESSION['logged_in'] == true){
                if ($_SESSION['isAdmin'] == 1) {
                    echo "You are logged in as an admin";
                }
                else 
                	echo "You are logged in as a user";
            }
            else {
                echo "You are not logged in";
            }         

        ?>

		<?php include '../functions/footer.php';?>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Search</title>
	</head>
	<body>
		<h2>this is the search page</h2>
		<?php require '../functions/pagesbar.php';?>

		<?php
            // is an Admin logged in?
        echo $_SESSION['logged_in'];
            if($_SESSION['logged_in'] == true){
                if ($_SESSION['isAdmin'] == 0) {
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
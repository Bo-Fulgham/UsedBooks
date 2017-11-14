<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Account</title>
    <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">

	</head>
	<body>
		<?php require '../functions/pagesbar.php';?>
		<p>Delete Account</p>

		<?php

			if ($_SESSION['logged_in'] == false){
			header('Location: home.php');



		}
		    // is an Admin logged in?
    	if($_SESSION['isAdmin'] == 1){
				echo "<h3><a href='adminControls.php'>Admin Controls</a> </h3>";
      }
        ?>

        <?php include '../functions/footer.php';?>
        <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
    		<script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>
</html>

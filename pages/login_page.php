<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
		<style style="text/css">
		.container1 {

		 	width: 500px;
		 	clear: both;
			border-radius: 25px;
			background: #F9690E;
	 		border: 2px solid #F9690E;
	 		padding: 20px;
	 		width: inherit;
	 		height: inherit;

 		}
	 .container1 input {

			 width: 100%;
			 clear: both;

	 	}
		.center {
    	margin: auto;
			margin-top: 10px;
    	width: 50%;

		}
		</style>
	</head>
	<body>
		<?php require '../functions/pagesbar.php';?>

		<?php
			require '../functions/loginFunctions.php';
			isLoggedIn();
			checkCredentials();
			?>
			<div class="container1 center">
				<form method="post" action="login_page.php">
						<label>Username: </label>
						<input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"> <br>
						<label>Password: </label>
						<input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"> <br>
						<input type="submit" value="Log in">
				</form>
			</div>



	<?php include '../functions/footer.php';?>
	<script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
	<script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>
</html>

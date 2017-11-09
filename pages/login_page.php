<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Login</title>
	</head>
	<body>
        <?php require '../functions/header.php';?>
        <h2>this is the login page</h2>
        <?php require '../functions/pagesbar.php';?>

        <?php 
        require '../functions/loginFunctions.php';
        isLoggedIn();
        checkCredentials();
        ?>

        <form method="post" action="login_page.php">
            <label>Username: </label>
            <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>"> <br>
            <label>Password: </label>
            <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"> <br>
            <input type="submit" value="Log in">
        </form>


		<?php include '../functions/footer.php';?>
	</body>
</html>
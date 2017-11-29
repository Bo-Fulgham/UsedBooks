<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8" />
		<title>Account - Delete</title>
        <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="extfiles/regLogStyle.css">';

    </head>
	
	<body>
    <?php require '../functions/pagesbar.php';?>
    <div class="jumbotron">
        <div class="container center">
            <p>Confirm your username and password to delete your account</p>

            <form class="center" method="post" action="delete_page.php">
                <p><label>Username: </label>
                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"> <br>
                <label>Password: </label>
                <p><input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"> <br /><br /><br />
                <input style="align='center';" type="submit" value="Delete Account">
            </form>
            <p><a href = 'home.php'>Return to home page</a></p>
        </div>
    </div>

		<?php
		if(isset($_POST['email'])){
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			require_once '../functions/login.php';
			$conn = new mysqli($hn, $un, $pw, $db);
			if($conn->connect_error)
				die($conn->connect_error);
			if($_POST['email'] == 'admin@notChegg.com')
			{
				echo "You can not delete an admin account! <br>";
				$email = '';
			}
			else
			{
				$email = $_POST['email'];
				$delete = "DELETE FROM users WHERE  email = '$email'";
				$result = $conn->query($delete);

				if(!$result)
				{
					echo "Delete Account failed!" . $conn->error . "<br><br>";
				}
				else{ 
					echo "
                        <div class='container'>
                            <h2 class='center'>Delete Account successful!</h2>
					    </div>";
        			setcookie (session_id(), "", time() - 3600);
        			session_destroy();
        			session_write_close();
				}
			}

			
			$conn->close();
		}
		?>
		

        <?php include '../functions/footer.php'; ?>
        <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
        <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>

</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8" />
		<title>Account - Delete</title>
	</head>
	
	<body>
		<p>Confirm your username and password to delete your account</p>

		
		<form method="post" action="delete_page.php">
            <label>Username: </label>
            <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"> <br>
            <label>Password: </label>
            <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>"> <br>
            <input type="submit" value="Delete Account">
        </form>

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
					echo "Delete Account successful!";
					session_start();
        			setcookie (session_id(), "", time() - 3600);
        			session_destroy();
        			session_write_close();
				}
			}

			
			$conn->close();
		}
		?>
		
		<p>
			<a href = 'home.php'>Return to home page</a>
		</p>
	</body>

</html>
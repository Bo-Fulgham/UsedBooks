<DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Cart</title>
	</head>
	<body>
		<h2>this is the cart page</h2>
		<?php require '../functions/pagesbar.php';?>

		<p>Items in your cart:</p>

		<?php
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			require_once '../functions/login.php';
			$conn = new mysqli($hn, $un, $pw, $db);
			if($conn->connect_error)
				die($conn->connect_error);
			$query = "SELECT * FROM orders";
			$result = $conn->query($query);

			if(!$result)
			{
				echo $conn->error . "<br><br>";
			}
			// else{

			// }
		?>
		<?php include '../functions/footer.php';?>
	</body>
</html>
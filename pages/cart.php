<DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Cart</title>
	</head>
	<body>
		<h2>this is the cart page</h2>
		<?php require '../functions/pagesbar.php'; 
			if ($_SESSION['logged_in'] == false){
				echo "<p>You are not logged in <br><p>";
			}
			?>


			<p><a href='checkout_page.php'>Checkout</a></p>



		<?php include '../functions/footer.php';?>
	</body>
</html>
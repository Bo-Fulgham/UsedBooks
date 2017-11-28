<DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Checkout</title>
	</head>
	<body>
		<h2>this is the checkout page</h2>
		<?php require '../functions/pagesbar.php';
			if ($_SESSION['logged_in'] == false){
			header('Location: cart.php');
			}
			include '../functions/placeOrder.php' ?>


		<?php include '../functions/footer.php';?>
	</body>
</html>
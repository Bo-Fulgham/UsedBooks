<DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Checkout</title>
        <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">

    </head>
	<body>
		<?php require '../functions/pagesbar.php';
			if ($_SESSION['logged_in'] == false){
			header('Location: cart.php');
			}
			include '../functions/placeOrder.php' ?>


		<?php include '../functions/footer.php';?>
        <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
        <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>
</html>
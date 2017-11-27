<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Admin Controls</title>
    <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">

	</head>
	<body>
		<h1>Admin controls page</h1>
		<?php require '../functions/pagesbar.php';
		if($_SESSION['isAdmin'] == 0){
			header('Location: account.php');
		}
		include '../functions/addBook.php';
		?>

		<form action="adminControls.php" method="POST">
		Title: <!--<span class="error"> $titleErr</span>--> <br>
		<input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"><br>
		ISBN: <!--<span class="error"> $ISBNErr</span>--> <br>
		<input type="test" name="ISBN" value="<?php echo isset($_POST['ISBN']) ? $_POST['ISBN'] : '' ?>"><br>
		Author: <!--<span class="error"> $authorErr</span>--> <br>
		<input type="test" name="author" value="<?php echo isset($_POST['author']) ? $_POST['author'] : '' ?>"><br>
		Publisher: <!--<span class="error"> $pubErr</span>--> <br>
		<input type="test" name="publisher" value="<?php echo isset($_POST['publisher']) ? $_POST['publisher'] : '' ?>"><br>
		Price: <!--<span class = "error"> $priceErr</span>--><br>
		<input type="text" name ="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>"><br>
		Edition:<br>
		<input type="text" name="edition" value="<?php echo isset($_POST['edition']) ? $_POST['edition'] : '' ?>"><br>
		Category: <!--<span class = "error"> $catErr</span>--><br>
		<input type="text" name="category" value="<?php echo isset($_POST['category']) ? $_POST['category'] : '' ?>"><br><b>
		<input type="submit" value="Add book">
		</form>
		<?php include '../functions/footer.php';?>
		<script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
		<script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>
</html>

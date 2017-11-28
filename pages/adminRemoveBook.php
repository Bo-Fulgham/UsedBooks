<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Remove Book</title>
		<style> td { 
		        padding: 0.5em 0.5em 0.5em 0.5em; 
      			}      
    	</style>
	</head>
	<body>
		<h1>Remove Book page</h1>
		<?php require '../functions/pagesbar.php';
		if($_SESSION['isAdmin'] == 0){
			header('Location: account.php');
		}
		?>
		<h2>Remove Book</h2>
		<form action="adminRemoveBook.php" method="POST">
			Book ID: <!--<span class="error"> $titleErr</span>--> <br>
			<input type="text" name="bookID" value="<?php echo isset($_POST['bookID']) ? $_POST['bookID'] : '' ?>"><br>
		</form>
		<form action="adminRemoveBook.php" method="POST">
			<table>
				<?php include '../functions/removeBook.php';?>				
			</table>
		</form>
		<?php include '../functions/footer.php';?>
	</body>
</html>
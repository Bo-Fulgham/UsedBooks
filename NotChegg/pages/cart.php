<DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Cart</title>
        <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">

    </head>
	<body>
		<?php require '../functions/pagesbar.php';
			  require '../functions/login.php';
        echo "<div class='container'>";
			if ($_SESSION['logged_in'] == false){
				echo "<br /><br /><br /><p align='center'>You are not logged in <br><p>";
			}
			else
			{
				$conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) 
                    die($conn->connect_error);
				$email = $_SESSION['email'];
				$query  = "SELECT bookID FROM cart WHERE UserID ='$email'";
            	$result = $conn->query($query);
            	if (!$result) 
                     die($conn->error);
                $rows = $result->num_rows;
                for ($j = 0 ; $j < $rows ; ++$j)
                    {
                    $result->data_seek($j);
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    //echo 'BookID: '   . $row['bookID']   . '<br>';
                    $BookID  = $row['bookID'];
                    $query1  = "SELECT * FROM inventory WHERE bookID = '$BookID'";
                	$result1 = $conn->query($query1);
                	if (!$result1) 
                     	die($conn->error);
                 	$rows1 = $result1->num_rows;
                    for ($i = 0 ; $i < $rows1 ; ++$i)
                    {
                    $result1->data_seek($i);
                    $row1 = $result1->fetch_array(MYSQLI_ASSOC);
                    if(!$result1)
                    	die($conn->error);
                    //echo 'BookID: '   . $row1['bookID']   . '<br>';
                    echo 'Title: ' . $row1['Title'] . '<br>';
                    echo 'Author: '     . $row1['Author']     . '<br>';
                    echo 'ISBN: '    . $row1['ISBN']    . '<br>';
                    echo 'Publisher: '     . $row1['Publisher']. '<br>';
                    echo 'Price:' .$row1['Price'] . ' <br>';
                   // echo 'Image?:' .$row1['Image']. '<br>';
                   // echo 'isFlagged:' .$row1['isFlagged']. '<br>';
                    echo 'category:' .$row1['Category']. '<br>';
                    echo 'Quantity:'  .$row1['quantity']. '<br>';
                    echo '<form action ="cart.php" method="post">
                    <button name ="remove" value = '.$row1['bookID'].' type="submit">remove from cart</button>';
                    echo '</form>';
                    echo '<br><br><br>';
                
                    }
                 }
                if(isset($_POST['remove']))
                {
                $BookID = $_POST['remove'];
                $query2  = "DELETE FROM cart WHERE bookID = '$BookID' AND UserID = '$email'";
            	$result2 = $conn->query($query2);
            	if (!$result2) 
                     die($conn->error);
                 }
			 echo "<p align='center'><a href='checkout_page.php'>Checkout</a></p>";
			}
			echo "</div>";
			?>



		<?php include '../functions/footer.php';?>
        <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
        <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>

	</body>
</html>
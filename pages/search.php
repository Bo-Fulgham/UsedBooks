<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Search</title>
	</head>
	<body>
		<h2>this is the search page</h2>
		<?php //require '../functions/pagesbar.php';
            echo "
    <p> <a href='home.php'>NotChegg</a> </p>
    <p> <a href='about.php'>About</a> </p>
    <p> <a href='contact.php'>Contact Us</a> </p> ";
    if (isset($_SESSION['logged_in'])){
        if ($_SESSION['logged_in'] == true){
            echo "<p><a href='logout.php'>Logout</a> </p>";
        }
        else {
            echo "<p><a href='login_page.php'>Login</a></p>
                <p><a href='registration_page.php'>Register</a></p>";
        }
    }
    else {
        echo "<p><a href='login_page.php'>Login</a></p>
        <p><a href='registration_page.php'>Register</a></p>";
    }
echo "
    <p> <a href='account.php'>Account</a></p>
    <form method='get' action='search.php'>
    <p>Search: <input name='search_terms' type='text' size='25' maxlength='30'> </p>
    <p>
        <!-- input types 'submit' and 'reset' insert  -->
        <!-- buttons for submitting and clearing the  -->
        <!-- form's contents                          --> 
        <input type='submit' value='Submit'>
    </p> </form>
    <p> <a href='Cart.php'>Cart</a> </p>
    ";
        
        
              require_once '../functions/login.php';

                $conn = new mysqli($hn, $un, $pw, $db);
                if ($conn->connect_error) 
                    die($conn->connect_error);
                $terms = $_GET['search_terms'];

                //Search 
                $query  = "SELECT * FROM inventory WHERE title LIKE '%$terms%'";
                $result = $conn->query($query);
                if (!$result) 
                     die($conn->error);

                 $rows = $result->num_rows;

                    for ($j = 0 ; $j < $rows ; ++$j)
                    {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                    echo 'BookID: '   . $row['bookID']   . '<br>';
                    echo 'ISBN: '    . $row['ISBN']    . '<br>';
                    echo 'Title: ' . $row['Title'] . '<br>';
                    echo 'Author: '     . $row['Author']     . '<br>';
                    echo 'Publisher: '     . $row['Publisher']. '<br>';
                    echo 'Price:' .$row['Price'] . ' <br>';
                    echo 'Image?:' .$row['Image']. '<br>';
                    echo 'isFlagged:' .$row['isFlagged']. '<br>';
                    echo 'category:' .$row['Category']. '<br>';
                    echo 'Quantity:'  .$row['quantity']. '<br><br><br>';
                 
                    }


                    //Search AUthor
             $query  = "SELECT * FROM inventory WHERE Author LIKE '%$terms%'";
                $result = $conn->query($query);
                if (!$result) 
                     die($conn->error);

                 $rows = $result->num_rows;

                    for ($j = 0 ; $j < $rows ; ++$j)
                    {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                    echo 'BookID: '   . $row['bookID']   . '<br>';
                    echo 'ISBN: '    . $row['ISBN']    . '<br>';
                    echo 'Title: ' . $row['Title'] . '<br>';
                    echo 'Author: '     . $row['Author']     . '<br>';
                    echo 'Publisher: '     . $row['Publisher']. '<br>';
                    echo 'Price:' .$row['Price'] . ' <br>';
                    echo 'Image?:' .$row['Image']. '<br>';
                    echo 'isFlagged:' .$row['isFlagged']. '<br>';
                    echo 'category:' .$row['Category']. '<br>';
                    echo 'Quantity:'  .$row['quantity']. '<br><br><br>';
                 
                    }
                    //Search ISBN
            $query  = "SELECT * FROM inventory WHERE ISBN LIKE '%$terms%'";
                $result = $conn->query($query);
                if (!$result) 
                     die($conn->error);

                 $rows = $result->num_rows;

                    for ($j = 0 ; $j < $rows ; ++$j)
                    {
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);

                    echo 'BookID: '   . $row['bookID']   . '<br>';
                    echo 'ISBN: '    . $row['ISBN']    . '<br>';
                    echo 'Title: ' . $row['Title'] . '<br>';
                    echo 'Author: '     . $row['Author']     . '<br>';
                    echo 'Publisher: '     . $row['Publisher']. '<br>';
                    echo 'Price:' .$row['Price'] . ' <br>';
                    echo 'Image?:' .$row['Image']. '<br>';
                    echo 'isFlagged:' .$row['isFlagged']. '<br>';
                    echo 'category:' .$row['Category']. '<br>';
                    echo 'Quantity:'  .$row['quantity']. '<br><br><br>';
                 
                    }
  $result->close();
  $conn->close();
         

        ?>

		<?php include '../functions/footer.php';?>
	</body>
</html>
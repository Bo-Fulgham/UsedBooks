<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8" />
        <title>Search</title>
        <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="extfiles/regLogStyle.css">


    </head>
    <body>
        <?php

          require_once '../functions/login.php';
          require '../functions/pagesbar.php';
        $conn = new mysqli($hn, $un, $pw, $db);
        if ($conn->connect_error)
            die($conn->connect_error);
        if(isset($_GET['search_terms'])){
        $terms = $_GET['search_terms'];
        $_SESSION['search_terms'] = $terms;}
        else{
            $terms = $_SESSION['search_terms'];
        }
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
                echo 'Title: ' . $row['Title'] . '<br>';
                echo 'Author: '     . $row['Author']     . '<br>';
                //echo 'BookID: '   . $row['bookID']   . '<br>';
                echo 'ISBN: '    . $row['ISBN']    . '<br>';
                echo 'Publisher: '     . $row['Publisher']. '<br>';
                echo 'Price:' .$row['Price'] . ' <br>';
                //echo 'Image?:' .$row['Image']. '<br>';
                //echo 'isFlagged:' .$row['isFlagged']. '<br>';
                //echo 'category:' .$row['Category']. '<br>';
                echo 'In Stock:'  .$row['quantity']. '<br>';
                echo '<form action ="search.php" method="post">
               <p align="center"><button name ="add_to_cart" value = '.$row['bookID'].' type="submit">Add to cart</button></p>';
                echo '</form>';
                echo '<br><br><hr /><br>';
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
                echo 'Title: ' . $row['Title'] . '<br>';
                echo 'Author: '     . $row['Author']     . '<br>';
                //echo 'BookID: '   . $row['bookID']   . '<br>';
                echo 'ISBN: '    . $row['ISBN']    . '<br>';
                echo 'Publisher: '     . $row['Publisher']. '<br>';
                echo 'Price:' .$row['Price'] . ' <br>';
                //echo 'Image?:' .$row['Image']. '<br>';
                //echo 'isFlagged:' .$row['isFlagged']. '<br>';
                //echo 'category:' .$row['Category']. '<br>';
                echo 'In Stock:'  .$row['quantity']. '<br>';
                echo '<form action ="search.php" method="post">
               <p align="center"><button name ="add_to_cart" value = '.$row['bookID'].' type="submit">Add to cart</button></p>';
                echo '</form>';
                echo '<br><br><hr /><br>';
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
                echo 'Title: ' . $row['Title'] . '<br>';
                echo 'Author: '     . $row['Author']     . '<br>';
                //echo 'BookID: '   . $row['bookID']   . '<br>';
                echo 'ISBN: '    . $row['ISBN']    . '<br>';
                echo 'Publisher: '     . $row['Publisher']. '<br>';
                echo 'Price:' .$row['Price'] . ' <br>';
                //echo 'Image?:' .$row['Image']. '<br>';
                //echo 'isFlagged:' .$row['isFlagged']. '<br>';
                //echo 'category:' .$row['Category']. '<br>';
                echo 'In Stock:'  .$row['quantity']. '<br>';
                echo '<form action ="search.php" method="post">
               <p align="center"><button name ="add_to_cart" value = '.$row['bookID'].' type="submit">Add to cart</button></p>';
                echo '</form>';
                echo '<br><br><hr /><br>';
                }
        if(isset($_POST['add_to_cart'])){
            $bookID = $_POST['add_to_cart'];
            $email = $_SESSION['email'];
            $query  = "INSERT INTO cart (BookID, UserID)
            VALUES ('$bookID', '$email')";
            $result = $conn->query($query);
            if (!$result)
                die($conn->error);


        }
    echo "</div>";

        //$_SESSION['bookID'] = $bookID;

//$result->close();
  $conn->close();
         
        ?>

        <?php include '../functions/footer.php';?>
        <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
        <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
    </body>
</html>
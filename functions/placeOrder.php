<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once '../functions/login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($connection->connect_error);

  //fields for book are bookID, ISBN, title, author, publisher, price, edition, category, quantity, image and isFlagged
  //required fields throw errors
  //$ISBNErr = $titleErr = $authorErr = $pubErr = $priceErr = $catErr = "";
  $cartErr = "";
  /*if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(empty($_POST["cart"]))
    {
      $cartErr = "Cart is empty";
    }*/

    //Finds highest orderNum, new orderNum is next integer
    $query  = "SELECT orderNum FROM orders";
    $result = $connection->query($query);
    if (!$result) 
      die($connection->error);
    $rows = $result->num_rows;
    $orderNum = 0;
    for ($i = 0; $i <= $rows; ++$i) {
        //echo "bookID: " . $i . "<br>";
        $result->data_seek($i);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        //echo "inventory table contains: " . $row['bookID'] . "<br>";
        //If there is a gap in book IDs meaning a book has been deleted, use the open bookID
        if ($i != $row['orderNum']) {
          $orderNum = $i;
          break;
        $orderNum = $i + 1;
        }
    }
    $sessemail = $_SESSION['email'];
    $query = "SELECT bookID FROM cart WHERE userID = '$sessemail'";
    $result = $connection->query($query);
    if (!$result) 
      die($connection->error);
    $rows = $result->num_rows;
    $cart = array_fill(0, $rows, NULL);
    for ($i = 0; $i <= $rows; ++$i) {
        $result->data_seek($i);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $cart[$i] = $row['bookID'];
        $query2 = "DELETE FROM cart WHERE bookID = '$cart[$i]'";
        $result2 = $connection->query($query2);
        if (!$result2) 
          die($connection->error);
    }

    echo "Order Number: " . $orderNum . "<br>";
    $trackingNum = rand(10000000000, 99999999999);
    echo "Tracking Number: " . $trackingNum . "<br>";
    $orderDate = date("Y/m/d h:i:sa");
    echo "Order Date: " . $orderDate . "<br>";
    $d=strtotime("tomorrow");
    $shipDate = date("Y/m/d", $d);
    echo "Shipping Date: " . $shipDate . "<br>";
    $d=strtotime("+ 3 Days");
    $arrivalDate = date("Y/m/d", $d);
    echo "Estimated Arrival Date: " . $arrivalDate . "<br>";
    $itemsOnOrder = sizeof($cart);
    echo "Number of Items in order: " . $itemsOnOrder . "<br>";
    $totalPrice = 0.00;
    for ($i = 0; $i < sizeof($cart); $i++) {
      //echo $cart[$i] . "<br>";
      $query  = "SELECT price FROM inventory WHERE bookID = '$cart[$i]'";
      $result = $connection->query($query);
      if (!$result) 
        die($connection->error);
      $result->data_seek($i);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      //echo $row['price'] . "<br>";
      $totalPrice = $totalPrice + $row['price'];
    }
    echo "Total Price: " . $totalPrice . "<br>";
    echo "Cart array goes here<br>";
    $email = $_SESSION['email'];
    echo "Email: " . $email . "<br>"; 
    //echo $cartErr;
    if($cartErr == ""){
      //echo "<p> entering function </p>";
    place_order($connection, $orderNum, $trackingNum, $orderDate, $shipDate, $arrivalDate, $itemsOnOrder, $totalPrice, $cart, $email);
    echo "<p>Order Placed.  Order Number is " . $orderNum . ".</p>";
  }
 

    $result->close();
  //}

function place_order($connection, $orderNum, $trackingNum, $orderDate, $shipDate, $arrivalDate, $itemsOnOrder, $totalPrice, $cart, $email)
  {
    //for ($i = 0; $i < sizeof($cart); ++$i){
      $bookIDs = "";
      for ($i = 0; $i < sizeof($cart); ++$i){
        $bookIDs .= $cart[$i];
        if ($i + 1 < sizeof($cart))
          $bookIDs .= ", ";
      }

      $query  = "INSERT INTO orders (orderNum, trackingNum, orderDate, shipDate, arrivalDate, itemsOnOrder, totalPrice, bookIDs, email) "
              . "VALUES('$orderNum', '$trackingNum', '$orderDate', '$shipDate', '$arrivalDate', '$itemsOnOrder', '$totalPrice', '$bookIDs', '$email')";
      $result = $connection->query($query);
      if (!$result) die($connection->error);

  }
    $connection->close();
?>
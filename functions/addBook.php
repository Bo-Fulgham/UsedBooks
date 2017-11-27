<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once '../functions/login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($connection->connect_error);

  //fields for book are bookID, ISBN, title, author, publisher, price, edition, category, quantity, image and isFlagged
  //required fields throw errors
  $ISBNErr = $titleErr = $authorErr = $pubErr = $priceErr = $catErr = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(empty($_POST["ISBN"]))
    {
      $ISBNErr = "Enter an ISBN";
    }
    //ISBN must be 13 digit INT
    elseif (!filter_var($_POST["ISBN"], FILTER_VALIDATE_INT) && strlen((string)$_POST["ISBN"]) != 13) 
    {
     $ISBNErr = "ISBN must be a 13 digit integer"; 
    }

    if(empty($_POST["title"]))
    {
      $titleErr = "Enter a tile";
    }
    if(empty($_POST["publisher"]))
    {
      $pubErr = "Enter a publisher";
    }
    if(empty($_POST["price"]))
    {
      $priceErr = "Enter a price";
    }
    elseif (!filter_var($_POST["price"], FILTER_VALIDATE_FLOAT))
    {
      $priceErr = "Price must be a valid float";
    }
    if(empty($_POST["category"]))
    {
      $catErr = "Enter a category";
    }

    //Finds highest bookID, new book's ID is next integer
    $query  = "SELECT bookID FROM inventory";
    $result = $connection->query($query);
    if (!$result) 
      die($connection->error);
    $rows = $result->num_rows;
    $bookID = 0;
    for ($i = 0; $i <= $rows; ++$i) {
        //echo "bookID: " . $i . "<br>";
        $result->data_seek($i);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        //echo "inventory table contains: " . $row['bookID'] . "<br>";
        //If there is a gap in book IDs meaning a book has been deleted, use the open bookID
        if ($i != $row['bookID']) {
          $bookID = $i;
          break;
        $bookID = $i + 1;
        }
    }
    //$result->close();
    //echo "for loop done, new bookID is " . $bookID . "<br>";
    echo $ISBNErr . $titleErr . $pubErr. $priceErr. $catErr;
    if($ISBNErr == "" and $titleErr == "" and $pubErr == "" and $priceErr == "" and $catErr == ""){
      //echo "<p> entering function </p>";
    add_book($connection, $bookID, $_POST["title"], $_POST["ISBN"], $_POST["author"], $_POST["publisher"], $_POST["price"], $_POST["edition"], $_POST["category"]);
    echo "<p>Book added.  ID is " . $bookID . ".</p>";
  }
        /* //$result->close();
    if($ISBNErr == "" and $titleErr == "" and $pubErr == "" and $priceErr == "" and $catErr == ""){
      add_book($connection, $bookID, $_POST["title"], $_POST["ISBN"], $_POST["author"], $_POST["publisher"], $_POST["price"], $_POST["edition"], $_POST["category"]);
      echo "<p> Book Added </p>";
    }*/
  
 

    $result->close();
  }

//ADD CODE TO ADD IMAGE LATER
  function add_book($connection, $bookID, $title, $ISBN, $author, $publisher, $price, $edition, $category)
  {
    $query  = "INSERT INTO inventory (bookID, title, ISBN, author, publisher, price, edition, category, isFlagged, quantity) "
            . "VALUES('$bookID', '$title', '$ISBN', '$author', '$publisher', '$price', '$edition', '$category', 0, 0)";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
    $connection->close();
?>

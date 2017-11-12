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
      $ISBNErr = "Invalid ISBN";
    }
    //ISBN must be 13 digit INT
    elseif (!filter_var($_POST["ISBN"], FILTER_VALIDATE_INT) && strlen((string)$_POST["ISBN"]) != 13) 
    {
     $ISBNErr = "Invalid ISBN"; 
    }

    if(empty($_POST["title"]))
    {
      $titleErr = "Invalid Title";
    }
    if(empty($_POST["publisher"]))
    {
      $pubErr = "Invalid Publisher";
    }
    if(empty($_POST["price"]))
    {
      $priceErr = "Invalid Price";
    }
    elseif (!filter_var($_POST["price"], FILTER_VALIDATE_FLOAT))
    {
      $priceErr = "Invalid Price";
    }
    if(empty($_POST["category"]))
    {
      $catErr = "Invalid Category";
    }

    //Finds highest bookID, new book's ID is next integer
    $query  = "SELECT bookID FROM inventory";
    $result = $connection->query($query);
    if (!$result) 
      die($connection->error);
    $rows = $result->num_rows;
    $bookID = 0;
    for ($i = 0; $i <= $rows; ++$i) {
        echo "bookID: " . $i . "<br>";
        $result->data_seek($i);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo "inventory table contains: " . $row['bookID'] . "<br>";
        //If there is a gap in book IDs meaning a book has been deleted, use the open bookID
        if ($i != $row['bookID']) {
          $bookID = $i;
          break;
        $bookID = $i + 1;
        }
    }
    echo "for loop done, new bookID is " . $bookID . "<br>";

    if($ISBNErr == "" and $titleErr == "" and $pubErr == "" and $priceErr == "" and $catErr == ""){
    add_book($connection, $bookID, $_POST["title"], $_POST["ISBN"], $_POST["author"], $_POST["publisher"], $_POST["price"], $_POST["edition"], $_POST["category"]);
    echo "<p> Book Added </p>";
  }
    
  }

 /* echo '
  <form action="account.php" method="POST">
  Title: <span class="error"> $titleErr</span> <br>
  <input type="text" name="title" value="' . isset($_POST['title']) ? $_POST['title'] : ''.'<br>
  ISBN: <span class="error"> $ISBNErr</span> <br>
  <input type="test" name="ISBN" value="' . isset($_POST['ISBN']) ? $_POST['ISBN'] : ''.'<br>
  Author: <span class="error"> $authorErr</span> <br>
  <input type="test" name="author" value="' . isset($_POST['author']) ? $_POST['author'] : ''.'<br>
  Publisher: <span class="error"> $pubErr</span> <br>
  <input type="test" name="publisher" value="' . isset($_POST['publisher']) ? $_POST['publisher'] : ''.'<br> 
  Price: <span class = "error"> $priceErr</span><br>
  <input type="text" name ="price" value="' . isset($_POST['price']) ? $_POST['price'] : ''.'<br>
  Edition:<br>
  <input type="text" name="edition" value="' . isset($_POST['edition']) ? $_POST['edition'] : ''.'<br>
  Category: <span class = "error"> $catErr</span><br>
  <input type="text" name="category" value="' . isset($_POST['category']) ? $_POST[''] : ''.'<br><br>
  <input type="submit" value="Add book">
  </form>
';*/

  //$connection->close();
  //fields for book are bookID, ISBN, title, author, publisher, price, edition, category, quantity, image and isFlagged
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

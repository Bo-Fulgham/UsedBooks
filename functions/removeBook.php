<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require_once '../functions/login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($connection->connect_error);
  //Finds highest bookID, new book's ID is next integer
  $query  = "SELECT * FROM inventory WHERE isFlagged = 1";
  $result = $connection->query($query);
  if (!$result) 
    die($connection->error);
  $rows = $result->num_rows;
  $bookIDErr = "";
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    if(empty($_POST["bookID"]))
    {
      $bookIDErr = "Enter a bookID";
    }
    //ISBN must be 13 digit INT
    elseif (!filter_var($_POST["bookID"], FILTER_VALIDATE_INT)) 
    {
     $bookIDErr = "Book ID must be an integer"; 
    }
    echo "Enter twice to delete";
    delete_book($_POST["bookID"]);
  }
  echo '<br>';
  //Table header
  echo '<tr><td><b>Title</b></td><td><b>Author</b></td><td><b>Category</b></td><td><b>ISBN</b></td><td><b>Price</b></td><td><b>ID</b></td></tr>'; 
  //echo '<th><td>Author</td> Title Category Year ISBN</th>';
  $deleteID = 0;
  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);       
    echo '<tr><td>' . $row['Title'];
    echo '<td>' . $row['Author'] . '</td>';
    echo '<td>' . $row['Category'] . '</td>';
    echo '<td>' . $row['ISBN'] . '</td>';
    echo '<td>' . $row['Price'] . '</td>';
    echo '<td>' . $row['bookID'] . '</td>';
    //$deleteID = $row['bookID'];
    //echo $deleteID;
    //echo '<td> <button onclick="delete_book($deleteID)">Delete</button> <td></tr><br>';
    //echo '<td><input type="submit" name="delete" value="'.$row['bookID'].'" /></td>"';
    //$query = "DELETE FROM inventory WHERE bookID = '$bookID'";
    //$result = $connection->query($query);
  }
  //echo "hello";
  //echo $deleteID;
  //$deleteID = 5;
 // delete_book($deleteID);
  //$query = "DELETE FROM inventory WHERE bookID = '$deleteID'";
  //$result = $connection->query($query);
  //$result->close();
  //$result = $connection->query($query);

  /*if($ISBNErr == "" and $titleErr == "" and $pubErr == "" and $priceErr == "" and $catErr == ""){
  add_book($connection, $bookID, $_POST["title"], $_POST["ISBN"], $_POST["author"], $_POST["publisher"], $_POST["price"], $_POST["edition"], $_POST["category"]);
  echo "<p> Book Added </p>";*/
//}
  

  //$connection->close();
  //fields for book are bookID, ISBN, title, author, publisher, price, edition, category, quantity, image and isFlagged
//ADD CODE TO ADD IMAGE LATER
  /*function add_book($connection, $bookID, $title, $ISBN, $author, $publisher, $price, $edition, $category)
  {

    $query  = "INSERT INTO inventory (bookID, title, ISBN, author, publisher, price, edition, category, isFlagged, quantity) "
            . "VALUES('$bookID', '$title', '$ISBN', '$author', '$publisher', '$price', '$edition', '$category', 0, 0)";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }*/
  function delete_book($bookID) {
   // echo 'hello';
    global $connection;
    $query = "DELETE FROM inventory WHERE bookID = '$bookID'";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
  $connection->close();
?>

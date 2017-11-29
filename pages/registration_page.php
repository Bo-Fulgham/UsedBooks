<?php //setupusers.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);


  require_once '../functions/login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($connection->connect_error);
  $emailErr = $passErr = $addrErr = "";
  $salt1    = "qm&h*";
  $salt2    = "pg!@";

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {

    if(empty($_POST["email"]))
    {
      $emailErr = "Invalid email";
    }
    elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) 
    {
     $emailErr = "Invalid email"; 
    }

    if(empty($_POST["password"]))
    {
      $passErr = "Invalid Password";
    }
    elseif (strlen($_POST["password"]) <= 6) {
      $passErr = "Invalid Password";
    }
    if(empty($_POST["address"]))
    {
      $addrErr = "Invalid address";
    }
    if($addrErr == "" and $passErr == "" and $emailErr == ""){
    $password = $_POST["password"];
    $token    = hash('ripemd128', "$salt1$password$salt2");
    add_user($connection, $_POST["email"], $token, $_POST["address"], $_POST["major"]);
    echo "<p> Account created </p>";
  }
    
  }
  echo <<< _END
  <h1> Create Account Page </h1>
  <p> <a href='home.php'>Home</a> </p>
  <p> <a href='about.php'>About</a> </p>
  <p> <a href='contact.php'>Contact Us</a> </p>
  <p> <a href='login_page.php'>Login</a> </p>
  <form method='get' action='search.php'>
  <p>Search: <input name='search_terms' type='text' size='25' maxlength='30'> </p>
    <p>
      <!-- input types 'submit' and 'reset' insert  -->
        <!-- buttons for submitting and clearing the  -->
        <!-- form's contents                          --> 
        <input type='submit' value='Search'>
        </form>
    </p>
  <p> <a href='cart.php'>Cart</a> </p>
  <form action="registration_page.php" method="POST">
  Email: <span class="error"> $emailErr</span> <br>
  <input type="text" name="email"><br>
  
  Password: <span class = "error"> $passErr</span><br>
  <input type="text" name ="password"><br>
  Address: <span class ="error"> $addrErr </span><br>
  <input type="text" name="address"><br>
  Major:<br>
  <input type="text" name="major"><br><br>
  <input type="submit" value="Create Account">
  </form>
_END;

  //$connection->close();
  
  function add_user($connection, $email, $token, $address, $major)
  {
    $query  = "INSERT INTO users (email, password, address, major) "
            . "VALUES('$email', '$token', '$address', '$major')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
  $connection->close();
?>


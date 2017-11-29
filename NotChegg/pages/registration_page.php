<?php //setupusers.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  echo '
  <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="extfiles/regLogStyle.css">';

  require_once '../functions/login.php';
  require '../functions/pagesbar.php';

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
    echo "<p class='center1'> Account created </p>";
  }

  }

  echo <<< _END
  <div class="container1 center">
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
   </div>
  <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
  <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
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


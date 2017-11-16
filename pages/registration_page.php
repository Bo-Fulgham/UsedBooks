<?php //setupusers.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  require '../functions/pagesbar.php';
  require '../functions/header.php';

  echo <<< _END
   <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">;
   <style style="text/css">
   .container1 {

     width: 500px;
     clear: both;
     border-radius: 25px;
     background: #F9690E;
     border: 2px solid #F9690E;
     padding: 20px;
     width: inherit;
     height: inherit;

   }
  .container1 input {

      width: 100%;
      clear: both;

   }
   .center {
     margin: auto;
     margin-top: 10px;
     width: 50%;

   }
   .center h1{
     text-align: center;
   }
  </style>
_END;

  require_once '../functions/login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
  if ($connection->connect_error) die($connection->connect_error);
  $emailErr = $passErr = $addrErr = "";
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
    add_user($connection, $_POST["email"], $_POST["password"], $_POST["address"], $_POST["major"]);
    echo "<h3><p> Account created </p></h3>";
  }

  }
  echo <<< _END

  <div class = "container1 center">
    <h1> Create an Account</h1>
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


_END;

  include '../functions/footer.php';

  echo '<script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
  <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>';


  //$connection->close();

  function add_user($connection, $email, $password, $address, $major)
  {

    $query  = "INSERT INTO users (email, password, address, major) "
            . "VALUES('$email', '$password', 'address', '$major')";
    $result = $connection->query($query);
    if (!$result) die($connection->error);
  }
  $connection->close();
?>

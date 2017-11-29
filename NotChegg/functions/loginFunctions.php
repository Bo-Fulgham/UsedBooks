<?php 
    require_once 'login.php'; // file that contains database credentials 
    $connection = new mysqli($hn, $un, $pw, $db);
    // place useful functions here
    // Is someone already logged in? If so, forward them to the correct page
    function isLoggedIn() {
        if(!isset($_POST['email'], $_POST['password'])){
            $_SESSION['logged_in'] = false;
        }
        if($_SESSION['logged_in'] == true){
            header('Location: home.php');
        }
        else {
            $_SESSION['logged_in'] = false;
        }
    }
    // Were a username and password provided? If so check them against
    // the database.                  
    //      If username / password were valid, set session variables
    //      and forward them to the correct page
    function checkCredentials() {
        global $connection;
        if(isset($_POST['email'], $_POST['password'])) 
        {     
        $email = $_POST['email']; 
        $password = $_POST['password']; 
        //echo "$name, $password <br>";
        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = $connection->query($query);
        $rows = $result->num_rows;
            if($rows > 0)
            {
            echo "email was correct<br>";
            $salt1    = "qm&h*";
            $salt2    = "pg!@";
            $passwordH = hash('ripemd128', "$salt1$password$salt2");
            //echo $passwordH;
            $query = "SELECT password FROM users WHERE password = '$passwordH' AND email = '$email'";
            $result = $connection->query($query);
            $rows = $result->num_rows;
                if($rows > 0)
                {
                  echo 'password correct<br>';
                  $_SESSION['logged_in'] = true; 
                  echo 'The email and password are correct.';
                  $_SESSION['email'] = $email;
                  if ($email == 'admin@notChegg.com'){
                    $_SESSION['isAdmin'] = 1;
                    echo '<p>You are an admin<p>';
                  }
                  else {
                    $_SESSION['isAdmin'] = 0;
                    echo '<p>You are a normal user</p>';
                  }
                  header('Location: home.php');
                  exit();
                }
                else
                {
                    echo 'The email or password are incorrect!';
                    $_POST['email'] = $email;
                    $_POST['password'] = $password;
                }
            }
            else {
                echo "Account does not exist";
            }
        }
    }
?>
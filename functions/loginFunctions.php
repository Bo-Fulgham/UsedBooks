<?php 
    require_once 'login.php'; // file that contains database credentials 
    $connection = new mysqli($hn, $un, $pw, $db);
    session_start();

    // place useful functions here
    // Is someone already logged in? If so, forward them to the correct page
    function isLoggedIn() {
        if(!isset($_POST['username'], $_POST['password'])){
            $_SESSION['logged_in'] = false;
        }
        if($_SESSION['logged_in'] == true){
            /*if ($_SESSION['type'] == 'user'){
                header('Location: user_page.php');
            }
            if ($_SESSION['type'] == 'admin') {
                header('Location: admin_page.php');
            }*/
            header('Location: about.php');
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
        if(isset($_POST['username'], $_POST['password'])) 
        {     
        $name = $_POST['username']; 
        $password = $_POST['password']; 
        //echo "$name, $password <br>";

        $query = "SELECT username FROM users WHERE username = '$name'";
        $result = $connection->query($query);
        $rows = $result->num_rows;
            if($rows > 0)
            {
            echo "username was correct<br>";
            /*$salt1    = "qm&h*";
            $salt2    = "pg!@";
            $passwordH = hash('ripemd128', "$salt1$password$salt2");
            $query = "SELECT password FROM users WHERE password = '$passwordH' AND username = '$name'";*/
            $query = "SELECT password FROM users WHERE password = '$password' AND username = '$name'";
            $result = $connection->query($query);
            $rows = $result->num_rows;
                if($rows > 0)
                {
                  echo 'password correct<br>';
                  $_SESSION['logged_in'] = true; 
                  echo 'The username and password are correct.';
                  if ($password == 'admin'){
                    $_SESSION['isAdmin'] = 1;
                    //header('Location: admin_page.php');
                    echo '<p>You are an admin<p>';
                  }
                  else {
                    $_SESSION['isAdmin'] = 0;
                    //header('Location: user_page.php');
                    echo '<p>You are a normal user</p>';
                  }
                  exit();
                }
                else
                {
                    echo 'The username or password are incorrect!';
                    $_POST['username'] = $name;
                    $_POST['password'] = $password;
                }
            }
        }
    }
?>
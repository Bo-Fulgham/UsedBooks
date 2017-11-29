<?php 
    require_once 'login.php'; // file that contains database credentials 
    $connection = new mysqli($hn, $un, $pw, $db);

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
            /*$salt1    = "qm&h*";
            $salt2    = "pg!@";
            $passwordH = hash('ripemd128', "$salt1$password$salt2");
            $query = "SELECT password FROM users WHERE password = '$passwordH' AND username = '$name'";*/
            $salt1    = "qm&h*";
            $salt2    = "pg!@";
            $passwordH = hash('ripemd128', "$salt1$password$salt2");
            $query = "SELECT password FROM users WHERE password = '$passwordH' AND email = '$email'";
            $result = $connection->query($query);
            $rows = $result->num_rows;
                if($rows > 0)
                {
                  echo 'password correct<br>';
                  $_SESSION['logged_in'] = true; 
                  echo 'Account confirmed';
                  if ($email == 'admin@notChegg.com'){
                    $_SESSION['isAdmin'] = 1;
                    echo '<p>You are an admin<p>';
                  }
                  else {
                    $_SESSION['isAdmin'] = 0;
                    
                  }
                   header('Location: delete_page.php');
                  exit();
                }
                else
                {
                    echo 'The email or password are incorrect!';
                    $_POST['email'] = $email;
                    $_POST['password'] = $password;
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    </head>
    <?php
        session_start();
        setcookie (session_id(), "", time() - 3600);
        session_destroy();
        session_write_close();
        // remove session and session cookie
        
    ?> 
    <body>
        <h1>Logged Out</h1>
        <p>
            You are now logged out of the website.
        </p>
        <p>
            <?php 
            header('Location: home.php');
            ?>
        </p>
    </body>
</html>
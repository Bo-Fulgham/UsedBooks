<!DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8" />
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="extfiles/regLogStyle.css">';

</head>
<body>
<?php require '../functions/pagesbar.php';?>
<div class="container">
    <header class="w3-container orange w3-center" style="padding:128px 16px">

        <h1 class="w3-margin w3-jumbo">NotChegg.com</h1><br />
        <p class="w3-xlarge">Account Actions</p> <br />

        <p class="center"> <button onclick="window.location.href='delete_page.php'">Delete Account</button></p>



    </header>
</div>


<?php
if ($_SESSION['logged_in'] == false){
    header('Location: home.php');
}
// is an Admin logged in?
if($_SESSION['isAdmin'] == 1){
    echo "<p align='center'><h3><a href='adminAddBook.php'>Add Books</a> </h3></p>";
    echo "<p align='center'><h3><a href='adminRemoveBook.php'>Remove Books</a> </h3></p>";
}
?>

<?php include '../functions/footer.php';?>
</body>
</html>

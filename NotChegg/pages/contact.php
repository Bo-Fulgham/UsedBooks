<!DOCTYPE html>
<html>
	<head>
		<meta charset ="utf-8" />
		<title>Contact</title>
        <link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
            .center {
                text-align: center;
                vertical-align: middle;
            }
            .jumbotron{
                height: 100vh;
            }
            .orange {
                background-color: #F9690E;
            }
        </style>
    </head>
	<body>
		<?php require '../functions/pagesbar.php';?>

        <!-- Header -->
        <header class="w3-container orange w3-center" style="padding:128px 16px">
            <p>NotChegg.com</p>
            <h1 class="w3-margin w3-jumbo">Contact Us</h1>
            <p class="w3-xlarge"></p>
        </header>
        <div class="jumbotron">
            <div class="container">
                <h3 class="center">Call us!</h3>
                <p class="center">1-555-Not-Chegg</p>
                <h3 class="center">Email us!</h3>
                <p class="center">support@NotChegg.com</p>
            </div>
        </div>
		<?php include '../functions/footer.php';?>
        <script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
        <script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
    </body>
</html>
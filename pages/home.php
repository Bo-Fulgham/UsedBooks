<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">
		<style type="text/css">
		.col-centered{
    margin: 0 auto;
		}
		.center {

		}
		.carousel-caption{
			top: 50%;
			transform: translateY(-50%);
			bottom: initial;
		}
		.color-chegg{
			color: "#F9690E";
		}
		</style>

	</head>
	<body>
		<?php require '../functions/header.php';?>
		<?php require '../functions/pagesbar.php';?>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="First-slide" height="400px" width = "100%" src="https://images.unsplash.com/photo-1463320726281-696a485928c7?auto=format&fit=crop&w=1500&q=60&ixid=dW5zcGxhc2guY29tOzs7Ozs%3D" alt="First slide">
            <div class="container">
              <div class="carousel-caption">
								<h1>Not Chegg</h1>
								<p>Better prices, better service, and faster delivery!</p>
                <p><a class="btn btn-lg btn-primary" style="background-color:#F9690E;" href="about.php" role="button">About Us</a></p>
              </div>
            </div>
          </div>
      </div>
		</div>

		<div class="jumbotron">
			<div class="container-fluid">
				<h2 id="specials" align="center">Current Deals</h2>
				<br>
				<br>
			</div>
			<hr>
			<div class="container">
				<div class="row">
          <div class="col-lg-3 col-md-3 col-sm-6 col-centered">
						<div class="container">
							<img class="rounded-circle" src="https://www.htmlvalidator.com/jpg/Learning-PHP-MySQL-JavaScript-jQuery-CSS-HTML5-Nixon.JPG" alt="Generic placeholder image" width="140" height="140">
            	<h2>Title</h2>
            	<p>by Author</p>
            	<p><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
						</div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-centered">
						<div class="container">
            	<img class="rounded-circle" src="https://www.htmlvalidator.com/jpg/Learning-PHP-MySQL-JavaScript-jQuery-CSS-HTML5-Nixon.JPG" alt="Generic placeholder image" width="140" height="140">
							<h2>Title</h2>
            	<p>by Author</p>
            	<p><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
						</div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-centered">
						<div class="container">
							<img class="rounded-circle" src="https://www.htmlvalidator.com/jpg/Learning-PHP-MySQL-JavaScript-jQuery-CSS-HTML5-Nixon.JPG" alt="Generic placeholder image" width="140" height="140">
							<h2>Title</h2>
            	<p>by Author</p>
            	<p style="text-align:left;" ><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
						</div>
          </div><!-- /.col-lg-3 -->
					<div class="col-lg-3 col-md-3 col-sm-6 col-centered">
						<div class="container">
							<img class="rounded-circle" src="https://www.htmlvalidator.com/jpg/Learning-PHP-MySQL-JavaScript-jQuery-CSS-HTML5-Nixon.JPG" alt="Generic placeholder image" width="140" height="140">
							<h2>Title</h2>
            	<p>by Author</p>
            	<p><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
						</div>
          </div><!-- /.col-lg-3 -->
        </div>
			</div>
		</div>
	</div>

		<?php include '../functions/footer.php';?>

		<script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
		<script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>
</html>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset ="utf-8" />
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="extfiles/bootstrap.css">

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
								<h2 id="why">Why choose us?</h2>
								<p>Better prices, better service, and faster delivery!</p>
                <p><a class="btn btn-lg btn-primary" href="about.php" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
		</div>

		<div class="jumbotron">
			<div class="container">
				<h2 id="specials" align="center">Current Deals</h2>
				<br>
				<br>
			</div>
			<hr>
				<div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Title</h2>
            <p>by Author</p>
            <p><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
						<h2>Title</h2>
            <p>by Author</p>
            <p><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
						<h2>Title</h2>
            <p>by Author</p>
            <p><a class="btn btn-secondary" href="#" role="button">Learn More »</a></p>
          </div><!-- /.col-lg-4 -->
        </div>



		</div>
	</div>

		<?php include '../functions/footer.php';?>

		<script type="text/javascript" src="extfiles/jquery-2.1.4.js "></script>
		<script type="text/javascript" src="extfiles/bootstrap.min.js"></script>
	</body>
</html>

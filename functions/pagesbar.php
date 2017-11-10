<?php echo '
<style>
.navbar {
	margin-bottom: 0px;
}
</style>
<nav class="navbar navbar-inverse bg-inverse navbar-static-top">
<div class="container">
	<div class="navbar-header">
		<a href="home.php" class="navbar-brand" style="color:#F9690E;font-weight: bold;">Not Chegg</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="about.php" >About</a></li>
		<li><a href="contact.php" >Contact</a></li>
	</ul>
	<div class="nav navbar-nav navbar-right">
		<form class="navbar-form navbar-left">
					<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<li><a href="#">Cart (0)</a></li>
		<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
				<ul class="dropdown-menu">
						<li><a href="#">Your Account</a></li>
						<li><a href="#">Your Orders</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="login_page.php">Login</a></li>
						<li><a href="#">Logout</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="registration_page.php">Create Account</a></li>
					</ul>
			</li>
	</div>
</div>
</nav>
	';
?>

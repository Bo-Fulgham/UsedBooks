<?php
session_start();
echo '
<style>
.navbar {
	margin-bottom: 0px;
}
.navbar-inverse{
	background-color: #232B35;
	border-color: #232B35;
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
		<li><a href="textbooks.php">Textbooks</a></li>
	</ul>
	<div class="nav navbar-nav navbar-right">
		<form class="navbar-form navbar-left">
					<div class="form-group">
							<form method="get" action="search.php">
							<input name="search_terms" type="text" class="form-control" size="30" maxlength="30" placeholder="Enter ISBN, Author name, or Title">
								<input class="btn btn-md btn-primary" style="background-color:#F9690E;" type="submit" value="submit">Search</a></p>
							</form>
					</div>

				</form>
				<li><a href="cart.php">Cart (0)</a></li>
		<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account <span class="caret"></span></a>
				<ul class="dropdown-menu">
						<li><a href="account.php">Your Account</a></li>
						<li role="separator" class="divider"></li>
						';
						if (isset($_SESSION['logged_in'])){
								if ($_SESSION['logged_in'] == true){
									echo "<li><a href='logout.php'>Logout</a></li>";
								}
								else {
									echo "<li><a href='login_page.php'>Login</a></li>";
								}
							}
							else {
								echo "<li><a href='login_page.php'>Login</a></li>";
							}
echo '
						<li role="separator" class="divider"></li>
						<li><a href="registration_page.php">Create Account</a></li>
					</ul>
			</li>
	</div>
</div>
</nav>';

?>

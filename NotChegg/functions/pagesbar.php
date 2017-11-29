

<style type="text/css">
    .navbar {
        margin-bottom: 0px;
    }

    .navbar-inverse {
        background-color: #2C3E50;
        border-color: #2C3E50;
    }
    .navbar-default {
        background-color: #2C3E50;
        border-color: #2C3E50;
    }
</style>


<?php
session_start();
//$_SESSION['logged_in'] = false;

echo "
<nav class=\"navbar navbar-inverse bg-inverse navbar-static-top\">
<div class=\"container\">
	<div class=\"navbar-header\">
		<a href=\"home.php\" class=\"navbar-brand\" style=\"color:#F9690E;font-weight: bold;\">Not Chegg</a>
	</div>
	<ul class=\"nav navbar-nav\">
		<li><a href=\"about.php\" >About</a></li>
		<li><a href=\"contact.php\" >Contact</a></li>
	</ul>
	<div class=\"nav navbar-nav navbar-right\">
		<form class=\"navbar-form navbar-left\" method='get' action='search.php' >
            <div class=\"form-group\">
                    <form >
                        <input name='search_terms' type='text' size='25' maxlength='30' placeholder='Search'>
                        <input style=\"color:#2C3E50;background-color:#F9690E;border-color:#2C3E50;\" type='submit' value='Submit'>
                    </form>
            </div>
        </form>
				<li><a href=\"cart.php\">Cart</a></li>";
if (isset($_SESSION['logged_in'])){
    if ($_SESSION['logged_in'] == true){

        echo "
            <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" 
            role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
            Signed In<span class=\"caret\"></span></a>
            <ul class=\"dropdown-menu\">
            <li><a href=\"account.php\">Manage Account</a></li>
            <li role=\"separator\" class=\"divider\"></li>
            <li><a href=\"logout.php\">Logout</a></li></ul>
            </li> </div></div></nav>";
    }
    else {
        echo "
            <li class=\"dropdown\">
            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Sign In/Signup<span class=\"caret\"></span></a>
            <ul class=\"dropdown-menu\">
            <li><a href=\"login_page.php\">Login</a></li>
            <li role=\"separator\" class=\"divider\"></li>
            <li><a href=\"registration_page.php\">Create Account</a></li></ul>
            </li> </div></div></nav>";

    }
}
else {
    echo "
        <li class=\"dropdown\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Sign In/Signup<span class=\"caret\"></span></a>
        <ul class=\"dropdown-menu\">

        <li><a href=\"login_page.php\">Login</a></li>
        <li role=\"separator\" class=\"divider\"></li>
        <li><a href=\"registration_page.php\">Create Account</a></li></ul>
        </li> </div></div></nav>";

}

?>

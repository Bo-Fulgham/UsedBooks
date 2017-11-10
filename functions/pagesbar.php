<?php 
session_start();
echo "
	<p>	<a href='home.php'>NotChegg</a> </p>
	<p>	<a href='about.php'>About</a> </p>
	<p>	<a href='contact.php'>Contact Us</a> </p> ";
	if (isset($_SESSION['logged_in'])){
		if ($_SESSION['logged_in'] == true){
			echo "<p><a href='logout.php'>Logout</a> </p>";
		}
		else {
			echo "<p><a href='login_page.php'>Login</a></p>
				<p><a href='registration_page.php'>Register</a></p>";
		}
	}
	else {
		echo "<p><a href='login_page.php'>Login</a></p>
		<p><a href='registration_page.php'>Register</a></p>";
	}
echo "
	<p> <a href='account.php'>Account</a></p>
	<form method='get' action='search.php'>
	<p>Search: <input name='search_terms' type='text' size='25' maxlength='30'> </p>
    <p>
	    <!-- input types 'submit' and 'reset' insert  -->
        <!-- buttons for submitting and clearing the  -->
        <!-- form's contents                          --> 
        <input type='submit' value='Submit'>
    </p> </form>
	<p> <a href='cart.php'>Cart</a> </p>
	";
?>
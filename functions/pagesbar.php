<?php echo "
	<p>	<a href='home.php'>Home</a> </p>
	<p>	<a href='about.php'>About</a> </p>
	<p>	<a href='contact.php'>Contact Us</a> </p>
	<p>	<a href='login_page.php'>Login</a> </p>
	<form method='get' action='search.php'>
	<p>Search: <input name='search_terms' type='text' size='25' maxlength='30'> </p>  
    <p>
	    <!-- input types 'submit' and 'reset' insert  -->
        <!-- buttons for submitting and clearing the  -->
        <!-- form's contents                          --> 
        <input type='submit' value='Submit'>
    </p>
	<p> <a href='cart.php'>Cart</a> </p>
	";
?>
<?php
//establishing connection to the server the code for which is written in common.php 
require "common.php";
?>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css">	

	
    <title>About Us</title>

</head>
<body >
<?php
//including header _new.php which contains code for navigation bar of the page
include "header_new.php";
?>
<br><br><br><br><div class="container" >
  <div class="row">
           <div class="col-xs-6" >
		   <h3>Who are we? </h3>
		   <p>We are a group of young who come up with an idea of solving budget and time issues which we usually face in our daily lives.We are here to provide a budget controller according to your aspects.</p>
		   <p>Budget control is the biggest financial issue in the present world.One should look after their budget control to get rid off from their financial cricis.</p>
		   <h3>Contact Us</h3>
		   	<p><b>Email:</b> training@internshala.com</p>
			<p><b>Mobile:</b> +91-8448444853</p>
		   </div>
		   <div class="col-xs-6">
		    <h3>Why choose us?</h3>
			<p>We provide with a predominant way to control and manage your budget estimation with ease of accessing for multiple users.</p>
		   </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
//including footer.php which contains code for footer of the page
include "footer.php";
?>




</body>
</html>
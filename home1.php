<?php require"common.php";
?>
<html>
<head>
  <title>CtrlBudget</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="mystyle.css" type="text/css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>


<?php 
include "header_new.php";
?>
<br><br><br><br>
 <div class="container">
  <h1>You don't have any active plans.</h1>
         <center><div class="panel panel-default block col-xs-4 col-xs-offset-4">
	         <a href="createnewplanpage.php"><h3><span class=" glyphicon glyphicon-plus-sign"></span> Create a New Plan</h3></a>
			</div></center>
           	   
	   </div>
    
<br><br><br><br><?php
include "footer.php";
?>


</body>
</html>
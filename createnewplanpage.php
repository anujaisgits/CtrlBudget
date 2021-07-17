<?php require"common.php";
?>
<html>
<head>
  <title>Create a new plan</title>
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
</head>
<body>


<?php 
include "header_new.php";
?><br><br><br><br><br><br><br>
     <div class="container">
              <div class="row ">
			           <div class="col-xs-12 col-md-6 col-md-offset-3">
				                  <div class=" panel panel-success">
					                             <div class="panel-heading">
					                             <h1><center>Create New Plan <center> </h1>
					                             </div>
					                         	 <div class="panel-body">
						                                         <form action="plan_det.php" method="post">
     					                                               <div class="form-group ">
								                                            <b>Initial Budget</b>
						                                                     <input type="number" class="form-control " name="budget" required="true" placeholder="Initial Budget(Ex-4000)" min="50"/>
						                                                </div>
						                                                <div class="form-group">
								                                             <b>How many peoples you want to add in your group?</b>
						                                                     <input type="number" class="form-control " name="count" required="true" placeholder="No. of people" min="2"/>
                                                                        </div>
								                                        <br><div class="form-group">
 						                                                  <input type="submit" class="btn btn-success btn-block active" value="Next" class="form-control"/>
								                                        </div>
																		
						                                         </form>   
				                                    </div>
                                    </div>
                           </div>
                 </div>
   </div>
<br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
?>
</body>
</html>
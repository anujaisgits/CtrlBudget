<?php
require "common.php";
$total_expense=0;
$user_id=$_SESSION['id'];
/*fetching plan_id value which is appended in the link for vplan.php in home2.php and assigning it to $plan _id later we will set it as session variable because 
if we switch to other page and come back to this page again $plan_id variable do not get destroyed*/
if (!isset($_SESSION['plan_id']))
	{ $plan_id=$_GET['plan_id']; }
else{
  $plan_id=$_SESSION['plan_id'];
}
//now fetching all details of tha plan from plan_det table in the database
$select="select id,title,start_date,last_date,budget,count from plan_det where id=$plan_id and user_id=$user_id";
$select_query_result=mysqli_query($con,$select)or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
//selecting expenses of all person from plan_and_person table to get total expenses
$expense="select expenses from plan_and_person where plan_id=$plan_id";
$select_expense_result=mysqli_query($con,$expense)or die(mysqli_error($con));
//calculation for tatal expense
while($row_expense=mysqli_fetch_array($select_expense_result)){
   $total_expense=$total_expense+$row_expense['expenses'];
}
$remaining_amount=$row['budget']-$total_expense ;

?>
<html>
<head>
 
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.5.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   <link rel="stylesheet" href="style.css" type="text/css">
  	
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	

<title>View Plan</title>

</head>
<body>
<?php
include "header_new.php";
?><br><br><br><br> <br> 
<div class="container">
   <div class="row">
        <div class="col-xs-12 col-md-6">
		      <div class="panel panel-success">
			       <div class="panel-heading  ">
				    <div class="row">
                      <div class="col-xs-6">
				        <?php echo $row['title'] ;?>
					   </div>
					   <div class="col-xs-6">
					       <span class = "glyphicon glyphicon-user"><b>2</b></span> 
					   </div>
					  </div>
				     
				   </div>
				   <div class="panel-body">
				    <div class="row">
                      <div class="col-xs-6">
				        <b>Budget </b><br><br>
					   </div>
					   <div class="col-xs-6">
					       <?php echo $row['budget'] ;?>
					   </div>
					  </div>
                    <div class="row">
                      <div class="col-xs-6">
				        <b>Remaining Amount</b><br><br>
					  </div>
					   <div class="col-xs-6">
					     <?php if($remaining_amount<0){ 
						    $rem_amount=-$remaining_amount;?>
					       <div style="color:red;"><?php echo "Overspent By $rem_amount" ;?></div>
						  <?php  }
						    else{ ?>
						    <div style="text-color:green;"><?php echo $remaining_amount ;?></div>
						   <?php } ?>
					   </div>
					  </div>					  
					   <div class="row">
                      <div class="col-xs-6">
				        <b>Date </b><br><br>
					   </div>
					   <div class="col-xs-6">
					        <?php echo $row['start_date'];echo" to ";echo $row['last_date'];?>
					   </div>
					 </div>
				   </div>
	         <!----------------------------------------------SHOWING BILLS-------------------------------------------------->			   
				    <?php //selecting all the payments or bill paid any of the person involved in that from bill_det table and displaying it using while loop
					     $select_bill="select title_bill,amount_spent,paid_by,paid_on,file from bill_det where plan_id=$plan_id";
                          $select_bill_result=mysqli_query($con,$select_bill)or die(mysqli_error($con));
                          while($row_bill=mysqli_fetch_array($select_bill_result)){
                          							  
					?>    
		<div class="col-xs-6 col-md-6">
		      <br><div class="panel panel-success">
			       <div class="panel-heading property">
				    <div class="row">
                      <div class="col-xs-9">
				        <center><?php echo $row_bill['title_bill']; ?></center>
					   </div>
					   
					  </div>
				   </div>
				   <div class="panel-body">
				    <div class="row">
                      <div class="col-xs-6">
				        <b>Amount</b><br><br>
					   </div>
					   <div class="col-xs-6">
					       <?php echo $row_bill['amount_spent']; ?>
					   </div>
					  </div> 
					   <div class="row">
                      <div class="col-xs-6">
				        <b>Paid By </b><br><br>
					   </div>
					   <div class="col-xs-6">
					       <?php echo $row_bill['paid_by']; ?>
					   </div>
					 </div>
					<div class="row">
                      <div class="col-xs-6">
				        <b>Paid On </b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php echo $row_bill['paid_on']; ?>
					   </div>
					 </div>
					  <div class="row">
					   <div class="col-xs-12">
					      <?php //here we will check any image of the bill is available or not 
						  if(!$row_bill['file']){?>
						   <center><a href="" >You don't have bill</a></center>
						  <?php  }else{ ?>
		                  <center><a href="bill.php?bill_img=<?php echo $row_bill['file']; ?>" >Show bill</a></center>
						 <?php } ?>
					   </div>
					 </div>
				   </div>
				   
			  </div>
        </div>	
					<?php } ?>		   
			  </div>
			  
        </div>
	<!---------------------------------------------EXPENSE DISTRIBUTION BUTTON------------------------------------------------------------------------------------->	
        <div class="col-xs-12 col-md-4 col-md-offset-2">
		     <div class="but">
		 <center><a href="exp_dist.php?plan_id=<?php echo "$plan_id";?>" class="btn btn-success btn-lg active">Expense Disribution</a></center>
		 </div>
		<br><br><br><br><br><br><br>
    <!-----------------------------------------------------ADD NEW EXPENSE FORM------------------------------------------------------------------------------------->
		<div class=" panel panel-success">
					        <div class="panel-heading">
					           <center>Add New Expense <center> 
					        </div>
					      <div class="panel-body">
					
						       <form action="add_new_expense.php?plan_id=<?php echo "$plan_id";?>" method="post" enctype="multipart/form-data">
					                <div class="form-group">
									Title:
						           <input type="text" class="form-control " name="title" required="true" placeholder="Title"/>
                                  </div>
  						          <div class="form-group ">
								   Date:
						          <input type="date" class="form-control " name="paid_on" required="true" min="<?php echo $row['start_date'];?>" max="<?php echo $row['last_date'];?>"/>
						           </div>
						           <div class="form-group">
								   Amount Spent:
								   <input type="text" class="form-control " name="amount_spent" required="true" placeholder="Amount Spent"/>
                                  </div>
								  <div class="form-group">
 						              <select class="form-control" placeholder="Choose" name="paid_by">
									  <?php $select_person="select person from plan_and_person where plan_id=$plan_id";
									         $select_person_result=mysqli_query($con,$select_person)or die(mysqli_error($con));
											 while($row_person=mysqli_fetch_array($select_person_result)){
									  ?>
									     <option><?php echo $row_person['person'] ?></option>
								 <?php } ?> 
						
									  </select>
								   </div>
								    <div class="form-group">
								   Upload Bill:
								   <input type="file" class="form-control " name="fileToUpload" id="fileToUpload"/>
                                  </div>
								<div class="form-group">
 						                <input type="submit" class="btn btn-success btn-block active form-control" value="Add" class="form-control" />
								</div>		
						       </form> 
						</div>
																		
								  
						         			
				   </div>
					
				</div>
		 
		   
        </div>		
   </div>

</div>
<?php
include "footer.php";
?>
</body>
</html>
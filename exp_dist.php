<?php
require "common.php";
$plan_id=$_GET['plan_id'];
//here is the query to fetch plan details as this page require budget and other things  for calculation 
$select="select title,start_date,last_date,budget,count from plan_det where id=$plan_id";
$select_result=mysqli_query($con,$select)or die(mysqli_error($con));
$row=mysqli_fetch_array($select_result);
?>
<html>
<head>
  <title>Expense distribution</title>
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
?>
<br><br><br><br> <br> 
<div class="container">
   <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
		      <div class="panel panel-success">
			       <div class="panel-heading  ">
				   
				    <center><?php echo $row['title'] ; ?></center>
				   </div>
				   <div class="panel-body">
				    <div class="row">
                      <div class="col-xs-6">
				        <b>Initial Budget </b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php echo $row['budget'] ; ?>
					   </div>
					  </div>
					<?php //here is the query for fetching the expenses of persons involved  and displaying them using while loop
					     $select_person="select person,expenses from plan_and_person where plan_id=$plan_id" ; 
                            $select_person_result=mysqli_query($con,$select_person)or die(mysqli_error($con));
							while($row_person=mysqli_fetch_array($select_person_result)){	?>  
                    <div class="row">
                      <div class="col-xs-6">
				        <b><?php echo $row_person['person'];?></b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php echo $row_person['expenses'] ; ?>
					   </div>
					  </div>
							<?php } ?> 
					
					     <div class="row">
                      <div class="col-xs-6">
				        <b>Total Amount Spent</b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php 
						  //here is the code for calculating the total amount spent in that plan i.e expenses of each person is added 
						    $total_expense=0;
						  $expense="select expenses from plan_and_person where plan_id=$plan_id";
                            $select_expense_result=mysqli_query($con,$expense)or die(mysqli_error($con));
                           while($row_expense=mysqli_fetch_array($select_expense_result)){
                              $total_expense=$total_expense+$row_expense['expenses'];
                             }
                              $remaining_amount=$row['budget']-$total_expense ;
						  echo "$total_expense" ; ?>
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
					  </div>   <div class="row">
                      <div class="col-xs-6">
				        <b>Individual Shares</b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php 
						  $count=$row['count'];//no. of people involved
						  $individual_share=$total_expense/$count;
						  echo  " $individual_share "; ?>
					   </div>
					  </div>
					  <?php
					   //here is the code for calculating the total amount spent by an individual in that plan  
					    $expense_and_person="select person,expenses from plan_and_person where plan_id=$plan_id";
                            $select_expense_and_person_result=mysqli_query($con,$expense_and_person)or die(mysqli_error($con));
                           while($row_expense_and_person=mysqli_fetch_array($select_expense_and_person_result)){
							   $spent_amount=$row_expense_and_person['expenses'];
     					  ?>
					   <div class="row">
                      <div class="col-xs-6">
				        <b><?php echo $row_expense_and_person['person']; ?> </b><br><br>
					   </div>
					   <div class="col-xs-6">
					      <?php 
						   $net1=$spent_amount-$individual_share;
						   if($individual_share==0){?>
						    <div> All Settled Up</div>
						   <?php	}else{
						   	 if($net1<0){
                                $net=-$net1;	 ?>
					          <div style="color:red;"><?php echo "Owes $net" ;?></div>
						  <?php  }
						    else{ 
							 $net=$net1;?>
							  
						    <div style="color:green;"><?php echo "Gets back $net" ;?></div>
						   <?php } 
						   }	  ?>
				
					   </div>
					 </div>
						   <?php } ?>
                          <center> <a href="vplan.php?plan_id=<?php echo "$plan_id";?>"><button type="button" class="btn btn-success">Go Back</button></a></center> 						   
				   </div>
				    </div>
					
				   </div>
				   
			  </div>
        </div>
     </div>
</div>



<br><br><br><br>
<?php 
include "footer.php";

?>	
	

</body>
</html>
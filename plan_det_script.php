<?php
//objective of this page is to store the name of persons involved in a particular plan of the user 
require "common.php";
//fetching details from the form available in plan_det.php
$user_id=$_SESSION['id'];
$title=$_POST ['title'];     
$start_date=$_POST['from'];
$last_date=$_POST['to'];
$budget=$_GET['budget'];
$count=$_GET['count'];
//inserting the details of the plan into plan_det table
$insert="insert into plan_det (user_id,title,start_date,last_date,budget,count) values ($user_id,'$title','$start_date','$last_date',$budget,$count)";
mysqli_query($con,$insert)or die(mysqli_error($con));
//fetching the id of the plan which is inserted into plan_det table
$plan_id=mysqli_insert_id($con)or die(mysqli_error($con));
//assigning the name of persons obtained from plan_det.php into $person variable
  $person=array($_POST['person']);
//now inserting the name of persons into the table plan and person and setting the expense of each person to zero as in begining expense of each is zero 
	for($i=0;$i<$count;$i++){
     $q=$person[0][$i];
	 $insert="insert into plan_and_person (plan_id,person,expenses) values ($plan_id,'$q',0)";
	 mysqli_query($con,$insert)or die(mysqli_error($con));
	 header('location:home2.php');
	}
?>
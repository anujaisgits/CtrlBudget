<html>
<head>
<?php 
require "common.php";
$user_id=$_SESSION['id'];
//fetching plan_id value which is appended in the link 
$plan_id=$_GET['plan_id'];
//fetching data obtained from add new expense form  
$title_bill=$_POST['title'];
$paid_on=$_POST['paid_on'];
$amount_spent=$_POST['amount_spent'];
$paid_by=$_POST['paid_by'];
$target_dir = "uploads/";//defining directory for uloaded image of bill
$target_file = $target_dir .$user_id.time(). basename($_FILES["fileToUpload"]["name"]);//user id and time is used in the image name for its uniqueness in the upload directory
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//check valid file type
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "" ) {
    echo "<script>alert('Invalid file type');
	         location.href='vplan.php';
			 </script>";
  $uploadOk = 0;
}
 //if file has been uploaded successfully to the defined directory then insertion query wiil be executed
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	$insert="insert into bill_det (plan_id,title_bill,amount_spent,paid_by,paid_on,file) values ($plan_id,'$title_bill','$amount_spent','$paid_by','$paid_on','$target_file') ";
      mysqli_query($con,$insert)or die(mysqli_error($con));
	
	
  } else {
    $insert="insert into bill_det (plan_id,title_bill,amount_spent,paid_by,paid_on) values ($plan_id,'$title_bill','$amount_spent','$paid_by','$paid_on') ";
      mysqli_query($con,$insert)or die(mysqli_error($con));
	
  }
  //here is the query for updating the expenses of a person who paid the bill.The amount spent will be added to his expenses and then updated
   $select_expense="select expenses from plan_and_person where plan_id=$plan_id and person='$paid_by'";
       $select_expense_result=mysqli_query($con,$select_expense);
        $total_expense_person=mysqli_fetch_array($select_expense_result);
        $total_expense_person1=$total_expense_person['expenses']+ $amount_spent;
        $update_expense="update plan_and_person set expenses=$total_expense_person1 where plan_id=$plan_id and person='$paid_by'";
           mysqli_query($con,$update_expense)or die(mysqli_error($con));
$_SESSION['plan_id']=$plan_id;
header('location:vplan.php');
?>
</head>
<body>
</body>
</html>
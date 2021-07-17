# CtrlBudget
It is used to manage your budget.
Hello Sir,
The steps to run the project are as follows-
1)first go to this url-localhost/include2/index_new.php
2)this will direct you to the index page of the site.
3)on this page you can sign up or log in to the site.
4)after logging in ,you will be directed to the "home1.php" or "home2.php" depending you have any existing plan or not.
5)if you dont have any plan you will be directed to "home1.php" and you can now create a plan using on clicking a create a new plan which will direct you to 
"createnewplanpage.php".
6)And if you have alraedy  existing plans then you will be directed to "home2.php" showing your all plans and you can add a new one on clicking plus button on the 
bottom right  which will direct you to createnewplanpage.php.
7)on clicking next button on createnewplanpage.php page you will be directed to "plan_det.php" page which will ask further detail about your plan.
8) "plan_det.php" will request "plan_det_script.php" page and insert the data into the database and will redirect you to the "home2.php".
9)on clicking view plan button will direct  "vplan.php".
10)on "vplan.php" you can add a new expense("add_new_expense.php") and can see the expense distribution on clicking expense distribution  button("exp_dist.php").
************************************************************************************************************************************************************************

		<-------------------------------------------------SET UP-------------------------------------------->
1)paste the include2 folder in www folder of the wamp
2) Import the ctrl_budget.sql file present in the zip folder.
3) Open the browser (chrome), type localhost/include2/index_new.php and you should see the index page of the website.
************************************************************************************************************************************************************************

         <-------------------------------------------ABOUT DATABASE----------------------------------------------------->
 The name of the database is ctrl_budget. it contains four tables-
1)users- It contains the information of the user.(id, name , email , phone ,password)
2)plan_det- It contains the detail of the plans of the users (id,user_id(foreign key-id of the user),title,start_date,last_date,budget,count)
3)plan_and_person- It handles the persons and their expenses involved in the particular plan of particular user.(id,plan_id(foreign key-id of plan_det table),person,
expenses).
4)bill_det- It contains all the bills.(id,plan_id(foreign key-id of plan_det table),title_bill,paid_by,paid_on,file).
************************************************************************************************************************************************************************

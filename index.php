<?php

    include('includes/connect.php');
    // this function has the dynamic products displayed 
    include('functions/common_function.php');
    session_start();

    if(!isset($_SESSION['pno'])){
        echo "<script> alert('Please login ')</script>";
        echo "<script> window.open('users_area/user_login.php','_self')</script>";
    }


?>






<!-- 
#	Name	Type	Collation	Attributes	Null	Default	Comments	Extra	Action
	1	adhi_pad	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	2	adhi_no	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	3	pno	int(9)			No	None			Change Change	Drop Drop	
	4	name	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	5	tainati	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	6	mobile	int(10)			No	None			Change Change	Drop Drop	
	7	received	date			No	current_timestamp()			Change Change	Drop Drop	
	8	reason	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	9	pno_added Primary	int(9)			No	None			Change Change	Drop Drop	
	10	prev	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	


 -->

 <?php
global $con;
   if(isset($_POST['insert_data'])){
       $adhi_pad=$_POST['adhi_pad'];
       $adhi_no=$_POST['adhi_no'];
       $pno=$_POST['pno'];
       $name=$_POST['name'];
       $tainati=$_POST['tainati'];
       $mobile=$_POST['mobile'];
       $reason=$_POST['reason'];
       $prev=$_POST['prev'];
       $SI_pref=$_POST['SI_pref'];
    //    recieved is current date

       $received=date("Y-m-d");
       $pno_added=$_SESSION['pno'];



    //    check if pno added is same as pno

    if($pno_added!=$pno){
        echo "<script> alert('Please add your own pno')</script>";
        exit();
    }

    // check for duplicate entries on pno basis 

    $check_query="select * from `requests` where `pno`='$pno'";
    $check_result=mysqli_query($con,$check_query);
    $check_row=mysqli_num_rows($check_result);
    if($check_row>0){
        echo "<script> alert('You have already added a request')</script>";
        exit();
    }

  


       $insert_query="insert into `requests` (`adhi_pad`,`adhi_no`,`pno`,`name`,`tainati`,`mobile`,`reason`,`prev`,`pno_added`,`SI_pref`) values ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile','$reason','$prev','$pno_added','$SI_pref')";
       $insert_result=mysqli_query($con,$insert_query);
       if($insert_result){
           echo "<script> alert('awaaz added')</script>";
       }else{
           echo "<script> alert('awaaz not added')</script>";
       }
   }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AWAAZ</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">



    <style>
    .pic{
    width: 100%;
  height: 400px;
  display: flex;
  flex-direction: column;
  background-image: url('https://images.unsplash.com/photo-1512389142860-9c449e58a543?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTV8fHNob3BwaW5nJTIwYmFja2dyb3VuZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=1000&q=60');
  background-size:     cover;            
  background-repeat:   no-repeat;
  background-position:center; 
  justify-content: start;
    }
</style>


<style>
        body {
            font-family: Arial, sans-serif;
        }
        .center-table {
            margin: 0 auto;
            max-width: 800px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
        img {
            max-width: 100px;
            height: auto;
        }
    </style>





</head>
<body class="bg-light" style="background:rgb(200,200,200)">









<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">

<?php

global $con;
    if(isset($_SESSION['pno'])){
        $pno = $_SESSION['pno'];
        $query = "SELECT * FROM users WHERE pno='$pno'";
        $run = mysqli_query($con,$query);
        $row = mysqli_fetch_array($run);
        $name = $row['name'];

        echo "Welcome $name";


    }else{
        echo "Welcome Guest";
    }


?>
        </a>

        <!-- to open admin page -->
        <?php

if(isset($_SESSION['pno'])){
    $pno = $_SESSION['pno'];
    $query = "SELECT * FROM users WHERE pno='$pno'";
    $run = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);
    $role = $row['role'];

    if($role=='admin'){
        echo "<a href='admin/index.php' class='btn btn-primary'>Admin</a>";
    }
    if($role=='manage'){
        echo "<a href='admin/index.php' class='btn btn-primary'>Admin</a>";
    }
}


?>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                
               
                <li class="nav-item">
                    <a class="nav-link" href="users_area/user_logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



















    <div class="container mt-5" >
        <h1 class="text-center p-5">
आवाज़ अनुरोध प्रपत्र</h1>

       
<form action="" method="post">
            <!-- adhi_pad -->
            




            <div class="form-outline mb-4 w-50 m-auto">
        <label for="adhi_pad" class="form-label">अधि0/कर्म०गण का
पद</label>
        <select name="adhi_pad" id="adhi_pad" class="form-select" required="required">
            <option value="Constable">Constable</option>
            <option value="Head Constable">Head Constable</option>
            <option value="Sub Inspector">Sub Inspector</option>
            <option value="Inspector">Inspector</option>
            <option value=" Circle Officer"> Circle Officer</option>

            <!-- Add more options based on your columns -->
        </select>
    </div>



    <div class="form-outline mb-4 w-50 m-auto">
        <label for="SI_pref" class="form-label">यदि सब इंस्पेक्टर है तो कृपया प्राथमिकता तय करें</label>
        <select name="SI_pref" id="SI_pref" class="form-select" required="required">
            <option value="B">Type B</option>
            <option value="C">Type C</option>

            <!-- Add more options based on your columns -->
        </select>
    </div>














            <!-- adhi_no -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="adhi_no" class="form-label">अधि0/कर्म०गण का नंबर</label>
                <input type="text" name="adhi_no" id="adhi_no" class="form-control" placeholder="अधि0/कर्म०गण का नंबर" required="required">
            </div>

            <!-- pno -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="pno" class="form-label">पीएनओ
</label>
                <input type="number" name="pno" id="pno" class="form-control" placeholder="पीएनओ
" required="required">
            </div>

            <!-- name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="name" class="form-label">नाम
</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="नाम
" required="required">
            </div>

            <!-- tainati -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="tainati" class="form-label">तैनाती</label>
                <input type="text" name="tainati" id="tainati" class="form-control" placeholder="तैनाती" required="required">
            </div>

            <!-- mobile -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile">
            </div>


            <!-- reason -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="reason" class="form-label">विवरण</label>
                <input type="text" name="reason" id="reason" class="form-control" placeholder="विवरण">
            </div>


            <!-- prev -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="prev" class="form-label">
निवास का पिछला स्थान</label>
                <input type="text" name="prev" id="prev" class="form-control" placeholder="
निवास का पिछला स्थान">
            </div>



            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_data" class='btn btn-secondary m-2' style='border-radius:50px' value="Insert Data">
                <a href="index.php" class='btn btn-secondary m-2' style='border-radius:50px'>Return to Home</a>
            </div>
        </form>
    </div>
</body>
</html>



<?php



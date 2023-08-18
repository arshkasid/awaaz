<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
global $con;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- font awesome link  -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />

    <style>

body{
    overflow-x: hidden;
}

    </style>
</head>
<body style="padding-top:70px;">
<div class="container-fluid my-3 p-5" style="border:8px; margin-top:20px; width: 650px; height:600px; background:white; box-shadow: 2px 4px 8px 8px rgba(0, 0, 0, 0.05);">
    <h2 class="text-center p-3">User Login</h2>
    <div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" >

                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="pno" class="form-label">PNO</label>
                    <input type="text" id="pno" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="pno">
                </div>

            

                 <!-- password feild -->
                 <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                </div>

            
                <div class="mt-4 pt-2">
                    <input type="submit" value="LOGIN" class="bg-secondary py-2 px-3 border-0 " style='border-radius:50px; color:white;' name="user_login">

                    <a style='border-radius:50px' href='user_registration.php' class='btn btn-secondary'>register</a>
                    
                  
                </div>
            </form>
        </div>
    </div>
</div>

    
</body>
</html>


<?php
if (isset($_POST['user_login'])) {
   $pno=$_POST['pno'];
    $user_password=$_POST['user_password'];

    $select_query="select * from `users` where pno='$pno'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);

     // will only fetch one record(1st record) an cuz username is unique, only one record is needed
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    $access=$row_data['access'];



    //if there are cart items user redirected to cart

    // $select_query_cart="select * from `user_table` where username='$pno'";
    // $select_cart=mysqli_query($con,$select_query_cart);
    // $row_count_cart=mysqli_num_rows($select_cart);


    
    if($row_count>0){
        $_SESSION['pno']=$pno;
        if ($user_password== $row_data['password']) {
            // echo "<script> alert('login succesful')</script>";

            // if($row_count_cart==0 and $row_count==1)
            
            //user exists
            if($row_count==1){
                // find access field of user
                
                $_SESSION['pno']=$pno;
                echo "<script> alert('Login succesful')</script>";
                // echo "<script> window.open('profile.php','self')</script>";
                $update_query="update `users` set `ip`='$user_ip' where `pno`='$pno'";
                $update_result=mysqli_query($con,$update_query);
                echo "<script> window.open('../index.php','_self')</script>";
                }

// change ip of user in user_table

            
                



               
            }
            //instead of redirect to payment here, checkout -> payment

        }else{
            echo "<script> alert('invalid credentials')</script>";
        }

    }else{
        echo "<script> alert('invalid credentials')</script>";
    }
  


?>


<!-- 1	name	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	2	pno Primary	int(9)			No	None			Change Change	Drop Drop	
	3	password	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	4	access	char(200)	utf8mb4_general_ci		No	0			Change Change	Drop Drop	
	5	admin	char(1)	utf8mb4_general_ci		No	0			Change Change	Drop Drop	
	6	ip	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
 -->
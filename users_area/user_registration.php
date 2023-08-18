<?php
include('../includes/connect.php');
include('../functions/common_function.php');
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
</head>
<body>
<body class="container-fluid" style=" border:8px; margin-top:20px; width: 800px; height:950px; background:white; box-shadow: 2px 4px 8px 8px rgba(0, 0, 0, 0.1);">
    <h2 class="text-center m-4 mt-5 pt-3">New User registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">



 <!-- name -->
 <div class="form-outline mb-4">
                    <label for="name" class="form-label">name</label>
                    <input type="text" id="pno" class="form-control" placeholder="Enter your name" autocomplete="off" required="required" name="name">
                </div>


                <!-- username -->
                <div class="form-outline mb-4">
                    <label for="pno" class="form-label">pno</label>
                    <input type="text" id="pno" class="form-control" placeholder="Enter your pno" autocomplete="off" required="required" name="pno">
                </div>

                
               

                 <!-- password feild -->
                 <div class="form-outline mb-4">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                </div>

                <!-- confirm password feild -->
                <div class="form-outline mb-4">
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password">
                </div>

                
            
                <div class="mt-4 pt-2">
                    <input type="submit" value="REGISTER" class="bg-secondary py-2 px-3 border-0" style='border-radius:50px; color:white;' name='user_register'>
                    <a href="../index.php" class="bg-secondary py-2 px-3 border-0" style='text-decoration:none; border-radius:50px; color:white;' >RETURN TO HOME</a>



    
                    
                </div>
            </form>
        </div>
    </div>
</body>

    
</body>
</html>

<!-- php code -->

<!-- is there anything wrong with the code below?
 -->



<?php



if(isset($_POST['user_register'])) {
    $pno=$_POST['pno'];
    $name=$_POST['name'];
    

    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $user_ip=getIPAddress();
    
    // select query

    $select_query="select * from `users` where pno='$pno'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('pno already exists')</script>";
    }else if($user_password!=$conf_user_password){
        echo "<script>alert('password does not match')</script>";
    }else{
        // insert query
    
    $insert_query="insert into `users` (pno,name,password,ip) values ('$pno','$name','$user_password','$user_ip')";
    
    $sql_execute=mysqli_query($con,$insert_query);

    echo "<script> alert('register succesful')</script>";
    // echo "<script> window.open('profile.php','self')</script>";
    echo "<script> window.open('./user_login.php','_self')</script>";
    }



}

?>
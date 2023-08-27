
<?php

    include('../includes/connect.php');
    // this function has the dynamic products displayed 
    include('../functions/common_function.php');
    session_start();

    if(!isset($_SESSION['pno'])){
        echo "<script> alert('Please login')</script>";
        echo "<script> window.open('../users_area/user_login.php','_self')</script>";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../style.css">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- font awesome link  -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    />
</head>

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


<body>
 

<?php
global $con;

$pno=$_SESSION['pno'];

// find if the user is admin or not

$select_query = "SELECT * FROM `users` WHERE `pno`='$pno' ";
$result_query = mysqli_query($con, $select_query);
$row = mysqli_fetch_array($result_query);
$admin=$row['admin'];

if($admin!=1){
    echo "<script> window.open('../index.php','_self')</script>";
}

?>



    <!-- navbar  -->
    <div class="container-fluid p-0">
        <!-- navbar from bootstrap -->

        <!-- first child  -->
        


        <!-- second-child  -->
        <div class="bg-light">
            <h3 class="text-center p-3"><b>Admin &nbsp Area</b></h3>
        </div>


        <!-- third-child  -->
        <!-- col should always sum upto 12  -->
        
        <div class="row ">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center pic">
 
                <div class="text-center m-3">

                    <a style='border-radius:50px' href="index.php?view_all1"  class='btn btn-secondary m-2'>View requests</a>


                    <a style='border-radius:50px' href="index.php?House"  class='btn btn-secondary m-2'>View House status</a>
                    <a style='border-radius:50px' href="index.php?Accepted_awaaz"  class='btn btn-secondary m-2'>View Acccepted Awaaz</a>

                    
                    <!-- <a style='border-radius:50px' href="index.php?Show_requests"  class='btn btn-secondary m-2'>View selectedd requests</a> -->



                    <form class="d-flex"  action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data" style="border-radius:50px">
                <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
                <input type="submit" value="Search" class="btn
                btn-dark btn " name="search_data_product" style="border-radius:50px">
            </form>


                
                    <?php

    if(!isset($_SESSION['pno'])){
        echo"
        <a style='color:white; font-size:24px;' class='nav-link' href='./users_area/user_login.php'>Login </a>
        ";
    }else{
        echo"
        <a class='nav-link m-5' style='color:black; font-size:24px;' href='../users_area/user_logout.php'>Logout </a>
        ";
    }

?>
                    <a style='border-radius:50px' href="index.php?edithouse"  class='btn btn-secondary m-2'>Edit Houses</a>

                    <a style='border-radius:50px' href="index.php?give_access"  class='btn btn-secondary m-2'>access management</a>
                    <a style='border-radius:50px' href="index.php?accept"  class='btn btn-secondary m-2'>accept</a>
                    
                </div>
                
            </div>
           

        </div>


        <!-- fourth child  -->
        <div class="container my-3">
            <?php
            if(isset($_GET['view_all1'])){
                include('show_requests.php');
            }

            if(isset($_GET['House'])){
                include('show_houses.php');
            }
            if(isset($_GET['insert_1'])){
                include('insert1.php');
            }
            if(isset($_GET['insert_2'])){
                include('insert2.php');
            }
            if(isset($_GET['edithouse'])){
                include('edit_house.php');
            }
            if(isset($_GET['edit2'])){
                include('edit2.php');
            }
            if(isset($_GET['tran1'])){
                include('tran1.php');
            }
            if(isset($_GET['tran2'])){
                include('tran2.php');
            }
            if(isset($_GET['transactions'])){
                include('transactions.php');
            }
            if(isset($_GET['give_access'])){
                include('give_access.php');
            }
            if(isset($_GET['accept'])){
                include('accept.php');
            }
            if(isset($_GET['Accepted_awaaz'])){
                include('Show_accepted.php');
            }
           
            

            ?>
        </div>


         <!-- footer last child -->
        


    </div>


    <!-- bootstrap js link   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
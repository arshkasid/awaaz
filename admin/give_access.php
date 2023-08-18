





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit  Data to Armoury 2</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Font Awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body class="bg-light" style="background:rgb(200,200,200)">
    <div class="container mt-5" >
        <h1 class="text-center p-5">All Users</h1>



 <?php

echo "<table class='table table-striped table-hover table-bordered border-dark'>";
echo "<thead class='table-dark'>";
echo "<tr>";
echo "<th>Employee name</th>";
echo "<th>Employee number</th>";
echo "<th>View Access</th>";
echo "<th>Admin Access</th>";
echo "</tr>";
echo "</thead>";

$select_query="Select * from `users`";
$result=mysqli_query($con,$select_query);
while($row_data=mysqli_fetch_assoc($result)){
    $name=$row_data['name'];
    $pno=$row_data['pno'];
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$pno</td>";
    if($row_data['access']==1){
        echo "<td>Yes</td>";
    }else{
        echo "<td>No</td>";
    }
    if($row_data['admin']==1){
        echo "<td>Yes</td>";
    }else{
        echo "<td>No</td>";
    }

    echo "</tr>";
}
echo "</table>";



?>

        <!-- enctype for images  -->
        <form action="" method="post">
            <!-- item -->
            <!-- <div class="form-outline mb-4 w-50 m-auto">
                <label for="item" class="form-label">विवरण</label>
                <input type="text" name="item" id="item" class="form-control" placeholder="Enter Item" autocomplete="off" required="required">
            </div> -->


            

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="item" id="" class="form-select">
                    <option value="">pno number</option>
                    <?php
                        $select_row="Select * from `users`";
                        $result_row=mysqli_query($con,$select_row);
                        while($row_data=mysqli_fetch_assoc($result_row)){
                            $cat_id=$row_data['pno'];
                            $name=$row_data['name'];
                            echo "<option value='$cat_id'>$cat_id &nbsp $name</option>";
                        }
                    ?>

                    <!-- <option value=''>CA</option>
                    <option value="">CB</option>
                    <option value="">CC</option>  -->

                </select>
            </div>






            <div class="form-outline mb-4 w-50 m-auto">
        <label for="access_p" class="form-label">Update Access permission</label>
        <select name="access_p" id="access_p" class="form-select" required>
            <option value="">Update Access permission</option>
            <option value="0">NO</option>
            <option value="1">YES</option>
    

            <!-- Add more options based on your columns -->
        </select>
    </div>



    <div class="form-outline mb-4 w-50 m-auto">
        <label for="admin_p" class="form-label">Update Admin permission</label>
        <select name="admin_p" id="admin_p" class="form-select" required>
            <option value="">Update Admin permission</option>
            <option value="0">NO</option>
            <option value="1">YES</option>
    

            <!-- Add more options based on your columns -->
        </select>
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






    </div>

    
</body>
</html>

<?php
if(isset($_POST['insert_data'])){
$admin_p=$_POST['admin_p'];
$access_p=$_POST['access_p'];
$pno=$_POST['item'];

$update_query="UPDATE `users` SET `access` = '$access_p', `admin` = '$admin_p' WHERE `users`.`pno` = '$pno'";

$result=mysqli_query($con,$update_query);

if($result){
    echo "<script>alert('Successfully updated data into the Armoury.')</script>";




// 1	who_changed	int(11)			No	None			Change Change	Drop Drop	
	// 2	changed_pno	int(11)			No	None			Change Change	Drop Drop	
	// 3	new_access	varchar(200)	utf8mb4_general_ci		No	None	

// change changes table data

$who_changed=$_SESSION['pno'];
$changed_pno=$_POST['item'];
$new_access=$_POST['access_p'];
$new_admin=$_POST['admin_p'];
$date=date("Y-m-d");

$insert_query="INSERT INTO `changeofaccess` (`who_changed`, `changed_pno`, `new_access`, `new_admin` ,`date`) VALUES ('$who_changed', '$changed_pno', '$new_access', '$new_admin', '$date')";
$result_query = mysqli_query($con, $insert_query);





}else{
    echo "<script>alert('Error: Failed to insert data. Please try again.')</script>";
}

}
?>
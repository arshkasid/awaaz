





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
echo "<th>name</th>";
echo "<th>number</th>";
echo "<th>Role</th>";
echo "</tr>";
echo "</thead>";

$select_query="Select * from `users`";
$result=mysqli_query($con,$select_query);
while($row_data=mysqli_fetch_assoc($result)){
    $name=$row_data['name'];
    $pno=$row_data['pno'];
    $role=$row_data['role'];
    echo "<tr>";
    echo "<td>$name</td>";
    echo "<td>$pno</td>";
    echo "<td>$role</td>";

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
                <select name="sel_pno" id="" class="form-select">
                    <option value="">pno number</option>
                    <?php
                        $select_row="Select * from `users`";
                        $result_row=mysqli_query($con,$select_row);
                        while($row_data=mysqli_fetch_assoc($result_row)){
                            $sel_pno=$row_data['pno'];
                            $name=$row_data['name'];
                            echo "<option value='$sel_pno'>$sel_pno &nbsp $name</option>";
                        }
                    ?>

                    <!-- <option value=''>CA</option>
                    <option value="">CB</option>
                    <option value="">CC</option>  -->

                </select>
            </div>






            <div class="form-outline mb-4 w-50 m-auto">
        <label for="role" class="form-label">Update Role</label>
        <select name="role" id="role" class="form-select" required>
            <option value="">Update Role</option>
            <option value="manage_house">manage_house</option>
            <option value="req">req</option>
    

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

$role=$_POST['role'];
$sel_pno=$_POST['sel_pno'];



if($sel_pno!=$_SESSION['pno']){
$update_query="UPDATE `users` SET `role` = '$role' WHERE `users`.`pno` = '$sel_pno'";

$result=mysqli_query($con,$update_query);

if($result){
    echo "<script>alert('Successfully updated data')</script>";




// 1	who_changed	int(11)			No	None			Change Change	Drop Drop	
	// 2	changed_pno	int(11)			No	None			Change Change	Drop Drop	
	// 3	new_access	varchar(200)	utf8mb4_general_ci		No	None	

// change changes table data

}else{
    echo "<script>alert('Error: Failed to insert data. Please try again.')</script>";
}
}

}

?>
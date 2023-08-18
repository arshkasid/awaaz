
        <!-- enctype for images  -->
        <form action="" method="post">
            <!-- item -->
            <!-- <div class="form-outline mb-4 w-50 m-auto">
                <label for="item" class="form-label">विवरण</label>
                <input type="text" name="item" id="item" class="form-control" placeholder="Enter Item" autocomplete="off" required="required">
            </div> -->


            

            <div class="form-outline mb-4 w-50 m-auto">
                <select name="type" id="" class="form-select">
                    <option value=""> Type</option>
                    <?php
                    include '../includes/connect.php';
                    global $con;
                        $select_row="Select * from `houses`";
                        $result_row=mysqli_query($con,$select_row);
                        while($row_data=mysqli_fetch_assoc($result_row)){
                            $type=$row_data['type'];
                            echo "<option value='$type'>$type</option>";
                        }
                    ?>

                    <!-- <option value=''>CA</option>
                    <option value="">CB</option>
                    <option value="">CC</option>  -->

                </select>
            </div>







            <!-- total -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="total" class="form-label">total</label>
                <input type="number" name="total" id="total" class="form-control" placeholder="Enter Total" >
            </div>

            <!-- A -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="in_use" class="form-label">in use</label>
                <input type="number" name="in_use" id="in_use" class="form-control" placeholder="Enter A" >
            </div>

            

            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_data" class='btn btn-secondary m-2' style='border-radius:50px' value="Insert Data">
                <a href="index.php" class='btn btn-secondary m-2' style='border-radius:50px'>Return to Home</a>
            </div>
        </form>
    </div>



    <?php

    if(isset($_POST['insert_data'])){
        $type=$_POST['type'];
        $total=$_POST['total'];
        $in_use=$_POST['in_use'];
        $empty=$total-$in_use;

        $edit_query="UPDATE `houses` SET `total`='$total',`in_use`='$in_use',`empty`='$empty' WHERE `type`='$type'";
        $result_edit=mysqli_query($con,$edit_query);

        if($result_edit){
            echo "<script>alert('Data Updated Successfully')</script>";
            echo "<script>window.location.href='index.php?House'</script>";
        }
        else{
            echo "<script>alert('Data Not Updated Successfully')</script>";
            echo "<script>window.location.href='index.php'</script>";
        }


    }

?>
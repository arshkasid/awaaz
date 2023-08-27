















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
           






















          
            if(isset($_GET['bool'])){
            
            
            
            $get_selected="select * from `selected`";
            $result_selected=mysqli_query($con,$get_selected);
            $num_selected=mysqli_num_rows($result_selected);
            $insert_alloted="";

            if($num_selected>0){
            while($row_selected=mysqli_fetch_array($result_selected)){

                $pno=$row_selected['pno'];
                $reason_by_admin=$row_selected['reason'];

                $select_from_form="select * from `requests` where `pno`='$pno'";
                $result_select_from_form=mysqli_query($con,$select_from_form);
                $row_select_from_form=mysqli_fetch_array($result_select_from_form);
               
            
                // 1	adhi_pad	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 2	adhi_no	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 3	pno	int(11)			No	None			Change Change	Drop Drop	
                // 4	name	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 5	tainati	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 6	mobile	int(11)			No	None			Change Change	Drop Drop	
                // 7	received	date			No	None			Change Change	Drop Drop	
                // 8	reason	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 9	pno_added	int(9)			No	None			Change Change	Drop Drop	
                // 10	prev	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 11	accepted	int(11)			No	None			Change Change	Drop Drop	
                // 12	SI_pref	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 13	Time	datetime			No	None			Change Change	Drop Drop	
                // 14	reason_by_admin	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 15	accepted_at	datetime			No	current_timestamp()			Change Change	Drop Drop	
                // 16	alloted	int(11)			No	None			Change Change	Drop Drop	
            
                $adhi_pad=$row_select_from_form['adhi_pad'];
                $adhi_no=$row_select_from_form['adhi_no'];
                $name=$row_select_from_form['name'];
                $tainati=$row_select_from_form['tainati'];
                $mobile=$row_select_from_form['mobile'];
                $received=$row_select_from_form['received'];
                $reason=$row_select_from_form['reason'];
                $pno_added=$row_select_from_form['pno_added'];
                $time=$row_select_from_form['Time'];
                // accepted
                $prev=$row_select_from_form['prev'];
                $SI_pref=$row_select_from_form['SI_pref'];
                
            
            
                if($adhi_pad=="Constable"){
                    $get_house_data="select * from `houses` where type='A'";
                    $result_house_data=mysqli_query($con,$get_house_data);
                    $row_house_data=mysqli_fetch_array($result_house_data);
                    $empty=$row_house_data['empty'];
                    if($empty>0){
                        $empty=$empty-1;
                        $in_use=$row_house_data['in_use'];
                        $in_use=$in_use+1;
                        $update_house_data="update `houses` set `empty`='$empty',`in_use`='$in_use' where type='A'";
                        $result_update_house_data=mysqli_query($con,$update_house_data);

                        if($result_update_house_data){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','A')";
                            
                        }
                    }

            
                }
                elseif($adhi_pad=="Head Constable"){
                    $get_house_data="select * from `houses` where type='B'";
                    $result_house_data=mysqli_query($con,$get_house_data);
                    $row_house_data=mysqli_fetch_array($result_house_data);
                    $empty=$row_house_data['empty'];
                    if($empty>0){
                        $empty=$empty-1;
                        $in_use=$row_house_data['in_use'];
                        $in_use=$in_use+1;
                        $update_house_data="update `houses` set `empty`='$empty',`in_use`='$in_use' where type='B'";
                        $result_update_house_data=mysqli_query($con,$update_house_data);

                        if($result_update_house_data){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','B')";
                            
                        }
                    }
                }
                elseif ($adhi_pad=="Sub Inspector") {
                    $get_house_Bdata="select * from `houses` where type='B'";
                    $result_house_Bdata=mysqli_query($con,$get_house_Bdata);
                    $row_house_Bdata=mysqli_fetch_array($result_house_Bdata);
                    $empty_B=$row_house_Bdata['empty'];

                    $get_house_Cdata="select * from `houses` where type='C'";
                    $result_house_Cdata=mysqli_query($con,$get_house_Cdata);
                    $row_house_Cdata=mysqli_fetch_array($result_house_Cdata);
                    $empty_C=$row_house_Cdata['empty'];

                    $SI_pref=$row_select_from_form['SI_pref'];

                    if ($SI_pref=="B" && $empty_B>0) {
                        $empty_B=$empty_B-1;
                        $in_use_B=$row_house_Bdata['in_use'];
                        $in_use_B=$in_use_B+1;
                        $update_house_Bdata="update `houses` set `empty`='$empty_B',`in_use`='$in_use_B' where type='B'";
                        $result_update_house_Bdata=mysqli_query($con,$update_house_Bdata);

                        if($result_update_house_Bdata){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','B')";
                            
                        }
                    }
                    elseif($adhi_pad=="Sub Inspector" && $empty_C>0){
                        $empty_C=$empty_C-1;
                        $in_use_C=$row_house_Cdata['in_use'];
                        $in_use_C=$in_use_C+1;
                        $update_house_Cdata="update `houses` set `empty`='$empty_C',`in_use`='$in_use_C' where type='C'";
                        $result_update_house_Cdata=mysqli_query($con,$update_house_Cdata);

                        if($result_update_house_Cdata){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','C')";
                            
                        }
                    }

                    }
                    elseif($adhi_pad=="Inspector"){
                        $get_house_data="select * from `houses` where type='C'";
                        $result_house_data=mysqli_query($con,$get_house_data);
                        $row_house_data=mysqli_fetch_array($result_house_data);
                        $empty=$row_house_data['empty'];
                        if($empty>0){
                            $empty=$empty-1;
                            $in_use=$row_house_data['in_use'];
                            $in_use=$in_use+1;
                            $update_house_data="update `houses` set `empty`='$empty',`in_use`='$in_use' where type='C'";
                            $result_update_house_data=mysqli_query($con,$update_house_data);
    
                            if($result_update_house_data){
                                $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','C')";
                                
                            }
                        }
                    }
                    elseif ($adhi_pad=="Circle Officer") {
                        $get_house_Ddata="select * from `houses` where type='D'";
                        $result_house_Ddata=mysqli_query($con,$get_house_Ddata);
                        $row_house_Ddata=mysqli_fetch_array($result_house_Ddata);
                        $empty_D=$row_house_Ddata['empty'];

                        if($empty_D>0){
                            $empty_D=$empty_D-1;
                            $in_use_D=$row_house_Ddata['in_use'];
                            $in_use_D=$in_use_D+1;
                            $update_house_Ddata="update `houses` set `empty`='$empty_D',`in_use`='$in_use_D' where type='D'";
                            $result_update_house_Ddata=mysqli_query($con,$update_house_Ddata);
    
                            if($result_update_house_Ddata){
                                $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','D')";
                                
                            }
                        }

                    }

                    $Insert=mysqli_query($con,$insert_alloted);
                    if($Insert){
                        $delete="delete from `requests` where `pno`='$pno'";
                        $result_delete=mysqli_query($con,$delete);
                        $delete_selected="delete from `selected` where `pno`='$pno'";
                        $result_delete_selected=mysqli_query($con,$delete_selected);
                    }
                   

                    
                }
            }



                 // 1	adhi_pad	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 2	adhi_no	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 3	pno	int(11)			No	None			Change Change	Drop Drop	
                // 4	name	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 5	tainati	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 6	mobile	int(11)			No	None			Change Change	Drop Drop	
                // 7	received	date			No	None			Change Change	Drop Drop	
                // 8	reason	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 9	pno_added	int(9)			No	None			Change Change	Drop Drop	
                // 10	prev	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 11	accepted	int(11)			No	None			Change Change	Drop Drop	
                // 12	SI_pref	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 13	Time	datetime			No	None			Change Change	Drop Drop	
                // 14	reason_by_admin	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
                // 15	accepted_at	datetime			No	current_timestamp()			Change Change	Drop Drop	
                // 16	alloted	int(11)			No	None			Change Change	Drop Drop	

                $get_all_req_by_time="select * from `requests` order by `Time` Asc";
                $result_all_req_by_time=mysqli_query($con,$get_all_req_by_time);
                $num_all_req_by_time=mysqli_num_rows($result_all_req_by_time);
                while($row_all_req_by_time=mysqli_fetch_array($result_all_req_by_time)){
                


                $pno=$row_all_req_by_time['pno'];
                $adhi_pad=$row_all_req_by_time['adhi_pad'];
                $adhi_no=$row_all_req_by_time['adhi_no'];
                $name=$row_all_req_by_time['name'];
                $tainati=$row_all_req_by_time['tainati'];
                $mobile=$row_all_req_by_time['mobile'];
                $received=$row_all_req_by_time['received'];
                $reason=$row_all_req_by_time['reason'];
                $pno_added=$row_all_req_by_time['pno_added'];
                $time=$row_all_req_by_time['Time'];
                // accepted
                $prev=$row_all_req_by_time['prev'];
                $SI_pref=$row_all_req_by_time['SI_pref'];

                $reason_by_admin="not selected through admin";




                if($adhi_pad=="Constable"){
                    $get_house_data="select * from `houses` where type='A'";
                    $result_house_data=mysqli_query($con,$get_house_data);
                    $row_house_data=mysqli_fetch_array($result_house_data);
                    $empty=$row_house_data['empty'];
                    if($empty>0){
                        $empty=$empty-1;
                        $in_use=$row_house_data['in_use'];
                        $in_use=$in_use+1;
                        $update_house_data="update `houses` set `empty`='$empty',`in_use`='$in_use' where type='A'";
                        $result_update_house_data=mysqli_query($con,$update_house_data);

                        if($result_update_house_data){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','A')";
                            
                        }
                    }

            
                }
                elseif($adhi_pad=="Head Constable"){
                    $get_house_data="select * from `houses` where type='B'";
                    $result_house_data=mysqli_query($con,$get_house_data);
                    $row_house_data=mysqli_fetch_array($result_house_data);
                    $empty=$row_house_data['empty'];
                    if($empty>0){
                        $empty=$empty-1;
                        $in_use=$row_house_data['in_use'];
                        $in_use=$in_use+1;
                        $update_house_data="update `houses` set `empty`='$empty',`in_use`='$in_use' where type='B'";
                        $result_update_house_data=mysqli_query($con,$update_house_data);

                        if($result_update_house_data){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','B')";
                            
                        }
                    }
                }
                elseif ($adhi_pad=="Sub Inspector") {
                    $get_house_Bdata="select * from `houses` where type='B'";
                    $result_house_Bdata=mysqli_query($con,$get_house_Bdata);
                    $row_house_Bdata=mysqli_fetch_array($result_house_Bdata);
                    $empty_B=$row_house_Bdata['empty'];

                    $get_house_Cdata="select * from `houses` where type='C'";
                    $result_house_Cdata=mysqli_query($con,$get_house_Cdata);
                    $row_house_Cdata=mysqli_fetch_array($result_house_Cdata);
                    $empty_C=$row_house_Cdata['empty'];

                   

                    if ($SI_pref=="B" && $empty_B>0) {
                        $empty_B=$empty_B-1;
                        $in_use_B=$row_house_Bdata['in_use'];
                        $in_use_B=$in_use_B+1;
                        $update_house_Bdata="update `houses` set `empty`='$empty_B',`in_use`='$in_use_B' where type='B'";
                        $result_update_house_Bdata=mysqli_query($con,$update_house_Bdata);

                        if($result_update_house_Bdata){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','B')";
                            
                        }
                    }
                    elseif($adhi_pad=="Sub Inspector" && $empty_C>0){
                        $empty_C=$empty_C-1;
                        $in_use_C=$row_house_Cdata['in_use'];
                        $in_use_C=$in_use_C+1;
                        $update_house_Cdata="update `houses` set `empty`='$empty_C',`in_use`='$in_use_C' where type='C'";
                        $result_update_house_Cdata=mysqli_query($con,$update_house_Cdata);

                        if($result_update_house_Cdata){
                            $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','C')";
                            
                        }
                    }

                    }
                    elseif($adhi_pad=="Inspector"){
                        $get_house_data="select * from `houses` where type='C'";
                        $result_house_data=mysqli_query($con,$get_house_data);
                        $row_house_data=mysqli_fetch_array($result_house_data);
                        $empty=$row_house_data['empty'];
                        if($empty>0){
                            $empty=$empty-1;
                            $in_use=$row_house_data['in_use'];
                            $in_use=$in_use+1;
                            $update_house_data="update `houses` set `empty`='$empty',`in_use`='$in_use' where type='C'";
                            $result_update_house_data=mysqli_query($con,$update_house_data);
    
                            if($result_update_house_data){
                                $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','C')";
                                
                            }
                        }
                    }
                    elseif ($adhi_pad=="Circle Officer") {
                        $get_house_Ddata="select * from `houses` where type='D'";
                        $result_house_Ddata=mysqli_query($con,$get_house_Ddata);
                        $row_house_Ddata=mysqli_fetch_array($result_house_Ddata);
                        $empty_D=$row_house_Ddata['empty'];

                        if($empty_D>0){
                            $empty_D=$empty_D-1;
                            $in_use_D=$row_house_Ddata['in_use'];
                            $in_use_D=$in_use_D+1;
                            $update_house_Ddata="update `houses` set `empty`='$empty_D',`in_use`='$in_use_D' where type='D'";
                            $result_update_house_Ddata=mysqli_query($con,$update_house_Ddata);
    
                            if($result_update_house_Ddata){
                                $insert_alloted="INSERT INTO `accepted`(`adhi_pad`, `adhi_no`, `pno`, `name`, `tainati`, `mobile`, `received`, `reason`, `pno_added`, `prev`, `accepted`, `SI_pref`, `Time`, `reason_by_admin`, `alloted`) VALUES ('$adhi_pad','$adhi_no','$pno','$name','$tainati','$mobile',$received,'$reason','$pno_added','$prev','1','$SI_pref','$time','$reason_by_admin','D')";
                                
                            }
                        }

                    }
if($insert_alloted!=NULL){
                    $Insert=mysqli_query($con,$insert_alloted);
                    if($Insert){
                        $delete="delete from `requests` where `pno`='$pno'";
                        $result_delete=mysqli_query($con,$delete);
                        $delete_selected="delete from `selected` where `pno`='$pno'";
                        $result_delete_selected=mysqli_query($con,$delete_selected);
                    }
                }
                }



        
                
      
            
            
            
            
            
            
            }
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            
            
            






























            

            ?>
        </div>


         <!-- footer last child -->
        


    </div>


    <!-- bootstrap js link   -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
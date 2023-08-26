<?php


if(isset($_GET['bool'])){



$get_selected="select * from `selected`";
$result_selected=mysqli_query($con,$get_selected);
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
    // $received
    $reason=$row_select_from_form['reason'];
    $pno_added=$row_select_from_form['pno_added'];
    $time=$row_select_from_form['Time'];
    // accepted
    $prev=$row_select_from_form['prev'];
    $SI_pref=$row_select_from_form['SI_pref'];
    $reason_by_admin=$row_select_from_form['reason_by_admin'];


    if($adhi_pad=="Constable"){
        $get_house_data="select * from `houses` where type ";
        $result_house_data=mysqli_query($con,$get_house_data);

    }
    






}










}













?>
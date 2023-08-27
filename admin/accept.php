<!-- to accept requests
table accepted has the following fields
1	adhi_pad	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	2	adhi_no	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	3	pno	int(11)			No	None			Change Change	Drop Drop	
	4	name	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	5	tainati	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	6	mobile	int(11)			No	None			Change Change	Drop Drop	
	7	received	date			No	None			Change Change	Drop Drop	
	8	reason	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	9	pno_added	int(9)			No	None			Change Change	Drop Drop	
	10	prev	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	11	accepted	int(11)			No	None			Change Change	Drop Drop	
	12	SI_pref	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	13	Time	datetime			No	None			Change Change	Drop Drop	
	14	reason_by_admin	varchar(200)	utf8mb4_general_ci		No	None			Change Change	Drop Drop	
	15	accepted_at	datetime			No	current_timestamp()			Change Change	Drop Drop	
	16	alloted	int(11)			No	None			Change Change	Drop Drop	




-->

<?php



echo "<table border='1'>";
echo "<thead><tr>";
echo "<th>Total requests</th>";
echo "<th>Approx 10%</th>";
echo "<th>Already selected</th>";
echo "<th>Total vacant houses</th>";
echo "<th>Type A</th>";
echo "<th>Type B</th>";
echo "<th>Type C</th>";
echo "<th>Type D</th>";
echo "</tr></thead><tbody>";


$count_house = "SELECT SUM(`empty`) FROM `houses`";
$result_house = mysqli_query($con, $count_house);
$row_house = mysqli_fetch_array($result_house);
$empty = $row_house['SUM(`empty`)'];

$A_empty = "SELECT `empty` FROM `houses` WHERE `type` = 'A'";
$result_A_empty = mysqli_query($con, $A_empty);
$row_A_empty = mysqli_fetch_array($result_A_empty);
$A_empty = $row_A_empty['empty'];

$B_empty = "SELECT `empty` FROM `houses` WHERE `type` = 'B'";
$result_B_empty = mysqli_query($con, $B_empty);
$row_B_empty = mysqli_fetch_array($result_B_empty);
$B_empty = $row_B_empty['empty'];

$C_empty = "SELECT `empty` FROM `houses` WHERE `type` = 'C'";
$result_C_empty = mysqli_query($con, $C_empty);
$row_C_empty = mysqli_fetch_array($result_C_empty);
$C_empty = $row_C_empty['empty'];

$D_empty = "SELECT `empty` FROM `houses` WHERE `type` = 'D'";
$result_D_empty = mysqli_query($con, $D_empty);
$row_D_empty = mysqli_fetch_array($result_D_empty);
$D_empty = $row_D_empty['empty'];





$total_req = "SELECT COUNT(*) FROM `requests`";
$result_req = mysqli_query($con, $total_req);
$row_req = mysqli_fetch_array($result_req);
$total_req = $row_req['COUNT(*)'];


$already_selected = "SELECT COUNT(*) FROM `selected` ";
$result_already_selected = mysqli_query($con, $already_selected);
$row_already_selected = mysqli_fetch_array($result_already_selected);
$already_selected = $row_already_selected['COUNT(*)'];



// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $total_req . "</td>";
echo "<td>" . $total_req/10 . "</td>";  
echo "<td>" . $already_selected . "</td>";
echo "<td>" . $empty . "</td>";
echo "<td>" . $A_empty . "</td>";
echo "<td>" . $B_empty . "</td>";
echo "<td>" . $C_empty . "</td>";
echo "<td>" . $D_empty . "</td>";


echo "</tr>";


echo "</tbody></table>";

echo "<br><br>";





?>

<h1 class='text-center p-5'>Accept Following ?</h1>

<?php

global $con;
$select_query = "SELECT * FROM `requests` WHERE `accepted`=1 ORDER BY `Time` ASC ";
$result_query = mysqli_query($con, $select_query);



// Display the dynamic table

echo "<h1 class='text-center p-5'>requests</h1>";

echo "<table border='1'>";

echo "<thead><tr>";
echo "<th>adhi_pad</th>";
echo "<th>adhi_no</th>";
echo "<th>pno</th>";
echo "<th>name</th>";
echo "<th>tainati</th>";
echo "<th>mobile</th>";
echo "<th>received</th>";
echo "<th>reason</th>";
echo "<th>pno_added</th>";
echo "<th>prev</th>";
// button to add to cart
echo "<th>add or remove</th>";
echo "</tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result_query)) {
// Access the column values
$adhi_pad = $row['adhi_pad'];
$adhi_no = $row['adhi_no'];
$pno = $row['pno'];
$name = $row['name'];
$tainati = $row['tainati'];
$mobile = $row['mobile'];
$received = $row['received'];
$reason = $row['reason'];
$pno_added = $row['pno_added'];
$prev = $row['prev'];
$accepted= $row['accepted'];

// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $adhi_pad . "</td>";
echo "<td>" . $adhi_no . "</td>";
echo "<td>" . $pno . "</td>";
echo "<td>" . $name . "</td>";
echo "<td>" . $tainati . "</td>";
echo "<td>" . $mobile . "</td>";
echo "<td>" . $received . "</td>";
echo "<td>" . $reason . "</td>";
echo "<td>" . $pno_added . "</td>";
echo "<td>" . $prev . "</td>";
if (!$accepted) {
echo "<td><a href='add.php?pno=$pno' class='btn btn-success m-2' style='border-radius:50px'>Add to selected</a></td>"; 
}
else{
echo "<td><a href='remove.php?pno=$pno' class='btn btn-danger m-2' style='border-radius:50px'>remove from selected</a></td>";
}

echo "</tr>";


}
echo "</tbody></table>";
echo "<br><br>";

// add a button to submit the form



echo "<a href='allocate.php?bool=1' class='btn btn-success m-2' style='border-radius:50px'>Add Selected</a>";

?>








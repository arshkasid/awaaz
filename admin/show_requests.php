









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


















show_requests();

?>
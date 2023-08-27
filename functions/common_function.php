<!-- for armory ,item total a b c d e f g h are replaced with

विवरण

जनपद के भार पर

लेनदेन में

आरमरी में

मैगजीन में

थाना जात में

स्थायी गार्द में

अस्थायी गार्द में

मुकदमाती पुराना

गुम पुराना

-->

<!-- for page 2

विवरण

जनपद के भार पर

लेनदेन में

आरमरी में

आरमरी खोखा

मैगजीन में कारतूस सर्विस 


मैगजीन में कारतूस ड्रैक्टिस

 मैगजीन में खोखा 

 थाना जात पर

स्थाई गार्ड में

अस्थाई गार्ड में

मुकदमाती पुराना

गुम पुराना

कैश, ड्रोपर्टी से सम्बन्धित पुराना



-->










<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="../style.css">
</head>

<style>
*{
    font-family: 'Lucida Console';
}
</style>




<?php

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  






function getproducts(){
    global $con;
    //only if category and brand variable is not set, display the data
    $select_query = "SELECT * FROM `armoury` ORDER BY `item` ";
$result_query = mysqli_query($con, $select_query);

echo "  <a class='nav-link text-center' href='#'>Page 1</a>";
// Display the dynamic table
echo "<table border='1'>";
echo "<thead><tr>";
echo "<th>विवरण</th>";
echo "<th>जनपद के भार पर</th>";
echo "<th>लेनदेन में</th>";
echo "<th>
आरमरी में</th>";
echo "<th>मैगजीन में
</th>";
echo "<th>थाना जात में
</th>";
echo "<th>स्थायी गार्द में
</th>";
echo "<th>अस्थायी गार्द में
</th>";
echo "<th>मुकदमाती पुराना
</th>";
echo "<th>गुम पुराना
</th>";
echo "</tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result_query)) {
    // Access the column values
    $item = $row['item'];
    $total = $row['total'];
    $A = $row['A'];
    $B = $row['B'];
    $C = $row['C'];
    $D = $row['D'];
    $E = $row['E'];
    $F = $row['F'];
    $G = $row['G'];
    $H = $row['H'];
                        

// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $item . "</td>";
echo "<td>" . $total . "</td>";
echo "<td>" . $A . "</td>";
echo "<td>" . $B . "</td>";
echo "<td>" . $C . "</td>";
echo "<td>" . $D . "</td>";
echo "<td>" . $E . "</td>";
echo "<td>" . $F . "</td>";
echo "<td>" . $G . "</td>";
echo "<td>" . $H . "</td>";
echo "</tr>";
}

echo "</tbody></table>";



echo "<br><br>";





}


// search function

// function search_product(){

//     global $con;
// if(isset($_GET['search_data_product'])){
//     $search_data_value=$_GET['search_data'];
//         $seach_query="Select * from `armoury` where item like '%$search_data_value%'";
//         $result_query=mysqli_query($con,$seach_query);

//                     while($row=mysqli_fetch_assoc($result_query)){

//                        // Display the dynamic table
// echo "<table border='1'>";
// echo "<thead><tr>";
// echo "<th>Item</th>";
// echo "<th>Total</th>";
// echo "<th>A</th>";
// echo "<th>B</th>";
// echo "<th>C</th>";
// echo "<th>D</th>";
// echo "<th>E</th>";
// echo "<th>F</th>";
// echo "<th>G</th>";
// echo "<th>H</th>";
// echo "</tr></thead><tbody>";

// while ($row = mysqli_fetch_assoc($result_query)) {
//     // Access the column values
//     $item = $row['item'];
//     $total = $row['total'];
//     $A = $row['A'];
//     $B = $row['B'];
//     $C = $row['C'];
//     $D = $row['D'];
//     $E = $row['E'];
//     $F = $row['F'];
//     $G = $row['G'];
//     $H = $row['H'];
                        

// // Display table rows for each item in the armory
// echo "<tr>";
// echo "<td>" . $item . "</td>";
// echo "<td>" . $total . "</td>";
// echo "<td>" . $A . "</td>";
// echo "<td>" . $B . "</td>";
// echo "<td>" . $C . "</td>";
// echo "<td>" . $D . "</td>";
// echo "<td>" . $E . "</td>";
// echo "<td>" . $F . "</td>";
// echo "<td>" . $G . "</td>";
// echo "<td>" . $H . "</td>";
// echo "</tr>";
// }

// echo "</tbody></table>";
                    
//         }
//     }
//     else{
//         echo "no data found";
//     }



// }





function search_product() {
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `armoury` WHERE item LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);

        if (mysqli_num_rows($result_query) > 0) {
            // Display the dynamic table
            echo "<table border='1'>";
            echo "<thead><tr>";
            echo "<th>विवरण</th>";
echo "<th>जनपद के भार पर</th>";
echo "<th>लेनदेन में</th>";
echo "<th>
आरमरी में</th>";
echo "<th>मैगजीन में
</th>";
echo "<th>थाना जात में
</th>";
echo "<th>स्थायी गार्द में
</th>";
echo "<th>अस्थायी गार्द में
</th>";
echo "<th>मुकदमाती पुराना
</th>";
echo "<th>गुम पुराना
</th>";
            echo "</tr></thead><tbody>";

            while ($row = mysqli_fetch_assoc($result_query)) {
                // Access the column values
                $item = $row['item'];
                $total = $row['total'];
                $A = $row['A'];
                $B = $row['B'];
                $C = $row['C'];
                $D = $row['D'];
                $E = $row['E'];
                $F = $row['F'];
                $G = $row['G'];
                $H = $row['H'];

                // Display table rows for each item in the armory
                echo "<tr>";
                echo "<td>" . $item . "</td>";
                echo "<td>" . $total . "</td>";
                echo "<td>" . $A . "</td>";
                echo "<td>" . $B . "</td>";
                echo "<td>" . $C . "</td>";
                echo "<td>" . $D . "</td>";
                echo "<td>" . $E . "</td>";
                echo "<td>" . $F . "</td>";
                echo "<td>" . $G . "</td>";
                echo "<td>" . $H . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No data found in page 1";
        }

echo "<br><br>";

$search_data_value = $_GET['search_data'];
        $search_query = "SELECT * FROM `armoury2` WHERE item LIKE '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);


       

        if (mysqli_num_rows($result_query) > 0) {
            // Display the dynamic table
            echo "<table border='1'>";
            echo "<thead><tr>";
            echo "<th>विवरण
            </th>";
            echo "<th>जनपद के भार पर
            </th>";
            echo "<th>लेनदेन में
            </th>";
            echo "<th>आरमरी में
            </th>";
            echo "<th>आरमरी खोखा
            </th>";
            echo "<th>मैगजीन में कारतूस सर्विस 
            </th>";
            echo "<th>मैगजीन में कारतूस ड्रैक्टिस
            </th>";
            echo "<th> मैगजीन में खोखा 
            </th>";
            echo "<th> थाना जात पर
            </th>";
            echo "<th>स्थाई गार्ड में
            </th>";
            echo "<th>अस्थाई गार्ड में
            </th>";
            echo "<th>मुकदमाती पुराना
            </th>";
            echo "<th>गुम पुराना
            </th>";
            echo "<th>कैश, ड्रोपर्टी से सम्बन्धित पुराना
            </th>";

            echo "</tr></thead><tbody>";

            while ($row = mysqli_fetch_assoc($result_query)) {
                // Access the column values
                $item = $row['item'];
                $total = $row['total'];
                $A = $row['A'];
                $B = $row['B'];
                $C = $row['C'];
                $D = $row['D'];
                $E = $row['E'];
                $F = $row['F'];
                $G = $row['G'];
                $H = $row['H'];
                $I = $row['I'];
                $J = $row['J'];
                $K = $row['K'];
                $L = $row['L'];


                // Display table rows for each item in the armory
                echo "<tr>";
                echo "<td>" . $item . "</td>";
                echo "<td>" . $total . "</td>";
                echo "<td>" . $A . "</td>";
                echo "<td>" . $B . "</td>";
                echo "<td>" . $C . "</td>";
                echo "<td>" . $D . "</td>";
                echo "<td>" . $E . "</td>";
                echo "<td>" . $F . "</td>";
                echo "<td>" . $G . "</td>";
                echo "<td>" . $H . "</td>";
                echo "<td>" . $I . "</td>";
                echo "<td>" . $J . "</td>";
                echo "<td>" . $K . "</td>";
                echo "<td>" . $L . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No data found in page 2";
        }

    }
}






function getproducts2(){
    global $con;
    //only if category and brand variable is not set, display the data
    $select_query = "SELECT * FROM `armoury2` ORDER BY `item` ";
$result_query = mysqli_query($con, $select_query);

echo "  <a class='nav-link text-center' href='#'>Page 2</a>";
// Display the dynamic table
echo "<table border='1'>";
echo "<thead><tr>";
echo "<th>विवरण
            </th>";
            echo "<th>जनपद के भार पर
            </th>";
            echo "<th>लेनदेन में
            </th>";
            echo "<th>आरमरी में
            </th>";
            echo "<th>आरमरी खोखा
            </th>";
            echo "<th>मैगजीन में कारतूस सर्विस 
            </th>";
            echo "<th>मैगजीन में कारतूस ड्रैक्टिस
            </th>";
            echo "<th> मैगजीन में खोखा 
            </th>";
            echo "<th> थाना जात पर
            </th>";
            echo "<th>स्थाई गार्ड में
            </th>";
            echo "<th>अस्थाई गार्ड में
            </th>";
            echo "<th>मुकदमाती पुराना
            </th>";
            echo "<th>गुम पुराना
            </th>";
            echo "<th>कैश, ड्रोपर्टी से सम्बन्धित पुराना
            </th>";
echo "</tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result_query)) {
    // Access the column values
    $item = $row['item'];
    $total = $row['total'];
    $A = $row['A'];
    $B = $row['B'];
    $C = $row['C'];
    $D = $row['D'];
    $E = $row['E'];
    $F = $row['F'];
    $G = $row['G'];
    $H = $row['H'];
    $I = $row['I'];
    $J = $row['J'];
    $K = $row['K'];
    $L = $row['L'];
                        

// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $item . "</td>";
echo "<td>" . $total . "</td>";
echo "<td>" . $A . "</td>";
echo "<td>" . $B . "</td>";
echo "<td>" . $C . "</td>";
echo "<td>" . $D . "</td>";
echo "<td>" . $E . "</td>";
echo "<td>" . $F . "</td>";
echo "<td>" . $G . "</td>";
echo "<td>" . $H . "</td>";
echo "<td>" . $I . "</td>";
echo "<td>" . $J . "</td>";
echo "<td>" . $K . "</td>";
echo "<td>" . $L . "</td>";
echo "</tr>";
}

echo "</tbody></table>";




echo "<br><br>";




}


function show_transactions(){
    global $con;
    $select_query = "SELECT * FROM `transactions` ";
$result_query = mysqli_query($con, $select_query);


// Display the dynamic table

echo "<h1 class='text-center p-5'>transactions for page 1</h1>";

echo "<table border='1'>";
echo "<thead><tr>";
echo "<th>tran_id</th>";
echo "<th>item</th>";
echo "<th>quantity</th>";
echo "<th>source</th>";
echo "<th>destination</th>";
echo "<th>date</th>";
echo "<th>time</th>";
echo "<th>reason</th>";
echo "<th>who</th>";
echo "</tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result_query)) {
    // Access the column values
    $tran_id = $row['tran_id'];
    $item = $row['item'];
    $quantity = $row['quantity'];
    $source = $row['source'];
    $destination = $row['destination'];
    $date = $row['date'];
    $time = $row['time'];
    $reason = $row['reason'];
    $who = $row['who'];

// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $tran_id . "</td>";
echo "<td>" . $item . "</td>";
echo "<td>" . $quantity . "</td>";
echo "<td>" . $source . "</td>";
echo "<td>" . $destination . "</td>";
echo "<td>" . $date . "</td>";
echo "<td>" . $time . "</td>";
echo "<td>" . $reason . "</td>";
echo "<td>" . $who . "</td>";
echo "</tr>";
}

echo "</tbody></table>";

echo "<br><br>";
}


function show_transactions2(){
    global $con;
    $select_query = "SELECT * FROM `transactions2` ";
$result_query = mysqli_query($con, $select_query);


// Display the dynamic table

echo "<h1 class='text-center p-5'>transactions for page 1</h1>";

echo "<table border='1'>";
echo "<thead><tr>";
echo "<th>tran_id</th>";
echo "<th>item</th>";
echo "<th>quantity</th>";
echo "<th>source</th>";
echo "<th>destination</th>";
echo "<th>date</th>";
echo "<th>time</th>";
echo "<th>reason</th>";
echo "<th>who</th>";
echo "</tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result_query)) {
    // Access the column values
    $tran_id = $row['tran_id'];
    $item = $row['item'];
    $quantity = $row['quantity'];
    $source = $row['source'];
    $destination = $row['destination'];
    $date = $row['date'];
    $time = $row['time'];
    $reason = $row['reason'];
    $who = $row['who'];

// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $tran_id . "</td>";
echo "<td>" . $item . "</td>";
echo "<td>" . $quantity . "</td>";
echo "<td>" . $source . "</td>";
echo "<td>" . $destination . "</td>";
echo "<td>" . $date . "</td>";
echo "<td>" . $time . "</td>";
echo "<td>" . $reason . "</td>";
echo "<td>" . $who . "</td>";
echo "</tr>";
}

echo "</tbody></table>";

echo "<br><br>";
}





// function to view all requests 

function show_requests(){
    global $con;
    $select_query = "SELECT * FROM `requests` ORDER BY `Time` ASC ";
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
}




function show_houses(){


global $con;
    $select_query = "SELECT * FROM `houses` ";
$result_query = mysqli_query($con, $select_query);



// Display the dynamic table

echo "<h1 class='text-center p-5'>Houses</h1>";

echo "<table border='1'>";

echo "<thead><tr>";
echo "<th>Type</th>";
echo "<th>Total</th>";
echo "<th>In use</th>";
echo "<th>Empty</th>";
echo "</tr></thead><tbody>";

while ($row = mysqli_fetch_assoc($result_query)) {
    // Access the column values
    $type = $row['type'];
    $total = $row['total'];
    $in_use = $row['in_use'];
    $empty = $total - $in_use;


// Display table rows for each item in the armory
echo "<tr>";
echo "<td>" . $type . "</td>";
echo "<td>" . $total . "</td>";
echo "<td>" . $in_use . "</td>";
echo "<td>" . $empty . "</td>";
echo "</tr>";

}

echo "</tbody></table>";
echo "<br><br>";



}

function search_requests(){
    global $con;

    if (isset($_GET['search_data_product'])) {
        $search_value=$_GET['search_data'];
        $search_query="SELECT * from `requests` where `pno` like '%$search_value%' OR `name` like '%$search_value%' OR `adhi_pad` like '%$search_value%' OR `adhi_no` like '%$search_value%' ORDER BY `Time` ASC";
       
        $result_query = mysqli_query($con, $search_query);
        $count=mysqli_num_rows($result_query);
        if ($count==0) {
            echo "<h1 class='text-center p-5'>No results found</h1>";
        }
        else{
            echo "<h1 class='text-center p-5'>Search Requests</h1>";

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


function show_accepted(){
    global $con;
    $select_query = "SELECT * FROM `accepted`";
$result_query = mysqli_query($con, $select_query);

echo "<h1 class='text-center p-5'>Accepted</h1>";

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
echo "<th>accepted</th>";
echo "<th>SI_pref</th>";
echo "<th>Time</th>";
echo "<th>reason_by_admin</th>";
echo "<th>accepted_at</th>";
echo "<th>alloted</th>";
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
    $SI_pref= $row['SI_pref'];
    $Time= $row['Time'];
    $reason_by_admin= $row['reason_by_admin'];
    $accepted_at= $row['accepted_at'];
    $alloted= $row['alloted'];

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
echo "<td>" . $accepted . "</td>";
echo "<td>" . $SI_pref . "</td>";
echo "<td>" . $Time . "</td>";
echo "<td>" . $reason_by_admin . "</td>";
echo "<td>" . $accepted_at . "</td>";
echo "<td>" . $alloted . "</td>";   
echo "</tr>";

}
echo "</tbody></table>";
            echo "<br><br>";






}
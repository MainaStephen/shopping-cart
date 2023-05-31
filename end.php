<?php
// ob_start();
include('./db.php');

//Add
if(isset($_POST['save_btn'])){
    //Session Variables
    // $user_sesh = $_SESSION['user_id'];

    //fetch Variables
    // $pname =  preg_replace('/[^A-Za-z ]/', '', $_POST['name']);
    
    // $pid = mysqli_real_escape_string($con, $_POST['id']);
    $pname = mysqli_real_escape_string($con, $_POST['name']);
    $pcode = mysqli_real_escape_string($con, $_POST['code']);
    $pprice = mysqli_real_escape_string($con, $_POST['price']);
    $pimage = mysqli_real_escape_string($con, $_POST['image']);
    
      //Timestamp
    $dateTimeZone = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
    $Timestamp = strtotime($dateTimeZone->format('Y-m-d H:i:s'));
    
    //Sql
    $sql = mysqli_query($con, "INSERT INTO `products`(`name`, `code`, `price`,`image`
    ) VALUES('$pname', '$pcode', '$pprice', '$pimage')");
    if(!$sql){
        echo "Error encountered".mysqli_error($con);
    } else {
        echo "Success!";
        
        // // last id
        // $last_id = mysqli_insert_id($con);
        
        // // Assign Supervisor
        // $ag_sql = mysqli_query($con, "INSERT INTO `assignment`(`primary_id`, `secondary_id`)
        // VALUES('$last_id', '$sup_id')") or die(mysqli_error($con));
        // if($ag_sql){
        //      $backup_assign = mysqli_query($con, "INSERT INTO `original_assignment`(`id`, `primary_id`, `secondary_id`) 
        //         VALUES(NULL, '$last_id', '$sup_id')") or die(mysqli_error($con));
        //         if($backup_assign){
        //             header("location: ../leader_agents.php?AddedSuccessfully!");
        //         }
        // }
    }
    
    
} 

function getAllDetails($tableName){
// Establish a database connection
$mysqli = mysqli_connect("localhost","root","","allphptricks");


// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to retrieve data
$sql = "SELECT * FROM {$tableName}";
$result = $mysqli->query($sql);

return $result;

// // Check if the query executed successfully
// if ($result) {
//     // Fetch the data row by row
//     while ($row = $result->fetch_assoc()) {
//         // Access the column values of each row
//         $column1 = $row['id'];
//         $column2 = $row['name'];
//         $column3 = $row['code'];
//         $column4 = $row['price'];
//         $column5 = $row['image'];
//         // ...and so on
        
//         // Process the data or display it as needed
//         // <table></table>
//         // ...and so on
//     }
// } else {
//     echo "Error: " . $mysqli->error;
// }

// Close the database connection
// $mysqli->close(); 
};


if(isset($_POST['delete_btn'])){
    //Session Variables
    // $user_sesh = $_SESSION['user_id'];

    //fetch Variables
    // $pname =  preg_replace('/[^A-Za-z ]/', '', $_POST['name']);
    
    // $pid = mysqli_real_escape_string($con, $_POST['id']);
    $pname = mysqli_real_escape_string($con, $_POST['name']);
    $pcode = mysqli_real_escape_string($con, $_POST['code']);
    $pprice = mysqli_real_escape_string($con, $_POST['price']);
    $pimage = mysqli_real_escape_string($con, $_POST['image']);
    
      //Timestamp
    $dateTimeZone = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
    $Timestamp = strtotime($dateTimeZone->format('Y-m-d H:i:s'));
    
    //Sql
    $sql = mysqli_query($con, "INSERT INTO `products`(`name`, `code`, `price`,`image`
    ) VALUES('$pname', '$pcode', '$pprice', '$pimage')");
    if(!$sql){
        echo "Error encountered".mysqli_error($con);
    } else {
        echo "Success!";
        
        // // last id
        // $last_id = mysqli_insert_id($con);
        
        // // Assign Supervisor
        // $ag_sql = mysqli_query($con, "INSERT INTO `assignment`(`primary_id`, `secondary_id`)
        // VALUES('$last_id', '$sup_id')") or die(mysqli_error($con));
        // if($ag_sql){
        //      $backup_assign = mysqli_query($con, "INSERT INTO `original_assignment`(`id`, `primary_id`, `secondary_id`) 
        //         VALUES(NULL, '$last_id', '$sup_id')") or die(mysqli_error($con));
        //         if($backup_assign){
        //             header("location: ../leader_agents.php?AddedSuccessfully!");
        //         }
        // }
    }
    
    
} 

?>
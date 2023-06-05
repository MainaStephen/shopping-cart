<?php
// ob_start();
include('./db.php');
$statusMsg = '';


//Add
if(isset($_POST['save_btn'])){
        // File upload path
    $targetDir = "images/uploadedFiles/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    $pname = mysqli_real_escape_string($con, $_POST['name']);
    $pcode = mysqli_real_escape_string($con, $_POST['code']);
    $pprice = mysqli_real_escape_string($con, $_POST['price']);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
        // Insert image file name into database
        $sql = mysqli_query($con, "INSERT INTO `products`(`name`, `code`, `price`,`image`
        ) VALUES('$pname', '$pcode', '$pprice', '$fileName')");
        if(!$sql){
            echo "Error encountered ".mysqli_error($con);
            $statusMsg = "File upload failed, please try again.";
        } else {
            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            header("location:admin.php?res=0");
            
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
 
        
    }else{
        $statusMsg = "Sorry, there was an error uploading your file.";
    }


    //Session Variables
    // $user_sesh = $_SESSION['user_id'];

    //fetch Variables
    // $pname =  preg_replace('/[^A-Za-z ]/', '', $_POST['name']);
    
    // $pid = mysqli_real_escape_string($con, $_POST['id']);

    
    
    //   //Timestamp
    // $dateTimeZone = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
    // $Timestamp = strtotime($dateTimeZone->format('Y-m-d H:i:s'));
      
} 
echo $statusMsg;

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


//Update
if(isset($_POST['upd_btn'])){
    
    //fetch Variables
//    $uname =  preg_replace('/[^A-Za-z ]/', '', $_POST['username']);

    $pid = mysqli_real_escape_string($con, $_POST['id']);
    $pname = mysqli_real_escape_string($con, $_POST['name']);
    $pcode = mysqli_real_escape_string($con, $_POST['code']);
    $pprice = mysqli_real_escape_string($con, $_POST['price']);
    $pimage = mysqli_real_escape_string($con, $_POST['image']);
    
    //Sql
    $sql = mysqli_query($con, "UPDATE `products` SET `name`= '$pname',
    `code`='$pcode', `image`='$pimage' WHERE `id`= '$pid'");
    if(!$sql){
        echo "Error encountered".mysqli_error($con);
    } else {
        // echo "Success!";
        header("location: admin.php?res=0");
        
        //Assign Supervisor
        // $ag_sql = mysqli_query($con, "UPDATE `assignment` SET `secondary_id` = '$sup_id'
        // WHERE `primary_id` = '$u_id'") or die(mysqli_error($con));
        // if($ag_sql){
        //     $backup_assign = mysqli_query($con, "UPDATE `original_assignment` SET `secondary_id` = '$sup_id'
        // WHERE `primary_id` = '$u_id'") or die(mysqli_error($con));
        //         if($backup_assign){
        //              header("location: ../leader_agents.php?UpdatedSuccessfully!");
        //         }
           
        }
    }
    
    //delete
    if(isset($_POST['del_btn'])){ 
    
        //fetch Variables
        $pid = mysqli_real_escape_string($con, $_POST['id']);
        
        //Sql
        $sql = mysqli_query($con, "DELETE FROM `products` WHERE `id`= '$pid'");
        if(!$sql){
            echo "Error encountered".mysqli_error($con);
        } else {
            // echo "Success!";
            header("location: admin.php?res=0");
        }
        
        
    } 


?>





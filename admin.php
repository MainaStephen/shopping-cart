<?php 
include('end.php'); 
session_start();

// if (!isset($_SESSION['user_id']) ) {
// 	header('Location: login.php');
// }

//Session Variables
// $user_sesh = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>admin form</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="admin.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">




</head>

<body>


  <?php
  $response = "";

  if (isset($_GET['res'])) {

    $response = $_GET['res'];
    if ($response == 0) {
      echo " <div class='message' id='del_msg'>
      <p>Action was Successful</p>
    </div>";
    }
  }

  $response = "";

  if (isset($_GET['res'])) {

    $response = $_GET['res'];
    if ($response == 1) {
      echo " <div class='message' id='del_msg'>
      <p>Login Successful</p>
    </div>";
    }
  }


  if (isset($_GET['res'])) {

    $response = $_GET['res'];
    if ($response == 2) {
      echo " <div class='message' id='del_msg'>
      <p>Signup Successful</p>
    </div>";
    }
  }

  ?>
  <section id="profile">
    <ul><li><a href="#"><i class="fa-regular fa-user fa-2x"></i></a> 
    <ul>
      <li><a href="#"><i class="fa-regular fa-user "></i>profile</a></li>
      <div class="logout">
          <li><a href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
        </div>
    </ul> 
    </li>
    </ul>

  </section>

  <section id="tform">
    <div class="sidebar">
      <ul>
        <div class="navbar">
          <li>Navigation bar</li>
        </div>
        <li><a href="#"><i class="fa-sharp fa-regular fa-grid-5"></i>Dashboard</a></li>
        <li><a href="#"><i class="fa-solid fa-money-bill-transfer"></i>Sales</a></li>
        <li><a href="#"><i class="fa-duotone fa-file-chart-pie"></i>Reports</a></li>
        <!-- <div class="logout">
          <li><a href="./logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a></li>
        </div> -->
      </ul>

    </div>
    <div class="table">
      <table id="myTable" border="3" cellspacing="10" cellpadding="2" width="100%" padding="20px">
        <thead>
          <th>ID</th>
          <th>Name</th>
          <th>Code</th>
          <th>Price</th>
          <th>Image</th>
          <th>Actions</th>
        </thead>
        <tbody>
          <!-- loop -->
          <?php
          $res = getAllDetails("products");
          // Check if the query executed successfully 
          if ($res) {
            // Fetch the data row by row
            while ($row = $res->fetch_assoc()) {
              //   Access the column values of each row
              $column1 = $row['id'];
              $column2 = $row['name'];
              $column3 = $row['code'];
              $column4 = $row['price'];
              $column5 = $row['image'];


              // Process the data or display it as needed
              echo
              "
                                     <tr>
                                        <td>" . $column1 . "</td>
                                        <td>" . $column2 . "</td>
                                        <td>" . $column3 . "</td>
                                        <td>" . $column4 . "</td>
                                        <td><img src='images/uploadedFiles/" . $column5 . "' width='100' height='100'/></td>
                                        <td style='display: flex; justify-content: space-between; margin:20 px;'><button name='update_btn' class='btn btn-warning' data-toggle='modal' data-target='#editModal" . $column1 . "' style='width: 60px; height:30px; display:flex; align-items:center;'>Edit</button>
                                        <button name='delete_btn' class='btn btn-danger' data-toggle='modal' data-target='#deleteModal" . $column1 . "' style='width:70px; height:30px; display:flex; align-items:center;'>Delete</button></td> 
                                       
                                        
                                    </tr>
                                 "; ?>
              <!-- ...and so on    -->

              <!-- edit modal -->
              <div class="modal fade" id='editModal<?php echo $column1; ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" id="exampleModalLabel">UPDATE</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <form action="./end.php" method="POST">
                        <input type="hidden" readonly class="form-control" required name="id" value="<?php echo $column1; ?>">

                        <div class="name">
                          <h4>Enter Name</h4>
                          <input type="text" placeholder="name" name="name" required value="<?php echo $column2; ?>">
                        </div>
                        <div class="code">
                          <h4>Enter Code</h4>
                          <input type="number" placeholder="code" name="code" required value="<?php echo $column3; ?>">
                        </div>
                        <div class="price">
                          <h4>Enter Price</h4>
                          <input type="number" placeholder="price" name="price" required value="<?php echo $column4; ?>">

                        </div>
                        <div class="image">
                          <h4>Image </h4>
                          <input type="file" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="upd_btn" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- delete modal -->
              <div class="modal fade" id='deleteModal<?php echo $column1; ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" id="exampleModalLabel">DELETE</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      are you sure you want to delete this data?

                      <form action="./end.php" method="POST">
                        <input type="hidden" readonly class="form-control" required name="id" value="<?php echo $column1; ?>">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                          <button type="submit" name="del_btn" class="btn btn-danger">Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


            <?php    }
          } else {
            echo "Error: " . $mysqli->error;
          } ?>


        </tbody>

      </table>

    </div>


    <div class="row form">
      <form action="end.php" method="POST" enctype="multipart/form-data">
        <div class="name">
          <h4>Enter Name</h4>
          <input type="text" placeholder="name" name="name" required>
        </div>
        <div class="code">
          <h4>Enter Code</h4>
          <input type="number" placeholder="code" name="code" required>
        </div>
        <div class="price">
          <h4>Enter Price</h4>
          <input type="number" placeholder="price" name="price" required>

        </div>
        <div class="file-container">
          <h4>Upload Image</h4>
          <input type="file" name="image" id="image">
          <div id="preview">

          </div>
          <!-- echo "<img src='$uploadedImagePath' alt='Uploaded Image'>"; -->
        </div>
        <div>
          <button name="save_btn"> Save</button>
        </div>

      </form>
    </div>
  </section>


  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

  <script>
    let table = new DataTable('#myTable');
  </script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    $('#del_msg').fadeOut(4000);

    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function(event) {
          $('#preview').html('<img src="' + event.target.result + '" width="auto" height="100"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    $("#image").change(function() {
      imagePreview(this);
    });
  </script>

</body>

</html>

<?php
?>
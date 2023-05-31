<?php include('end.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin form</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" nodeferer></script>
    
</head>
<body>

    <section id="tform"  >
        <div class="table">
                    <table border="3" cellspacing="10" cellpadding="2"  width="100%" padding="20px">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Image</th>
                    </thead>
                    <tbody >
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
                                        <td>$column1</td>
                                        <td>$column2</td>
                                        <td>$column3</td>
                                        <td>$column4</td>
                                        <td>$column5</td>
                                        <td><button name='update_btn' class='btn btn-warning' style='width:70px; height:30px; display:flex; align-items:center;'>Edit</button></td> 
                                        <td><button name='delete_btn' class='btn btn-danger' style='width:70px; height:30px; display:flex; align-items:center;'>Delete</button></td> 
                                        
                                    </tr>
                                 ";
                                  // ...and so on    
                                 }
                             } else {
                                 echo "Error: " . $mysqli->error;
                             } ?>
   
                
                    </tbody>
                    
                    </table>
                
        </div>
        
        
        <div class="form">
                <form action="./end.php" method="POST">
                    <div class="name">
                        <h4>Enter Name</h4>
                        <input type="text" placeholder="name" name="name" required >
                    </div>
                    <div class="code">
                        <h4>Enter Code</h4>
                        <input type="number" placeholder="code" name="code" required>
                    </div>
                    <div class="price">
                        <h4>Enter Price</h4>
                        <input type="number" placeholder="price" name="price" required>
        
                    </div>
                    <div class="image">
                        <h4>Image </h4>
                        <input type="file" name="image" required>
                    </div>
                    <div>
                        <button name="save_btn"> Save</button>
                    </div>
        
                </form>
        </div>
    </section>
</body>
</html>

<?php ?>
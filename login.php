<?php
//    include('db.php');

//    include('session.php');
//    session_start();
   
//    if($_SERVER["REQUEST_METHOD"] == "POST") {
//       // username and password sent from form 
//     //   echo "failure";

//       $uname = mysqli_real_escape_string($db,$_POST['username']);
//       $upass = mysqli_real_escape_string($db,$_POST['password']); 
      
//       $sql = "SELECT * FROM users WHERE username = '$uname' and password = '$upass'";
//       $result = mysqli_query($con,$sql);
//       $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//       $active = $row['active'];
      
//       $count = mysqli_num_rows($result);
      
//       // If result matched $myusername and $mypassword, table row must be 1 row
		
//       if($count == 1) {
//          $session_register("myusername");
//          $_SESSION['login_user'] = $myusername;
         
//          header("location: welcome.php");
//       }else {
//          $error = "Your Login Name or Password is invalid";
//       }
//    }

//     die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>
<body class="loginbody">
    <section id="login">
        <h3>Login to continue</h3>
        <?php
    // Check if an error message is present in the URL
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "<p>$error</p>";
    }
    ?>
    <form method="post" action="end.php">
        <DIV class="username">
            <h4>enter your username</h4>
            <input type="text " name="username" placeholder="username" size="30">
        </DIV>
        <div class="pass">
            <h4>enter your Password</h4>
            <input type="password" name="password" placeholder="password" size="30">
        </div>

        <div class="button" type="submit" >
            <button name="login_btn">log in</button>
        </div>
        <!-- <div>
            <input type="checkbox">remember me
        </div> -->
        <div class="forgot">
            <a href="./reset.html">forgot password?</a>
        </div>
        <div class="no_acc">
            <a href="./signup.php">Do not have an account?</a>
        </div>
    </form>

    </section>
    <!-- <script>
        $('#del_msg').fadeOut(4000);
      </script> -->
</body>
</html>
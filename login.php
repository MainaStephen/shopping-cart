<?php
// session_start();

// if (!isset($_SESSION['user_id']) ) {
// 	header('Location: login.php');
// }


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
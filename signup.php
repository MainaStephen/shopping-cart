<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body class="loginbody">
    <section id="login">
    <form method="post" action="end.php">
        <h3>sign up to continue</h3>
        <?php
    // Check if an error message is present in the URL
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "<p>$error</p>";
    }
    ?>
        <DIV class="username">
            <h4>create username</h4>
            <input type="text " name="username" placeholder="username" size="30">
        </DIV>
        <div class="pass">
            <h4>enter your Password</h4>
            <input type="password" name="password" placeholder="password" size="30">
        </div>
        <div class="pass">
            <h4>confirm your Password</h4>
            <input type="password" name="confirmpass" placeholder="password" size="30">
        </div>

        <div class="button" type="submit" >
            <button name="signup_btn"> sign up</button>
        </div>
        <!-- <div>
            <input type="checkbox">remember me
        </div> -->
    </form>

    </section>
</body>
</html>
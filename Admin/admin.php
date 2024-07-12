<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Admin</title>
    <!-- <link rel="stylesheet" href="../src/output.css"> -->
     <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../Horse.png" type="image/x-icon">
</head>
<div class="login">
    <h1>Login</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="input">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Email" name="email">
        </div>
        <div class="input">
            <label for="pwd">Password</label>
            <input type="password" id="pwd" placeholder="Password" name="pwd">
        </div>
        <div>
            <p><?php if(isset($err)){echo $err;} ?></p>
            <input type="submit" value="Login">
        </div>
    </form>
</div>
</body>
</html>

<?php
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pwd = md5($_POST['pwd']);

    include('../config/connect.php');

    $sql = mysqli_query($conn,"SELECT * FROM `admin1080` WHERE `email`='$email' AND `password`='$pwd';");
    if(mysqli_num_rows($sql)>0){
        session_start();
        $_SESSION['pwd'] = $pwd;
        $_SESSION['email'] = $email;
        ?>
<script>
alert('Login Successfull');
window.location.href = "./index.php";
</script>
        <?php
    }
}

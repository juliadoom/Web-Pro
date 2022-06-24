<?php
session_start();
?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div>
            <h3>Please login</h3>
        </div>
        <div>
            <form method="post" action="VerifyLogin.php">
                <input type="text" name="myusername" placeholder="username">
                <input type="password" name="mypassword" placeholder="password">
                <input type="submit" value="login">
            </form>
            <a href="NewUser.php">New User</a>
        </div>
    </body>
</html>

<?php
if (isset($_SESSION['badPass'])||$_SESSION['badPass']==i) {
    echo"Username or password is incorrect";
}
?>
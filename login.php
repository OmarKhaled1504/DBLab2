<html>
<head>
    <title>Login</title>

</head>
<body>
<?php echo '<p>Sign In</p>'; ?>

<form name="login" action="#" onsubmit="return validate()" method="post" required>
    E-mail: <input id="email" type="text" name="email"><br></br>
    Password : <input id="pw" type="password" name="password"><br></br>
    <button id="lgn" type="submit" name="login">Login</button>
    <br></br>
</form>
<script>
    function validate() {
        var x = document.forms["login"]["email"].value;
        var y = document.forms["login"]["password"].value;
        if (x == "") {
            alert("Please enter your email");
            return false;
        } else if (y == "") {
            alert("Please enter your password");
            return false;
        }
    }
</script>
<?php echo "Don't have an account?" ?>
<button id="reg" type="submit">Register</button>
<br>
<script>
    document.getElementById("reg").onclick = function () {
        location.href = "register.php";
    };
</script>
<?php
session_start();
if (isset($_POST['login'])) {
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'registration');
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "select * from user where email ='" . $email . "'AND password = '" . $password . "'limit 1 ";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) == 1) {
            $name = "select name from user where email ='" . $email . "'AND password = '" . $password . "'limit 1 ";
            $name = mysqli_fetch_row(mysqli_query($con, $name))[0];
            print"Welcome " . $name;
        } else {
            echo "Email or password are incorrect";
        }
    }
}
?>
</body>
</html>

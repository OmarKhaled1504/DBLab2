<html>
<head>
    <title>Register</title>
</head>
<body>
<?php echo '<p>Register</p>'; ?>
<form name="register" action="#" onsubmit="return validate()" method="post" required>
    Name: <input type="text" name="name"><br></br>
    E-mail: <input type="text" name="email"><br></br>
    Password: <input type="password" name="password"><br></br>
    Repeat Password: <input type="password" name="rpassword"><br></br>
    <button id="reg" type="submit" name="register">Register</button>
    <br></br>
</form>
<?php echo "Already have an account?" ?>
<button id="lgin" type="submit">Login</button>
<br>
<script>
    document.getElementById("lgin").onclick = function () {
        location.href = "login.php";
    };
</script>
<script>
    function validate() {
        var n = document.forms["register"]["name"].value;
        var x = document.forms["register"]["email"].value;
        var y = document.forms["register"]["password"].value;
        var yy = document.forms["register"]["rpassword"].value;
        if (n == "") {
            alert("Please enter your name");
            return false;
        } else if (x == "") {
            alert("Please enter your email");
            return false;
        } else if (y == "") {
            alert("Please enter your password");
            return false;
        } else if (yy == "") {
            alert("Please repeat your password");
            return false;
        } else if (y != yy) {
            alert("Passwords do not match");
            return false;
        }
    }</script>
<?php
session_start();
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'registration');
    $valid = "select * from user where email ='" . $email . "'AND password = '" . $password . "'limit 1 ";
    $result = mysqli_query($con, $valid);
    if (mysqli_num_rows($result) == 1) {
        print"Email already exists";
    } else {
        $sql = "INSERT INTO user (email, name, password) VALUES ('" . $email . "','" . $name . "','" . $password . "')";
        mysqli_query($con, $sql);
        $name = "select name from user where email ='" . $email . "'AND password = '" . $password . "'limit 1 ";
        if (mysqli_num_rows(mysqli_query($con, $name)) == 1) {
            $uname = mysqli_fetch_row(mysqli_query($con, $name))[0];
            echo "Welcome " . $uname;
        }
    }

}
?>

</body>
</html>

<html>
<head>
    <title>Welcome</title>

</head>
<body>
<?php
session_start();
$name = $_SESSION['name'];
echo 'Welcome ' . $name . '<br>';
?>
</body>
</html>

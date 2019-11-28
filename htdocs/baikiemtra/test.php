<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
<?php
include_once("model/user.php");
session_start();
if (!isset($_SESSION["user"])) {
   // header("location:login.php");
}


$user = unserialize($_SESSION["user"]);

echo "Xin chào bạn " . $user->userid;
?>

</body>

</html>
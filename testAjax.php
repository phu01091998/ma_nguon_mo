<?php
    include_once('model/user.php');
    $userName = $_REQUEST['userName'];
    // echo"<h5 class='text-danger'>xin chao $userName</h5>";
    $user = new User($userName,"12345","Gấu");
    $jsonUser= json_encode($user);
    echo $jsonUser;
?>

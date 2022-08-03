<?php

    session_start();
    ob_start();
    include("connection.php");
    
    $uid = $_SESSION['uid'];
    $del_query = "UPDATE user SET access_token = ' ' WHERE uid = '$uid'";
    $result = mysqli_query($con, $del_query);
    
    if($result)
    {
        unset($_SESSION['uid']);
        session_destroy();
        header("Location: index.php");
        exit();
    }
    
?>
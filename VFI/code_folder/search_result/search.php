<?php
        include "./include.php";  
ob_start();
    session_start();
    $con = mysqli_connect("localhost","root","","teen-project-database");
    $nums = " ";
    if(isset($_GET['k']) && !empty($_GET['k'])){
        $k = $_GET['k'];
        $query = "SELECT * FROM post WHERE title LIKE '%$k%' OR descritpion LIKE '%$k%'";
        $query2 = "SELECT * FROM users WHERE username LIKE '%$k%' OR gmail LIKE '%$k%'" ;
        $query3 = "SELECT * FROM webpost WHERE title LIKE'%$k%' OR descrition LIKE '%$k%'";
    } else {
        $query = "SELECT * FROM post";
        $query2 = "SELECT * FROM users";
    }
    $result = mysqli_query($con, $query);
    $result2 =mysqli_query($con, $query2);
    $result3 =mysqli_query($con, $query3);
    $nums = mysqli_num_rows($result);
    $nums2 = mysqli_num_rows($result2);
    $nums3 = mysqli_num_rows($result3);
    include "./index.php";
    include "./style.php"
?>
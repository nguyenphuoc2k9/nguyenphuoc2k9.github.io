<?php
    ob_start();
    session_start();
    $username = $_SESSION['username'];
    $id = $_SESSION['id'];
    if(!isset($_SESSION['username'])){
        header("Location:../Login/login.php");
    }
    if($_SESSION['username'] == null){
        echo "<script type='text/javascript'>";
        echo "document.getElementById('head-btn').insertAdjacentHTML('beforeend',`<button id='sigh-in'><a href='../Sigh in/SighIn.html'>Sigh In</a></button>
        <button id='log-in'> <a href='../Login/Login.php'>Log In</a></button>`)";
        echo "</script>";
    }
    $con = mysqli_connect("localhost","root","","teen-project-database") or die("khong the ket noi toi database");
    $query = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($con,$query);
    include("./index.php");
    if(isset($_POST['name-btn'])){
        $name = $_POST['name'];
        $query = "UPDATE users SET username ='$name' WHERE username ='$username'";
        if(mysqli_query($con, $query)){
            header("Location:./profile.php");
            $_SESSION['username'] = $name;
        } else {
            $re = "loi them moi" . mysqli_errno($con);
        }
    }
    if(isset($_POST['email-btn'])){
        $email = $_POST['email'];
        $query = "UPDATE users SET gmail = '$email' where username = '$username'";
        if(mysqli_query($con, $query)){
            header("Location:./profile.php");
        } else {
            $re = "loi them moi". mysqli_errno($con);
        }
    }
    if(isset($_POST['hobby-btn'])){
        $hobby = $_POST['hobby'];
        $query = "UPDATE users SET hobby = '$hobby' where username = '$username'";
        if(mysqli_query($con, $query)){
            header("Location:./profile.php");
        } else {
            $re = "loi them moi". mysqli_errno($con);
        }
    }
    if(isset($_POST['pn-btn'])){
        $pn = $_POST['pn'];
        $query = "UPDATE users SET Phone_number = '$pn' where username = '$username'";
        if(mysqli_query($con, $query)){
            header("Location:./profile.php");
        } else {
            $re = "loi them moi". mysqli_errno($con);
        }
    }
    if(isset($_POST['file-btn'])){
        $file_name = $_FILES['file-up']['name'];
        $file_tmpname = $_FILES['file-up']['tmp_name'];
        $file_size = $_FILES['file-up']['size'];
        $file_error = $_FILES['file-up']['error'];
        $file_type = $_FILES['file-up']['type'];
        $file_ext = explode(".",$file_name);
        $file_acture_ext = strtolower(end($file_ext));
        $id = $_SESSION['id'];
        $allow = array("jpg","jpeg","png","pdf");
        if(in_array($file_acture_ext, $allow)){
            if($file_error == 0){
                if($file_size > 1000000){
                    echo " Your file is too big";
                } else {
                    $file_name_new = "img". $id . "." . $file_acture_ext;
                    $file_destination = "../user upload/" . $file_name_new;
                    move_uploaded_file($file_tmpname,$file_destination);
                    header("Location:./profile.php?fileupdated");
                    $req = "UPDATE users SET img = '$file_name_new' WHERE id = '$id'";
                    $query = mysqli_query($con, $req);
                    
                }
            } else {
                echo "There was an error uploading your file";
            }
        } else {
            echo "You cannot upload files of this type";
        }
    }
    //file update
    include("./style.php");
?>
<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']===$admin) {
   
    if (isset($_POST['nurse']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $name = $_POST['nurse'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        if ($_POST['defaultpassword'] && $_POST['password']) {
            $password = 'password';
            if ($_POST['password'] =='') {
                $password = 'password';
            }else{
                $password = $_POST['password'];
            }
        }
        if ($_POST['defaultpassword'] && !$_POST['password']) {
            $password = 'password';
        }
        if (!$_POST['defaultpassword'] && $_POST['password']) {
            $password = $_POST['password'];
        }
        if (!$_POST['defaultpassword'] && !$_POST['password']) {
            echo "password missing";
        }
        
        $cryptpsd = encrypt($password);
        // header("Location: ../doctors?message=".$cryptpsd."");
        $sql = "INSERT INTO `nurses`(`nurseName`, `phoneNo`, `email`, `password`)  VALUES ('$name','$phone','$email','$cryptpsd');";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            header("Location: ../nurses?message=The nurse has been registered successfully!");
        }else{
            header("Location: ../nurses?message=The nurse has not been registered. Please try again.");
        }
    } 
  }else {
    header("Location: ../../validation/logout.php?message=Kindly log in");
  }
?>
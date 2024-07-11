<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']===$admin) {
    if (isset($_POST['technician']) && isset($_POST['role']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $name = $_POST['technician'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $sql = "INSERT INTO `technician`(`technicianName`, `role`, `phoneNo`, `email`) VALUES ('$name','$role','$phone','$email');";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            header("Location: ../technicians?message=The Lab Technician has been registered successfully!");
        }else{
            header("Location: ../technicians?message=The Lab Technician has not been registered. Please try again.");
        }     
    } 
  }else {
    header("Location: ../../validation/logout.php?message=Kindly log in");
  }
?>
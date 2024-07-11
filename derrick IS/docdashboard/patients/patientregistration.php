<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']===$doctor) {
   
    if (isset($_POST['patient']) && isset($_POST['age']) && isset($_POST['dob']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['phone'])) {
        $name = $_POST['patient'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        // echo $gender;
        if($gender == 'Open this select menu'){
            $message = "You haven't entered the correct gender. Please select between male or female.";
            header("Location: ../patients?message=".$message."");
            // echo "here";
        }else{
            $sql = "INSERT INTO `patient`( `patientName`, `age`, `DoB`, `gender`, `phoneNo`, `email`)  VALUES ('$name','$age','$dob','$gender','$phone','$email');";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                header("Location: ../patients?message=The patient has been registered successfully!");
            }else{
                header("Location: ../patients?message=The patient has not been registered. Please try again.");
            }
        }
        // header("Location: ../doctors?message=".$cryptpsd."");
        
    } 
  }else {
    header("Location: ../../validation/logout.php?message=Kindly log in");
  }
?>
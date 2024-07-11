<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']===$nurse) {
   
    if (isset($_POST['Record'])) {
        $patientID = $_POST['Record'];
        $immunization = $_POST['immunization'];
        $allergies = $_POST['allergies'];
        // echo $gender;
        if($immunization == 'Open this select menu'){
            $message = "You haven't entered the correct choice. Please select between Yes or No.";
            header("Location: ../patients?message=".$message."");
            // echo "here";
        }else{
            $sql = "INSERT INTO `records`( `patientID`, `allergies`, `immunizationStatus`) VALUE ('$patientID','$allergies','$immunization');";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                header("Location: ../patients/patientdetails.php?message=The patient record has been stored successfully!&pID=".$patientID."");
            }else{
                header("Location: ../patients.patientdetails.php?message=The patient has not been registered. Please try again.&pID=".$patientID."");
            }
        }
        // header("Location: ../doctors?message=".$cryptpsd."");
        
    } 
    if (isset($_POST['Appointment'])) {
        $nurseid = $_SESSION['ID'];
        $patientID = $_POST['Appointment'];
        $date = $_POST['appointmentdate'];
        $docid = $_POST['doctor'];
        // echo $gender;
        if($docid == 'Open this select menu'){
            $message = "You haven't entered the correct choice. Please select between Yes or No.";
            header("Location: ../patients/patientdetails.php?message=".$message."&pID=".$patientID."");
            // echo "here";
        }else{
            $sql = "INSERT INTO `patientappointments`(`nurseID`, `docID`, `patientID`, `appointmentDate`) VALUE ('$nurseid','$docid','$patientID','$date');";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                header("Location: ../patients/patientdetails.php?message=The patient appointment has been stored successfully!&pID=".$patientID."");
            }else{
                header("Location: ../patients.patientdetails.php?message=The patient has not been registered. Please try again.&pID=".$patientID."");
            }
        }
        // header("Location: ../doctors?message=".$cryptpsd."");
        
    } 
  }else {
    header("Location: ../../validation/logout.php?message=Kindly log in");
  }
?>
<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']===$doctor) {
   
    if (isset($_POST['Record'])) {
        $patientID = $_POST['Record'];
        $immunization = $_POST['immunization'];
        $allergies = $_POST['allergies'];
        if($immunization == 'Open this select menu'){
            $message = "You haven't entered the correct choice. Please select between Yes or No.";
            header("Location: ../patients?message=".$message."");
        }else{
            $sql = "INSERT INTO `records`( `patientID`, `allergies`, `immunizationStatus`) VALUES ('$patientID','$allergies','$immunization');";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                header("Location: ../patients/patientdetails.php?message=The patient record has been stored successfully!&pID=".$patientID."");
            }else{
                header("Location: ../patients.patientdetails.php?message=The patient record has not been saved. Please try again.&pID=".$patientID."");
            }
        }
    } 

    if (isset($_POST['Appointment'])) {
        $patientID = $_POST['Appointment'];
        $date = $_POST['appointmentdate'];
        $docid = $_POST['doctor'];
        $nurseid = $_POST['nurse'];
        if($docid == 'Open this select menu' || $nurseid == 'Open this select menu'){
            $message = "You haven't entered the correct choice. Please select the given choices.";
            header("Location: ../patients/patientdetails.php?message=".$message."&pID=".$patientID."");
        }else{
            $sql = "INSERT INTO `patientappointments`(`nurseID`, `docID`, `patientID`, `appointmentDate`) VALUES ('$nurseid','$docid','$patientID','$date');";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                header("Location: ../patients/patientdetails.php?message=The patient appointment has been stored successfully!&pID=".$patientID."");
            }else{
                header("Location: ../patients.patientdetails.php?message=The patient appointment has not been saved. Please try again.&pID=".$patientID."");
            }
        } 
    } 

    if (isset($_POST['Diagnosis'])) {
        $patientID = $_POST['Diagnosis'];
        $diagnosis = $_POST['patientdiagnosis'];
        $date = $_POST['diagnosisdate'];
        $docid = $_SESSION['ID'];
        $sql = "INSERT INTO `diagnosis`( `docID`, `patientID`, `diagnosisDate`, `diagnosis`) VALUES ('$docid','$patientID','$date','$diagnosis');";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            header("Location: ../patients/patientdetails.php?message=The patient diagnosis has been stored successfully!&pID=".$patientID."");
        }else{
            header("Location: ../patients.patientdetails.php?message=The patient diagnosis has not been saved. Please try again.&pID=".$patientID."");
        }
        
    } 
    if (isset($_POST['Lab'])) {
        $patientID = $_POST['Lab'];
        $date = $_POST['testdate'];
        $test = $_POST['test'];
        $docid = $_SESSION['ID'];
        $techid = $_POST['technician'];
        if($techid == 'Open this select menu'){
            $message = "You haven't entered the correct choice. Please select the given choices.";
            header("Location: ../patients/patientdetails.php?message=".$message."&pID=".$patientID."");
        }else{
            $sql = "INSERT INTO `labtest`( `patientID`, `technicianID`, `docID`, `testName`, `scheduledDate`) VALUES ('$patientID','$techid','$docid','$test','$date');";
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                header("Location: ../patients/patientdetails.php?message=The Laboratory Test has been scheduled successfully!&pID=".$patientID."");
            }else{
                header("Location: ../patients.patientdetails.php?message=The Laborarory Test schedule has not been saved. Please try again.&pID=".$patientID."");
            }
        }   
    } 
    if (isset($_POST['Prescription'])) {
        $patientID = $_POST['Prescription'];
        $date = $_POST['presdate'];
        $docid = $_SESSION['ID'];
        $meds = $_POST['drug'];
        $instructions = $_POST['instructions'];
        $sql = "INSERT INTO `prescriptions`(`docID`, `patientID`, `drug`, `prescriptionDate`, `instructions`) VALUES ('$docid','$patientID','$meds','$date','$instructions');";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            header("Location: ../patients/patientdetails.php?message=The Medical Prescription has been saved successfully!&pID=".$patientID."");
        }else{
            header("Location: ../patients.patientdetails.php?message=The Medical Prescription has not been saved. Please try again.&pID=".$patientID."");
        }  
    } 
  }else {
    header("Location: ../../validation/logout.php?message=Kindly log in");
  }
?>
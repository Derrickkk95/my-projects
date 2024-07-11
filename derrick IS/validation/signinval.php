<?php 
    include ("../includes/dblink.php");
    @include("../includes/globfunc.php");
    if (isset($_POST['email'])&& isset($_POST['password'])){
        //global functions
        function validate($data)
        {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        $email=validate($_POST['email']);
        $psd=$_POST['password'];
        $cryptpsd=encrypt($psd);
        $a = 0; 
        $b = 0; 
        $c = 0;
        $sql = "SELECT * FROM `admin` WHERE `email`='$email';";
	    $result = mysqli_query($mysqli, $sql);
        $a = mysqli_num_rows($result); 
        $sql = "SELECT * FROM `doctors` WHERE email='$email'";
	    $result = mysqli_query($mysqli, $sql);
        $b = mysqli_num_rows($result); 
        $sql = "SELECT * FROM `nurses` WHERE email='$email'";
	    $result = mysqli_query($mysqli, $sql);
        $c = mysqli_num_rows($result); 
        $d = $a+$b+$c;
        
        if ($d == 0) {
            # code...
            header("Location: ../sign-in/index.php?message=There is no user found using that email. Kindly contact the administrator!");
        }else {
            $sql1 = "SELECT * FROM `admin` WHERE `email`='$email' AND `password`='$cryptpsd'";
            $result1 = mysqli_query($mysqli, $sql1);
            $sql2 = "SELECT * FROM `doctors` WHERE email='$email' AND `password`='$cryptpsd'";
            $result2 = mysqli_query($mysqli, $sql2);
            $sql3 = "SELECT * FROM `nurses` WHERE email='$email' AND `password`='$cryptpsd'";
            $result3 = mysqli_query($mysqli, $sql3);
            if (mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 0 && mysqli_num_rows($result3) === 0) {
                header("Location: ../sign-in/index.php?message=There is no user found using that email. Kindly check your password if the email is correct or contact the administrator!");
            }
            if (mysqli_num_rows($result1) === 1 && mysqli_num_rows($result2) === 0 && mysqli_num_rows($result3) === 0) {
            $row = mysqli_fetch_assoc($result1);
            session_start();
            $_SESSION['ID'] = $row['adminID'];
            $_SESSION['Name'] = $row['adminName'];
			$_SESSION['email'] = $row['email'];
            $_SESSION['phoneNo']="0".$row['phoneNo'];
            $_SESSION['user'] = "admin";
            header("Location: ../admindashboard/");
            }   
            if (mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 1 && mysqli_num_rows($result3) === 0) {
                $row = mysqli_fetch_assoc($result2);
                session_start();
                $_SESSION['ID'] = $row['docID'];
                $_SESSION['Name'] = $row['docName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phoneNo']="0".$row['phoneNo'];
                $_SESSION['user'] = "doctors";
                header("Location: ../docdashboard/");
            }
            if (mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 0 && mysqli_num_rows($result3) === 1) {
                $row = mysqli_fetch_assoc($result3);
                session_start();
                $_SESSION['ID'] = $row['nurseID'];
                $_SESSION['Name'] = $row['nurseName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phoneNo']="0".$row['phoneNo'];
                header("Location: ../nursedashboard/");
                $_SESSION['user'] = "nurses";
            }   
        }
        
    }else{
        header("Location: ../sign-in/index.php?message=Kindly fill in all entries!");
    }
?>
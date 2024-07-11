<?php
    session_unset();
    session_destroy();
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        header("Location: ../sign-in/index.php?message=".$message."");  
    }else{
        header("Location: ../sign-in/index.php?message=You have logged out successfully.");
    }
    
?>
<?php
$dbhost = 'localhost';
$dbuser='root';
$dbpass='';
$dbname = 'EHS';
$mysqli =mysqli_connect($dbhost,$dbuser, $dbpass, $dbname);
if (!$mysqli){
    printf("connection failed"); 
    header("Location: ../validation/logout.php?message=Connection failed. Database error!");
    // exit();
}else{
//    printf("connection sucessful");   
//    echo "yes";
}
?>
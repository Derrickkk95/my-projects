<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])) {
    function contactdetails($param){
        include "../../includes/globvars.php";
        include "../../includes/dblink.php";
        if ($param == $admin ) {
            // echo "yes";
            $sql = "SELECT `adminName`, `phoneNo`, `email` FROM `admin`;";
            $result = mysqli_query($mysqli, $sql);
            // $resultset = array();
            // foreach ($result as $res) {
                # code...
                // $r = mysqli_fetch_assoc($res);
                // $resultset = $res ;
                // echo json_encode($res) ;
            // }
            $resultset = mysqli_fetch_all($result);

            return $resultset ;
            // print_r($resultset);
        }
    }
    // $q=$_REQUEST['q'];
    $q = "admin";
    if($q!==""){
        $res=contactdetails($q);
        echo json_encode($res);
    }
  }
<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']===$nurse) {
    $id = $_SESSION['ID'];
    $name = $_SESSION['Name'];
    $phone = $_SESSION['phoneNo'];
    $patientID;
    if (isset($_POST['patient']) && $_POST['patient']) {
      $patientID = $_POST['patient'];
    }
    if(isset($_GET['pID'])){
      $patientID = $_GET['pID'];
    }
    if ($patientID == '') {
      header("Location:../patients");
    }
    // echo $_POST['patient'];
    $sql = "SELECT `patientName`, `age`, `DoB`, `gender`, `phoneNo`, `email` FROM `patient` WHERE `patientID` = '$patientID'";
    $result = mysqli_query($mysqli, $sql);
    $res = mysqli_fetch_assoc($result);
    $patientname=$res['patientName'];
    $age = $res['age'];
    $dob = $res['DoB'];
    $gender = $res['gender'];
    $email=$res['email'];
    $number="0".$res['phoneNo'];
    $appointmentsql = "SELECT `nurseID`, `docID`, `appointmentDate` FROM `patientappointments` WHERE `patientID` ='$patientID' ORDER BY `appointmentDate` DESC;";
    $appointmentresult = mysqli_query($mysqli, $appointmentsql);
    $appointnumb = mysqli_num_rows($appointmentresult);
    $recordssql = "SELECT `allergies`, `immunizationStatus` FROM `records` WHERE `patientID` ='$patientID' ORDER BY `recordID` DESC;";
    $recordsresult = mysqli_query($mysqli, $recordssql);
    $recordsnumb = mysqli_num_rows($recordsresult);
    $pressql = "SELECT `docID`, `drug`, `prescriptionDate`, `instructions` FROM `prescriptions` WHERE `patientID` ='$patientID';";
    $presresult = mysqli_query($mysqli, $pressql);
    $presnumb = mysqli_num_rows($presresult);
    $diagsql = "SELECT `docID`, `diagnosisDate`, `diagnosis` FROM `diagnosis` WHERE `patientID` ='$patientID' ORDER BY `diagnosisDate` DESC;";
    $diagresult = mysqli_query($mysqli, $diagsql);
    $diagnumb = mysqli_num_rows($diagresult);
    $testsql = "SELECT `technicianID`, `docID`, `testName`, `scheduledDate` FROM `labtest` WHERE `patientID` ='$patientID' ORDER BY `scheduledDate` DESC;";
    $testresult = mysqli_query($mysqli, $testsql);
    $testnumb = mysqli_num_rows($testresult);
    
?>
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Nurse · Dashboard || E.H.S</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/logo.png">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">    

        <script src="https://kit.fontawesome.com/7ccbbc98da.js" crossorigin="anonymous"></script>

        <!-- Bootstrap core CSS -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet">

        <style>
          .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
          }

          @media (min-width: 768px) {
            .bd-placeholder-img-lg {
              font-size: 3.5rem;
            }
          }
        </style>

        
        <!-- Custom styles for this template -->
        <link href="../../css/dashboard.css" rel="stylesheet">
      </head>
      <body>
        
      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#" id="home">E.H.S</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="../validation/logout.php" id="signout">Sign out</a>
          </div>
        </div>
      </header>

      <div class="container-fluid">
        <div class="row">
          <?php @include("../includes/nav.php");?> 

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2"><?php echo $patientname;?> Details</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <span data-feather="calendar"></span>
                  Create Appointment
                </button> -->
              </div>
            </div>
            <?php @include("includes/modals.php");?> 
            <?php @include("../../includes/message.php");?> 
            <!-- Patient Information -->
            <div>
            <h2> Patient Information</h2>
              <div class="row row-cols-2">
                <div class="col">
                  <div class="list-group w-auto">
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <i class="fa-solid fa-hospital-user" style="color: #3d3846;"></i>
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Name:</h6>
                          <p class="mb-0 opacity-75"><?php echo $patientname;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-venus-mars" style="color: #3d3846;"></i>
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Gender: </h6>
                          <p class="mb-0 opacity-75"> <?php echo $gender;?></p>
                        </div>
                        <!-- <small class="opacity-50 text-nowrap">3d</small> -->
                      </div>
                    </div>
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <i class="fa-solid fa-envelope" style="color: #3d3846;"></i>
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Email:</h6>
                          <p class="mb-0 opacity-75"><?php echo $email;?></p>
                        </div>
                        <!-- <small class="opacity-50 text-nowrap">1w</small> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="list-group w-auto">
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <i class="fa-solid fa-hourglass-half"  style="color: #3d3846;"></i>
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Age:</h6>
                          <p class="mb-0 opacity-75"><?php echo $age;?></p>
                        </div>
                        <!-- <small class="opacity-50 text-nowrap">now</small> -->
                      </div>
                    </div>
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Date of Birth: </h6>
                          <p class="mb-0 opacity-75"> <?php echo $dob;?></p>
                        </div>
                      </div>
                    </div>
                    <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                      <i class="fa-solid fa-phone" style="color: #3d3846;"></i>
                      <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                          <h6 class="mb-0">Phone Number:</h6>
                          <p class="mb-0 opacity-75"><?php echo $number;?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Immunization and  Information -->
            <?php
              if($recordsnumb == 0){
            ?>
              <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Immunization and Allergies Information</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                      <span data-feather="calendar"></span>
                      Create/Add Immunization and Allergies
                    </button>
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-hand-dots" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Allergies:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-syringe" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Immunization Status:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
              if($recordsnumb > 0){
            ?>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Immunization and Allergies Information</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                      <span data-feather="calendar"></span>
                      Create/Add Immunization and Allergies
                    </button>
                  </div>
                </div>
                <?php
                    
                  ?>
                  <div class="row row-cols-2">
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-hand-dots" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Allergies:</h6>
                              <p class="mb-0 opacity-75"><?php 
                              $copyrecords = $recordsresult;
                              $toprecord = mysqli_fetch_assoc($copyrecords);
                              $immunization = $toprecord['immunizationStatus'];
                              foreach ($recordsresult as $record) {
                                $allergies = $record['allergies'];
                                echo $allergies."<br>";
                              }
                              ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-syringe" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Immunization Status:</h6>
                              <p class="mb-0 opacity-75"><?php echo $immunization;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            <?php
              }
            ?>
            <!-- Apointments -->
            <?php
              if($appointnumb == 0){
            ?>
                <div>
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">Recent Appointments</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <span data-feather="calendar"></span>
                        Create Appointment
                      </button>
                    </div>
                  </div>
                  <div class="row row-cols-2">
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Assigned Doctor's Name:</h6>
                              <p class="mb-0 opacity-75">N/A.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-user-nurse" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Assigning Nurse:</h6>
                              <p class="mb-0 opacity-75">N/A.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row row-cols-2">
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Appointment Date:</h6>
                              <p class="mb-0 opacity-75">N/A.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
              }
              if($appointnumb > 0){
            ?>
                <div>
                  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h2">Recent Appointments</h2>
                    <div class="btn-toolbar mb-2 mb-md-0">
                      <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <span data-feather="calendar"></span>
                        Create Appointment
                      </button>
                    </div>
                  </div>
                  <?php
                    foreach ($appointmentresult as $appoint) {
                      $docid2 = $appoint['docID'];
                      $nurseid2 = $appoint['nurseID'];
                      $appointdate = $appoint['appointmentDate'];
                      $docsql = "SELECT `docName` FROM `doctors` WHERE `docID` = '$docid2'";
                      $docresult = mysqli_query($mysqli, $docsql);
                      $docres = mysqli_fetch_assoc($docresult);
                      $docname = $docres['docName'];
                      $nursesql = "SELECT `nurseName` FROM `nurses` WHERE `nurseID` = '$nurseid2'";
                      $nurseresult = mysqli_query($mysqli, $nursesql);
                      $nurseres = mysqli_fetch_assoc($nurseresult);
                      $nursename = $nurseres['nurseName'];
                  ?>
                    <div class="row row-cols-2">
                      <div class="col">
                        <div class="list-group w-auto">
                          <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                            <div class="d-flex gap-2 w-100 justify-content-between">
                              <div>
                                <h6 class="mb-0">Assigned Doctor's Name:</h6>
                                <p class="mb-0 opacity-75"><?php echo $docname;?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col">
                        <div class="list-group w-auto">
                          <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <i class="fa-solid fa-user-nurse" style="color: #3d3846;"></i>
                            <div class="d-flex gap-2 w-100 justify-content-between">
                              <div>
                                <h6 class="mb-0">Assigning Nurse:</h6>
                                <p class="mb-0 opacity-75"><?php echo $nursename;?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row row-cols-2">
                      <div class="col">
                        <div class="list-group w-auto">
                          <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                            <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                            <div class="d-flex gap-2 w-100 justify-content-between">
                              <div>
                                <h6 class="mb-0">Appointment Date:</h6>
                                <p class="mb-0 opacity-75"><?php echo $appointdate;?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                    }
                  ?>
                  
                </div>
            <?php
              }
            ?>
            <!-- Diagnosis -->
            <?php
              if($diagnumb == 0){
            ?>
              <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Recent Diagnosis</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                      <span data-feather="calendar"></span>
                      Create/Add Immunization and Allergies
                    </button> -->
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Diagnosing Doctor's Name:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Diagnosis Date:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-notes-medical" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Diagnosis Notes:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
              if($diagnumb > 0){
            ?>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Recent Diagnosis</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                      <span data-feather="calendar"></span>
                      Create/Add Immunization and Allergies
                    </button> -->
                  </div>
                </div>
                <?php
                foreach($diagresult as $diag){
                  $docid3 = $diag['docID'];
                  $diagdate = $diag['diagnosisDate'];
                  $diagnosis = $diag['diagnosis'];
                  $docsql = "SELECT `docName` FROM `doctors` WHERE `docID` = '$docid3'";
                  $docresult = mysqli_query($mysqli, $docsql);
                  $docres = mysqli_fetch_assoc($docresult);
                  $docname = $docres['docName'];  
                ?>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Diagnosing Doctor's Name:</h6>
                            <p class="mb-0 opacity-75"><?php echo $docname;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Diagnosis Date:</h6>
                            <p class="mb-0 opacity-75"><?php echo $diagdate;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-notes-medical" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Diagnosis Notes:</h6>
                            <p class="mb-0 opacity-75"><?php echo $diagnosis;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
            <!-- Lab Test -->
            <?php
              if($testnumb == 0){
            ?>
              <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Recent Laboratory Test</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                      <span data-feather="calendar"></span>
                      Schedule Lab Test
                    </button> -->
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-flask" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0"> Lab Technician's Name:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Assigning Doctor's Name:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-flask-vial" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0"> Lab Test Name:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Lab Test Date:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
              if($testnumb > 0){
            ?>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Recent Laboratory Test</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                      <span data-feather="calendar"></span>
                      Schedule Laboratory Test
                    </button> -->
                  </div>
                </div>
                <?php
                foreach($testresult as $test){
                  $docid4 = $test['docID'];
                  $techid = $test['technicianID'];
                  $testdate = $test['scheduledDate'];
                  $testname = $test['testName'];
                  $docsql = "SELECT `docName` FROM `doctors` WHERE `docID` = '$docid4'";
                  $docresult = mysqli_query($mysqli, $docsql);
                  $docres = mysqli_fetch_assoc($docresult);
                  $docname = $docres['docName'];
                  $techsql = "SELECT `technicianName` FROM `technician` WHERE `techID` = '$techid'";
                  $techresult = mysqli_query($mysqli, $techsql);
                  $techres = mysqli_fetch_assoc($techresult);
                  $techname = $techres['technicianName'];
                ?>
                  <div class="row row-cols-2">
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-flask" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0"> Lab Technician's Name:</h6>
                              <p class="mb-0 opacity-75"><?php echo $techname;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Assigning Doctor's Name:</h6>
                              <p class="mb-0 opacity-75"><?php echo $docname;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row row-cols-2">
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-flask-vial" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0"> Lab Test Name:</h6>
                              <p class="mb-0 opacity-75"><?php echo $testname;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="list-group w-auto">
                        <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                          <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                          <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                              <h6 class="mb-0">Lab Test Date:</h6>
                              <p class="mb-0 opacity-75"><?php echo $testdate;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
            <!-- Prescription -->
            <?php
              if($presnumb == 0){
            ?>
              <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Recent Prescriptions</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                      <span data-feather="calendar"></span>
                      Create/Add Immunization and Allergies
                    </button> -->
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Prescribing Doctor's Name:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Prescription Date:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-pills" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Drug Name:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-notes-medical" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Prescription Instructions:</h6>
                            <p class="mb-0 opacity-75">N/A.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
              }
              if($presnumb > 0){
            ?>
            <div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h2 class="h2">Recent Prescription</h2>
                  <div class="btn-toolbar mb-2 mb-md-0">
                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal5">
                      <span data-feather="calendar"></span>
                      Create/Add Immunization and Allergies
                    </button> -->
                  </div>
                </div>
                <?php
                foreach($presresult as $pres){
                  $docid5 = $pres['docID'];
                  $drug = $pres['drug'];
                  $presdate = $pres['prescriptionDate'];
                  $instructions = $pres['instructions'];
                  $docsql = "SELECT `docName` FROM `doctors` WHERE `docID` = '$docid5'";
                  $docresult = mysqli_query($mysqli, $docsql);
                  $docres = mysqli_fetch_assoc($docresult);
                  $docname = $docres['docName'];  
                ?>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-user-doctor" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Prescribing Doctor's Name:</h6>
                            <p class="mb-0 opacity-75"><?php echo $docname;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-calendar-days" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Prescription Date:</h6>
                            <p class="mb-0 opacity-75"><?php echo $presdate;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row row-cols-2">
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-pills" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Drug Name:</h6>
                            <p class="mb-0 opacity-75"><?php echo $drug;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="list-group w-auto">
                      <div class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <i class="fa-solid fa-notes-medical" style="color: #3d3846;"></i>
                        <div class="d-flex gap-2 w-100 justify-content-between">
                          <div>
                            <h6 class="mb-0">Prescription Instructions:</h6>
                            <p class="mb-0 opacity-75"><?php echo $instructions;?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
            <?php @include("../../includes/copyright.php");?> 
          </main>
        </div>
      </div>


        <script src="../../js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        <!-- <script src="../js/dashboard.js"></script> -->
        <script src="../js/main.js"></script>
      </body>
    </html>
<?php
  }else {
    # code...
    header("Location: ../../validation/logout.php?message=Kindly log in");
  }
?>
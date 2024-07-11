<?php
  session_start();
  include "../../includes/globvars.php";
  include "../../includes/globfunc.php";
  include "../../includes/dblink.php";
  if (isset($_SESSION['ID'])&&isset($_SESSION['Name'])&&isset($_SESSION['email'])&&$_SESSION['user']==$doctor) {
    $id = $_SESSION['ID'];
    $name = $_SESSION['Name'];
    $phone = $_SESSION['phoneNo'];
    // $sql = "SELECT `adminName`, `phoneNo`, `email` FROM `admin`;";
    if(!isset($_POST['submit'])){
      $sql = "SELECT `docName`, `phoneNo`, `email` FROM `doctors`;";
      $cont = "Doctor";
    }
    if(isset($_POST['submit']) && $_POST['submit']==''){
      $sql = "SELECT `docName`, `phoneNo`, `email` FROM `doctors`;";
      $cont = "Doctor";
    }
    if(isset($_POST['submit']) && $_POST['submit']==$doctor){
      $sql = "SELECT `docName`, `phoneNo`, `email` FROM `doctors`;";
      $cont = "Doctor";
    }
    if(isset($_POST['submit']) && $_POST['submit']==$nurse){
      $sql = "SELECT `nurseName`, `phoneNo`, `email` FROM `nurses`;";
      $cont = "Nurse";
    }
    if(isset($_POST['submit']) && $_POST['submit']==$admin){
      $sql = "SELECT `adminName`, `phoneNo`, `email` FROM `admin`;";
      $cont = "Administrator";
    }
    if(isset($_POST['submit']) && $_POST['submit']==$tech){
      $sql = "SELECT `technicianName`, `phoneNo`, `email` FROM `technician`;";
      $cont = "Lab Technician";
    }
    $result = mysqli_query($mysqli, $sql);
?>
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title>Doctor · Directory || E.H.S</title>
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
              <h1 class="h2">Staff Directory</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <!-- <div class="btn-group me-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div> -->
                <form action="../directory/index.php" method="post">
                  <button type="submit" name="submit" value="<?php echo $admin;?>" class="btn btn-sm btn-outline-secondary" id="admin">
                    Administrators
                  </button>
                </form>
                <form action="../directory/index.php" method="post">
                  <button type="submit" name="submit" value="<?php echo $doctor;?>" class="btn btn-sm btn-outline-secondary" id="doct">
                    Doctors
                  </button>
                </form>
                <form action="../directory/index.php" method="post">
                  <button type="submit" name="submit" value="<?php echo $nurse;?>" class="btn btn-sm btn-outline-secondary" id="nurse">
                    Nurse
                  </button>
                </form>
                <form action="../directory/index.php" method="post">
                  <button type="submit" name="submit" value="<?php echo $tech;?>" class="btn btn-sm btn-outline-secondary" id="nurse">
                    Lab Technician
                  </button>
                </form>
                <!-- <button type="button" class="btn btn-sm btn-outline-secondary" id="doct">
                  Doctors
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="nurse">
                  Nurses
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="tech">
                  Lab Technicians
                </button> -->
              </div>
            </div>

            <h2 id="title"><?php echo $cont;?> Contacts </h2>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i =1;
                foreach ($result as $res) {
                    # code... 
                    if(!isset($_POST['submit'])){
                      $name=$res['docName'];
                    }
                    if(isset($_POST['submit']) && $_POST['submit']==''){
                      $name=$res['docName'];
                    }
                    if(isset($_POST['submit']) && $_POST['submit']==$doctor){
                      $name=$res['docName'];
                    }
                    if(isset($_POST['submit']) && $_POST['submit']==$nurse){
                      $name=$res['nurseName'];
                    }
                    if(isset($_POST['submit']) && $_POST['submit']==$admin){
                      $name=$res['adminName'];
                    }
                    if(isset($_POST['submit']) && $_POST['submit']==$tech){
                      $name=$res['technicianName'];
                    }
                    $email=$res['email'];
                    $number="0".$res['phoneNo'];
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $number;?></td>
                <td><?php echo $email;?></td>
              </tr>
              <?php
                  $i++;
                }
              ?>
              </tbody>
            </table>
            <?php @include("../../includes/copyright.php");?> 
          </main>
        </div>
      </div>


        <script src="../../js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
        <!-- <script src="../js/dashboard.js"></script> -->
        <script src="../js/main.js"></script>
        <!-- <script src="js/directory.js"></script> -->
      </body>
    </html>
<?php
  }else {
    # code...
    header("Location: ../validation/logout.php?message=Kindly log in");
  }
?>
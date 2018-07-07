<!--
  step1:
  checking whether the user logged in or not
  if the user already logged in continue with  this page else...go to ulbhome.php 
  step2:
    1)CONNECT TO THE SIH_DB DATABASE IN MYSQL
    2)GETTING ALL THE UPDATED TOPIC NAMES AND PROVIDING THE NAVIGATION  FOR THE USER
    3)PROVIDING THE DASHBOARD(DASHBOARD...DISPLAYING RECENTLY ACCESSED MODULES)


-->
<?php
session_start(); 
  if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
  }
  else{
    
    header("location:ulblogin.php");
  }
  include_once "./models/getting.php";
  // include_once "./status.php";
  $conn=new mysqli("localhost","root","MadhuMysql");
  $conn->select_db("sih_db");
  $query="select * from `module`";
  $result=$conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Online PMAY E-learning module for ULBs and general citizens">
  <meta name="keywords" content="PMAY, Pradhan Mantri Awas Yojna, ULBs, Urban Local Bodies, E-learning, State of Maharashtra, policies">

  <title>ULB Home</title>
 
  <link href="other/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
  <link href="other/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
  <link href="other/datatables/dataTables.bootstrap4.css" rel="stylesheet">  
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="ulbhome.php">ULB Home(<?php echo $uid; ?>)</a>
            <a href="test.php">NEW SUGGESTION LINKS</a>    
            <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                    <li class="nav-item" >
                      <a class="nav-link" href="ulbhome.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                      </a>
                    </li>
                    <?php while($row=$result->fetch_assoc()){ ?>
                    <li class="nav-item">
                      <a class="nav-link" href="topicprocess.php?topic=<?php echo $row['topic_id']?>">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text"><?php echo $row['topic_name'] ?></span>
                      </a>
                    </li>    
                    <?php } ?>                
                  </ul>

                  <ul class="navbar-nav sidenav-toggler">
                    <li class="nav-item">
                      <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                      </a>
                    </li>
                  </ul>

                  <ul class="navbar-nav ml-auto">
                    
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="d-lg-none">Notifications
                              <span class="badge badge-pill badge-warning">6 New</span>
                            </span>
                            <span class="indicator text-warning d-none d-lg-block">
                              <i class="fa fa-fw fa-circle"></i>
                            </span>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">Notifications:</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                  <span class="text-success">
                                    <strong>
                                      <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                  </span>
                                  <span class="small float-right text-muted">11:21 AM</span>
                                  <div class="dropdown-message small"><!-- This is an automated server response message. All systems are online. --></div>
                                </a>
                          </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">
                        online users</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                      </li>

                  </ul>
            </div>
      </nav>

      <div class="content-wrapper">

          <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="<?php echo $_SERVER['PHP_SELF']; ?>" style="text-decoration: none;"><?php echo "RECENT_MODULES"; ?></a>
                </li>
              </ol>
              <!-- Icon Cards-->
              <div class="row"> 
              <?php 
                $query="select * from `rece` order by `priority`";
                $result=$conn->query($query);
                echo $conn->error;
                while($row=$result->fetch_assoc()){
              ?>  
                <div class="col-xl-3 col-sm-6 mb-3">
                  <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                      <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                      </div>
                      <div class="mr-5"><?php echo getTopicName($row['topic_id'])."/".getSubTopicName($row['sub_topic_id']); ?></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="ulbmodule.php?topic=<?php echo $row['topic_id'].'&'.'sub_topic='.$row['sub_topic_id'];?>">
                      <span class="float-left">View Details</span>
                      <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                      </span>
                    </a>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
      </div>
      
  
        
      <footer class="sticky-footer">
            <div class="container">
              <div class="text-center">
                <small>E-learning Module made by Team-Epitome</small>
              </div>
            </div>
      </footer>

    <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>

                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="ulblogout.php">Logout</a>
                </div>
              </div>
          </div>
      </div>

    <!-- Bootstrap core JavaScript-->
<script src="other/bootstrap/js/bootstrap.min.js"></script>
<script src="other/jquery/jquery.min.js"></script>
<script src="other/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="other/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>

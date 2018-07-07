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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
          aria-valuemin="0" aria-valuemax="100" style="width:60%">
          60% Course completed!
        </div>
      </div>
      <br><br>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">Your courses</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">13 New Topics Added!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Overall Progress</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i>My Learning Graph</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">34 credits</div>
                  <div class="small text-muted">PMAY Intro</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">18 credits</div>
                  <div class="small text-muted">Quiz</div>
                  <hr>
                  <div class="h4 mb-0 text-success">16 credits</div>
                  <div class="small text-muted">Webinars</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <!-- Card Columns Example Social Feed-->
          <div class="mb-0 mt-4">
            <i class="fa fa-newspaper-o"></i> News Feed</div>
          <hr class="mt-2">
          <div class="card-columns">
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="images/cst.jpg" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="https://www.maharashtra.gov.in/site/Upload/Government%20Resolutions/Marathi/201801241236355109.pdf">Government of Maharashtra</a></h6>
                <p class="card-text small">New Policy under PMAY-Urban has been introduced!
                  <a href="#">#SIH2018</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Read</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="PMAY icon">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="https://pmaymis.gov.in/">PMAY Govt Site</a></h6>You may access the basic information here.
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Read</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">Twitter</a></h6>Next time training to be scheduled on 1st April 2018.
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Read</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Comment</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 12 mins ago</div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="images/pmayU.jpg" alt="pmay icon">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="https://pmaymis.gov.in/">PMAY Govt Site</a></h6>
                <p class="card-text small">Another day at the office...
                  <a href="#">#workinghardorhardlyworking</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Read</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="https://en.wikipedia.org/wiki/Pradhan_Mantri_Awas_Yojana">Wikipedia Poll</a></h6>How about 7 lakhs as the maximum credit limit?
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Like</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted 46 mins ago</div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="images/constru.jpg" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="https://timesofindia.indiatimes.com/india/pm-awas-yojana-only-8-target-met-under-urban-housing-scheme/articleshow/63405544.cms">Times of India</a></h6>
                <p class="card-text small">New recruitments available
                  <a href="#">#grand</a>
                  <a href="#">#finale</a>
                  <a href="#">#results</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Read More</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <div class="card-footer small text-muted">Posted 1 hr ago</div>
            </div>
            <!-- Example Social Card-->
            <div class="card mb-3">
              <a href="#">
                <img class="card-img-top img-fluid w-100" src="https://unsplash.it/700/450?image=185" alt="">
              </a>
              <div class="card-body">
                <h6 class="card-title mb-1"><a href="#">Eenadu</a></h6>
                <p class="card-text small">New policy announced by the Ministry of Urban Development
                  <a href="#">#pmay</a>
                  <a href="#">#urban</a>
                  <a href="#">#smartIndia</a>
                  <a href="#">#Hackathon</a>
                  <a href="#">#2018</a>
                  <a href="#">#Innovation</a>
                </p>
              </div>
              <hr class="my-0">
              <div class="card-body py-2 small">
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-thumbs-up"></i>Read more</a>
                <a class="mr-3 d-inline-block" href="#">
                  <i class="fa fa-fw fa-comment"></i>Comment</a>
                <a class="d-inline-block" href="#">
                  <i class="fa fa-fw fa-share"></i>Share</a>
              </div>
              <hr class="my-0">
              <div class="card-body small bg-faded">
                <div class="media">
                  <img class="d-flex mr-3" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <h6 class="mt-0 mb-1"><a href="#">The Prathibha</a></h6>Urban Local Bodies given special rights 
                    <ul class="list-inline mb-0">
                      <li class="list-inline-item">
                        <a href="#">Read more</a>
                      </li>
                      <li class="list-inline-item">·</li>
                      <li class="list-inline-item">
                        <a href="#">Reply</a>
                      </li>
                    </ul>
                    <div class="media mt-3">
                      <a class="d-flex pr-3" href="#">
                        <img src="http://placehold.it/45x45" alt="">
                      </a>
                      <div class="media-body">
                        <h6 class="mt-0 mb-1"><a href="#">Miscellaneous source</a></h6>
                        <img class="img-fluid w-100 mb-1" src="https://unsplash.it/700/450?image=789" alt="">Private information the PMAY module
                        <ul class="list-inline mb-0">
                          <li class="list-inline-item">
                            <a href="#">Read more</a>
                          </li>
                          <li class="list-inline-item">·</li>
                          <li class="list-inline-item">
                            <a href="#">Share</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer small text-muted">Posted yesterday</div>
            </div>
          </div>
          <!-- /Card Columns-->
        </div>
        <div class="col-lg-4">
          <!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Latest Quiz Report</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated just now</div>
          </div>
          <!-- Example Notifications Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bell-o"></i> ULBs Forum</div>
            <div class="list-group list-group-flush small">
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>i4c_India</strong>answered your query on ULB-capacity building
                    <strong>I4C India Website</strong>.
                    <div class="text-muted smaller">Today at 5:43 PM - 5m ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>New Team</strong>We have a question for you. Help The "new team" understand the new policy
                    <div class="text-muted smaller">Today at 4:37 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <strong>Minstry of Urban Developement </strong> added a new photo to the album
                    <strong></strong>.
                    <div class="text-muted smaller">Today at 4:31 PM - 1hr ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">
                <div class="media">
                  <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/45x45" alt="">
                  <div class="media-body">
                    <i class="fa fa-code-fork"></i>
                    <strong>Monica Dennis</strong>forked the
                    <strong>PMAY ULB module</strong>repository on
                    <strong>our site</strong>.
                    <div class="text-muted smaller">Today at 3:54 PM - 2hrs ago</div>
                  </div>
                </div>
              </a>
              <a class="list-group-item list-group-item-action" href="#">View all activity...</a>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Website designed by Team Epitome for Smart India Hackathon 2018</small>
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
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
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
<script src="other/chart.js/Chart.min.js"></script>
<script src="other/datatables/jquery.dataTables.js"></script>
<script src="other/datatables/dataTables.bootstrap4.js"></script>
<script src="js/sb-admin-datatables.min.js"></script>
<script src="js/sb-admin-charts.min.js"></script>



    
  </div>
</body>

</html>

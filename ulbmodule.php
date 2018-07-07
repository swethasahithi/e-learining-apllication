<?php
  $topic=$_REQUEST['topic'];
  $sub_topic=$_REQUEST['sub_topic'];
  session_start(); 
  if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
  }
  else{
    
    header("location:ulblogin.php");
  }

  include_once "./models/getting.php";
  include_once "./topicconnection.php";
  $conn=new mysqli("localhost","root","MadhuMysql");
  $conn->select_db("sih_db");

  //FOR UPDATING THE RECENT_MODULES TABLE
  $check=$conn->query("select * from `rece` where `sub_topic_id`=".$sub_topic);
  if($check->num_rows<=0){
    $conn->query("delete from `rece` where `priority`=4");
    $conn->query("update `rece` set `priority`=`priority`+1");
    $conn->query("insert into `rece` values($topic,$sub_topic,1)");
  }
  else{
      $temp=$conn->query("select `priority` from `rece` where `sub_topic_id`=".$sub_topic);
      $temp=$temp->fetch_assoc();
      $pre=$temp['priority'];
      $conn->query("update `rece` set `priority`=`priority`+1 where `priority`<$pre");
      $conn->query("update `rece` set `priority`=1 where `sub_topic_id`=".$sub_topic);
  }



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
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/button.css" rel="stylesheet">
  <style type="text/css">iframe.goog-te-banner-frame{ display: none !important;}</style>
  <style type="text/css">body {position: static !important; top:0px !important;}</style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="ulbhome.php">ULB Home(<?php echo $uid; ?>)</a>
            

            <a href="test.php">NEW SUGGESTION LINKS</a>
             <?php if(!isset($_REQUEST['lang'])){?>
               <form>
                  <input type="hidden" name="lang" value="eng"/>
                  <input type="hidden" name="topic" value="<?php echo $topic;?>"/>
                  <input type="hidden" name="sub_topic" value="<?php echo $sub_topic;?>"/>
                  <button type="submit" class = 'button blue' formaction="<?php echo $_SERVER['PHP_SELF'];?>">english</button> 
               </form>
                <div id="google_translate_element" style="display:none;"></div><script type="text/javascript">

              function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,mr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
              }
              </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          <?php }else{?>
              <form>
                  <input type="hidden" name="topic" value="<?php echo $topic;?>"/>
                  <input type="hidden" name="sub_topic" value="<?php echo $sub_topic;?>"/>
                  <button type="submit" class = 'button blue' formaction="<?php echo $_SERVER['PHP_SELF'];?>">Marathi</button> 
               </form>
               <?php }?> 

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
                            <span class="d-lg-none">Alerts
                              <span class="badge badge-pill badge-warning">6 New</span>
                            </span>
                            <span class="indicator text-warning d-none d-lg-block">
                              <i class="fa fa-fw fa-circle"></i>
                            </span>
                          </a>

                          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">New Alerts:</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                  <span class="text-success">
                                    <strong>
                                      <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                  </span>
                                  <span class="small float-right text-muted">11:21 AM</span>
                                  <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                </a>
                          </div>
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
                  <a style="text-decoration: none;" href="topicprocess.php?topic=<?php echo $_REQUEST['topic'];?>"><?php echo getTopicName($topic);?></a>
                </li>
                <li class="breadcrumb-item active"><?php echo getSubTopicName($sub_topic);?></li>
                <li style="margin-left: 950px;">
                  <!--<?php 
                    $result=$conn->query("select * from `topic_pdfs` where `topic_id`=$topic and `sub_topic_id`=$sub_topic");
                    if($result->num_rows>0){
                    $temp=$result->fetch_assoc();
                    $filename=$temp['filename'];
                  ?>
                  <a href="<?php echo 'uploads/'.getTopicName($topic).'/'.$filename;?>" target="_blank" class="button blue">Downlaod PDFs</a>-->
                  <a href="showpdfs.php?topic=<?php echo $topic.'&'.'sub_topic='.$sub_topic;?>"  class="button blue">Downlaod PDFs</a>
                  <?php }?>
                   <!-- attempting quiz  -->
                  <a href="showquizes.php?topic_id=<?php echo $topic.'&'.'sub_topic_id='.$sub_topic;?>" class="button blue">Attempt QUIZ</a> <!-- attempting quiz  -->
                  <a href="reviewulbquiz.php?topic=<?php echo $topic.'&'.'sub_topic='.$sub_topic;?>" class="button blue">Review QUIZ</a>
                </li>
              </ol>
              
            </div>
            <div>
               <?php if(isset($_SESSION['alreadymsg'])){ ?>
                <div class="d-inline-flex p-2">
                  <div class="alert alert-danger" role="alert">
                     <?php echo "<strong>Well done!</strong> You have already attempted the Quiz. Review it now.";
                        unset($_SESSION['alreadymsg']);
                      ?>
                  </div>
               </div>
               <?php }?>
             <!--  <h3 style="color:red"> $_SESSION['alreadymsg'];unset($_SESSION['alreadymsg']);} ?></h3> -->
             <?php 
              $result=getBlog($topic,$sub_topic);
              $row=$result->fetch_assoc();
              echo $row['blogcontent'];

             ?>
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

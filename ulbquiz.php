<!--
	This will get the topic and subtopic names from ulbmodule.php as request parameters
	get the quiz id from the sub_topic_name(or from sub_topic_id)(table>quiz_module)
	now get the question_ids using quiz id (table>quiz_question)\
	all the questions from (questions table) 
-->

<?php
  $topic=$_REQUEST['topic_id'];
  $sub_topic=$_REQUEST['sub_topic_id'];
  $quiz_id=$_REQUEST['quiz_id'];
  session_start(); 
  if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
  }
  else{
    
    header("location:ulblogin.php");
  }
  include_once "./models/getting.php";
  $conn=new mysqli("localhost","root","MadhuMysql");
  $conn->select_db("sih_db");
  $query="select `topic_name` from `module`";
  $result=$conn->query($query);
  // /*GETTING THE QUESTIONS OF GIVEN SUB_TOPIC(TOPIC) and conducting the quiz*/ 
  // $getquizid="select `quiz_id` from `quiz_module` where `sub_topic_id`='".$sub_topic."'";
  // $result1=($conn->query($getquizid))->fetch_assoc();
  // $quiz_id=$result1['quiz_id'];
 // echo $quiz_id."dfbdb".$uid;
              $checkquizquery="select * from `quiz_eval` where `quiz_id`=".$quiz_id." and `ulb_id`=".$uid;
              $result3=$conn->query($checkquizquery); 
              echo $result3->num_rows;
              if($result3->num_rows>0){
                $_SESSION['alreadymsg']="YOU ARE ALREADY ATTEMPTED THE QUIZ..TO REVIEW CLICK REVIEW_QUIZ";
               header('Location:'.$_SERVER['HTTP_REFERER']);
                // showquizes.php?topic_id='.$topic_id.'&sub_topic_id='.$sub_topic_id
                
              } 
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
 
  <link href="other/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>  
  <link href="other/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>  
 <!--  <link href="other/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->  
  <link href="css/sb-admin.css" rel="stylesheet"/>
  <link  href="css/quiz.css" rel="stylesheet"/>
  <link href="css/button.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <a class="navbar-brand" href="index.html">ULB Home(<?php echo $uid; ?>)</a>
        
            <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

                    <li class="nav-item" >
                      <a class="nav-link" href="ulblogin.php">
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
            <?php 
              
            ?> 

         <h1>QUIZ GOES HERE</h1>
         
         <form action="ulbquizeval.php" method="post" >
         <?php 
          //need to check whether the user attempted the quiz or not(already attempted back to previous page)
          //$_SESSION['quizid']=$quiz_id;

        	$getquestions=$conn->query("select `question_id` from quiz_question where `quiz_id`='".$quiz_id."'");
          $temp=array();

        	$query="select * from `questions` where `question_id`=?";
        	$stmt=$conn->prepare($query);
        	$stmt->bind_param("s",$quid);
          $i=0;
        	while($row=$getquestions->fetch_assoc()){
        		$quid=$row['question_id'];
            $temp[$i++]=$quid;
        		$stmt->execute();
        		$result=$stmt->get_result();
        		if($result->num_rows==1){
        			$question=$result->fetch_assoc(); ?>
        			      <div class="row">
    						        <div class="col-md-9 col-sm-4 login-sec">
    						        	
    						        	<div class="text-left question"><h5 class="mb-0"><?php echo "Q. ".$question['question'];?></h5></div>

        						      <div class="option">
        							        	<label class="container">
        							          		<p class="text-left"><?php echo $question['option1'];?></p>
        										 	      <input type="radio" name="<?php echo $quid ?>" value="1">
        											      <span class="checkmark"></span>
        										    </label>
        										    <label class="container">
        										        <p class="text-left"><?php echo $question['option2'];?> </p>
              										  <input type="radio" name="<?php echo $quid ?>" value="2">
        										        <div class="checkmark"></div>
            										</label>
            										<label class="container">
              										  <p class="text-left"><?php echo $question['option3'];?></p>
              										  <input type="radio" name="<?php echo $quid ?>" value="3">
              										  <span class="checkmark"></span>
            										</label>
            										<label class="container">
              										  <p class="text-left"><?php echo $question['option4'];?></p>
              										  <input type="radio" name="<?php echo $quid ?>" value="4">
              										  <span class="checkmark"></span>
            										</label>
        									</div>		
       						      </div>
       						    </div> 
                      <br/>            
       		<?php        		
   				  }	
        	}
          $_SESSION['quids']=$temp;
         ?>
        <div class="row">
              <div class="col-md-7 col-sm-4 login-sec">
                <center><input type="submit" name="quizeval" value="SUBMIT-QUIZ" formaction="ulbquizeval.php?quiz_id=<?php echo $quiz_id ?>" class="button blue"/></center>
              </div>
        </div>
       </form>
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

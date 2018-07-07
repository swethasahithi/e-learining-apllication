<?php
	include_once "quizconnection.php";
	$topic_id=$_REQUEST['topic_id'];
	$sub_topic_id=$_REQUEST['sub_topic_id'];
	$quiz_id=$_REQUEST['quiz_id']; 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
		<meta name="description" content="Online PMAY E-learning module for ULBs and general citizens"/>
		<meta name="keywords" content="PMAY, Pradhan Mantri Awas Yojna, ULBs, Urban Local Bodies, E-learning, State of Maharashtra, policies"/>
		<title>CMS</title>
		<link href="other/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="other/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<link href="other/datatables/dataTables.bootstrap4.css" rel="stylesheet"/>
		<link href="css/cms.css" rel="stylesheet"/>
		<link href="css/topic.css" rel="stylesheet"/>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<script type="text/javascript" src = "js/topic_content_tab.js"></script>
	</head>
	<body class="fixed-nav sticky-footer bg-dark" id="page-top">
		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
			<a class="navbar-brand" href="index.html">Content Management</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
						<a class="nav-link" href="cms_topic1.php">
							<i class="fa fa-fw fa-link"></i>
							<span class="nav-link-text">Topics</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
						<a class="nav-link" href="cms_quiz.php">
							<i class="fa fa-fw fa-link"></i>
							<span class="nav-link-text">Quiz</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
								<a class="nav-link" href="suggestions.html">
									<i class="fa fa-fw fa-link"></i>
								<span class="nav-link-text">Suggestions</span>
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
										<i class="fa fa-long-arrow-up fa-fw"></i>Status Update
									</strong>
								</span>
								<span class="small float-right text-muted">11:21 AM</span>
								<div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
							</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
							<i class="fa fa-fw fa-sign-out"></i>Logout
						</a>
					</li>
				</ul>
			</div>
		</nav>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="page-header manage_topic">
					<!-- <p><span class="glyphicon glyphicon-envelope"></span></p> -->
					<h4>Manage Topic</h4>
				<?php  $check=isset($_REQUEST['question_id']);
						if($check){
							$question_id=$_REQUEST['question_id'];
							$result=getQuestion($_REQUEST['question_id']);
							$row=$result->fetch_assoc();
						}
				?>		
				</div>
				<div>
				<table class="table borderless">
							<form>
								<input type="hidden" name="topic_id" value="<?php echo $topic_id;?>"/>
								<input type="hidden" name="sub_topic_id" value="<?php echo $sub_topic_id;?>"/>					
								<input type="hidden" name="quiz_id" value="<?php echo $quiz_id;?>"/>
								<?php if($check){ ?>
									<input type="hidden" name="question_id" value="<?php echo $question_id;?>"/>
								<?php }?>	
								<tbody>
      								<tr>
        								<td class="text-left" style="width:50px;">Question:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="question" placeholder="Enter Question" name="question" value="<?php if($check){echo $row['question'];} ?>">
										</td>
									</tr>
									<tr>
										<td class="text-left" style="width:120px;">option1:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="option1" placeholder="Enter option1" name="option1" value="<?php if($check){echo $row['option1'];} ?>">
										</td>
      								</tr>
									<tr>
										<td class="text-left" style="width:120px;">option2:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="option2" placeholder="Enter option2" name="option2"  value="<?php if($check){echo $row['option2'];} ?>">
										</td>
      								</tr>
									<tr>
										<td class="text-left" style="width:120px;">option3:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="option3" placeholder="option3" name="option3" value="<?php if($check){echo $row['option3'];} ?>">
										</td>
      								</tr>
									<tr>
										<td class="text-left" style="width:120px;">option4:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="option4" placeholder="option4" name="option4" value="<?php if($check){echo $row['option4'];} ?>">
										</td>
      								</tr>
									<tr>
										<td class="text-left" style="width:120px;">Answer:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="ans" placeholder="Enter answer" name="answer"  value="<?php if($check){echo $row['answer'];} ?>">
										</td>
      								</tr>
									<tr>
										<td class="text-left" style="width:120px;">Explaination:</td>
        								<!--<td class="text-left">	<input type="text" class="form-control" id="explain" placeholder="Enter explaination" name="explain">
										</td>-->
										<td><input type="textarea" class="form-control" rows="5" id="comment" name="explanation" value="<?php if($check){echo $row['explanation'];} ?>"/></td>
      								</tr>
									<tr>
										<td clospan="2"></td>
										<td><button type="submit" class="btn btn-primary" formaction="cmsquizprocess.php" name="quiz_msg" value="add_q"><?php if($check){echo "Update";}else {echo "Save";}?></button>
    										<button type="submit" class="btn btn-primary" formaction="cmsquizprocess.php" name="quiz_msg" value="exit_q">Exit</button></td>
      								</tr>
      							</tbody>
      						</form>
						</table>
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
						<a class="btn btn-primary" href="login.html">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<script src="other/bootstrap/js/bootstrap.min.js"></script>
		<script src="other/jquery/jquery.min.js"></script>
		<script src="other/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="other/jquery-easing/jquery.easing.min.js"></script>
	</body>
</html>

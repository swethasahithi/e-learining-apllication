<?php 
	session_start();
	include_once "topicconnection.php";
	include_once "./models/getting.php";
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
		<script type="text/javascript" src="js/display.js"></script>
		<script src="tinymce\js\tinymce\tinymce.min.js"></script>
		<script type="text/javascript" src="js/tinymce.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
							<span class="nav-link-text">Manage Topics</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
						<a class="nav-link" href="cms_quiz.html">
							<i class="fa fa-fw fa-link"></i>
							<span class="nav-link-text">Quiz</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
						<a class="nav-link" href="cms_suggestions.html">
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
				<?php if(!isset($_REQUEST['ref'])){ ?>
	  			<!-- Edit Sub Topic-->
	  				<form method="post">
			  			<div class="EditSubTopic" ">
			  				<div class="page-header manage_topic">
							<!-- <p><span class="glyphicon glyphicon-envelope"></span></p> -->
								<div class="row">
									<div class="col-md-10 text-left">
										<h4>Topic Name/SubTopic Name</h4>
									</div>
									<div class="col-md-2 btn-group text-right" style="float:right;">
											<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'];?>"/>
											<input type="hidden" name="sub_topic_id" value="<?php echo $_REQUEST['sub_topic_id'];?>"/> 
											<button type="submit" class="btn btn-primary" formaction="cmstopicprocess.php" name="editormsg" value="uploadrequest">Upload</button>
											<button type="submit" class="btn btn-primary">Save</button>
											<button type="submit" id="preview" class="btn btn-primary" formaction="blogpreview.php" target="_blank">Preview</button>											
									</div>
								</div>
							</div>

							<!-- Editor comes here-->
							<div>
									<input type="textarea" name="texteditor" id="texteditor"/>							
							</div>
			  			</div>
		  			</form>
	  			<?php }else if(isset($_REQUEST['ref']) && $_REQUEST['ref']=="uploadform"){?>
	  			<!-- check whether the file is already uploaded or not -->
	  			

		  			<div>
		  				<?php if(isset($_SESSION['uploadinfo'])) {echo $_SESSION['uploadinfo'];}?>
		  				<form action="cmstopicprocess.php" method="post" enctype="multipart/form-data">
		  					<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'];?>"/>
							<input type="hidden" name="sub_topic_id" value="<?php echo $_REQUEST['sub_topic_id'];?>"/>
		  					<!-- checking ends here -->
		  					<input type="file" name="pdf_file"/>
		  					<input type="submit" name="editormsg" value="uploadfile"/>	
		  				</form>
		  				<?php unset($_SESSION['uploadinfo']); ?>
		  			</div>  
		  			<?php $result=getPdfList($_REQUEST['topic_id'],$_REQUEST['sub_topic_id']);?>			
	  				<?php if($result->num_rows>0){?>
	  					<div class="table-responsive">
							<table class="table table-striped">
								<thead>
		  							<tr>
		    							<th class="text-left">UPLOADED PDFs</th>
		    							
		  							</tr>
								</thead>
								<tbody>
									<?php
									while($row=$result->fetch_assoc()){
									?>
										<form>
											<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'];?>" />
											<input type="hidden" name="sub_topic_id" value="<?php echo $row['sub_topic_id'] ?>"/> 
											<input type="hidden" name="file_id" value="<?php echo $row['file_id'];?>"/>
				  							<tr>
				    							<td class="text-left"><?php echo $row['filename'];?></td>
				    							<td class="text-right">
				    								<div class="btn-group">
														<button type="submit" formaction="<?php echo 'uploads/'.getTopicName($_REQUEST['topic_id']).'/'.$row['filename'];?>" class="btn btn-primary" name="msg" value="edit_sub_topic">View</button>
														<button type="submit"  formaction="cmstopicprocess.php" class="btn btn-primary" name="editormsg" value="delete_pdf">Delete</button>
													</div>
												</td>
				  							</tr>
				  						</form>
			  						<?php } ?>	
		  						</tbody>
		  					</table>
		  				</div>			
	  				<?php }?>
	  			<?php }?>
			</div>
		</div>
		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
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

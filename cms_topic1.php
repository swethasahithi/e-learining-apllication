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
						<a class="nav-link" href="cms_quiz.php">
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
				<?php if(!isset($_REQUEST['ref']) || $_REQUEST['ref']=="1")  {?>
				<!-- Manage Topic Starts here-->
				<div class="manageT" id="manageT">
					<?php if(isset($_SESSION['successmsg'])){ ?>
                  	<div class="d-inline-flex p-2">
                   		<div class="alert alert-danger" role="alert">
                       		<?php echo "topic added successfully";
                          	unset($_SESSION['successmsg']);
                        	?>
                    	</div>
                	</div><?php }?>
					<div class="page-header manage_topic">
						<!-- <p><span class="glyphicon glyphicon-envelope"></span></p> -->
						<h4>Topics List</h4>
					</div>
					<!-- id="Add Topic" -->
					<div  class="" ">
						<div class="table-responsive">
							<table class="table borderless">
								<tbody>
	  								<tr>
	  									<form>
	  										<input type="hidden" name="msg" value="add_topic" />
		    								<td class="text-left" style="width:120px;">Topic Name:</td>
		    								<td class="text-left">	<input type="text" class="form-control" id="topic_name" placeholder="Enter topic" name="topic_name">
											</td>
		  								
										
											<td colspan="2" class="text-center"><button type="submit" formaction="cmstopicprocess.php" class="btn btn-primary">Add Topic</button>
											</td>
										</tr>
									</form>
	  							</tbody>
				
							</table>
						</div>
					</div>
					<!-- GETTINMG  AVAILABLE MODULES -->
					
					<div class="">
						<div class="table-responsive">
							<table class="table table-striped">
	    						<thead>
	      							<tr>
	        							<th class="text-left">Topic Name</th>
	        							
	      							</tr>
	    						</thead>
	    						<tbody>
	    							<?php 
    									$topiclist=getTopicList();
    									while($row=$topiclist->fetch_assoc()){

    								?>
    								<form>
    									<input type="hidden" name="topic_id" value="<?php echo $row['topic_id'];?>"/>
		      							<tr>
		        							<td class="text-left"><?php echo $row['topic_name'];?></td>
		        							<td class="text-right">
		        								<div class="btn-group">
		    										<button type="submit" class="btn btn-primary" name="msg" value="edit_topic" formaction="cmstopicprocess.php">Edit</button>
		    										<button type="submit" class="btn btn-primary" name="msg" value="delete_topic" formaction="cmstopicprocess.php">Delete</button>
												</div>
											</td>
		      							</tr>
		      						</form>
	      							<?php }?>
	      						</tbody>
	      					</table>
	      					</div>
					</div>
				</div>
				<?php } else{?>
				<!-- __________________________________________________________________________________________________________ -->
					<!-- id="Add Sub Topic" -->
				
				
				<div  class="AddSubTopic" id="AddSubTopic">
					<?php if(isset($_SESSION['successmsg'])){ ?>
                  	<div class="d-inline-flex p-2">
                   		<div class="alert alert-danger" role="alert">
                       		<?php echo $_SESSION['successmsg'];
                          	unset($_SESSION['successmsg']);
                        	?>
                    	</div>
                	</div><?php }?>
					<div class="page-header manage_topic">
					<!-- <p><span class="glyphicon glyphicon-envelope"></span></p> -->
						<h4><?php if(isset($_REQUEST['topic_id'])){echo getTopicName($_REQUEST['topic_id']);} ?></h4>
					</div>

					<div class="table-responsive">
						<table class="table borderless">
							<tbody>
								<form>
	  								<tr>
	  									<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'] ?>" />
	    								<td class="text-left" style="width:120px;">Topic Name:</td>
	    								<td class="text-left">	<input type="text" class="form-control" id="topic_name" placeholder="Edit topic Name" name="topic_name" value="<?php echo getTopicName($_REQUEST['topic_id']);?>">
										</td>  								
									
										<td colspan="2" class="text-center"><button type="submit" class="btn btn-primary" formaction="cmstopicprocess.php" name="msg" value="change_topic">Change Name</button>
										</td>
									</tr>
								</form>
  							</tbody>
			
						</table>
					</div>
				
				
					<div class="table-responsive">

						<table class="table borderless">
							<tbody>
								<form>
									<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'];?>"/>
	  								<tr>
	    								<td class="text-left" style="width:120px;">Sub Topic Name:</td>
	    								<td class="text-left">	<input type="text" class="form-control" id="topic_name" placeholder="Enter sub-topic" name="sub_topic_name">
										</td>  								
									
										<td colspan="2" class="text-center"><button type="submit" class="btn btn-primary" formaction="cmstopicprocess.php" name="msg" value="add_sub_topic">Add Sub Topic</button>
										</td>
									</tr>
								</form>
  							</tbody>
			
						</table>
					</div>
				
					<!-- Edit and Delete Sub Topic-->
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
	  							<tr>
	    							<th class="text-left">SubTopic List</th>
	    							
	  							</tr>
							</thead>
							<tbody>
								<?php 
									//
								$result=getSubTopicList($_REQUEST['topic_id']);
								while($row=$result->fetch_assoc()){
								?>
									<form>
										<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'];?>" />
										<input type="hidden" name="sub_topic_id" value="<?php echo $row['sub_topic_id'] ?>"/>
			  							<tr>
			    							<td class="text-left"><?php echo $row['sub_topic_name'];?></td>
			    							<td class="text-right">
			    								<div class="btn-group">
													<button type="submit" formaction="cmstopicprocess.php" class="btn btn-primary" name="msg" value="edit_sub_topic">Edit</button>
													<button type="submit"  formaction="cmstopicprocess.php" class="btn btn-primary" name="msg" value="delete_sub_topic">Delete</button>
												</div>
											</td>
			  							</tr>
			  						</form>
		  						<?php } ?>	
	  						</tbody>
	  					</table>
	  				</div>
	  			</div> <!-- Add SubTopic ends here-->
	  			<?php }?>

	  			<!-- Edit Sub Topic-->
	  			<div class="EditSubTopic" style="display:none;">
	  				<div class="page-header manage_topic">
					<!-- <p><span class="glyphicon glyphicon-envelope"></span></p> -->
						<div class="row">
							<div class="col-md-10 text-left">
								<h4>Topic Name/SubTopic Name</h4>
							</div>
							<div class="col-md-2 btn-group text-right" style="float:right;">
								<button type="button" class="btn btn-primary">Save</button>
								<button type="button" class="btn btn-primary">Preview</button>
							</div>
						</div>
					</div>

					<!-- Editor comes here-->
					<div>
						<form>
							<input type="textarea" name="textEditor" id="textEditor"/>
						</form>
					</div>
	  			</div>
	  			<!--<?php 
					if(isset($_REQUEST['ref']) && $_REQUEST['ref']=="edit"){
				?>
					<script type="text/javascript">openEditPage();</script>
				<?php }else{?>
					<script type="text/javascript">openTopicPage();</script>
				<?php }?> -->

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
		<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
		<!--	<script type="text/javascript">
				tinymce.init({
				    selector: '#textEditor',
					plugins:'code image',
					toolbar: 'undo redo | styleselect | bold italic | link image',
  				});
			</script>-->
	</body>
</html>

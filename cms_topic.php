<?php 
	include_once "topicconnection.php";
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
						<a class="nav-link" href="cms_topic.html">
							<i class="fa fa-fw fa-link"></i>
							<span class="nav-link-text">Topics</span>
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
				<div class="page-header manage_topic">
					<!-- <p><span class="glyphicon glyphicon-envelope"></span></p> -->
					<h4>Manage Topic</h4>
				</div>
				<div class="topic_content">
					<div class="tab">
						<button class="tablinks" onclick="openCity(event, 'Topic List')">Topic List</button>
						<button class="tablinks" onclick="openCity(event, 'Add Topic')">Add Topic</button>
						<button class="tablinks" onclick="openCity(event, 'Edit Topic')">Edit Topic</button>
					</div>
					<div id="Topic List" class="tabcontent">
						<div class="table-responsive">
							<table class="table borderless">
								<tbody>
      								<tr>
      									<form>
      										<input type="hidden" name="msg" value="add_topic" />
	        								<td class="text-left" style="width:120px;">Topic Name:</td>
	        								<td class="text-left">	<input type="text" class="form-control" id="topic_name" placeholder="Enter topic" name="topic_name">
											</td>	
											<td colspan="2" class="text-center"><button type="submit" class="btn btn-primary" formaction="cmstopicprocess.php" >submit</button>
											</td>
										</form>
									</tr>
								</tbody>
							</table>
						</div>
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
    							   if(isset($_REQUEST['topic_id']) && $row['topic_id']==$_REQUEST['topic_id']){	
    							?>
    							<tr>
      								<form action="cmstopicprocess.php">
      									<input type="hidden" name="topic_id" value="<?php echo $row['topic_id'];?>"/>
      									<td class="text-left">	<input type="text" class="form-control" id="topic_name"  value="<?php echo $row['topic_name'];?>" placeholder="Enter topic" name="topic_name">
											</td>		      								
											<td colspan="2" class="text-right"><button type="submit" name="msg" value="change_topic"  class="btn btn-primary">change</button>
											</td>
									</form>
      							</tr>
      							<?php }else{ ?>
      							<tr>
      								<form action="cms_topic.php">
      									<input type="hidden" name="topic_id" value="<?php echo $row['topic_id'];?>"/>
	        							<td class="text-left"><?php echo $row['topic_name'];?></td>
	        							<td class="text-right">
	        								<div class="btn-group">
	    										<button type="submit" class="btn btn-primary" formaction="cms_topic.php" name="msg" value="edit_topic" >Edit</button>
	    										<button type="submit" class="btn btn-primary" formaction="cmstopicprocess.php" name="msg" value="delete_topic" >Delete</button>
											</div>
										</td>
									</form>
      							</tr>    							     							
      							<?php }}?>
      						</tbody>
      					</table>
      					</div>
					</div>
					<div id="Add Topic" class="tabcontent">
						<div class="table-responsive">
							<table class="table borderless">
								<tbody>
									<form>
	      								<tr>
	        								<td class="text-left" style="width:120px;">Topic Name:</td>
	        								<td class="text-left">	<input type="text" class="form-control" id="topic_name" placeholder="Enter topic" name="topic_name">
											</td>
	      								</tr>
										<tr>
											<td colspan="2" class="text-center"><button type="submit" class="btn btn-primary">Add SubTopic</button>
											</td>
										</tr>
									</form>
      							</tbody>
				
							</table>
						</div>
					</div>
					<div id="Edit Topic" class="tabcontent">
						<div class="table-responsive">
							<table class="table borderless">
								<tbody>
      								<tr>
        								<td class="text-left" style="width:120px;">Topic Name:</td>
										<td>
											<div class="form-group">
												<select class="form-control col-sm-4" id="sel1">
														<option>select a topic</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
												</select>
											</div>
										</td>
      								</tr>
      							</tbody>
							</table>
						</div>
						<div class="table-responsive">
						<table class="table table-striped">
    						<thead>
      							<tr>
        							<th class="text-left">SubTopic List</th>
        							
      							</tr>
    						</thead>
    						<tbody>
      							<tr>
        							<td class="text-left">John</td>
        							<td class="text-right">
        								<div class="btn-group">
    										<button type="button" class="btn btn-primary">Edit</button>
    										<button type="button" class="btn btn-primary">Delete</button>
										</div>
									</td>
      							</tr>
      							<tr>
        							<td class="text-left">John</td>
        							<td class="text-right">
        								<div class="btn-group">
    										<button type="button" class="btn btn-primary">Edit</button>
    										<button type="button" class="btn btn-primary">Delete</button>
										</div>
									</td>
      							</tr>
      						</tbody>
      					</table>
      					</div>
					</div>
				</div>
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

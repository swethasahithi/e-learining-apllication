<?php
	include_once "./models/getting.php"; 
	include_once "quizconnection.php";
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
	 	
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>		 -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  	    
		<script>
		    $(document).ready(function () {
		      // // $("#topic_").chosen({});
		     	 $("#topic_").select2({
                     // data:"madhu"
                });
		      $("#topic_").change(function(){
		           var topic=$(this).val();
		           //alert(topic);
		           $.ajax({    
		              type: "POST", 
		              data: {
		                     topic:topic,
		                    }, 
		                  url: "controllers/ajaxsubtopic.php",           
		               dataType: "html",                
		              success: function(response){                  
		                  $("#subtopic_").html(response); 
		                  // $("#subtopic_").chosen();
		                      $("#subtopic_").select2({
                  
                			 });
		              }
		            }); 
		      });
		      $("#sh").click(function(e){
		        tinyMCE.triggerSave();
		        var t = $("#topic").val();n
		        var st= $("#subtopic").val();
		        var bn= $("#blogname").val();
		        var content=tinymce.activeEditor.getContent();
		        $.post('controllers/blogcontrollers/addingblog.php',{
		          topic:t,
		          subtopic:st,
		          blogname:bn,
		          content:content
		        },
		      function(data,status){
		        $("#d").html(data);
		        });
		      });
		   });
		</script>
		<?php 
		   function load_topic()
		   {
		   	$conn=getConnection();
		    include 'models_quiz.php';
		    $sql="select * from module";
		    $result=$conn->query($sql);
		    $rows=$result->fetch_all(MYSQLI_ASSOC);
		    $output='';
		    foreach($rows as $row)
		      {
		       $output.="<option value='".$row['topic_name']."''>".$row['topic_name']."</option>";
		      }
		      return $output;
		    }
		?>	
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
						<button class="tablinks active" onclick="openCity(event, 'Add Quiz')">Add Quiz</button>
						<button class="tablinks" onclick="openCity(event, 'Edit Quiz')">Edit Quiz</button>
					</div>
					<div id="Add Quiz" class="tabcontent">
						<div class="table-responsive">
							<table class="table borderless">
								<form>
									<tbody>
	      								<tr>
	        								<td class="text-left" style="width:120px;">Topic Name:</td>
	        								<!-- <td class="text-left">	<input type="text" class="form-control" id="topic_name" placeholder="Enter topic" name="topic_name"> -->
											</td>
	        								<td class="text-left" >
	        									<select id="topic_" class="form-control" name="topic_name" type="text">
									         	   	  <option value=""></option> 
									             	 <?php echo load_topic();?>
									        	</select>
									    	</td> 
									    	<td class="text-left" style="width:120px;">Sub Topic:</td>
									    	<!-- <td class="text-left">	<input type="text" class="form-control" id="sub_topic_name" placeholder="Enter sub-topic" name="sub_topic_name">
									    	</td> -->
									         <td class="text-left"><select id="subtopic_" class="form-control" name="sub_topic_name" type="text">
									        	
									        	</select>
									     	</td>
	      								</tr>
										<tr>
											<td class="text-left" style="width:120px;">Quiz Name:</td>
	        								<td class="text-left">	<input type="text" class="form-control" id="quiz_name" placeholder="Enter quiz name" name="quiz_name">
											</td>
											<td colspan="4" class="text-left"><button type="submit" class="btn btn-primary" formaction="cmsquizprocess.php" name="quiz_msg" value="add_quiz">Add Quiz</button>
											</td>
										</tr>
	      							</tbody>
	      						</form>
							</table>
						</div>							
					 <!-- add quiz ends here -->
					<h3>QUIZ_LIST AND STATUS</h3>
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
	  							<tr>
	    							<th class="text-left">TOPIC</th>
	    							<th class="text-left">SUBTOPIC</th>
	    							<th class="text-left">QUIZ</th>
	    							<th class="text-left">STATUS</th>
	  							</tr>
							</thead>
							<tbody>
									<?php 
										$result=getQuizList();
										if($result->num_rows>0){
									?>
									<form>
										<input type="hidden" name="topic_id" value="<?php echo $_REQUEST['topic_id'];?>" />
										<input type="hidden" name="sub_topic_id" value="<?php echo $row['sub_topic_id'] ?>"/>
										<?php 
											while($row=$result->fetch_assoc()){
										?>
			  							<tr>
			  								<td class="text-left"><?php echo getTopicName($row['topic_id']);?></td>
			    							<td class="text-left"><?php echo getSubTopicName($row['sub_topic_id']);?></td>
			    							<td class="text-left"><?php echo getQuizName($row['quiz_id']); ?></td>
			    							<td class="text-left"><?php if($row['status']==1){echo "commited";}else{echo "not commited";};?></td>
			  							</tr>
			  							<?php }?>
			  						</form>
			  						<?php }?>
	  						</tbody>
	  					</table>
	  				</div>
	  				<!-- DISPLAYING LIST end-->
	  				</div>


					<div id="Edit Quiz" class="tabcontent">
						<table class="table borderless">
							<?php 
								if(isset($_REQUEST['topic_id']) && isset($_REQUEST['sub_topic_id'])){
									$topic_id=$_REQUEST['topic_id'];
									$sub_topic_id=$_REQUEST['sub_topic_id'];
									$result=getSubTopicQuizList($topic_id,$sub_topic_id);
								}			
							?>
							<form>
								<tbody>
									<tr>
        								<td class="text-left" style="width:120px;">Topic Name:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="topic_name"  placeholder="Enter topic" name="topic_name" value="<?php if(isset($_REQUEST['topic_id'])){echo getTopicName($topic_id);}?>">
										</td>
										<td class="text-left" style="width:120px;">Sub Topic:</td>
        								<td class="text-left">	<input type="text" class="form-control" id="sub_topic_name" placeholder="Enter sub-topic" name="sub_topic_name" value="<?php if(isset($_REQUEST['sub_topic_id'])){echo getSubTopicName($_REQUEST['sub_topic_id']);}?>">
										</td>
										<td class="text-center"><button type="submit" class="btn btn-primary" formaction="cmsquizprocess.php" name="quiz_msg" value="get_quiz_list">Submit</button>
										</td>
      								</tr>
      							</tbody>
      						</form>      						
						</table>
						<div class="table-responsive">
							<?php if($result->num_rows>0){ ?>
							<table class="table table-striped">
    							<thead>
      								<tr>
        								<th class="text-left">Quizes</th>
      								</tr>
    							</thead>
    							<?php while($row=$result->fetch_assoc()){?>
    							<form>
    								<input type="hidden" name="topic_id" value="<?php echo $topic_id;?>"/>    					
    								<input type="hidden" name="sub_topic_id" value="<?php echo $sub_topic_id;?>"/>
    								<input type="hidden" name="quiz_id" value="<?php echo $row['quiz_id'];?>"/>
	    							<tbody>	    								      								
	      								<tr>
	        								<td class="text-left"><?php echo getQuizName($row['quiz_id']);?></td>
	        								<td class="text-right">
	        									<div class="btn-group">
	        										<?php $ref=getQuizStatus($row['quiz_id']); 
	        											if($ref==0){
	        										?>	
	    												<button type="submit" class="btn btn-primary" formaction="editquiz.php" name="quiz_id" value="<?php echo $row['quiz_id'];?>">Edit</button>
	    												<button type="submit" class="btn btn-primary" formaction="cmsquizprocess.php" name="quiz_msg" value="quiz_Commit">Commit</button>
	    												<?php }else{?>
	    												<p>COMMITED</p>
	    												<?php  }?>
												</div>
											</td>
	      								</tr>
	      								
	      							</tbody>
	      						</form>
	      						<?php }?>
      						</table>
      						<?php }?>
      					</div>
					</div>
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
		<script type="text/javascript">
			var i, tabcontent, tablinks;
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }
		    document.getElementById("<?php if(isset($_REQUEST['ref'])){echo 'Edit Quiz';}else{echo 'Add Quiz';}?>").style.display = "block";
		    evt.currentTarget.className += " active";
		</script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
	</body>
</html>

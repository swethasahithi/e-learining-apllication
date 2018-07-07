<?php 
	session_start();
	include_once "topicconnection.php";
	include_once "./models/getting.php";
		if(isset($_REQUEST['msg'])){
			$request=$_REQUEST['msg'];
			if(isset($_REQUEST['topic_id'])){
				$topic_id=$_REQUEST['topic_id'];
			}
			
			if($request=="change_topic"){
				if(isset($_REQUEST['topic_id'])){
					$topic_id=$_REQUEST['topic_id'];
				}
				$topic_name=getTopicName($topic_id);
				changeTopicName($topic_id,$_REQUEST['topic_name']);
				header("location:cms_topic1.php?ref=edit&topic_id=".$topic_id);

			}
			if($request=="change_sub_topic"){
				if(isset($_REQUEST['sub_topic_id'])){
					$sub_topic_id=$_REQUEST['sub_topic_id'];
				}
				$topic_id=$_REQUEST['topic_id'];
				$topic_name=getSubTopicName($sub_topic_id);
				changeSubTopicName($sub_topic_id,$_REQUEST['sub_topic_name']);
				header("location:editor_page.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);

			}
			else if($request=="edit_topic"){
				$topic_id=$_REQUEST['topic_id'];
				header("location:cms_topic1.php?ref=edit&topic_id=".$topic_id);

			}
			else if($request=="delete_topic"){
				deleteTopic($topic_id);
				header("location:cms_topic1.php");
			}
			else if($request=="add_topic"){
				$topic_name=$_REQUEST['topic_name'];
				addTopic($topic_name);
				$_SESSION['successmsg']="topic added successfully";
				header("location:cms_topic1.php?ref=1");
			}
			else if($request=="add_sub_topic"){
				$topic_id=$_REQUEST['topic_id'];
				$sub_topic_name=$_REQUEST['sub_topic_name'];
				addSubTopic($topic_id,$sub_topic_name);
				$_SESSION['successmsg']=$sub_topic_name."-- added successfully";
				header("location:cms_topic1.php?ref=edit&topic_id=".$topic_id);
			}
			else if($request=='delete_sub_topic'){
				$topic_id=$_REQUEST['topic_id'];
				$sub_topic_id=$_REQUEST['sub_topic_id'];
				deleteSubTopic($topic_id,$sub_topic_id);
				header("location:cms_topic1.php?ref=edit&topic_id=".$topic_id);
			}
			else if($request=="edit_sub_topic"){
				$topic_id=$_REQUEST['topic_id'];
				$sub_topic_id=$_REQUEST['sub_topic_id'];
				header("location:editor_page.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
			}
			/*else if($request=="add_sub_topic"){
				$topic_name=$_REQUEST['topic_name'];
				$topic_id=
			}*/
		}
		else if(isset($_REQUEST['editormsg'])){
			$request=$_REQUEST['editormsg'];
			$topic_id=$_REQUEST['topic_id'];
			$sub_topic_id=$_REQUEST['sub_topic_id'];
			if($request=="uploadrequest"){
				header("location:editor_page.php?ref=uploadform&topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
			}
			else if($request=="uploadfile"){
					if($_FILES['pdf_file']['name']!="" && end(explode(".",$_FILES['pdf_file']['name']))=="pdf"){
						$target="uploads/".getTopicName($topic_id)."/";
						if(!is_dir($target))
							mkdir($target);
						$filename=$_FILES['pdf_file']['name'];
						$target=$target.basename($_FILES['pdf_file']['name']);
						move_uploaded_file($_FILES['pdf_file']['tmp_name'], $target);
						addPdfFile($topic_id,$sub_topic_id,$filename);
						$_SESSION['uploadinfo']="File uploaded Successfully";
						header("location:editor_page.php?ref=uploadform&topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
					}
					else{
						//$_SESSION attribute create
						//call the previous file
						$_SESSION['uploadinfo']="PLEASE SELECT THE VALID FILE(PDF)";
						header("location:editor_page.php?ref=uploadform&topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
					}
			}
			else if($request=="delete_pdf"){
				$file_id=$_REQUEST['file_id'];
				deletePdf($file_id);
				header("location:editor_page.php?ref=uploadform&topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
			}
			else if($request=="savecontent"){
				$topic_id=$_REQUEST['topic_id'];
				$sub_topic_id=$_REQUEST['sub_topic_id'];
				$content=$_REQUEST['texteditor'];
				addBlog($topic_id,$sub_topic_id,$content);
				$_SESSION['successmsg']="content saved successfully";
				header("location:editor_page.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
			}
		}


?>
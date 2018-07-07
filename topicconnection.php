<?php 
	include_once "./models/getting.php";
	function getTopicList(){
		$conn=getConnection();
		$topiclist=$conn->query("select * from `module`");
		if($conn->error){
			$conn->error;
		}
		else{
			return $topiclist;
		}

	}
	function changeTopicName($topic_id,$newname){
		$conn=getConnection();
		$conn->query("update `module` set `topic_name`='".$newname."' where `topic_id`=".$topic_id);	
	}
	function changeSubTopicName($sub_topic_id,$newname){
		$conn=getConnection();
		$conn->query("update `sub_module` set `sub_topic_name`='".$newname."' where `sub_topic_id`=".$sub_topic_id);	
	}
	function deleteTopic($topic_id){
		$conn=getConnection();
		$result=$conn->query("select * from `sub_module` where `topic_id`=".$topic_id);
		while($row=$result->fetch_assoc()){
			$conn->query("delete from `quiz_module` where `sub_topic_id`=".$row['sub_topic_id']);
		}
		$conn->query("delete from `sub_module` where `topic_id`=".$topic_id);
		$conn->query("delete from `module` where `topic_id`=".$topic_id);		
	}
	function addTopic($topic_name){
		$conn=getConnection();
		$conn->query("insert into `module`(`topic_name`) values('$topic_name')");

	} 
	function getSubTopicList($topic_id){
		$conn=getConnection();
		$result=$conn->query("select * from `sub_module` where `topic_id`=".$topic_id);
		return $result;
	}
	function addSubTopic($topic_id,$sub_topic_name){
		$conn=getConnection();
		$conn->query("insert into `sub_module`(`topic_id`,`sub_topic_name`) values($topic_id,'$sub_topic_name')");		

	}
	function deleteSubTopic($topic_id,$sub_topic_id){
		$conn=getConnection();
		$conn->query("delete from `sub_module` where `sub_topic_id`=".$sub_topic_id);
		//$conn->query("delete from `quiz_module` where `sub_topic_id`=".$sub_topic_id);
	}
	function addPdfFile($topic_id,$sub_topic_id,$filename)
	{
		$conn=getConnection();
		$conn->query("insert into `topic_pdfs`(`topic_id`,`sub_topic_id`,`filename`) values($topic_id,$sub_topic_id,'$filename')");
	}
	function getPdfList($topic_id,$sub_topic_id){
		$conn=getConnection();
		$result=$conn->query("select * from `topic_pdfs` where  `sub_topic_id`=".$sub_topic_id);
		return $result;
	}
	function deletePdf($file_id){
		$conn=getConnection();
		$query=$conn->query("select * from `topic_pdfs` where `file_id`=".$file_id);
		$result=$query->fetch_assoc();
		unlink("uploads/".getTopicName($result['topic_id'])."/".$result['filename']);
		$conn->query("delete from `topic_pdfs` where `file_id`=".$file_id);

	}
	function addBlog($topic_id,$sub_topic_id,$content){
		$conn=getConnection();
		$result=$conn->query("select * from `blogs` where `sub_topic_id`=".$sub_topic_id);
		$conn->error;
		if($result->num_rows>0){
			$result=$conn->query("update `blogs` set `blogcontent`='".$content."' where `sub_topic_id`=".$sub_topic_id);	
		}
		else
			$conn->query("insert into `blogs`(`topic_id`,`sub_topic_id`,`blogcontent`) values($topic_id,$sub_topic_id,'$content')");
//		return;
		$conn->error;
	}
	function getBlog($topic_id,$sub_topic_id){
		$conn=getConnection();
		$result=$conn->query("select * from `blogs` where `sub_topic_id`=".$sub_topic_id);
		$conn->error;
		return $result;
	}
	

?>
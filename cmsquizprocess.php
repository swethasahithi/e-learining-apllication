<?php 
	session_start();
	include_once "topicconnection.php";
	include_once "./models/getting.php";
	include_once "quizconnection.php";
	include_once "./models/question.php";
	if(isset($_REQUEST['quiz_msg'])){
		$request=$_REQUEST['quiz_msg'];
	
		if($request=="add_quiz"){
		$topic_name=$_REQUEST['topic_name'];
		$sub_topic_name=$_REQUEST['sub_topic_name'];
		$topic_id=getTopicId($topic_name);
		$sub_topic_id=getSubTopicId($sub_topic_name);
		$quiz_name=$_REQUEST['quiz_name'];
		addQuiz($topic_id,$sub_topic_id,$quiz_name);
		header("location:cms_quiz.php");

	}
	else if($request=="get_quiz_list"){
		$topic_name=$_REQUEST['topic_name'];
		$sub_topic_name=$_REQUEST['sub_topic_name'];
		$topic_id=getTopicId($topic_name);
		$sub_topic_id=getSubTopicId($sub_topic_name);
		//$_SESSION['topic_id']=$topic_id;
		//$_SESSION['sub_topic_id']=$sub_topic_id;
		//header('location:cms_quiz.php');
		 header("location:cms_quiz.php?ref=1&topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);
	}
	else if($request=="quiz_Commit"){
		$topic_id=$_REQUEST['topic_id'];
		$sub_topic_id=$_REQUEST['sub_topic_id'];
		$quiz_id=$_REQUEST['quiz_id'];
		commitQuiz($quiz_id);
		header("location:cms_quiz.php?ref=1&topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id);			
	}
	else if($request=="add_q"){
		$topic_id=$_REQUEST['topic_id'];
		$sub_topic_id=$_REQUEST['sub_topic_id'];
		$quiz_id=$_REQUEST['quiz_id'];
		$q1=new Question();
		$q1->setQuestion($_REQUEST['question']);
		$q1->setOption1($_REQUEST['option1']);
		$q1->setOption2($_REQUEST['option2']);
		$q1->setOption3($_REQUEST['option3']);
		$q1->setOption4($_REQUEST['option4']);
		$q1->setAnswer($_REQUEST['answer']);
		$q1->setExplanation($_REQUEST['explanation']);
		if(isset($_REQUEST['question_id'])){
			$question_id=$_REQUEST['question_id'];
			updateQuestion($q1,$question_id);
		}
		else{
			addQuestion($q1,$quiz_id);
		}
		header("location:editquiz.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id."&quiz_id=".$quiz_id);
	}
	else if($request=="exit_q"){
		$topic_id=$_REQUEST['topic_id'];
		$sub_topic_id=$_REQUEST['sub_topic_id'];
		$quiz_id=$_REQUEST['quiz_id'];
		header("location:editquiz.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id."&quiz_id=".$quiz_id);
	}

	}
	else if(isset($_REQUEST['question_msg'])){
		$request=$_REQUEST['question_msg'];
		$topic_id=$_REQUEST['topic_id'];
		$sub_topic_id=$_REQUEST['sub_topic_id'];
		$quiz_id=$_REQUEST['quiz_id'];
		$question_id=$_REQUEST['question_id'];
		if($request=="edit_question"){	
					// $topic_id=$_REQUEST['topic_id'];
					// $sub_topic_id=$_REQUEST['sub_topic_id'];
					// $quiz_id=$_REQUEST['quiz_id'];
					// $question_id=$_REQUEST['question_id'];
					header("location:addquestions.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id."&quiz_id=".$quiz_id."&question_id=".$question_id);		
		}
		else if($request=="delete_question"){
					// $quiz_id=$_REQUEST['quiz_id'];
					// $question_id=$_REQUEST['question_id'];
					deleteQuestion($quiz_id,$question_id);
					header("location:editquiz.php?topic_id=".$topic_id."&sub_topic_id=".$sub_topic_id."&quiz_id=".$quiz_id);
		}
	}

?>
<?php 
	include_once "./models/getting.php";
	// function getQuizName($quiz_id){
	// 	$conn=getConnection();
	// 	$result=$conn->query("select `quiz_name` from quiz` where `quiz_id`=".$quiz_id);
	// 	$result=$result->fetch_assoc();
	// 	return $result['quiz_name'];
	// }
	function getQuizList(){
		$conn=getConnection();
		$result=$conn->query("select * from `quiz_module`");		
		return $result;
	}
	function addQuiz($topic_id,$sub_topic_id,$quiz_name){
		$conn=getConnection();
		$conn->query("insert into `quiz`(`quiz_name`) values('$quiz_name')");
		$quiz_id=getQuizId($quiz_name);
		$conn->query("insert into `quiz_module`(`quiz_id`,`topic_id`,`sub_topic_id`,status) values($quiz_id,$topic_id,$sub_topic_id,0)");
	}
	function getSubTopicQuizList($topic_id,$sub_topic_id){
		$conn=getConnection();
		$result=$conn->query("select * from `quiz_module` where `sub_topic_id`=".$sub_topic_id);//."and `sub_topic_id`=".$sub_topic_id);
		return $result;
	}
	function commitQuiz($quiz_id){
		$conn=getConnection();
		$conn->query("update `quiz_module` set status=1 where `quiz_id`=".$quiz_id);
	}
	function getQuizStatus($quiz_id){
		$conn=getConnection();
		$temp=$conn->query("select `status` from `quiz_module` where `quiz_id`=".$quiz_id);
		$result=$temp->fetch_assoc();
		return $result['status'];

	}
	function addQuestion($q1,$quiz_id){
		$conn=getConnection();
		$question=$q1->getQuestion();
		$option1=$q1->getOption1();
		$option2=$q1->getOption2();
		$option3=$q1->getOption3();
		$option4=$q1->getOption4();
		$answer=$q1->getAnswer();
		$explanation=$q1->getExplanation();
		$query="insert into `questions` (`question`,`option1`,`option2`,`option3`,`option4`,`answer`,`explanation`) values('$question','$option1','$option2','$option3','$option4',$answer,'$explanation')";
		$conn->query($query);
		$temp=$conn->query("select `question_id` from `questions` where `question`='".$question."'and `option1`='".$option1."'and `option2`='".$option2."'and `option3`='".$option3."'and `option4`='".$option4."'");
		echo $conn->error;
		$result=$temp->fetch_assoc();

		//$result=$conn->insert_id;
		$qid=$result['question_id'];
		$conn->query("insert into `quiz_question` values($quiz_id,$qid)");
	}
	function updateQuestion($q1,$question_id){
		$conn=getConnection();
		$question=$q1->getQuestion();
		$option1=$q1->getOption1();
		$option2=$q1->getOption2();
		$option3=$q1->getOption3();
		$option4=$q1->getOption4();
		$answer=$q1->getAnswer();
		$explanation=$q1->getExplanation();
		$res=$conn->query("update `questions` set `question`='".$question."', `option1`='".$option1."',`option2`='".$option2."',`option3`='".$option3."',`option4`='".$option4."',`answer`=".$answer.",`explanation`='".$explanation."' where `question_id`=".$question_id);

	}
	function deleteQuestion($quiz_id,$question_id){
		$conn=getConnection();
		$conn->query("delete from `quiz_question` where `question_id`=".$question_id);
		$conn->query("delete from `questions` where `question_id`=".$question_id);
	}
	function getQuestionsList($quiz_id){
		$conn=getConnection();
		// $result=$conn->query("select * `questions` where `question_id`="."(select `question_id` from `quiz_question` where `quiz_id`=".$quiz_id.")");
		$result=$conn->query("select * from `quiz_question` where `quiz_id`=".$quiz_id);		
		echo $conn->error;	
		return $result;
	}
	function getQuestion($question_id){
		$conn=getConnection();
		$result=$conn->query("select * from `questions` where `question_id`=".$question_id);
		echo $conn->error;
		return $result;
	}
	function getUlbQuizList($topic_id,$sub_topic_id){
		$conn=getConnection();
		$result=$conn->query("select * from `quiz_module` where `sub_topic_id`= {$sub_topic_id} and `status`=1");
		echo $conn->error;
		return $result;
	}
?>
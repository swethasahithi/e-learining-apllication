<?php
include '../models.php';
$sql1="select quiz.quiz_id from quiz,quiz_module where quiz_module.topic_name='{$_POST["topic"]}' and
        quiz_module.sub_topic_name='{$_POST["subtopic"]}' and quiz.quiz_name='{$_POST["quizname"]}'";
$result=$conn->query($sql1);
$rows=$result->fetch_all(MYSQLI_ASSOC);
$sql="update quiz set commit=1 where quiz_id='{$rows[0]["quiz_id"]}'";
$result=$conn->query($sql);
if($result==TRUE)
{
    echo 'you successfully commited the quiz';
}
?>
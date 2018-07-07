<?php
session_start();
include '../models.php';
$sql="select quiz_id from quiz,(select quiz_id from quiz_module where topic_name='{$_POST["topic"]}' and sub_topic_name=
      '{$_POST["subtopic"]}') t where quiz.quiz_name='{$_POST["quizname"]}' and quiz.quiz_id=t.quiz_id";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
$_SESSION["quizid"]=$rows[0]["quiz_id"];
$_SESSION["topic"]=$_POST["topic"];
$_SESSION["subtopic"]=$_POST["subtopic"];
$_SESSION["quizname"]=$_POST["quizname"];
echo 'ok';
?>


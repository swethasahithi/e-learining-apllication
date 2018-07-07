<?php
session_start();
include '../models.php';

$sql="select question_id from questions where question='{$_POST["question"]}' and option1='{$_POST["option1"]}'
     and option2='{$_POST["option2"]}' and option3='{$_POST["option3"]}' and option4='{$_POST["option4"]}'";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
echo $rows[0]["question_id"];
$_SESSION["questionid"]=$rows[0]["question_id"];
?>
<?php
include '../models.php';
session_start();
$ans=(int)$_POST["answer"];
$sql="update questions set
      question='{$_POST["question"]}',option1='{$_POST["option1"]}',option2='{$_POST["option2"]}',
      option3='{$_POST["option3"]}',option4='{$_POST["option4"]}',answer={$ans},
      explanation='{$_POST["explanation"]}' where question_id='{$_SESSION["questionid"]}'";
$result=$conn->query($sql);
if($result==TRUE)
{
    echo ' updated successfully';
}
?>
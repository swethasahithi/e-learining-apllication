<?php
session_start();
include  '../models.php';
$sql="select quiz_id from quiz_module where topic_name='{$_POST["topic"]}' and sub_topic_name='{$_POST["subtopic"]}'";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
if(empty($rows))
{
    echo 'invalid topic name or subtopic name';
}
else{
    $sql="select quiz_name from quiz where quiz_id ='{$rows[0]["quiz_id"]}'";
    $id=$rows[0]["quiz_id"];
    $result=$conn->query($sql);
    $rows=$result->fetch_all(MYSQLI_ASSOC);
    if($_POST["quizname"]!=$rows[0]["quiz_name"])
    {
        echo 'invalid quiz name';
    }
    else{
        $ans=(int)$_POST["answer"];
      $sql="insert into questions(question,option1,option2,option3,option4,answer,explanation) values('{$_POST["question"]}','{$_POST["option1"]}','{$_POST["option2"]}',
      '{$_POST["option3"]}','{$_POST["option4"]}',{$ans},'{$_POST["explanation"]}')";
      $result=$conn->query($sql);
      if($result==TRUE)
      {      
          $sql="select question_id from questions where question='{$_POST["question"]}' and option1=
          '{$_POST["option1"]}' and option2='{$_POST["option2"]}' and option3='{$_POST["option3"]}' and
           option4='{$_POST["option4"]}' and answer={$ans}";
           $result=$conn->query($sql);
           $rows=$result->fetch_all(MYSQLI_ASSOC);
           $sql="insert into quiz_question values('{$id}','{$rows[0]["question_id"]}')";
           $result=$conn->query($sql);
           if($result==TRUE)
                 echo 'updated sucessfully';
           else{
               echo 'sorry please try again';
           }
        }
    }
}
?>

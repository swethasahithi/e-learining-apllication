<?php
include '../models.php';
  $sql1="select topic_id from module where topic_name = '{$_POST["topic"]}'";
  $sql2="select sub_topic_id from sub_module where sub_topic_name = '{$_POST["subtopic"]}'";
  $result=$conn->query($sql1);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  if(empty($rows))
  {
      echo 'invalid topic name';
  }
  else{
      $r1=$rows;
  }
  $result=$conn->query($sql2);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  if(empty($rows))
  {
      echo 'invalid subtopicname';
  }
  else{
      $r2=$rows;
    }
 $sql1="insert into quiz values('{$_POST["quizname"]}')";
 $sql2="select quiz_id from quiz where quiz_name='{$_POST["quizname"]}'";
 $result=$conn->query($sql1);
 
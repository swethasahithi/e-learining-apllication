<?php
  include '../../models.php';
  $sql1="select topic_id from module where topic_name = '{$_POST["topic"]}'";
  $sql2="select sub_topic_id from sub_module where sub_topic_name = '{$_POST["subtopic"]}'";
  $result=$conn->query($sql1);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  if(empty($rows))
  {
      $result=$conn->query($sql3);
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
  $sql5="INSERT INTO blogs (topic_id,sub_topic_id,blogcontent) VALUES ('{$r1[0]["topic_id"]}','{$r2[0]["sub_topic_id"]}','{$_POST["content"]}')";
  if($conn->query($sql5)==TRUE)
  {
      echo 'updated';
  }
 ?>
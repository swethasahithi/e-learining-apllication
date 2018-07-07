<?php
 session_start();
include '../../models.php';
$err1=0;
$err2=0;
  $sql1="select topic_id from module where topic_name = '{$_POST["topic"]}'";
  $sql2="select sub_topic_id from sub_module where sub_topic_name = '{$_POST["subtopic"]}'";
  $result=$conn->query($sql1);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  if(empty($rows))
  {
      echo 'invalid topic name';
      $err1=1;
  }
  else{
      $r1=$rows;
  }
  $result=$conn->query($sql2);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  if(empty($rows))
  {
      echo 'invalid subtopicname';
      $err2=1;
  }
  else{
      $r2=$rows;
  }
  if($err1==0 && $err2==0)
  {
    $sql5="update blogs set topic_id='{$r1[0]["topic_id"]}',sub_topic_id='{$r2[0]["sub_topic_id"]}',blogcontent='{$_POST["content"]}' where blog_id='{$_SESSION["blogid"]}'";
    if($conn->query($sql5)==TRUE)
    {
        echo 'updated sucessfully';
    }
  }

 ?>
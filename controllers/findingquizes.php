<?php
  include '../models.php';
  $topic=$_POST["topic"];
  $subtopic=$_POST["subtopic"];
  if(empty($topic) && empty($subtopic))
  {
      $sql1="select quiz_name from quiz where commit = 0";
      $sql2="select quiz_name from quiz where commit = 1";
  } 
  else if(empty($subtopic))
  {
      $sql1="select quiz.quiz_name,quiz_module.topic_name,quiz_module.sub_topic_name from quiz,quiz_module
      where quiz_module.topic_name='{$topic}') and  quiz_module.quiz_id=quiz.quiz_id and quiz.commit=0";
      $sql2="select quiz.quiz_name,quiz_module.topic_name,quiz_module.sub_topic_name from quiz,quiz_module
      where quiz_module.topic_name='{$topic}') and  quiz_module.quiz_id=quiz.quiz_id and quiz.commit=1";
  }
  else if(empty($topic)){
    $sql1="select quiz.quiz_name,quiz_module.topic_name,quiz_module.sub_topic_name from quiz,quiz_module
    where quiz_module.sub_topic_name='{$subtopic}') and  quiz_module.quiz_id=quiz.quiz_id and quiz.commit=0";
    $sql2="select quiz.quiz_name,quiz_module.topic_name,quiz_module.sub_topic_name from quiz,quiz_module
    where quiz_module.sub_topic_name='{$subtopic}') and  quiz_module.quiz_id=quiz.quiz_id and quiz.commit=1"; 
  }
  else{
   
    $sql1="select quiz.quiz_name,quiz_module.topic_name,quiz_module.sub_topic_name from quiz,quiz_module
    where quiz_module.sub_topic_name='{$subtopic}' and quiz_module.topic_name='{$topic}' and  quiz_module.quiz_id=quiz.quiz_id and quiz.commit=0"; 
    $sql2="select quiz.quiz_name,quiz_module.topic_name,quiz_module.sub_topic_name from quiz,quiz_module
    where quiz_module.sub_topic_name='{$subtopic}' and quiz_module.topic_name='{$topic}' and quiz_module.quiz_id=quiz.quiz_id and quiz.commit=1";
  }
    $count=0;
  $result=$conn->query($sql1);
  $rows=$result->fetch_all(MYSQLI_ASSOC);
  $output='';
  $result=$conn->query($sql2);
  $rows2=$result->fetch_all(MYSQLI_ASSOC);
  if(empty($rows) && empty($rows2))
  {
      echo 'no quizes in this section<br />';
  }
  else{
      foreach($rows as $row)
      {
          $count++;
          $output.= '<div class="quiz"><span>'.$count.'</span> <span class="qn">'.$row["quiz_name"].'</span>
          <span class="qt">'.$row["topic_name"].'</span><span class="qst">'.$row["sub_topic_name"].'</span>
          <button class="c" type="button">commit</button><button class="e" type="button">edit</button>
          <button class="d" type="button">delete</button></div><br />';
      }
  foreach($rows2 as $row)
  {
      $count++;
      $output.='<div class="quiz"><span>'.$count.'</span> <span class="qn">'.$row["quiz_name"].'</span>
      <span class="qt">'.$row["topic_name"].'</span><span class="qst">'.$row["sub_topic_name"].'</span>
          <button class="c" type="button" disabled>commit</button><button class="e" type="button" disabled>edit</button>
          <button class="d" type="button">delete</button></div><br />';
  }
}
 echo $output;
?>
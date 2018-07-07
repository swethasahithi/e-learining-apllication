<?php
  include '../../models.php';
  $sql5="INSERT INTO citizens(topic,blogcontent) VALUES ('{$_POST["topic"]}','{$_POST["content"]}')";
  if($conn->query($sql5)==TRUE)
  {
      echo 'updated';
  }
  ?>

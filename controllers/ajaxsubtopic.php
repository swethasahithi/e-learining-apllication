<?php
include '../models_quiz.php';
$sql="select  sub_module.sub_topic_name from sub_module,module where module.topic_name='{$_POST["topic"]}' and
      sub_module.topic_id=module.topic_id";
$result=$conn->query($sql);
$rows=$result->fetch_all(MYSQLI_ASSOC);
$output='<option value=""></option>';
foreach($rows as $row)
{
    $output.='<option value='.$row["sub_topic_name"].'>'.$row["sub_topic_name"].'</option>';
}
echo $output;
?>
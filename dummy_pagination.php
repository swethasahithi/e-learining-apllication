<?php
    $page_count=2;

    $conn=new mysqli("localhost","root","MadhuMysql");
    $conn->select_db('sih_db');
    $query1="select * from `questions`";
    $result1=$conn->query($query1);
    $num_rows=$result1->num_rows;
    $pages=ceil($num_rows/$page_count);
    
  
    if(!isset($_GET['page']))
        $start=0;
    else
        $start=($_GET['page']*$page_count)-$page_count;
    $query="select * from `questions` limit $start,$page_count ";
    $result=$conn->query($query);
    echo $conn->error;
    while($row=$result->fetch_assoc()){
        echo $row['question']."<br>";
    }

?>
<html>
    <body>

    </body>
</html>
<?php 
        for($i=1;$i<=$pages;$i++){
            echo "<a style='text-decoration:none' href='".$_SERVER['PHP_SELF']."?page=".$i."'>".$i."</a>&nbsp;&nbsp;";
        }    
?>
<!--<?php 
        for($i=1;$i<=$pages;$i++){
            echo "<a style='text-decoration:none' href='ulbquiz1.php?page=".$i."&topic=".$topic."&sub_topic=".$sub_topic."'>".$i."</a>&nbsp;&nbsp;";
        }    
?>-->

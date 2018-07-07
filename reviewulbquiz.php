<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Online PMAY E-learning module for ULBs and general citizens">
  <meta name="keywords" content="PMAY, Pradhan Mantri Awas Yojna, ULBs, Urban Local Bodies, E-learning, State of Maharashtra, policies">

  <title>ToDoList</title>
  <style type="text/css">
    .a_page{
      float:left;
      display: block;
      width:30px;
      height:30px;
      line-height:30px;
      text-align: center;
      border:1px solid black;
    }
    .a_page:hover{
      background-color: black;
      color:white;
    }
  </style> 
  <link href="other/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
  <link href="other/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">  
  <link href="other/datatables/dataTables.bootstrap4.css" rel="stylesheet">  
  <link href="css/toDoList.css" rel="stylesheet">

</head>

<body>
<?php
  $topic=$_REQUEST['topic'];
  $sub_topic=$_REQUEST['sub_topic'];
  session_start(); 
  if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
  }
  else{
    
    header("location:ulblogin.php");
  }
  include_once "./models/getting.php";
  $conn=new mysqli("localhost","root","MadhuMysql");
  $conn->select_db("sih_db");



  $query="select `topic_name` from `module`";
  $result=$conn->query($query);
  /*GETTING THE QUESTIONS OF GIVEN SUB_TOPIC(TOPIC) and conducting the quiz*/ 
  $getquizid="select `quiz_id` from `quiz_module` where `sub_topic_id`='".$sub_topic."'";
  $result1=($conn->query($getquizid))->fetch_assoc();
  $quiz_id=$result1['quiz_id'];
  $checkquizquery="select `question_id` from `quiz_eval` where `quiz_id`='".$quiz_id."' and `ulb_id`='".$uid."'";
  $result3=$conn->query($checkquizquery);
  if($result3->num_rows>0){  

        //PAGINATION.......
        $page_count=3;
        $total_pages=$result3->num_rows;
        $last_page=ceil($total_pages/$page_count);
        $start;
        if(isset($_GET['page'])){
          $start=($_GET['page']*$page_count)-$page_count;
          if($_GET['page']<1)
            $start=0;
          else if($_GET['page']>$last_page)
            $start=$last_page;
        }
        else
          $start=0;
        $limitrecords="select `question_id` from `quiz_eval` where `quiz_id`='".$quiz_id."' and `ulb_id`='".$uid."' limit $start,$page_count";
        $result3=$conn->query($limitrecords);

    ?>

  <div class="container-fluid">
  <div id="accordion" role="tablist">
  <?php 
      while($row=$result3->fetch_assoc()){
          $qid=$row['question_id'];

          // GETTING THE ULB ANSWER FOR THE PARTICULAR QUESTION
          $query1="select `ulb_answer` from quiz_eval where `ulb_id`='".$uid."' and `quiz_id`='".$quiz_id."' and `question_id`='".$qid."'";
          $result1=$conn->query($query1);
          $res1=$result1->fetch_assoc();

          $question=$conn->query("select * from `questions` where `question_id`='".$row['question_id']."'");
          while($res=$question->fetch_assoc()){ ?>

               <div class="card quiz">

                  <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">              
                        Q: <?php echo $res['question']; ?>              
                    </h5>            
                  </div>
                  <div class="card-body">   
                           
                        <div class="custom-control custom-radio option">
                          <input type="radio"  class="custom-control-input" <?php if($res1['ulb_answer']==1) echo "checked"; ?> >
                          <label class="custom-control-label" ><?php echo $res['option1'];?></label>
                        </div>
                        <div class="custom-control custom-radio option">
                          <input type="radio"  class="custom-control-input" <?php if($res1['ulb_answer']==2) echo "checked"; ?>>
                          <label class="custom-control-label" ><?php echo $res['option2'];?></label>
                        </div>
                        <div class="custom-control custom-radio option">
                          <input type="radio"  class="custom-control-input" <?php if($res1['ulb_answer']==3) echo "checked"; ?>>
                          <label class="custom-control-label" ><?php echo $res['option3'];?></label>
                        </div>
                        <div class="custom-control custom-radio option">
                          <input type="radio"  class="custom-control-input" <?php if($res1['ulb_answer']==4) echo "checked"; ?>>
                          <label class="custom-control-label" ><?php echo $res['option4'];?></label>
                        </div>
                        <?php $id=$res['question_id']; ?>
                        <button type="button" class="btn btn-success checkAns" data-toggle="collapse" data-target="<?php echo '#'.$id;?>">Click to view</button>
                        <div id="<?php echo $id; ?>" class="collapse">
                              <h4><span style="color:#4cafa5" >CORRECT ANSWER(<?php echo $res1['ulb_answer']; ?>):</span><span style="color:#4cafa5;"><?php
                                $temp="option".$res['answer'];
                               echo $res[$temp];?></span></h4>
                              <h4 style="color:#204625; font-family:Calibri;"><?php echo $res['explanation']; ?></h4>

                        </div>
                  </div>

              </div>
              

        <?php  }
          

      }

  }
  else
  {
     $_SESSION['alreadymsg']="FIRST ATTEMPT THE QUIZ ";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
?>
<center>
  <div>
    <?php 
      $page=1;
      if(isset($_GET['page'])) 
        $page=$_GET['page'];
      for($i=1;$i<=$last_page;$i++){ ?>
       <a class="a_page" id="page<?php echo $i;?>" href="reviewulbquiz.php?topic=<?php echo $topic.'&'.'sub_topic='.$sub_topic.'&page='.$i;?>" class="button blue"><?php echo $i; ?></a>

      <?php }

    ?>
  </div>
</center>
<!-- <script type="text/javascript">activate(<?php echo $page;?>);</script> -->
</div>
</div>
<script src="other/bootstrap/js/bootstrap.min.js"></script>
<script src="other/jquery/jquery.min.js"></script>
<script src="other/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="other/jquery-easing/jquery.easing.min.js"></script>
<!-- <script type="text/javascript">
  function activate(page){
    var act=document.getElementById("page"+page);
    act.style.color="white";
    act.style.background-color="#4cafa5";
  }
</script> -->
</body>
</html>
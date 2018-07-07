<!--
	This will get the topic and subtopic names from ulbmodule.php as request parameters
	get the quiz id from the sub_topic_name(or from sub_topic_id)(table>quiz_module)
	now get the question_ids using quiz id (table>quiz_question)\
	all the questions from (questions table) 
-->

<?php 
  session_start();
  // echo $_SESSION['uid'];
  if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
  }
  else{
    
    header("location:ulblogin.php");
  }
  $conn=new mysqli("localhost","root","MadhuMysql");
  $conn->select_db("sih_db");
   if(isset($_SESSION['quids'])){    
      $quid=$_SESSION['quids'];
   }
  $quizid=$_REQUEST['quiz_id'];
  $totalcount=0;
  $correctcount=0;
  $i=0;
  $n=sizeof($quid);
  while($i<$n){
    $totalcount++;
    $qid=$quid[$i];
    $answer=0;
    if(isset($_POST[$qid]))
      $answer=$_POST[$qid];
    $insertquery="insert into `quiz_eval` values('$uid','$quizid','$qid',$answer,1)";
    $queryres=$conn->query($insertquery);
    if($conn->error)
      echo "<h1>error</h1>";
    $answerquery="select `answer` from `questions` where `question_id`='".$qid."'";
    $queryres=$conn->query($answerquery);
    $answerarr=$queryres->fetch_assoc();
    $ans=$answerarr['answer'];
    if($ans===$answer)
      $correctcount++;  
      $i++;             
  }
  $query="insert into `ulb_quiz` values('$uid',$quizid',$correctcount,$totalcount)";
  $conn->query($query);

  //echo "<h1>total marks=".$correctcount."/".$totalcount."<h1>"; ?> 
  <div class="container-fluid d-inline-flex p-2">
    <div id="accordion" role="tablist">

      <div class="card quiz">
          <div class="card-header alert alert-primary" role="tab" id="headingOne">                  
              <strong>Well done!</strong> Quiz submitted succesfully.                   
          </div>
          <div class="card-body">                            
                You scored <strong><?php echo $correctcount."/".$totalcount; ?></strong>
          </div>
      </div>
      
    </div>
</div>


          
           
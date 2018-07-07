/*
QUIZ_CONNECTIONS MODULE
*/
<?php 
	class Quiz{
		private $quiz_id;
		private $sub_topic_id;
		private $question;
		function addQuestion(){

		}
		function addQuiz(){

		}
		function 

	}
	class QuizConnection{
		function getConnection(){
			$conn=new mysqli("localhost","root","MadhuMysql");
				if($conn->connect_error){
					header("location:db_error.php");
				}
				else{
					$conn->select_db("sih_db");
					return $conn;
				}		

		}
		
		function addQuiz(){

		}
		function getQuizId(){

		}
		function addQuestion(){


		}


	}
?>
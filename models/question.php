<?php 
	class Question{
		private $question;
		private $option1;
		private $option2;
		private $option3;
		private $option4;
		private $answer;
		private $explanation;
		function setQuestion($question){
			$this->question=$question;
		}
		function setOption1($option1){
			$this->option1=$option1;
		}
		function setOption2($option2){
			$this->option2=$option2;
		}
		function setOption3($option3){
			$this->option3=$option3;
		}
		function setOption4($option4){
			$this->option4=$option4;
		}
		function setAnswer($answer){
			$this->answer=$answer;
		}
		function setExplanation($explanation){
			$this->explanation=$explanation;
		}

		function getQuestion(){
			return $this->question;
		}
		function getOption1(){
			return $this->option1;
		}
		function getOption2(){
			return $this->option2;
		}
		function getOption3(){
			return $this->option3;
		}
		function getOption4(){
			return $this->option4;
		}
		function getAnswer(){
			return $this->answer;
		}
		function getExplanation(){
			return $this->explanation;
		}

	}
?>
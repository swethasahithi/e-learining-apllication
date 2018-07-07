<?php session_start();?>
<a href="<?php echo $_SERVER['HTTP_REFERER'];?>">back</a>
<?php 
	$content=$_POST['texteditor'];
	$_SESSION['content']=$content;
	echo $content;
?>
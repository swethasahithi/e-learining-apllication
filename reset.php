<?php include_once "./models/getting.php";?>
<html>
	<body>
		<?php if(!isset($_REQUEST['ref'])){ ?>
			<form action="reset.php" method="post">
			<input type="hidden" name="uid" value="<?php echo $_REQUEST['uid']; ?>"/>
			<input type="hidden" name="ref" value="reset"/>
			new Password:<input type="textfield" name="pwd" />
			<input type="submit" value="reset"/>
		</form>

		<?php }else{
			$conn=getConnection();
			$conn->query("update `ulb` set `ulb_password`='".$_POST['pwd']."'where `uid`=".$_POST['uid']);
			echo "updated successfully";?>
			<a href="ulblogin.php">login</a>
	<?php }?>

	</body>
</html>
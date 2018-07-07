<?php
	require("./models/UlbConnection.php");
	$obj=new UlbConnection("sih_db");
	$conn=$obj->getConnection();
	$result=$conn->query("select * from `links`");
	while($row=$result->fetch_assoc()){
		echo "<a href='".$row['link']."'><h1>".$row['link']."</h1></a>";
	}
?>
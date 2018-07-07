<?php require 'vendor/autoload.php';
	include_once "./models/getting.php";
	// contains a variable called: $API_KEY that is the API Key.
	// You need this API_KEY created on the Sendgrid website.
	$API_KEY="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";
	
	$FROM_EMAIL ='madhukarpateld@gamil.com';
	// they dont like when it comes from @gmail, prefers business emails
	$TO_EMAIL = $_REQUEST['email'];
	// Try to be nice. Take a look at the anti spam laws. In most cases, you must
	// have an unsubscribe. You also cannot be misleading.
	$subject = "it is fun";
	$from = new SendGrid\Email(null, $FROM_EMAIL);
	$to = new SendGrid\Email(null, $TO_EMAIL);
	$conn=getConnection();
	$temp=$conn->query("select `uid` from `ulb` where `ulb_mail`='".$_REQUEST['email']."'");
	$conn->error;
	if($temp->num_rows>0 && $result=$temp->fetch_assoc()){

	$htmlContent = "Dear User, You can reset your password with the following link ...<a href='localhost/project/reset.php?uid=".$result['uid']."'>click</a>";
	// Create Sendgrid content
	$content = new SendGrid\Content("text/html",$htmlContent);
	// Create a mail object
	$mail = new SendGrid\Mail($from, $subject, $to, $content);
	
	$sg = new \SendGrid($API_KEY);
	$response = $sg->client->mail()->send()->post($mail);
			
	if ($response->statusCode() == 202) {
		// Successfully sent
		echo 'done...mail sent Successfully';
	} else {
		echo 'false';
	}
	}
	else{
		echo "invalid mail";
	}
?>
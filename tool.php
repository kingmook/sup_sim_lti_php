<?php
//Super Basic LTI Provider in PHP
//Based on Dr .Chuck Severance's PHP providers examples (http://www.dr-chuck.com/csev-blog/)

//Make sure you include the LTI library (http://developers.imsglobal.org/imsphpexample.zip)
require_once 'ims-blti/blti.php';

//The LTI credentials as we know them
$lti_auth = array('key' => 'key', 'secret' => 'secret');

//Build the LTI object with the credentials as we know them
$context = new BLTI($lti_auth['secret'], false, false);

//Check if the correct key is being sent
if ($context->info['oauth_consumer_key'] == $lti_auth['key']){

	//Make sure our LTI object's OAuth connection is valid
	if ($context->valid ){
		echo 'Valid LTI Connection. Output passed data:';
		//Print out the passed data
		echo '<pre>',print_r($context->info),'</pre>';
	}
	//We already checked the key so it's likely the user is using the wrong secret to generate their OAuth object
	else{ 
		echo "Bad OAuth. Probably sent the wrong secret";
	}
}
	//Wrong key
else{
	echo "Wrong key passed";
}
?>



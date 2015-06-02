<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '734534020001859',
		'secret' => '20ef0ce8530676f9b1a73b85c67b8352'
	));

	setcookie('fbs_'.$facebook->getAppId(),'', time()-100, '/', 'https://www.swiftdeals.in/adsforads');
	session_destroy();
	header('Location: index.php');
?>

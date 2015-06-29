<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '734534020001859',
		'secret' => '20ef0ce8530676f9b1a73b85c67b8352'
	));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Facebook PHP</title>
</head>
<body>
<?
	$user = $facebook->getUser();
	if ($user): 
		$a = 0;
		$user_graph = $facebook->api('/me');
		$user_graph_page = $facebook->api('me?fields=groups.limit(500)');
		echo '<h1>Hello ',$user_graph['first_name'],'</h1>';
		echo '<p>Your birthday is: ',$user_graph['birthday'],'</p>';
		echo '<p>Your User ID is: ', $user, '</p>';
		if ($user_graph_page['groups']):
			echo '<h2>Facebook groups</h2>';
			echo '<form action="members.php" method="post">';
			foreach ($user_graph_page['groups']['data'] as $key => $value) {
				echo $a;
				echo '<input type="checkbox" name="group[]" value="'.$value['id'].'" />  Name : ',$value['name'],', Group Id :'.$value['id'].'.</br>';
				$a++;
			}
			echo '<input type="submit" value="fetch  members"></br>';
			echo '</form>';
		
		endif;
		echo '<p><a href="logout.php">logout</a></p>';
	    else: 
		$loginUrl = $facebook->getLoginUrl(array(
			'diplay'=>'popup',
			'scope'=>'email, user_about_me, user_birthday, user_managed_groups, user_groups',
			'redirect_uri' => 'http://apps.facebook.com/groupmemberfb'
		));
		echo '<p><a href="', $loginUrl, '" target="_top">login</a></p>';
	endif; 
?>
</body>
</html>

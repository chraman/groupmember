<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '734534020001859',
		'secret' => '20ef0ce8530676f9b1a73b85c67b8352'
	));
	$user = $facebook->getUser();
?>
<?php
	$agroup = $_POST['group'];
	if(!empty($agroup)){
		
		
		$gp_id = $agroup[0];
		$user_graph_member = $facebook->api('{$gp_id}/members');
		
			foreach ($user_graph_member['data'] as $key => $value) {
				echo 'Name : ',$value['name'],', User Id :'.$value['id'].'.</br>';
			}
	}
		
	else{
	    echo 'YOU MUST SELECT A PAGE.';
		die();
	} 
?>
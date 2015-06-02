<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '734534020001859',
		'secret' => '20ef0ce8530676f9b1a73b85c67b8352'
	));
	$user = $facebook->getUser();
?>
<?php
	echo 'first';
	$agroup = $_POST['group'];
		
		echo 'second';
		$gp_id = $agroup;
		echo 'third';
		echo $gp_id;
		echo 'fourth';
		$user_graph_member = $facebook->api('{$gp_id}/members');
		echo 'sixth;
			foreach ($user_graph_member['data'] as $key => $value) {
				echo 'Name : ',$value['name'],', User Id :'.$value['id'].'.</br>';
			}
			echo 'fifth';
?>
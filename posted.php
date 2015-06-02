<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '723871087684016',
		'secret' => 'd2c968dbddfa3089eb410739346a83cb'
	));
	$user = $facebook->getUser();
?>
<?php
	$agroup = $_POST['group'];
	if(!empty($apage)){
			$num=count($apage);
			for($i=0; $i<$num; $i++)
			{
				$post_api = '/'.$apage[$i].'/feed';
				$user_graph_member = $facebook->api('/'.$gp_id.'/members');
				if($user){
					try{
						foreach ($user_graph_member['data'] as $key => $value) {
							echo 'Name : ',$value['name'],', User Id :'.$value['id'].'.</br>';
						}
					}
					catch(FacebookApiExceptio $e){
					echo $e->getMessage();
					}
				}
				else{
					echo "No User";
				}
			}
	}
	else{
	    echo 'YOU MUST SELECT A group.';
		die();
	} 
?>
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
			$num=count($agroup);
			for($i=0; $i<$num; $i++)
			{
				$user_graph_member = $facebook->api('/'.$agroup[$i].'/members');
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
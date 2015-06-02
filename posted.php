<?php
	require 'php-sdk/facebook.php';
	$facebook = new Facebook(array(
		'appId'  => '723871087684016',
		'secret' => 'd2c968dbddfa3089eb410739346a83cb'
	));
	$user = $facebook->getUser();
?>
<?php
	$apage = $_POST['page'];
	if(!empty($apage)){
		if(!empty($_POST['message'])||!empty($_POST['link'])){
			$num=count($apage);
			for($i=0; $i<$num; $i++)
			{
				$post_url = '/'.$apage[$i].'/feed';
				/*echo $_POST['mins'];
				echo '</br>';*/
				$timepost = (($_POST['days']*24*60*60)+($_POST['hours']*60*60)+($_POST['mins']*60));
				$time =time();
				$scheduled = $time + $timepost;
				/*echo $timepost;
				echo '</br>';
				echo $time;
				echo '</br>';
				echo $scheduled;*/ 
				$msg_body = array(
				'message' => $_POST['message'],
				'link'    => $_POST['link'],
				//'published' => "0",
 				//'scheduled_publish_time'  => $scheduled
				);
				if($user){
					try{
						$postResult = $facebook->api($post_url, 'post' , $msg_body);
					}
					catch(FacebookApiExceptio $e){
					echo $e->getMessage();
					}
				}
				else{
					echo "No User";
				}
				if($postResult)
				{
					echo 'posted on Page With Page Id : '.$apage[$i].'. </br>';
				}
				else{
					echo 'Sorry Something Went Wrong. Could not post at this time on page with Id'.$apage[$i].'</br>';
				}
			}
	}
		else{
			echo 'YOU ARE REQUIRED TO FILL MESSAGE OR LINK TO BE POSTED.';
		}
	}
	else{
	    echo 'YOU MUST SELECT A PAGE.';
		die();
	} 
?>
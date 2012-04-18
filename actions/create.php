<?php
	/**
	* ElggChat - Pure Elgg-based chat/IM
	* 
	* Action to create a chat session with specified user
	* 
	* @package elggchat
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	* @version 0.4
	*/

	gatekeeper();
	
	$inviteId = (int) get_input("invite");
	
	if(($invite_user = get_user($inviteId)) && $inviteId != get_loggedin_userid()){
		$user = get_loggedin_user();
		
		$session = new ElggObject();
		$session->subtype = ELGGCHAT_SESSION_SUBTYPE;
		$session->access_id = ACCESS_LOGGED_IN;
		$session->save();
		
		$session->addRelationship($user->guid, ELGGCHAT_MEMBER);
		$session->addRelationship($invite_user->guid, ELGGCHAT_MEMBER);
		
		echo $session->guid;
	}
	
	exit();
?>


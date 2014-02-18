<?php
	include "account_security_tablegateway.php";
	if (isset($_POST['submit']))
	{
		$account = new account_security();  
		$data = array ('username' => $_POST['username'], 'password' => $_POST['password']); 
		$account->exchangeArray($data);	
		$account_db = new account_security_tablegateway();
		$account_db->insert(); 
	}
?>
<?php
include "account_security.php";
include "db.php";
class account_security_tablegateway{
	
	function select($where) {
		$account_security = new account_security(); 
		$sql = "SELECT * FROM account_security WHERE " + $where;
		$db = new db(); 
		$account_security->exchangeArray($db->runQuery($sql)); 
		return $account_security; 
	}

	function select_by_id($id) {
		return select("uid = " + $id);
	}

	function insert($account_security) {
		$sql = "INSERT INTO account_security ('uid', 'username', 'password', 'security_question', 'answer', 'verified_account') 
			    VALUES('"+$account_security->getUid()+"','"+$account_security->getUsername()+"','"+$account_security->getPassword()
			    +"','"+$account_security->getSecurity_question()+"','"+$account_security->getAnswer()+"','"+$account_security->getVerified_account()+"')";
		
		$db->runQuery($sql); 
	}

	function update($value) {
		$sql = "UPDATE account_security SET 'uid'="+$account_security->getUid()+",'username'='"+$account_security->getUsername()
				+"','password'='"+$account_security->getPassword()+"','security_question'='"+$account_security->getSecurity_question()
				+"','answer'='"+$account_security->getAnswer()+"','verified_account'='"+$account_security->getVerified_account()
				+"' where 'uid'="+$account_security->getUid();
		$db = new db();
		$db->runQuery($sql);
	}

	function delete($id) {
		$sql= "DELETE from account_securty where uid="+$id;
		$db = new db();
		$db->runQuery($sql);
	}
}
?>
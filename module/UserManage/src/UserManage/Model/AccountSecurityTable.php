<?php
namespace UserManage\src\UserManage\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Crypt\Password\Bcrypt;

class AccountSecurityTable
{
	// 
	private $authAdapter; 
	
	function __construct(){
		
		$authAdapter = new Zend_Auth_Adapter_DbTable(
		    $dbAdapter,
		    'users',		// 	table_name
		    'username',		//  username column
		    'password'     //	credential column
		);
		
	}
    
    public function validateUser($username,$password)
    {
    	
		$crypt = new Bcrypt(); 
		$securePass = $crypt->create($password); 
		$authAdapter -> setIdentity($username)
					 -> setCredential($securePass); 
		$auth = $authAdapter -> authenticate(); 
    	return $auth -> isValid(); ;
    }
	
	public function insertUsernamePassword($username, $password)
    {
    	$crypt = new Bcrypt();
		$securePass = $crypt->create($password); 
		$data = array('username' => $username, 'password' => $securePass); 
    	$rowset = $this->tableGateway->insert($data);
    	$row = $rowset->current();
    	if (!$row) {
    		throw new \Exception("Could not insert user " + $password);
    	}
    	return ;
    }
	
	public function updateUsernamePassword($username, $new_password, $old_password)
	{
		if (validateUser($username,$old_password)){
			$crypt = new Bcrypt(); 
			$securePass = $crypt->create($new_password);
			$data = array('username' => $username, 'password' => $securePass); 
			$rowset = $this->tableGateway->insert($data);
	    	$row = $rowset->current();
	    	if (!$row) {
	    		throw new \Exception("Could not update user " + $password);
	    	}
		}
	    return ;
	}
	
}

?>
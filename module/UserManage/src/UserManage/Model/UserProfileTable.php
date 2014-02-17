<?php
namespace UserManage\Model;

use Zend\Db\TableGateway\TableGateway;

class UserProfileTable
{

    protected $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
    	$this->tableGateway = $tableGateway;
    }
    public function fetchAll()
    {
    	$resultSet = $this->tableGateway->select();
    	return $resultSet;
    }
    
    public function getUserProfile($uid)
    {
    	$uid  = (int) $uid;
    	$rowset = $this->tableGateway->select(array('uid' => $uid));
    	$row = $rowset->current();
    	if (!$row) {
    		throw new \Exception("Could not find row $uid");
    	}
    	return $row;
    }
    
    public function saveUserProfile(UserProfile $userProfile)
    {
    	$data = array(
    			'display_name' => $userProfile->getDisplay_name(),
    			'actual_name'  => $userProfile->getActual_name(),
    			'birthdate'  => $userProfile->getBirthdate(),
    			'gender'  => $userProfile->getGender(),
    			'last_active'  => $userProfile->getLast_active(),
    			'phone_number'  => $userProfile->getPhone_number(),
    			'school'  => $userProfile->getSchool(),
    			'user_img_url'  => $userProfile->getUser_img_url(),
    			'interests'  => $userProfile->getInterests()
    	);
    
    	$uid = (int)$userProfile->uid;
    	if ($uid == 0) {
    		$this->tableGateway->insert($userProfile);
    	} else {
    		if ($this->getAlbum($uid)) {
    			$this->tableGateway->update($data, array('uid' => $uid));
    		} else {
    			throw new \Exception('Form uid does not exist');
    		}
    	}
    }
    
    public function deleteUserProfile($uid)
    {
    	$this->tableGateway->delete(array('uid' => $uid));
    }
}

?>
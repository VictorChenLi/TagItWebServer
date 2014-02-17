<?php
namespace UserManage\src\UserManage\Model;

use Zend\Db\TableGateway\TableGateway;

class UserProfileTable
{
    protected $tableGateway;
    
    function __construct()
    {}
    
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
    
    public function saveAlbum(Album $album)
    {
    	$data = array(
    			'artist' => $album->artist,
    			'title'  => $album->title,
    	);
    
    	$uid = (int)$album->uid;
    	if ($uid == 0) {
    		$this->tableGateway->insert($data);
    	} else {
    		if ($this->getAlbum($uid)) {
    			$this->tableGateway->update($data, array('uid' => $uid));
    		} else {
    			throw new \Exception('Form uid does not exist');
    		}
    	}
    }
    
    public function deleteAlbum($uid)
    {
    	$this->tableGateway->delete(array('uid' => $uid));
    }
}

?>
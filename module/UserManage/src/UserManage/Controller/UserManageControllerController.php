<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/UserManage for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace UserManage\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UserManageControllerController extends AbstractActionController
{
    protected $userProfileTable;
    
    public function indexAction()
    {
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /userManageController/user-manage-controller/foo
        return array();
    }
    
    public function getUserProfileTable()
    {
    	if (!$this->userProfileTable) {
    		$sm = $this->getServiceLocator();
    		$this->userProfileTable= $sm->get('UserManage/Model/UserProfileTable');
    	}
    	return $this->userProfileTable;
    }
    
}

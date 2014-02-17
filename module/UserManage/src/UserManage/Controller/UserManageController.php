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
use Zend\View\Model\ViewModel;
use UserManage\Model\UserProfile;

class UserManageController extends AbstractActionController
{
    protected $userProfileTable;
    
    public function indexAction()
    {
		return new ViewModel(array(
            'userprofiles' => $this->getUserProfileTable()->fetchAll(),
        ));

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
    
//     public function addAction()
//     {
//     	$form = new AlbumForm();
//     	$form->get('submit')->setValue('Add');
    
//     	$request = $this->getRequest();
//     	if ($request->isPost()) {
//     		$album = new Album();
//     		$form->setInputFilter($album->getInputFilter());
//     		$form->setData($request->getPost());
    
//     		if ($form->isValid()) {
//     			$album->exchangeArray($form->getData());
//     			$this->getAlbumTable()->saveAlbum($album);
    
//     			// Redirect to list of albums
//     			return $this->redirect()->toRoute('album');
//     		}
//     	}
//     	return array('form' => $form);
//     }

    
    
}

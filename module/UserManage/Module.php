<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/UserManage for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace UserManage;

use UserManage\Model\UserProfile;
use UserManage\Model\UserProfileTable;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
    {
    	return array(
    			'factories' => array(
    					'UserManage\Model\UserProfileTable' =>  function($sm) {
    						$tableGateway = $sm->get('UserProfileTableGateway');
    						$table = new UserProfileTable($tableGateway);
    						return $table;
    					},
    					'UserProfileTableGateway' => function ($sm) {
    						$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new UserProfile());
    						return new TableGateway('profile', $dbAdapter, null, $resultSetPrototype);
    					},
    					'UserManage\Model\AccountSecurityTable' =>  function($sm1) {
    						$tableGateway = $sm1->get('AccountSecurityTableGateway');
    						$table = new AccountSecurityTable($tableGateway);
    						return $table;
    					},
    					'AccountSecurityTableGateway' => function ($sm1) {
    						$dbAdapter = $sm1->get('Zend\Db\Adapter\Adapter');
    						$resultSetPrototype = new ResultSet();
    						$resultSetPrototype->setArrayObjectPrototype(new AccountSecurity());
    						return new TableGateway('Account', $dbAdapter, null, $resultSetPrototype);
    					},
    			),
    	);
    }
    

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
}

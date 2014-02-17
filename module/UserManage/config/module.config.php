<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'UserManage\Controller\UserManage' => 'UserManage\Controller\UserManageController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'userprofile' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/userprofile[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'UserManage\Controller\UserManage',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'userprofile' => __DIR__ . '/../view',
        ),
    ),
);

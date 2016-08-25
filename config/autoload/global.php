<?php

return array(
    'db' => array(
        'driver'    => 'Pdo',
        'dsn'       => 'mysql:dbname=unity;host=localhost',
        'username'  => 'root',
        'password'  => '',
        'driver_options' => array(
            'PDO::MYSQL_ATTR_INIT_COMMAND' => 'SET NAMES \'UTF8\''
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter'
                    => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'module_layouts' => array(
        'Application' => 'layout/layout.phtml',
        'Social' => 'layout/social.phtml',
    ),
);

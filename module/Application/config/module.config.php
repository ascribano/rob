<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

return array(
    'router' => array(
        'routes' => array(

            'index' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'virtualoffices' => array(
			   	'type' => 'Zend\Mvc\Router\Http\Literal',
			   	'options' => array(
				    'route'    => '/virtualoffices',
				    'defaults' => array(
				        'controller' => 'Application/Controller/Virtualoffices',
				        'action'     => 'index',
			      	),
				),
			),

             'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/home',
                    'defaults' => array(
                        'controller' => 'Application/Controller/Home',
                        'action'     => 'index',
                    ),
                ),

            ),

            'contactus' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/contactus',
                    'defaults' => array(
                        'controller' => 'Application/Controller/Contactus',
                        'action'     => 'index',
                    ),
                ),

            ),

            'servicesoffices' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/servicesoffices',
                    'defaults' => array(
                        'controller' => 'Application/Controller/Servicesoffices',
                        'action'     => 'index',
                    ),
                ),
            ),

            'getinvoled' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/getinvoled',
                    'defaults' => array(
                        'controller' => 'Application/Controller/getinvoled',
                        'action'     => 'index',
                    ),
                ),

            ),

            'dayoffice' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/dayoffice',
                    'defaults' => array(
                        'controller' => 'Application/Controller/dayoffice',
                        'action'     => 'index',
                    ),
                ),
            ),

            'getinvolved' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/getinvolved',
                    'defaults' => array(
                        'controller' => 'Application/Controller/Getinvolved',
                        'action'     => 'index',
                    ),
                ),

            ),

            'randwick' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/randwick',
                    'defaults' => array(
                        'controller' => 'Application/Controller/Randwick',
                        'action'     => 'index',
                    ),
                ),

            ),

            'login' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/login',
                    'defaults' => array(
                        'controller' => 'Application/Controller/Login',
                        'action'     => 'index',
                    ),
                ),
                
                'may_terminate' => true,
                'child_routes' => array(

                    // Profile
                    'logout' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/logout',
                            'defaults' => array(
                                'controller' => 'Application/Controller/Login',
                                'action' => 'logout'
                            )
                        ),
                    ),

                ),

            ), 


            // The following is a route to simplify getting started creating
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            // new controllers and actions without needing to create a new

            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),


        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),  
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index'          => Controller\IndexController::class,
            'Application\Controller\Contactus'       => Controller\ContactusController::class,
            'Application\Controller\Getinvolved'       => Controller\GetinvolvedController::class,
            'Application\Controller\Servicesoffices'       => Controller\ServicesofficesController::class,
            'Application\Controller\Dayoffice'       => Controller\DayofficeController::class,
            'Application\Controller\Randwick'       => Controller\RandwickController::class,
            'Application\Controller\Virtualoffices'       => Controller\VirtualofficesController::class,
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        	'layout/layout2'           => __DIR__ . '/../view/layout/layout2.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'doctrine' => array(
        'driver' => array(
          __NAMESPACE__ . '_driver' => array(
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
          ),
          'orm_default' => array(
            'drivers' => array(
              __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
            )
          )
        )
      ),

    'strategies' => array(
        'ViewJsonStrategy',
    ),

    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);
<?php defined('FRTCFTYU') or die('No direct script access.');

return array (
    
    'mysql' => array(
        'db_1' => array(
            'driver' => 'PDO_MYSQL',
            'DEVELOPMENT' => array (
                                    'host'      => 'localhost',
                                    'database'  => 'db_1',
                                    'username'  => 'root',
                                    'password'  => 'SYSADM',
                                ),
            'PRODUCTION' => array (
                                    'host'      => 'localhost',
                                    'database'  => 'x-files',
                                    'username'  => 'root',
                                    'password'  => 'SYSADM',
                                )
        ),
        'db_2' => array(
            'driver' => 'PDO_MYSQL',
            'DEVELOPMENT' => array (
                                    'host'      => 'localhost',
                                    'database'  => 'db_2',
                                    'username'  => 'root',
                                    'password'  => 'SYSADM',
                                ),
            'PRODUCTION' => array (
                                    'host'      => 'localhost',
                                    'database'  => 'test',
                                    'username'  => 'root',
                                    'password'  => 'SYSADM',
                                )
        )
        
    ),
    'redis' => array(
        'host' => 'localhost',
        'port' => 6379
    )
    

);
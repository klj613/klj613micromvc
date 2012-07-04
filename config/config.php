<?php
    /**
     * This file is part of klj613's micro MVC framework made out of boredom.
     * 
     * (c) Kristian Lewis Jones <klj613@kristianlewisjones.com>
     * 
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    $config['loader'] = array(
        __DIR__ . '/../class',
        __DIR__ . '/../controller',
        __DIR__ . '/../model'
    );
    
    $config['routing'] = array(
        'profile' => array(
            'profile/{userId}/{user}',
            array('Main', 'profile')
        ),
        'home' => array(
            'home.html',
            array('Main', 'home')
        ),
        'hello-world' => array(
            'hello-{name}.html',
            array('Main', 'helloworld')
        )
    );
    
    $config['renderer'] = array(
        'path' => __DIR__ . '/../view'
    );
?>
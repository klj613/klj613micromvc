<?php
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
<?php

return [
	'registration' => [
		'controller' => 'main',
		'action' => 'registr',
		'db' => true,
	],
	'avtorization' => [
		'controller' => 'main',
		'action' => 'avtorization',
		'db' => true
	],
	'' => [
		'controller' => 'wether',
		'action' => 'show_wether',
	],
	'feadback' => [
		'controller' => 'feadback',
		'action' => 'write_feadback',
	],
	'logout' => [
		'controller' => 'main',
		'action' => 'logout',
	],
	'show_feadbacks' => [
		'controller' => 'feadback',
		'action' => 'show_feedbacks',
	]
];
<?php
/**
 * The production database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection' => array(
			'dsn' => 'mysql:host=rds-tantanmen.crc6ndro8wca.ap-northeast-1.rds.amazonaws.com;dbname=ttmdb',
			'username' => 'root',
			'password' => 'ylin19920518',
		),
		'profiling' => true,
	),
);

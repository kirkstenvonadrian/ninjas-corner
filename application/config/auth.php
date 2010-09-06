<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'driver'         => 'Jelly',    // driver use
	'hash_method'    => 'sha1',     // password hashing
	'salt_pattern'   => '1, 3, 5, 9, 14, 21, 28, 30, 31, 34', //pattern - should be ascending order
	'lifetime'       => 3600, // 1 hour
	'session_key'    => 'ninjas_corner',    //session name
);

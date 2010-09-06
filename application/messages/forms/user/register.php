<?php defined('SYSPATH') or die('No direct script access.');

return array
(

	'username' => array
	(
		'regex'         => 'Your username does not match the required format.',
		'unique'        => 'Your username already exists.',
		'not_empty'     => 'Your username cannot be blank.',
		'min_length'    => 'Your username must be at least :param1 characters long.',
		'max_length'    => 'Your username must be less than :param1 characters long.',

		'default'       => 'There was an unknown error with your username.',
	),

	'email' => array
	(
		'email'         => 'Your email address is invalid.',
		'unique'        => 'Your email address already exists.',

		'default'       => 'There was an unknown error with your email address.',
	),

	'password' => array
	(
		'not_empty'     => 'Your password cannot be blank.',
		'min_length'    => 'Your password must be at least :param1 characters long.',
		'max_length'    => 'Your password must be less than :param1 characters long.',

		'default'       => 'There was an unknown error with your password.',
	),

	'password_confirm' => array
	(
		'not_empty'     => 'Your password confirmation cannot be blank.',
		'min_length'    => 'Your password confirmation must be at least :param1 characters long.',
		'max_length'    => 'Your password confirmation must be less than :param1 characters long.',
		'matches'       => 'Your password confirmation does not match your password.',

		'default'       => 'There was an unknown error with your password confirmation.',
	),

);

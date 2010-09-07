<?php defined('SYSPATH') or die('No direct script access.');

return array
(
    'username' => array
    (
            'regex'         => 'Your username does not match the required format.',
            'unique'        => 'Username already exists.',
            'not_empty'     => 'Username cannot be blank.',
            'min_length'    => 'Your username must be at least :param1 characters long.',
            'max_length'    => 'Your username must be less than :param1 characters long.',

            'default'       => 'There was an unknown error with your username.',
    ),

    'email' => array
    (
            'email'         => 'Email address is invalid.',
            'unique'        => 'Email address already exists.',

            'default'       => 'There was an unknown error with your email address.',
    ),

    'password' => array
    (
            'not_empty'     => 'Your password cannot be blank.',
            'min_length'    => 'Password must be at least :param1 characters long.',
            'max_length'    => 'Password must be less than :param1 characters long.',

            'default'       => 'There was an unknown error with your password.',
    ),

    'password_confirm' => array
    (
            'not_empty'     => 'Password confirmation cannot be blank.',
            'min_length'    => 'Password confirmation must be at least :param1 characters long.',
            'max_length'    => 'Password confirmation must be less than :param1 characters long.',
            'matches'       => 'Password confirmation does not match your password.',

            'default'       => 'There was an unknown error with your password confirmation.',
    ),

    // Employer Registration Messages
    'company' => array
    (
            'not_empty'     => 'Business name cannot be blank.',
            'default'       => 'There was an unknown error with your username.',
    ),

);

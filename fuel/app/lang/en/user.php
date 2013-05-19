<?php

return array(
	'breadcrumb' => array(
		'users'    => 'Users',
		'login'    => 'Sing in',
		'register' => 'Sign up',
		'reset'    => 'Reset password',
		'profile'  => 'Profile',
		'account'  => 'Account',
		'recovery' => 'Recovery password',
	),

	'index' => array(
		'member_list' => 'Member List',
	),

	'view' => array(
		'title'         => 'Profile: :user',
		'not_find'      => 'Could not find user ID: :id',
		'not_activated' => 'Account not activated!',
		'created_at'    => 'Date created',
		'last_login'    => 'Last login',
		'groups'        => 'Groups',
		'email'         => 'Email',
	),

	'login' => array(
		'title'             => 'Login',
		'authorization'     => 'Authorization',
		'username_or_email' => 'Username or email',
		'password'          => 'Password',
		'remember_me'       => 'Remember me',
		'sign_in'           => 'Sign in',
		'success'           => 'You have successfully logged in',
		'required_login'    => 'Login field is required.',
		'required_password' => 'Password field is required.',
		'not_found'         => 'User was not found.',
		'activated'         => 'User is not activated.',
		'suspended'         => 'User is suspended.',
		'banned'            => 'User is banned.',
		'forgot'            => 'Forgot your password?',
	),

	'register' => array(
		'title'            => 'Registration',
		'registration'     => 'Register online',
		'username'         => 'Username',
		'password'         => 'Password',
		'confirm_password' => 'Confirm password',
		'email'            => 'Email',
		'create_account'   => 'Create my account',
		'success'          => 'User successfully created!',
		'captcha'          => 'Did not match the check number in the picture',
		'exists'           => 'User with this login already exists.',
		'required_login'   => 'Login field is required.',
		'subject'          => 'Confirmation of registration',
		'body'             => 'Hello :name!'.PHP_EOL.'To confirm your registration please click on the following link:'.PHP_EOL.':url',
		'captcha_key'      => 'Protected сode',
	),

	'logout' => array(
		'exit' => 'You have successfully entered',
	),

	'activation' => array(
		'title'     => 'Account activation',
		'activated' => 'User is already activated.',
		'required'  => 'Login field is required.',
		'not_found' => 'User was not found',
		'suspended' => 'User is suspended for :time minutes.',
		'banned'    => 'User is banned.',
		'failed'    => 'User activation failed',
		'passed'    => 'User activation passed',
		'enter'     => 'Enter the activation code',
		'key'       => 'Activation key',
		'submit'    => 'Activate',
	),

	'account' => array(
		'denied'         => 'Access denied',
		'settings'       => 'Settings',
		'password_error' => 'Password does not match',
		'not_updated'    => 'User information was not updated',
		'updated'        => 'User information was updated',
		'login'          => 'Login',
		'email'          => 'Email',
		'password'       => 'Password',
		'save'           => 'Save',
	),

	'recovery' => array(
		'title'   => 'Password reset',
		'invalid' => 'Invalid password reset code',
		'failed'  => 'Password reset failed',
		'success' => 'You have successfully completed the password recovery procedure, your new password: :password',
		'enter'   => 'Enter a password reset code',
		'key'     => 'Reset code',
		'submit'  => 'Reset',
	),

	'reset' => array(
		'title'   => 'Forgot your password?',
		'error'   => 'Email is not found in the database',
		'success' => 'In your email address sent instructions to reset your password',
		'subject' => 'Password recovery',
		'body'    => 'Hello,: name!'. PHP_EOL.'Your operation was performed to recover password on the site: :site'.PHP_EOL.'In order to recover your password, you must enter the activation code on the page: :url'. PHP_EOL.PHP_EOL.'Code activation: :code'.PHP_EOL.PHP_EOL.'or use the direct link: :url_with_code '.PHP_EOL.PHP_EOL.'If this letter was delivered to you in error or you are not going to recover your password, you can just ignore it',
		'enter'   => 'Enter your email address',
		'email'   => 'Email',
		'submit'  => 'Send',
	),

);

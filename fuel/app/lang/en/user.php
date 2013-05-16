<?php

return array(
    'breadcrumb' => array(
        'users'    => 'Users',
        'login'    => 'Sing in',
        'register' => 'Sign up',
        'reset'    => 'Reset password',
        'profile'  => 'Profile',
    ),

    'index'      => array(
        'member_list' => 'Member List',
    ),

    'view'       => array(
        'title' => 'Profile: :user',
        'not_find' => 'Could not find user ID: :id',
        'created_at' => 'Date created',
        'last_login' => 'Last login',
        'groups' => 'Groups',
    ),

    'login'      => array(
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

    'register'   => array(
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
        'body'             =>
        'Hello :user!' . PHP_EOL . ' To confirm your registration please click on the following link:' . PHP_EOL
            . ' :url',
        'captcha_key'      => 'Protected kode',
    ),

    'logout'     => array(
        'exit' => 'You have successfully entered',
    ),

    'activation' => array(
        'title'     => 'Account activation',
        'activated' => 'User is already activated.',
        'not_found' => 'User was not found',
        'failed'    => 'User activation failed',
        'passed'    => 'User activation passed',
        'enter'     => 'Enter the activation code',
        'key'       => 'Activation key',
        'submit'    => 'Activate',
    ),

    'account'    => array(
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

    'recovery'   => array(
        'title'   => 'Password reset',
        'invalid' => 'Invalid password reset code',
        'failed'  => 'Password reset failed',
        'success' => 'You have successfully completed the password recovery procedure, your new password: :password',
        'enter'   => 'Enter a password reset code',
        'key'     => 'Reset code',
        'submit'  => 'Reset',
    ),

    'reset'      => array(
        'title'   => 'Forgot your password?',
        'error'   => 'E-mail is not found in the database',
        'success' => 'In your e-mail address sent instructions to reset your password',
        'subject' => 'Password recovery',
        'body'    =>
        'Hello :user!' . PHP_EOL . ' To recover your password, please click on the following link:' . PHP_EOL . ' :url',
        'enter'   => 'Enter your e-mail address',
        'email'   => 'E-Mail',
        'submit'  => 'Send',
    ),

);

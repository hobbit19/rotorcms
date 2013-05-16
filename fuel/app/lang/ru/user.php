<?php

return array(
    'breadcrumb' => array(
        'users'    => 'Пользователи',
        'login'    => 'Авторизация',
        'register' => 'Регистрация',
        'reset'    => 'Восстановление пароля',
        'profile'  => 'Профиль',
    ),

    'index'      => array(
        'member_list' => 'Список пользователей',
    ),

    'view'       => array(
        'title' => 'Профиль: :user',
        'not_find' => 'Не удалось найти пользователя с ID: :id',
        'created_at' => 'Дата регистрации',
        'last_login' => 'Последняя авторизация',
        'groups' => 'Список груп',
        'email' => 'E-Mail',
    ),

    'login'      => array(
        'title'             => 'Вход',
        'authorization'     => 'Авторизация на сайте',
        'username_or_email' => 'Логин или email',
        'password'          => 'Пароль',
        'remember_me'       => 'Запомнить меня',
        'sign_in'           => 'Авторизация',
        'success'           => 'Вы успешно авторизованы!',
        'required_login'    => 'Введите логин.',
        'required_password' => 'Введите пароль.',
        'not_found'         => 'Пользователь не найден.',
        'activated'         => 'Аккаунт не активирован.',
        'suspended'         => 'Аккаунт приостановлен',
        'banned'            => 'Аккаунт забанен',
        'forgot'            => 'Забыли пароль?',
    ),

    'register'   => array(
        'title'            => 'Регистрация',
        'registration'     => 'Регистрация на сайте',
        'username'         => 'Логин',
        'password'         => 'Пароль',
        'confirm_password' => 'Повтор пароля',
        'email'            => 'Email',
        'create_account'   => 'Создать аккаунт',
        'success'          => 'Пользователь успешно создан!',
        'captcha'          => 'Не совпало проверочное число на картинке!',
        'exists'           => 'Пользователь с таким логином уже существует.',
        'required_login'   => 'Введите логин.',
        'subject'          => 'Подтверждение регистрации',
        'body'             =>
        'Здравствуйте! :user!' . PHP_EOL . ' Для продолжения регистрации перейдите по ссылке:' . PHP_EOL
            . ' :url',
        'captcha_key'      => 'Проверочный код',
    ),

    'logout'     => array(
        'exit' => 'Вы успешно вышли!',
    ),

    'activation' => array(
        'title'     => 'Активация аккаунта',
        'activated' => 'Аккаунт уже активирован.',
        'not_found' => 'Пользователь не найлен',
        'failed'    => 'Активация пользователя завершилась с ошибкой',
        'passed'    => 'Аккаунт успешно активирован',
        'enter'     => 'Введите код активации',
        'key'       => 'Код активации',
        'submit'    => 'Активировать',
    ),

    'account'    => array(
        'denied'         => 'Доступ запрещен',
        'settings'       => 'Настройки',
        'password_error' => 'Пароли не совпадают',
        'not_updated'    => 'Аккаунт не обновлен',
        'updated'        => 'Аккаунт успешно обновлен',
        'login'          => 'Логин',
        'email'          => 'Email',
        'password'       => 'Пароль',
        'save'           => 'Сохранить',
    ),

    'recovery'   => array(
        'title'   => 'Сбросить пароль',
        'invalid' => 'Неверный код сброса пароля',
        'failed'  => 'Восстановление пароля не удалось',
        'success' => 'Процедура восстановления пароля успешно запершена! Ваш новый пароль: :password',
        'enter'   => 'Введите код сброса пароля',
        'key'     => 'Код сброса',
        'submit'  => 'Сбросить',
    ),

    'reset'      => array(
        'title'   => 'Забыли пароль?',
        'error'   => 'E-mail не найден',
        'success' => 'На ваш E-mail отправлено письмо с инструкциями для восстановления',
        'subject' => 'Восстановление пароля',
        'body'    =>
        'Здравствуйте :user!' . PHP_EOL . ' Для восстановления пароля пройдите по ссылке:' . PHP_EOL . ' :url',
        'enter'   => 'Введите ваш E-mail адресс',
        'email'   => 'E-Mail',
        'submit'  => 'Отправить',
    ),

    'other' => array(
        'admin' => 'Админка',
        'login' => 'Вход',
        'register' => 'Регистрация',
        'settings' => 'Настройки',
        'exit' => 'Выход',
    ),
);

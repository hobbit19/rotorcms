<?=\Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=100&amp;d=mm', array('alt' => 'avatar', 'class' => 'img-polaroid pull-right'))?>

<p>Email: <?=$user->email?></p>
<p>Date created: <?=\Date::forge(strtotime($user->created_at))?></p>
<p>Last login: <?=\Date::forge($user->last_login)?></p>

<?

    // Find the group using the group id
    $adminGroup = Sentry::getGroupProvider()->findById(1);

    // Assign the group to the user
    $user->addGroup($adminGroup);

try
{
    // Find the user using the user id
    $user = \Sentry::getUserProvider()->findById(1);

    // Get the user groups
    $groups = $user->getGroups();
    var_dump($groups);
}
catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
{
    echo 'User was not found.';
}
   // Find the user using the user id
    $user = Sentry::getUserProvider()->findById(1);

    // Get the user permissions
    $permissions = $user->getPermissions();
        var_dump($permissions);
?>

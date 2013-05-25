#RotorCMS New 1.0
* Website: [Visavi.net](http://visavi.net/)
* Based: [FuelPHP](http://fuelphp.com/) 1.7-dev

## Developers
* visavi
* Reistlin
* synz

## Documentation
* [Documentation in Russian](http://fuelphp-framework.ru/)
* [Release Documentation](http://docs.fuelphp.com/)
* [Release API browser](http://api.fuelphp.com/)
* [FuelPHP Cheat Sheet](http://www.novius-os.org/fuelphp-cheatsheet/)

## Coding Standards
* [Coding Standards](http://fuelphp.com/docs/general/coding_standards.html)

## Description
RotorCMS - functionally complete content management system, open source written in PHP. It uses a MySQL database to store the content of your website.RotorCMS is flexible, powerful and intuitive system with minimum requirements for hosting, high security and is an excellent choice to build a site of any complexityRotorCMS main feature is a low load on system resources and high speed, even with a very large audience site load on the server will be minimal, and you will not have any problems with the mapping information

##Cloning RotorCMS

RotorCMS uses submodules for things like the **core** folder.  After you clone the repository you will need to init and update the submodules.

_Configuring the database is in fuel/app/config/development/db.php_

Method of installation:

    git clone --recursive git://github.com/visavi/rotorcms.git

Install Composer

    php composer.phar update

Starting up database

    php oil refine migrate -all

Update or loading new submodules

    git submodule foreach git pull

Create users groups

    php oil refine create_groups

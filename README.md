#RotorCMS 1.0

* [Website](http://visavi.net/)

* Based: FuelPHP 1.5.1
* [Website](http://fuelphp.com/)

## Description


##Cloning RotorCMS

RotorCMS uses submodules for things like the **core** folder.  After you clone the repository you will need to init and update the submodules.

Here is the basic usage:

    git clone --recursive git://github.com/visavi/rotorcms.git

The above command is the same as running:

    git clone git://github.com/visavi/rotorcms.git
    cd fuel/
    git submodule init
    git submodule update

You can also shorten the last two commands to one:

    git submodule update --init

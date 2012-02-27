FuelPHP Social Package
======================

This is a very simple FuelPHP package that contains wrappers for Facebook, Twitter and Google.


Installation
------------

Clone this repo in `fuel/packages` with:

`git clone git://github.com/gkwelding/FuelPHP-Social-Package.git social`

And add `social` to always_load array in `app/config/config.php`.

You should set the config files of the classes in  `fuel/packages/social/config/`.

That's it!


Usage
-----

You can access the classes like the examples below:

Facebook: `\Social\Facebook::instance()->getUser();`

Twitter: `\Social\Twitter::instance()->logged_in();`

Google: `\Social\Google::instance()->getClientApi()->getService('Calendar');`


Copyright
----------

Work here is relesed under Phil Sturgeons DBAD license. http://philsturgeon.co.uk/code/dbad-license. Just give me some goddam credit if you use it and don't be a dick.
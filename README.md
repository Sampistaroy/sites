Sites Plugin Version 0.3
------------------------

This plugin enables multi-site support for Croogo (Original statement by the original author "rchavik"). This is an alternative version with a simpler and more comfortable GUI, some bugfixes and the possibility to choose a default site on your own. The default site represents the site that is going to be rendered in case there is no valid domain/subdomain/whatever specified.

On activation the database is automatically created and a default site is set up. Enjoy!

Installation
-------------
1. Download Zip file, unzip it to your "App/Plugin/Sites" folder.
   Notice : don't use cake bake plugin !
2. Setup database.php:
   Add a config for database called "sites" with the same parameters of your default data base configs.
   You can use the same physical database as croogo, but `sites` datasource
   needs to be present since all plugin models will use this.

   Eg:

```
<?php

		class DATABASE_CONFIG {
			var $default = array(
				'driver' => 'mysql',
				'database' => 'croogo',
				...
				);

			var $sites = array(
				'driver' => 'mysql',
				'database' => 'croogo',
				...
				);
		}
```
3. Activate the plugin:
   Go to your web site, => Extensions, and then click on activate

   Don't forget to cross your fingers.

How to configure it
-------------------
1. Settings
	Title:(optional)
	Description:(optional)
	Tagline:(optional)
	Email:(optional)
	Locale:(optional)
	Timezone:(optional)
	Theme:(optional)
2. Domains
	Domain:(optional)
	Add Domain:(optional)
3. Meta
	Robots:(optional)
	Keywords:(optional)
	Description:(optional)
4. Publishing
	status:
	apply:
	save:


How to find your new site
-------------------------




Link in a multisite environment
-------------------------------

The default menu helper generate menu link using a relative url. For some items,
you would need to have an absolute url in the link.  To achieve this, select the
site that applies to the Link and set `absolute=1` in the link's `params` field.

Canonical Url
-------------

You can use `SitesHelper::canonical()` to output a canonical url in your layout.


Known Bugs
----------

At the moment, there are no known bugs. Feel free to fork or to notify.

Requirements
------------

Croogo (tested on 1.5) - http://croogo.org/

Good luck and have fun.
-- rchavik (& bumuckl)

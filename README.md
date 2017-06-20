# default-project-theme
Default project theme to start WordPress development.

Follow this guide to install WordPress core files onto machine: 

https://coolestguidesontheplanet.com/fastest-way-to-install-wordpress-on-osx-10-6/

Download this theme and place in the WordPress theme folder, install in wp-admin. `cd` to theme folder and install dependencies with `npm install`. Run `gulp` to get things going.

**Plugins**

Adminimize

Advanced Custom Fields PRO

Duplicator

Intuitive Custom Post Order

Regenerate Thumbnails

WP Power Stats

**Duplicator**

To get Duplicator working correctly, go to filter then exclude `node_modules` from being scanned.

**Secret Keys & Salts**

These can be generated from the below link and pasted into wp-config.php

https://api.wordpress.org/secret-key/1.1/salt/


**Add To wp-config.php**

`# Enable all core updates, including minor and major:`
`define( 'WP_AUTO_UPDATE_CORE', true );`

`# Automatic updates for All plugins:`
`add_filter( 'auto_update_plugin', '__return_true' );`


**To Upgrade package.json**

Run `npm install -g npm-check-updates` followed by `ncu -u`
Usage here: https://www.npmjs.com/package/npm-check-updates

**To Import Adminimize Settings**

Go to Adminimize, scroll to bottom and upload the .json file. Then delete the .json file from the project folder.

**Security / Hardening**
Visit this link and read everything: https://codex.wordpress.org/Hardening_WordPress


**SSL / HTTPS **
Add this at top of .htaccess. Change yoursite.com for the URL.

<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{SERVER_PORT} 80 
RewriteRule ^(.*)$ https://www.yoursite.com/$1 [R,L]
</IfModule>

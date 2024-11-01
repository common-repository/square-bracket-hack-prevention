=== Square Bracket Hack Prevention ===
Contributors: citywanderer, stubgo
Donate link: http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/
Tags: redirect, security, WPSOS, htaccess, hack, protect, protection
Requires at least: 3.0.1
Tested up to: 4.4.2
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
The Square Bracket Hack Prevention plugin prevents hackers from adding a "[" to the URL.

== Description ==

The Square Bracket Hack Prevention plugin prevents a simple but very common exploit of WordPress, by adding in a .htaccess rule upon activation preventing hackers from adding a "[" to the URL.

A common attempt at a WPSOS exploit is to add a "[" to a URL, which can often break a site and expose an ability to inject code. This plugin stops it by banning all attempts at adding a "[" to the URL. It does so via adding code to the .htaccess file. 

Additionally, upon the uninstallation of the plugin, the line is removed. And if the .htaccess file is not editable, then the admin user is warned.

If you have any suggestions let us know via http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/

For more information and support, check out: http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/

== Installation ==

The installation and use is very straightforward. You should:

1. Upload the folder `square-bracket-hack-prevention` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

NB! If the .htaccess file wasn't writeable during the activation, please make .htaccess writeable, and deactivate and activate the plugin again.

== Frequently Asked Questions ==

= Which options do you modify? =

As of version 1.0 there are no options to modify.

= Where can I get some support? =

Check out our site, at: http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/

= I have some suggestions for other options I want edited =

Let us know, via: http://www.wpsos.io/wordpress-plugin-square-bracket-hack-prevention/

== Changelog ==

= 1.0 =
* Initial version.
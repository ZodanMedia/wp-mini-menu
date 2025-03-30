=== Z Mini Admin Menu ===
Contributors: martenmoolenaar
Donate link: https://www.buymeacoffee.com/zodan
Tags: admin menu, tiny menu, mini menu, cleanup, development
Description: A frontpage mini menu to access most common admin items when te admin bar is not active
Requires at least: 5.5
Tested up to: 6.7.2
Stable tag: 2.0.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html


A front-end mini menu to access most common admin items when te admin bar is not active. Super comfy when you don't want the big default admin bar, but just a tiny button when you are developing (or maintaining) a website.


== Description ==

In most of our custom WordPress themes, we like to view our pages without the admin bar. Still, while developing or maintaining a website, we like to have access to some of the most common admin items. This tiny menu helps a bit.

= What does it do? =

* Show the WordPress "Edit post" action
* Show an "Edit with Elementor" action (for those who care)
* Show a link to the Dashboard
* Show a link to the WP Network (if available)
* Show a link to New posts (for public post types)
* Show a link to Menus, Widgets, Plugins and Users sections
* Show a link to ACF, Yoast SEO, WooCommerce, FluentForms and WPML (if available)
* Show role-restricted custom links (to be added on the settings page)

This plugin is under active development. Any feature requests are welcome at [plugins@zodan.nl](plugins@zodan.nl)!



== Installation ==

= Install the Mini Menu from within WordPress =

1. Visit the plugins page within your dashboard and select ‘Add New’;
1. Search for ‘Mini Admin Menu’;
1. Activate the plugin from your Plugins page;
1. Go to ‘after activation’ below.

= Install manually =

1. Unzip the Mini Admin Menu zip file
2. Upload the unzipped folder to the /wp-content/plugins/ directory;
3. Activate the plugin through the ‘Plugins’ menu in WordPress;
4. Go to ‘after activation’ below.


= After activation =

1. On the Plugins page in WordPress you will see a 'settings' link below the plugin name;
2. Tick the boxes of the items you would like to show in the menu;
3. Optionally, you can add your own links to the menu (make shure you type the full URI)
4. Sort the menu items the way you like it
5. Save your settings and you’re done!



== Frequently asked questions ==

= Which plugins do you support by default? =

Right now, quite arbitrarily, we support WPML, ACF, FluentForms, Yoast SEO and WooCommerce. Just because these are plugins we access a lot during development.
But you can add your own through the settings page.
If you think a major plugin is missing by default, send us an email at [plugins@zodan.nl](plugins@zodan.nl).

= Do you have plans to improve the plugin =

Yes. We currently have on our roadmap:
* Adding translations
* Set the option to use the Mini Admin Menu per user profile




== Changelog ==

= 2.0.3 =
* Fixed little annoying empty array() bug

= 2.0.2 =
* Fixed general availability (now based on 'edit_posts' capability)
* Removed the option to replace the WP Toolbar, this is now the default. But:
* Added personal setting to show regular toolbar :(
* Small changes to the way the regular toolbar is hidden and the Mini Menu is constructed

= 2.0.1 =
* Fixed tiny warnings

= 2.0 =
* Refactored version of the plugin

= 1.0.13 =
* Fixed plugin.php include bug

= 1.0.12 =
* Fixed tiny stupid mistake

= 1.0.11 =
* Added configuration when to show the Mini Admin Menu
* Fixed debug warning message

= 1.0.10 =
* Update notification badges added

= 1.0.9 =
* Bugfix edit post url (sorry for the typo)

= 1.0.8 =
* Small changes to the default capabilities

= 1.0.7 =
* Changed the output method to let the Mini Admin Menu live in the shadow DOM

= 1.0.6 =
* Fixed a WP Network bug
* Added role restriction for general use of the plugin

= 1.0.5 =
* Added role restriction for custom items
* More specific capabilities for built-in items
* Added FluentForms support

= 1.0.4 =
* Fixed the show after content bug
* Fixed Elementor missing id bug

= 1.0.3 =
* Added editing with Elementor

= 1.0.2 =
* Added sorting menu items
* Some code revisions in the way we output data

= 1.0.1 =
* Added custom configurable items

= 1.0 =
* Very first version of this plugin

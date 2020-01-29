# CUSTOM WORDPRESS NEWS PLUGIN

> A small Wordpress plugin where the admin can define a number of entries which are placed on a page via shortcode.


## necessary preparations
All you need is a running Wordpress instance. [Here](https://wordpress.org/download/) you could get the latest version of WP. <br>
At the time I wrote this plugin I used WP 5.3.2.


## setup
You have to clone this project to your `WordpressDocRoot/wp-content/plugins` folder. After this you have to login as admin to your backend area. <br>
Go to **Plugins** and activate our new Plugin called ***Custom Plugin - News***. Now you see our Newsmodule on the left (as top level menu entry).

## structure of our plugin
In our docroot you just finde (beside the directories) the MIT license, the README and our main php file which requires all php files.
<br><br>
**directories:**  <br>
* **admin:** backend relevant files
* **public:** frontend relevant files
* **includes:** PHP files which are used to create shortcode, settings page, load scripts, ...


## admin area / backend
Directly after activating our plugin you see a new top-level menu entry called **Newsmodule**.<br>
If you are an admin and enter this area you will see small form with one input. Here you can configure how much entries you can pass to your frontend part. <br>
*ATTENTION:* The plugin uses only published posts.


## public area / frontend
A small frontend which is flexbox and vanilla JS based. Mobile all entries are among each other. If you go a bit wider you have a two item grid. If you click on the title a small description and the "read more" link appears.


## includes
As I mentioned before we require all additional PHP files in our `wp-plugin-show-custom-news.php`. Here is a really short overview of our includes.
<br><br>
**scripts.php** <br>
Includes all JS and CSS Scripts for our backend and frontend.
<br><br>
**settings.php** <br>
Creates our Backend/Settings Page and its functionallity.
<br><br>
**shortcodes.php** <br>
This small file registers the shortcode `[custom-newsmodule]` and its functionallity.


## Issues / Questions
You found a bug, have a new feature, an idea, an improvement, ... please write an [issue](https://github.com/R4xx4r/wp-plugin-show-custom-news/issues)

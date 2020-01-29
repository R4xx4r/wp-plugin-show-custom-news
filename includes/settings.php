<?php

/**
* file which handles the settings/option page
*
* @package         Custom Plugin - News
* @subpackage      Custom Plugin - News/includes
* @author          Daniel Murth
* @copyright       2020 Daniel Murth
* @license         MIT
*
**/

function custom_newsmodule_settings_page() {
  add_menu_page (
    'Custom Plugin - News', // top level menu page
    'Newsmodule', // title of settings page
    'manage_options', // capability of user to see page
    'custom-newsmodule-page', // slug of settings page
    'custom_newsmodule_page_html' // callback function when rendering page
  );
  add_action('admin_init', 'custom_newsmodule_settings_init');
}
add_action('admin_menu', 'custom_newsmodule_settings_page');


function custom_newsmodule_settings_init() {
  add_settings_section (
    'custom-newsmodule-section', // section id
    'Custom Newsmodule Settings', // title
    '', // callback function when opening section
    'custom-newsmodule-page' // page where section is displayed
  );

  register_setting(
    'custom-newsmodule-page', // option group
    'news_count'
  );

  add_settings_field(
    'news-count', // settings field id
    'count of shown entries', // title
    'custom_newsmodule_cb', // callback function
    'custom-newsmodule-page', // page where settings are displayed
    'custom-newsmodule-section' // section where settings are displayed
  );
}

function custom_newsmodule_cb() {
  $newsCount = esc_attr(get_option('news_count', ''));
  $allPublishedPosts = get_posts([
    'post_status' => 'publish'
  ]);
  $allPublishedPostsCount = count($allPublishedPosts);
  ?>
  <div id="news-count-input-wrapper">
    <input id="news-count-input" type="number" min="0" max="<?php echo $allPublishedPostsCount; ?>" name="news_count" placeholder="<?php echo $newsCount; ?>">
    <div class="custom-newsmodule__be-description description">There are <strong><?php echo $newsCount; ?> of <?php echo $allPublishedPostsCount ?> entries</strong> shown at the moment. Please use the shortcode <span>[custom-newsmodule]</span> to place our plugin.</div>
  </div>
  <?php
}

function custom_newsmodule_page_html() {
  // check user capabilities
  if (!current_user_can('manage_options')) {
    return;
  }
  ?>

  <div class="wrap">
    <?php settings_errors();?>
    <form method="POST" action="options.php">
      <?php settings_fields('custom-newsmodule-page');?>
      <?php do_settings_sections('custom-newsmodule-page')?>
      <?php submit_button('save');?>
    </form>
  </div>

  <?php
}

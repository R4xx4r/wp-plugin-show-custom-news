<?php

/**
* file which handles the shortcode usage
*
* @package         Custom Plugin - News
* @subpackage      Custom Plugin - News/includes
* @author          Daniel Murth
* @copyright       2020 Daniel Murth
* @license         MIT
*
**/

function render_shortcode($atts, $content = null) {
	$newsCount = esc_attr(get_option('news_count', ''));

	// get count of posts from backend module, but only published ones
  $recentPosts = wp_get_recent_posts([
    'numberposts' => $newsCount,
    'post_status' => 'publish'
  ]);

	$output = '<div class="custom-newsmdule">';
  $output = $output . '<ul class="custom-newsmodule__items items">';

	foreach ($recentPosts as $post) {
		$output = $output .
							'<li class="custom-newsmodule__item item">
								<input id="item__checkbox-' . $post["ID"] . '" type="checkbox" class="item__content-toggler" name="item__title-checkbox" value="item__checkbox-' . $post["ID"] . '">
								<label for="item__checkbox-' . $post["ID"] . '" class="item__content-toggle">
									<h2 class="item__headline" title="click for more info">' . $post['post_title'] . '</h2>
								</label>
								<div class="item__content-wrapper">
									<div class="item__copy">' . $post['post_content'] . '</div>
									<a class="item__link" href="' . get_permalink($post['ID']) . '">read more <svg xmlns="http://www.w3.org/2000/svg" width="44.952" height="44.952" viewBox="0 0 44.952 44.952"><path fill="currentColor" d="M44.952 22.108c0-1.25-.478-2.424-1.362-3.308L30.627 5.831a2.5 2.5 0 00-3.536 0 2.511 2.511 0 000 3.546l10.574 10.57H2.484C1.102 19.948 0 21.081 0 22.464v.028c0 1.382 1.102 2.523 2.484 2.523h35.182L27.094 35.579a2.504 2.504 0 003.538 3.54l12.958-12.97a4.633 4.633 0 001.362-3.309v-.732z"/></svg></a>
								</div>
							</li>';

	}
	wp_reset_query();

  $output = $output .
							'</ul>
							<div class="custom-newsmodule__information">You see ' . $newsCount . ' entries at the moment.</div>
						</div>';

	return $output;
}
add_shortcode('custom-newsmodule', 'render_shortcode');

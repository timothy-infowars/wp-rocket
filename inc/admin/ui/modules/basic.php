<?php 
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

add_settings_section( 'rocket_display_main_options', __( 'Basic options', 'rocket' ), '__return_false', 'basic' );
add_settings_field(
	'rocket_lazyload',
	__( 'Lazyload:', 'rocket' ),
	'rocket_field',
	'basic',
	'rocket_display_main_options',
	array(
		array(
			'type'         => 'checkbox',
			'label'        => __('Images', 'rocket' ),
			'label_for'    => 'lazyload',
			'label_screen' => __( 'Lazyload on images', 'rocket' ),
		),
		array(
			'type'         => 'checkbox',
			'label'        => __('Iframes & Videos', 'rocket' ),
			'label_for'    => 'lazyload_iframes',
			'label_screen' => __( 'Lazyload on iframes and videos', 'rocket' ),
		),
		array(
			'type'         => 'helper_description',
			'name'         => 'lazyload',
			'description'  => __( 'LazyLoad displays images, iframes and videos on a page only when they are visible to the user.', 'rocket') . '<br/>' .
								  __('This mechanism reduces the number of HTTP requests and improves the loading time.', 'rocket' )
		),
	)
);
add_settings_field(
	'rocket_minify',
	 __( 'Files optimisation:<br/><span class="description">(Minification & Concatenation)</span>', 'rocket' ),
	'rocket_field',
	'basic',
	'rocket_display_main_options',
	array(
		array(
			'type'         => 'checkbox',
			'label'        => 'HTML',
			'name'         => 'minify_html',
			'label_screen' => __( 'HTML Files minification', 'rocket' )
		),
					array(
			'type'		   => 'checkbox',
			'label'		   => 'Google Fonts',
			'name'		   => 'minify_google_fonts',
			'label_screen' => __( 'Google Fonts minification', 'rocket' ),
		),
		array(
			'type'         => 'checkbox',
			'label'        => 'CSS',
			'name'         => 'minify_css',
			'label_screen' => __( 'CSS Files minification', 'rocket' )
		),
		array(
			'type'		   => 'checkbox',
			'label'		   => 'JS',
			'name'		   => 'minify_js',
			'label_screen' => __( 'JS Files minification', 'rocket' ),
		),
		array(
			'type'			=> 'helper_description',
			'name'			=> 'minify',
			'description'  => __( 'Minification removes any spaces and comments present in the CSS and JavaScript files.', 'rocket' ) . '<br/>' .
								  __( 'This mechanism reduces the weight of each file and allows a faster reading of browsers and search engines.', 'rocket' ) . '<br/>' .
								  __( 'Concatenation combines all CSS and JavaScript files.', 'rocket' ) . '<br/>' .
								  __( 'This mechanism reduces the number of HTTP requests and improves the loading time.', 'rocket' )
		),
		array(
			'type'			=> 'helper_warning',
			'name'			=> 'minify_help1',
			'description'  => __( 'Concatenating files can cause display errors.', 'rocket' ),
		),
		array(
			'display'		=> ! rocket_is_white_label(),
			'type'			=> 'helper_warning',
			'name'			=> 'minify_help2',
			'description'  => sprintf( __( 'In case of any errors we recommend you to turn off this option or watch the following video: <a href="%1$s" class="fancybox">%1$s</a>.', 'rocket' ), ( defined( 'WPLANG' ) && WPLANG == 'fr_FR' ) ? 'http://www.youtube.com/embed/5-Llh0ivyjs' : 'http://www.youtube.com/embed/kymoxCwW03c' )
		),

	)
);
// Mobile plugins list
$mobile_plugins = array(
	'<a href="https://wordpress.org/plugins/wptouch/" target="_blank">WP Touch</a>',
	'<a href="https://wordpress.org/plugins/wp-mobile-detector/" target="_blank">WP Mobile Detector</a>',
	'<a href="https://wordpress.org/plugins/wiziapp-create-your-own-native-iphone-app" target="_blank">wiziApp</a>',
	'<a href="https://wordpress.org/plugins/wordpress-mobile-pack/" target="_blank">WordPress Mobile Pack</a>',
	'<a href="https://wordpress.org/plugins/wp-mobilizer/" target="_blank">WP-Mobilizer</a>',
	'<a href="https://wordpress.org/plugins/wp-mobile-edition/" target="_blank">WP Mobile Edition</a>'
);
add_settings_field(
	'rocket_mobile',
	__( 'Mobile cache:', 'rocket' ),
	'rocket_field',
	'basic',
	'rocket_display_main_options',
	array(
		array(
			'type'		   => 'checkbox',
			'label'		   => __( 'Enable caching for mobile devices.', 'rocket' ),
			'label_for'	   => 'cache_mobile',
			'label_screen' => __( 'Mobile cache:', 'rocket' ),
		),
		array(
			'type'         => 'helper_warning',
			'name'         => 'mobile',
			'description'  => wp_sprintf( __( 'Don\'t turn on this option if you use one of these plugins: %l.', 'rocket' ), $mobile_plugins ),
		),
	)
);
add_settings_field(
	'rocket_logged_user',
	__( 'Logged in user cache:', 'rocket' ),
	'rocket_field', 'basic',
	'rocket_display_main_options',
	array(
		'type'         => 'checkbox',
		'label'        => __('Enable caching for logged in users.', 'rocket' ),
		'label_for'    => 'cache_logged_user',
		'label_screen' =>__( 'Logged in user cache:', 'rocket' ),
	)
);
add_settings_field(
	'rocket_ssl',
	__( 'SSL cache:', 'rocket' ),
	'rocket_field',
	'basic',
	'rocket_display_main_options',
	array(
		'type'         => 'checkbox',
		'label'        => __('Enable caching for pages with SSL protocol (<code>https://</code>).', 'rocket' ),
		'label_for'    => 'cache_ssl',
		'label_screen' => __( 'SSL cache:', 'rocket' ),
	)
);
add_settings_field(
	'rocket_purge',
	__( 'Clear Cache Lifespan', 'rocket' ),
	'rocket_field',
	'basic',
	'rocket_display_main_options',
	array(
		array(
			'type'         => 'number',
			'label_for'    => 'purge_cron_interval',
			'label_screen' => __( 'Clear Cache Lifespan', 'rocket' ),
			'fieldset'     => 'start'
		),
		array(
			'type'		   => 'select',
			'label_for'	   => 'purge_cron_unit',
			'label_screen' => __( 'Unit of time', 'rocket' ),
			'fieldset'	   => 'end',
			'options' => array(
				'SECOND_IN_SECONDS' => __( 'second(s)', 'rocket' ),
				'MINUTE_IN_SECONDS' => __( 'minute(s)', 'rocket' ),
				'HOUR_IN_SECONDS'   => __( 'hour(s)', 'rocket' ),
				'DAY_IN_SECONDS'    => __( 'day(s)', 'rocket' )
			)
			),
		array(
			'type'         => 'helper_description',
			'name'         => 'purge',
			'description'  => __( 'By default, cache lifespan is 24 hours. This means that once created, the cache files are automatically removed after 24 hours before being recreated.', 'rocket' ). '<br/>' . __('This can be useful if you display your latest tweets or rss feeds in your sidebar, for example.', 'rocket' ),
			),
		array(
			'type'         => 'helper_help',
			'name'         => 'purge',
			'description'  => __( 'Specify 0 for unlimited lifetime.', 'rocket' ),
			),
		)
);
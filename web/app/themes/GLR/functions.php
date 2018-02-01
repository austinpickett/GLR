<?php
/**
 * CRM
 *
 * Main Functions
 */

require_once 'classes/sys/autoloader.php';
(new BaseTheme())->debug(0)->adminBar(0)

// -----------------------------------------------

/**
 * Set up the front-end
 */
->addImageSizes([[
	//
]])

// -----------------------------------------------

/**
 * Set up the back-end
 */
->addMenus([[
	'header' => 'Header Menu',
	'footer' => 'Footer Menu',
	'social' => 'Social Menu',
]])

->addSettings([[
	# General settings tab
	'General' => [
		'phone' => [
			'name' => 'Phone #',
			'type' => 'text',
			'desc' => 'Use [phone] to retrieve this value.',
		],
	],

	# Footer settings tab
	'Footer' => [
		'scripts' => [
			'name' => 'Extra Scripts',
			'type' => 'textarea',
			'desc' => 'If used, these scripts will be loaded in the footer. Put things like Google Analytics in here.',
		],
	],
]])

->addShortcodes([[
	# [phone]
	'phone' => function() {
		return BackEnd::getOption('phone');
	},

	# [button]
	'button' => function($args, $content = '') {
		return '<a href="'. $args['url'] .'" class="btn '. $args['style'] .'">'. $content .'</a>';
	},

	# [grid]
	'grid' => function($args, $content) {
		return '<div class="grid grid-'. $args['cols'] .'">'. do_shortcode($content) .'</div>';
	},

	# [grid_item]
	'grid_item' => function($args, $content) {
		return '<div class="item">'. do_shortcode($content) .'</div>';
	},

	# [lead]
	'lead' => function($args, $content) {
		return '<div class="lead">'. $content .'</div>';
	},

	# [youtube]
	'youtube' => function($args, $content) {
		return '<div class="responsive-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/'. $args['id'] .'" frameborder="0" allowfullscreen></iframe></div>';
	},
]])

// -----------------------------------------------

->render();

// -----------------------------------------------

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_action('wp_enqueue_scripts', function() {
	if (is_admin()) return;

	wp_deregister_script('wp-embed.min.js');
	wp_deregister_script('wp-embed');
	wp_deregister_script('embed');
	wp_dequeue_style('page-list-style');
	wp_dequeue_style('yoast-seo-adminbar');
}, 999);

add_filter('excerpt_length', function($length) {
	return 30;
}, 999);

add_filter('upload_mimes', function($mimes) {
	$mimes['svg'] = 'img/svg+xml';

	return $mimes;
});

add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form) {
    return "<button type'submit' class='btn blue button' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
}

// -----------------------------------------------

// if (!wp_next_scheduled('cronFacebook'))
//     wp_schedule_event(time(), 'hourly', 'cronFacebook');

// add_action('cronFacebook', 'importFacebook');
// function importFacebook() {
// 	require_once 'classes/external/Facebook/autoload.php';

//     $pageId = '367869995953';
//     $appId = '296347484145186';
//     $secret = '6e8b903f1c5a0a524c47e31624a93a8d';

//     # Facebook
//     $fb = new \Facebook\Facebook(array(
//         'app_id' => $appId,
//         'app_secret' => $secret,
//         'default_graph_version' => 'v2.9',
//         'default_access_token' => $appId .'|'. $secret,
//     ));

//     try {
//         $feeds = $fb->get($pageId . '/feed?fields=name,picture,link,message,created_time')->getGraphEdge();
//         foreach ($feeds AS $post):
//             $cfsArgs = array(
//                 'social_url' => @$post->getField('link'),
//                 'social_photo' => @$post->getField('picture'),
//                 'social_source' => 'facebook',
//             );

//             $baseArgs = array(
//                 'post_type' => 'social',
//                 'post_status' => 'publish',
//                 'post_title' => $post->getField('name'),
//                 'post_content' => $post->getField('message'),
//                 'post_date' => $post->getField('created_time')->format('Y-m-d H:i:s'),
//             );

//             // Attempt to get the ID if the post exists and just update it.
//             if ($curID = get_page_by_title($baseArgs['post_title'], OBJECT, 'social'))
//                 $baseArgs['ID'] = $curID->ID;

//             // Execute the $CFS save call
//             if ($baseArgs['post_title'] !== null)
//                 CFS()->save($cfsArgs, $baseArgs);
//         endforeach;
//     } catch(FacebookRequestException $ex) {
//         echo $ex->getMessage();
//         exit;
//     }
// }

// -----------------------------------------------

if (!wp_next_scheduled('cronTwitter_v2'))
    wp_schedule_event(time(), 'hourly', 'cronTwitter_v2');

add_action('cronTwitter_v2', 'importTwitter');
function importTwitter() {
    require_once 'classes/external/Twitter/twitter.php';

    // Base settings
    $settings = array(
        'oauth_access_token' => '755084828622540800-M6fevDR26LUVIAHq9VdgRM62X758ilG',
        'oauth_access_token_secret' => 'npGSao3y8NezZFdRTaaumKZ61LKEbG0R1p8Alyi6NXYeJ',
        'consumer_key' => 'xRyc6TaSe7AW0ClvbcgVue2EK',
        'consumer_secret' => 'KsgIXqhsD26Bj9qoK7BC6CIKpM5TEY3mhpczScawFDDHAh9MP9',
    );

    $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
    $get = '?screen_name=GALawsuitReform';
    $requestMethod = 'GET';

    $TW = new TwitterAPIExchange($settings);

    $feed = $TW->setGetfield($get)
        ->buildOauth($url, $requestMethod)
        ->performRequest();

    $feed = json_decode($feed);

    // Iterate over the data
    foreach ($feed AS $post):

		$photo = $post->entities->media[0] ? $post->entities->media[0]->url : '';

        $cfsArgs = array(
            'social_url' => '//www.twitter.com/GALawsuitReform/status/' . $post->id,
            'social_photo' => $photo,
            'social_source' => 'twitter',
        );

        $baseArgs = array(
            'post_title' => FrontEnd::truncate(sanitize_title($post->text), 100),
            'post_content' => $post->text,
            'post_type' => 'social',
            'post_status' => 'publish',
            'post_date' => date('Y-m-d G:i:s', strtotime($post->created_at)),
        );

        // Attempt to get the ID if the post exists and just update it.
        if ($curID = get_page_by_title($baseArgs['post_title'], OBJECT, 'social'))
            $baseArgs['ID'] = $curID->ID;

        // Execute the $CFS save call
        if ($baseArgs['post_title'] !== null)
            CFS()->save($cfsArgs, $baseArgs);
    endforeach;
}
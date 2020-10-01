<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['ci_bootstrap'] = array(
	'site_name' => 'All EPG Portal',
	'page_title_prefix' => 'All EPG | ',
	'page_title' => 'Home',
	'meta_data'	=> array(
		'viewport'      => 'width=device-width, initial-scale=1',
		'author'		=> 'Anca Georgeta L.',
		'description'	=> 'All EPG Portal',
		'keywords'	=> 'EPG, guide'
	),
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/frontend/js/modernizr-2.6.2.min.js'
		),
		'foot'	=> array(
			'assets/dist/frontend/js/jquery.min.js', 
			'assets/dist/frontend/js/jquery.easing.1.3.js', 
			'assets/dist/frontend/js/bootstrap.min.js',			
			'assets/dist/frontend/js/jquery.waypoints.min.js',
			'assets/dist/frontend/js/jquery.stellar.min.js',
			'assets/dist/frontend/js/owl.carousel.min.js',
			'assets/dist/frontend/js/jquery.flexslider-min.js',
			'assets/dist/frontend/js/jquery.countTo.js',
			'assets/dist/frontend/js/jquery.magnific-popup.min.js',
			'assets/dist/frontend/js/magnific-popup-options.js',
			'assets/dist/frontend/js/main.js'
		),
	),
	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.css',
			'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
			'https://fonts.googleapis.com/css?family=Playfair+Display:400,700',
			'assets/dist/frontend/css/animate.css',
			'assets/dist/frontend/css/icomoon.css',
			'assets/dist/frontend/css/bootstrap.css',
			'assets/dist/frontend/css/magnific-popup.css',
			'assets/dist/frontend/css/owl.carousel.min.css',
			'assets/dist/frontend/css/owl.theme.default.min.css',
			'assets/dist/frontend/css/flexslider.css',
			'assets/dist/frontend/fonts/flaticon/font/flaticon.css',
			'assets/dist/frontend/css/style.css',
			'assets/dist/frontend/css/style_custom.css'
		)
	),
	// Default CSS class for <body> tag
	'body_class' => '',
	// Multilingual settings
	'languages' => array(
		'default'		=> 'en',
		'autoload'		=> array('general'),
		'available'		=> array(
			'en' => array(
				'label'	=> 'english',
				'value'	=> 'english',
				'display'	=> 'ENG'
			),
			'pt' => array(
				'label'	=> 'portuguese',
				'value'	=> 'portuguese',
				'display'	=> 'PTG'
			)
		)
	),
	// Google Analytics User ID
	'ga_id' => '',
	// Login page
	'login_url' => 'login',
	// Restricted pages
	'page_auth' => array(
	),

	// Email config
	'email' => array(
		'from_email'		=> 'fgosorio@theicon.pt',
		'from_name'			=> 'Fgosorio',
		'subject_prefix'	=> '',
		
		// Mailgun HTTP API
		'mailgun_api'		=> array(
			'domain'			=> '',
			'private_api_key'	=> ''
		),
	),
	// Debug tools
	'debug' => array(
		'view_data'	=> FALSE,
		'profiler'	=> FALSE
	),
);

/*
| -------------------------------------------------------------------------
| Override values from /application/config/config.php
| -------------------------------------------------------------------------
*/
$config['sess_cookie_name'] = 'ICon_session_consulating_frontend';
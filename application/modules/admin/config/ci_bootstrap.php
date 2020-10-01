<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| CI Bootstrap 3 Configuration
| -------------------------------------------------------------------------
| This file lets you define default values to be passed into views 
| when calling MY_Controller's render() function. 
| 
| See example and detailed explanation from:
| 	/application/config/ci_bootstrap_example.php
*/

$config['ci_bootstrap'] = array(

	// Site name
	'site_name' => 'All EPG Admin Panel',

	// Default page title prefix
	'page_title_prefix' => '',

	// Default page title
	'page_title' => '',

	// Default meta data
	'meta_data'	=> array(
		'author'		=> 'Anca Georgeta L.',
		'description'	=> '',
		'keywords'		=> ''
	),
	
	// Default scripts to embed at page head or end
	'scripts' => array(
		'head'	=> array(
			'assets/dist/metronic/plugins/global/plugins.bundle.js',
			'assets/dist/metronic/plugins/custom/prismjs/prismjs.bundle.js',
			'assets/dist/metronic/js/scripts.bundle.js',
			'assets/dist/metronic/plugins/custom/datatables/datatables.bundle.js',
			'assets/dist/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js',
			'assets/dist/metronic/js/pages/widgets.js',
		),
		'foot'	=> array(
		),
	),

	// Default stylesheets to embed at page head
	'stylesheets' => array(
		'screen' => array(
			'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700',
			'assets/dist/metronic/plugins/custom/datatables/datatables.bundle.css',
			'assets/dist/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css',
			'assets/dist/metronic/plugins/global/plugins.bundle.css',
			'assets/dist/metronic/plugins/custom/prismjs/prismjs.bundle.css',
			'assets/dist/metronic/css/style.bundle.css',
			'assets/dist/metronic/css/themes/layout/header/base/light.css',
			'assets/dist/metronic/css/themes/layout/header/menu/light.css',
			'assets/dist/metronic/css/themes/layout/brand/dark.css',
			'assets/dist/metronic/css/themes/layout/aside/dark.css'
		)
	),

	// Default CSS class for <body> tag
	'body_class' => '',
	
	// Multilingual settings
	'languages' => array(
	),

	// Menu items
	'menu' => array(
		'home' => array(
			'name'		=> 'Home',
			'url'		=> '',
			'icon'		=> 'fa fa-home',
		),
		'user' => array(
			'name'		=> 'Users',
			'url'		=> 'user',
			'icon'		=> 'fa fa-users',
			'children'  => array(
				'List'			=> 'user',
				'Create'		=> 'user/create',
				'User Groups'	=> 'user/group',
			)
		),
		'panel' => array(
			'name'		=> 'Admin Panel',
			'url'		=> 'panel',
			'icon'		=> 'fa fa-cog',
			'children'  => array(
				'Admin Users'			=> 'panel/admin_user',
				'Create Admin User'		=> 'panel/admin_user_create',
				'Admin User Groups'		=> 'panel/admin_user_group',
			)
		),
		'util' => array(
			'name'		=> 'Utilities',
			'url'		=> 'util',
			'icon'		=> 'fa fa-cogs',
			'children'  => array(
				'Database Versions'		=> 'util/list_db',
			)
		),
		'logout' => array(
			'name'		=> 'Sign Out',
			'url'		=> 'panel/logout',
			'icon'		=> 'fa fa-sign-out',
		)
	),

	// Menu items
	'sitemenu' => array(
		'category' => array(
			'name'		=> 'Blog Category',
			'url'		=> 'blog/category',
			'icon'		=> 'fa fa-users',
		),
		'blog' => array(
			'name'		=> 'Blog',
			'url'		=> 'blog',
			'icon'		=> 'fa fa-users',
		),
		'team' => array(
			'name'		=> 'Team',
			'url'		=> 'site/team',
			'icon'		=> 'fa fa-users',
		),
		'userdata' => array(
			'name'		=> 'User Area',
			'url'		=> 'blog/area',
			'icon'		=> 'fa fa-users',
		),
	),
	// Login page
	'login_url' => 'admin/login',

	// Restricted pages
	'page_auth' => array(
		'user/create'				=> array('webmaster', 'admin', 'manager'),
		'user/group'				=> array('webmaster', 'admin', 'manager'),
		'panel'						=> array('webmaster'),
		'panel/admin_user'			=> array('webmaster'),
		'panel/admin_user_create'	=> array('webmaster'),
		'panel/admin_user_group'	=> array('webmaster'),
		'util'						=> array('webmaster'),
		'util/list_db'				=> array('webmaster'),
		'util/backup_db'			=> array('webmaster'),
		'util/restore_db'			=> array('webmaster'),
		'util/remove_db'			=> array('webmaster'),
	),

	// AdminLTE settings
	'adminlte' => array(
		'body_class' => array(
			'webmaster'	=> 'header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading',
			'admin'		=> 'header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading',
			'manager'	=> 'header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading',
			'staff'		=> 'header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading',
		)
	),

	// Useful links to display at bottom of sidemenu
	'useful_links' => array(
		array(
			'auth'		=> array('webmaster', 'admin', 'manager', 'staff'),
			'name'		=> 'Frontend Website',
			'url'		=> '',
			'target'	=> '_blank',
			'color'		=> 'text-aqua'
		)
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
$config['sess_cookie_name'] = 'all_epg_portal_admin';
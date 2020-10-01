<?php

/**
 * Base Controller for Admin module
 */
class Admin_Controller extends MY_Controller {

	protected $mSitemenuLinks = array();
	protected $mUsefulLinks = array();

	// Grocery CRUD or Image CRUD
	protected $mCrud;
	protected $mCrudUnsetFields;

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// only login users can access Admin Panel
		$this->verify_login();

		// store site config values
		$this->mUsefulLinks = $this->mConfig['useful_links'];
		$this->mSitemenuLinks = $this->mConfig['sitemenu'];

		$this->load->model('users_model', 'users');
		$rows=$this->users->execute_query("select count(*) cnt from users");
		$this->mViewData['customer_count']=$rows[0]['cnt'];
		$rows=$this->users->execute_query("select count(*) cnt from users where activation_code!=''");
		$this->mViewData['customer_active_count']=$rows[0]['cnt'];
		$rows=$this->users->execute_query("select count(*) cnt from epg_country where active>0");
		$this->mViewData['country_count']=$rows[0]['cnt'];
		$rows=$this->users->execute_query("select count(*) cnt from epg_site a join epg_country b on a.country_id=b.id where b.active>0");
		$this->mViewData['site_count']=$rows[0]['cnt'];
		$rows=$this->users->execute_query("select count(*) cnt from epg_channel a join epg_site b on a.epg_site_id=b.id join epg_country c on b.country_id=c.id where c.active>0");
		$this->mViewData['channel_count']=$rows[0]['cnt'];
		$rows=$this->users->execute_query("select count(*) cnt from epg_channel a join epg_site b on a.epg_site_id=b.id join epg_country c on b.country_id=c.id where c.active>0 and a.active>0");
		$this->mViewData['channel_active_count']=$rows[0]['cnt'];

		$this->mViewData['logs_data']=$this->users->execute_query("select * from site_logs order by time desc limit 9");
		$this->mViewData['logs_type']=array("site access","order info","subscription","contact info","EPG data");
		$this->mViewData['logs_color']=array("success","danger","warning","primary","dark");

		$rows=$this->users->execute_query("select * from epg_status order by moment desc");
		$this->mViewData['last_updated_date']=count($rows)?$rows[0]['moment']:"";

		$this->mViewData['epg_countries']=$this->users->execute_query("select a.*,COALESCE(b.cnt,0) site_count,COALESCE(b.csm,0) channel_count from epg_country a left join (select count(*) cnt,sum(channel_count) csm, c.country_id from (select aa.*,COALESCE(bb.cnt,0) channel_count from epg_site aa left join (select count(*) cnt, epg_site_id from epg_channel group by epg_site_id) bb on aa.id=bb.epg_site_id) c group by c.country_id) b on a.id=b.country_id where a.active>0");
		$rows=$this->users->execute_query("select a.* from epg_site a join epg_country b on a.country_id=b.id where b.active>0");
		foreach ($rows as $row) {
			$this->mViewData['epg_sites'][$row['id']]=$this->users->execute_query("select * from epg_site where country_id={$row['id']}");
		}
	}

	// Render template (override parent)
	protected function render($view_file, $layout = 'default')
	{
		// load skin according to user role
		$config = $this->mConfig['adminlte'];
		$this->mBodyClass = $config['body_class'][$this->mUserMainGroup];

		// additional view data
		$this->mViewData['useful_links'] = $this->mUsefulLinks;
		$this->mViewData['sitemenu'] = $this->mSitemenuLinks;
		parent::render($view_file, $layout);
	}

	// Initialize CRUD table via Grocery CRUD library
	// Reference: http://www.grocerycrud.com/
	protected function generate_crud($table, $subject = '')
	{
		// create CRUD object
		$this->load->library('Grocery_CRUD');
		$crud = new grocery_CRUD();
		$crud->set_table($table);

		// auto-generate subject
		if ( empty($subject) )
		{
			$crud->set_subject(humanize(singular($table)));
		}

		// load settings from: application/config/grocery_crud.php
		$this->load->config('grocery_crud');
		$this->mCrudUnsetFields = $this->config->item('grocery_crud_unset_fields');

		if ($this->config->item('grocery_crud_unset_jquery'))
			$crud->unset_jquery();

		if ($this->config->item('grocery_crud_unset_jquery_ui'))
			$crud->unset_jquery_ui();

		if ($this->config->item('grocery_crud_unset_print'))
			$crud->unset_print();

		if ($this->config->item('grocery_crud_unset_export'))
			$crud->unset_export();

		if ($this->config->item('grocery_crud_unset_read'))
			$crud->unset_read();

		foreach ($this->config->item('grocery_crud_display_as') as $key => $value)
			$crud->display_as($key, $value);

		// other custom logic to be done outside
		$this->mCrud = $crud;
		return $crud;
	}
	
	// Set field(s) to color picker
	protected function set_crud_color_picker()
	{
		$args = func_get_args();
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		foreach ($args as $field)
		{
			$this->mCrud->callback_field($field, array($this, 'callback_color_picker'));
		}
	}

	public function callback_color_picker($value = '', $primary_key = NULL, $field = NULL)
	{
		$name = $field->name;
		return "<input type='color' name='$name' value='$value' style='width:80px' />";
	}

	// Append additional fields to unset from CRUD
	protected function unset_crud_fields()
	{
		$args = func_get_args();
		if(isset($args[0]) && is_array($args[0]))
		{
			$args = $args[0];
		}
		$this->mCrudUnsetFields = array_merge($this->mCrudUnsetFields, $args);
	}

	// Initialize CRUD album via Image CRUD library
	// Reference: http://www.grocerycrud.com/image-crud
	protected function generate_image_crud($table, $url_field, $upload_path, $order_field = 'pos', $title_field = '')
	{
		// create CRUD object
		$this->load->library('Image_crud');
		$crud = new image_CRUD();
		$crud->set_table($table);
		$crud->set_url_field($url_field);
		$crud->set_image_path($upload_path);

		// [Optional] field name of image order (e.g. "pos")
		if ( !empty($order_field) )
		{
			$crud->set_ordering_field($order_field);
		}

		// [Optional] field name of image caption (e.g. "caption")
		if ( !empty($title_field) )
		{
			$crud->set_title_field($title_field);
		}

		// other custom logic to be done outside
		$this->mCrud = $crud;
		return $crud;
	}

	// Render CRUD
	protected function render_crud()
	{
		// logic specific for Grocery CRUD only
		$crud_obj_name = strtolower(get_class($this->mCrud));
		if ($crud_obj_name==='grocery_crud')
		{
			$this->mCrud->unset_fields($this->mCrudUnsetFields);	
		}

		// render CRUD
		$crud_data = $this->mCrud->render();

		// append scripts
		$this->add_stylesheet($crud_data->css_files, FALSE);
		$this->add_script($crud_data->js_files, TRUE, 'head');

		// display view
		$this->mViewData['crud_output'] = $crud_data->output;
		$this->render('crud');
	}
}

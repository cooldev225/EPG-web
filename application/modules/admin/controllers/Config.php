<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Config";
		$this->render('config','default_custom');
	}
}
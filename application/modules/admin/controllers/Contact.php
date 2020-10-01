<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Contact";
		$this->render('contact','default_custom');
	}
}
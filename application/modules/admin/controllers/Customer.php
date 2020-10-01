<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Customer";
		$this->render('customer','default_custom');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Order";
		$this->render('order','default_custom');
	}
}
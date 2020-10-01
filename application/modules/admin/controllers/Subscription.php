<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Subscription";
		$this->render('subscription','default_custom');
	}
}
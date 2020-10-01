<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth page
 */
class Auth extends MY_Controller {
	public function __construct()
	{
		//$this->CI =& get_instance();
		parent::__construct();
		$this->load->library('system_message');
		$this->load->library('verify_email');
		$this->load->library('email');
		$this->load->model('users_model', 'users');
	}
	public function login(){
		if($this->mViewData['current_user']!=''){
			redirect('blog');
		}
		$this->mViewData['mPageError']="";
		$this->mViewData['email']='';//foreach($_POST as $k=>$v) echo "{$k}=>{$v}<br>";
		$this->mViewData['password']='';//exit();
		if(isset($_POST['flag'])){
			$identity=$email = $_POST['email'];
			$password=$_POST['password'];
			if($_POST['flag']==1){
				$this->ion_auth_model->tables = array(
					'users'				=> 'users',
					'groups'			=> 'groups',
					'users_groups'		=> 'users_groups',
					'login_attempts'	=> 'login_attempts',
				);
				$user_id = $this->ion_auth->register($identity, $password, $email);
				$messages = $this->ion_auth->messages();
				if ($user_id)
				{
					$this->system_message->set_success($messages);
					$pref=explode(',',',0,00,000,0000,00000,000000');
					$data=array('username'=>$pref[abs(6-strlen($user_id))].$user_id);
					$this->ion_auth->update($user_id, $data);
					$this->session->set_userdata('user_name',$data['username']);
					$this->ion_auth->activate($user_id);
					$this->distroy_session();
					$this->ion_auth->login($email, $password);
					$this->mViewData['mPageError']=$messages;
					redirect('home/blog');
				}
			}else{
				$this->distroy_session();
				$this->ion_auth->login($identity, $password);
				$msg=$this->ion_auth->messages();
				
				if(strpos($msg,'login_successful')!==false||strpos($msg,'Successfully')!==false||$msg=='Logged In Successfully'){
					$rows=$this->users->execute_query("insert into site_access (user_id,time) values('".$this->session->userdata('current_user')."','".date("Y-m-d")."')");
					redirect('home/blog');
				}else if(strpos($msg,'timeout_login')!==false){
					$this->mViewData['mPageError']="Sorry, You had attempted several times. Please, try again later.";
				}else if(strpos($msg,'inactive_login')!==false){
					$this->mViewData['mPageError']="Sorry, Your access is deny. Please contact as support team.";
				}else if(strpos($msg,'invalid_email')!==false){
					$this->mViewData['mPageError']="Sorry, The email address you have entered is incorrect."; 
				}else if(strpos($msg,'wrong_password')!==false){
					$this->mViewData['mPageError']="Wrong password!";
					$this->mViewData['email']=$identity; 
				}
			}
		}
		$this->mViewData['mPageTitle']="Login";
		$this->render('auth/login', 'default');
	}
	public function distroy_session(){
		// Destroy the session
		$this->session->sess_destroy();
		//Recreate the session
		if (substr(CI_VERSION, 0, 1) == '2')
		{
			$this->session->sess_create();
		}
		else
		{
			if (version_compare(PHP_VERSION, '7.0.0') >= 0) {
				session_start();
			}
			$this->session->sess_regenerate(TRUE);
		}
	}
	public function logout()
	{
		$this->ion_auth->logout();
		redirect('home');
	}
}

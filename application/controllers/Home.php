<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home page
 */
class Home extends MY_Controller {
	public function __construct()
	{
		//$this->CI =& get_instance();
		parent::__construct();
		$this->load->model('users_model', 'users');
		$this->mViewData['mBlogCategories']=$this->users->execute_query("SELECT a.*,COALESCE(cnt,0) cnt FROM blog_category a left join (select count(*) cnt,categories from blog group by categories) b on a.id=b.categories order by a.id");

		$rows=$this->users->execute_query("select a.*,b.name category from blog a join blog_category b on a.categories=b.id order by a.createdDate desc limit 4");
		$this->mViewData['mRecentBlog']=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				if($key=='images')$this->mViewData['mRecentBlog'][$i][$key]='data:image/bmp;base64,'.base64_encode($val);
				else $this->mViewData['mRecentBlog'][$i][$key]=$val;
			$i++;
		}

		$rows=$this->users->execute_query("select * from team order by id");
		$this->mViewData['mTeam']=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				if($key=='images')$this->mViewData['mTeam'][$i][$key]='data:image/bmp;base64,'.base64_encode($val);
				else $this->mViewData['mTeam'][$i][$key]=$val;
			$i++;
		}

	}
	public function index(){
		$this->mViewData['mPageTitle']="Home";
		$this->render('home/index', 'default');
	}
	public function about(){
		$this->mViewData['mPageTitle']="About";
		$this->render('home/about', 'default');
	}
	public function service(){
		$this->mViewData['mPageTitle']="Service";
		$this->render('home/service', 'default');
	}
	public function blog($id=0,$cat=0){
		$email=$this->mViewData['current_user_obj']->email;
		$this->mViewData['userdata']=$this->users->execute_query("select * from user_data where email='{$email}' order by dates");

		$this->mViewData['mBlogId']=$id;
		if($id>0){
			$rows=$this->users->execute_query("select a.*,b.name category from blog a join blog_category b on a.categories=b.id where a.id={$id}");
			$this->mViewData['mSelBlog']=$rows[0];
			$this->mViewData['mSelBlog']['images']='data:image/bmp;base64,'.base64_encode($this->mViewData['mSelBlog']['images']);
		}
		
		$rows=$this->users->execute_query("select a.*,b.name category from blog a join blog_category b on a.categories=b.id ".($cat?" where a.categories={$cat} ":"")." limit 4");
		$this->mViewData['mBlog']=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				if($key=='images')$this->mViewData['mBlog'][$i][$key]='data:image/bmp;base64,'.base64_encode($val);
				else $this->mViewData['mBlog'][$i][$key]=$val;
			$i++;
		}

		$rows=$this->users->execute_query("select a.*,b.name category from blog a join blog_category b on a.categories=b.id order by a.createdDate desc limit 4");
		$this->mViewData['mRecentBlog']=array();
		$i=0;
		foreach ($rows as $row) {
			foreach ($row as $key=>$val)
				if($key=='images')$this->mViewData['mRecentBlog'][$i][$key]='data:image/bmp;base64,'.base64_encode($val);
				else $this->mViewData['mRecentBlog'][$i][$key]=$val;
			$i++;
		}

		$this->mViewData['mPageTitle']="Blog";
		$this->render('home/blog', 'default');
	}
	public function contact(){
		$this->mViewData['mPageTitle']="contact";
		$this->render('home/contact', 'default');
	}
}

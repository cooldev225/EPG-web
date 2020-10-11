<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Config";
		$this->mViewData['meta_optioins']=array();
		foreach($this->users->execute_query("select * from epg_options") as $option){
			$this->mViewData['meta_optioins'][$option['meta_key']]=$option['meta_value'];
		}
		$this->render('config','default_custom');
    }
    public function setMetaOptions(){
		header('Content-Type: application/json');
		foreach($_POST as $key=>$value){
			if($key=='csrf_token_allepg')continue;
			$row=array(
				'meta_key'=>$key,
				'meta_value'=>$value,
			);
			$rows=$this->users->execute_query("select * from epg_options where meta_key='{$key}'");
			if(count($rows)){
				$this->users->execute_update('epg_options','meta_key',$row);
			}else{
				$this->users->execute_insert('epg_options',$row);
			}
		}
		exit(json_encode(array('msg'=>'ok')));
	}
}
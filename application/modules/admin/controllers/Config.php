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
		$this->mViewData['epg_countries_all']=$this->users->execute_query("select a.*,COALESCE(b.cnt,0) site_count,COALESCE(b.csm,0) channel_count from epg_country a left join (select count(*) cnt,sum(channel_count) csm, c.country_id from (select aa.*,COALESCE(bb.cnt,0) channel_count from epg_site aa left join (select count(*) cnt, epg_site_id from epg_channel group by epg_site_id) bb on aa.id=bb.epg_site_id) c group by c.country_id) b on a.id=b.country_id");
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
	public function setCountry(){
		header('Content-Type: application/json');
		$row=array(
			'id'=>$_POST['id'],
			'name'=>$_POST['name'],
		);
		if($_POST['action']==1){
			$this->users->execute_update('epg_country','id',$row);
		}else if($_POST['action']==0){
			$row['id']=0;
			$row['flag_x']=0;
			$row['flag_y']=0;
			$row['active']=1;
			$this->users->execute_insert('epg_country',$row);
		}else if($_POST['action']==0){
			$id=$this->users->execute_delete('epg_country','id',$_POST['id']);
		}
		exit(json_encode(array('msg'=>'ok')));
	}
}
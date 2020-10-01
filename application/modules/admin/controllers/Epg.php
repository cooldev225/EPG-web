<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epg extends Admin_Controller {

	public function index()
	{
		$this->load->model('users_model', 'users');
		$this->mViewData['epg_countries_all']=$this->users->execute_query("select a.*,COALESCE(b.cnt,0) site_count,COALESCE(b.csm,0) channel_count from epg_country a left join (select count(*) cnt,sum(channel_count) csm, c.country_id from (select aa.*,COALESCE(bb.cnt,0) channel_count from epg_site aa left join (select count(*) cnt, epg_site_id from epg_channel group by epg_site_id) bb on aa.id=bb.epg_site_id) c group by c.country_id) b on a.id=b.country_id");
		$this->mViewData['page_title']="EPG Config";
		$this->render('epg','default_custom');
	}
}
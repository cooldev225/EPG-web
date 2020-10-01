<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {

	public function index()
	{
		$this->load->model('users_model', 'users');
		
		$start_week = '2020-08-31';//strtotime("last sunday");
		$end_week = '2020-09-05';//strtotime("next saturday",$start_week);
		//$start_week = date("Y-m-d",$start_week);
		//$end_week = date("Y-m-d",$end_week);
		$rows=$this->users->execute_query("select sum(price) as price, count(*) as cnt,time from epg_order where status>0 and time>='{$start_week}' and time<='{$end_week}' group by time order by time");
		$this->mViewData['sales_chart']='';
		$this->mViewData['sales_chart_min']=0;
		$this->mViewData['sales_chart_max']=0;
		$this->mViewData['orders_chart']='';
		$this->mViewData['orders_chart_min']=0;
		$this->mViewData['orders_chart_max']=0;
		foreach ($rows as $row) {
			$orders[$row['time']]=$row;	
			if($this->mViewData['sales_chart_min']==0||$this->mViewData['sales_chart_min']>$row['price'])$this->mViewData['sales_chart_min']=$row['price'];
			if($this->mViewData['sales_chart_max']<$row['price'])$this->mViewData['sales_chart_max']=$row['price'];
			if($this->mViewData['orders_chart_min']==0||$this->mViewData['orders_chart_min']>$row['cnt'])$this->mViewData['orders_chart_min']=$row['cnt'];
			if($this->mViewData['orders_chart_max']<$row['cnt'])$this->mViewData['orders_chart_max']=$row['cnt'];
		}
		for($date = $start_week; $date <= $end_week; $date = date('Y-m-d', strtotime($date. ' + 1 days')))
		{
		    $this->mViewData['sales_chart'].=($this->mViewData['sales_chart']==''?'':',').(isset($orders[$date])?$orders[$date]['price']:0);
		    $this->mViewData['orders_chart'].=($this->mViewData['orders_chart']==''?'':',').(isset($orders[$date])?$orders[$date]['cnt']:0);
		    if(!isset($orders[$date])){
		    	$this->mViewData['sales_chart_min']=0;
		    	$this->mViewData['orders_chart_min']=0;
		    }
		}

		$rows=$this->users->execute_query("select count(*) as cnt,time from site_access where time>='{$start_week}' and time<='{$end_week}' group by time order by time");
		$this->mViewData['site_chart']='';
		$this->mViewData['site_chart_min']=0;
		$this->mViewData['site_chart_max']=0;
		$this->mViewData['site_chart_sum']=0;
		foreach ($rows as $row) {
			$access[$row['time']]=$row;	
			if($this->mViewData['site_chart_min']==0||$this->mViewData['site_chart_min']>$row['cnt'])$this->mViewData['site_chart_min']=$row['cnt'];
			if($this->mViewData['site_chart_max']<$row['cnt'])$this->mViewData['site_chart_max']=$row['cnt'];
			$this->mViewData['site_chart_sum']+=$row['cnt'];
		}
		for($date = $start_week; $date <= $end_week; $date = date('Y-m-d', strtotime($date. ' + 1 days')))
		{
		    $this->mViewData['site_chart'].=($this->mViewData['site_chart']==''?'':',').(isset($access[$date])?$access[$date]['cnt']:0);
		    if(!isset($access[$date]))$this->mViewData['site_chart_min']=0;
		}

		$rows=$this->users->execute_query("select count(*) as cnt,time from (select DATE_FORMAT(FROM_UNIXTIME(`created_on`), '%Y-%m-%d') as time from users) a where a.time>='{$start_week}' and a.time<='{$end_week}' group by a.time order by a.time");
		$this->mViewData['users_chart']='';
		$this->mViewData['users_chart_min']=0;
		$this->mViewData['users_chart_max']=0;
		$this->mViewData['users_chart_sum']=0;
		foreach ($rows as $row) {
			$newusers[$row['time']]=$row;	
			if($this->mViewData['users_chart_min']==0||$this->mViewData['users_chart_min']>$row['cnt'])$this->mViewData['users_chart_min']=$row['cnt'];
			if($this->mViewData['users_chart_max']<$row['cnt'])$this->mViewData['users_chart_max']=$row['cnt'];
			$this->mViewData['users_chart_sum']+=$row['cnt'];
		}
		for($date = $start_week; $date <= $end_week; $date = date('Y-m-d', strtotime($date. ' + 1 days')))
		{
		    $this->mViewData['users_chart'].=($this->mViewData['users_chart']==''?'':',').(isset($newusers[$date])?$newusers[$date]['cnt']:0);
		    if(!isset($newusers[$date]))$this->mViewData['users_chart_min']=0;
		}
		$this->mViewData['page_title']="Dashboard";
		$this->render('home','default_custom');
	}
}
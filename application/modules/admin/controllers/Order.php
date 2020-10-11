<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {
	public function index()
	{
		$this->mViewData['page_title']="Order";
		$this->mViewData['productList']=$this->users->execute_query("select * from epg_product order by id");
		$this->mViewData['userList']=$this->users->execute_query("select id,username from users order by id");
		$this->render('order','default_custom');
	}
	public function getOrderListDatatable(){
		header('Content-Type: application/json');	
		$sql="
			select 
				c.username,
				a.id,a.code,a.status,DATE(a.created_at) as created_at,DATE(a.paid_at) paid_at,a.product_id,
				b.name,b.countries,b.term,b.price,
				IF(a.status=1,DATE(a.paid_at),'') as start,
				IF(a.status=1,IF(
					b.term=0, DATE_ADD(a.paid_at, INTERVAL 3 DAY)
					,IF(b.term=1, DATE_ADD(a.paid_at, INTERVAL 1 MONTH)
						,IF(b.term=2, DATE_ADD(a.paid_at, INTERVAL 3 MONTH)
							,IF(b.term=0, DATE_ADD(a.paid_at, INTERVAL 1 YEAR),''))))
				,'') as end
			from 
				epg_order a 
			left join epg_product b on a.product_id=b.id
			left join users c on a.user_id=c.id
			where a.id>0 
		";
		if(isset($_POST['search']['value'])&&$_POST['search']['value']!=''){
			$sch=$_POST['search']['value'];
			$sql.=" and (a.code like '%{$sch}%' or c.username like '%{$sch}%')";
		}
		$rows=$this->users->execute_query($sql);
		$total_count=count($rows);
		$sort='';
		if(isset($_POST['order']))foreach ($_POST['order'] as $order) {
			if(isset($_POST['columns'][$order['column']]['data'])&&$_POST['columns'][$order['column']]['data']!='0'&&$_POST['columns'][$order['column']]['data']!='num')
				$sort.=($sort==''?'':',')."{$_POST['columns'][$order['column']]['data']} {$order['dir']}";
		}
		if($sort!='')$sql.=" order by {$sort}";

		$res['iTotalDisplayRecords']=$total_count;
		$res['iTotalRecords']=$total_count;
		$res['sEcho']=round($_POST['start']);
		$res['aaData']=$this->users->execute_query($sql." limit ".($_POST['start']*$_POST['length']).",".$_POST['length']);
		$countries=array();
		$countries['*']='*';
		foreach($this->users->execute_query("select * from epg_country ") as $country){
			$countries[$country['id']]=$country['name'];
		}
		for($i=0;$i<count($res['aaData']);$i++) {
			$res['aaData'][$i]['id']=round($res['aaData'][$i]['id']);
			$res['aaData'][$i]['num']=$i+1;
			$t='';
			foreach(explode(',',$res['aaData'][$i]['countries']) as $country){
				$t.=($t==''?'':',').$country;
			}
			$res['aaData'][$i]['countries']=$t;
		}
		
		exit(json_encode($res));
	}
	public function saveOrder()
	{
        header('Content-Type: application/json');	
        $id=$_POST['id'];
        $row=array(
            'id'=>$id,
			'user_id'=>$_POST['user_id'],
			'code'=>$_POST['code'],
            'product_id'=>$_POST['product_id'],
            'created_at'=>$_POST['created_at'],
            'status'=>$_POST['paid_at']==''?0:1,
            'paid_at'=>$_POST['paid_at']==''?null:$_POST['paid_at'],
        );
        if($id){
			$this->users->execute_update('epg_order','id',$row);
		}else{
			$id=$this->users->execute_insert('epg_order',$row);
		}
		exit(json_encode(array('id'=>$id)));
	}
	public function deleteOrder(){
        header('Content-Type: application/json');	
        $id=$this->users->execute_delete('epg_order','id',$_POST['id']);
        exit(json_encode(array('msg'=>'ok')));
    }
}
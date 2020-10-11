<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'users');
    }
    
	public function saveProduct()
	{
        header('Content-Type: application/json');	
        if ( $this->ion_auth ){
            //exit( '??'.$this->ion_auth->logged_in()->user() );
            //exit(json_encode($this->session->userdata('current_user')));
        }
        $id=$_POST['id'];
        $row=array(
            'id'=>$id,
            'name'=>$_POST['name'],
            'countries'=>$_POST['countries'],
            'term'=>$_POST['term'],
            'price'=>$_POST['price'],
            'description'=>$_POST['description'],
            'updated_by'=>1
        );
        if($id){
			$this->users->execute_update('epg_product','id',$row);
		}else{
            $row['created_by']=$row['updated_by'];
			$id=$this->users->execute_insert('epg_product',$row);
		}
		exit(json_encode(array('id'=>$id)));
    }

    public function getProductsDataTable(){

        header('Content-Type: application/json');	
        $sql="SELECT * FROM epg_product a WHERE id>0 ";
        if(isset($_POST['search']['value'])&&$_POST['search']['value']!=''){
			$sch=$_POST['search']['value'];
			$sql.=" and (name like '%{$sch}%' or price like '%{$sch}%')";
		}
        $rows=$this->users->execute_query($sql);
        $total_count=count($rows);
        $sort='';
		foreach ($_POST['order'] as $order) {
			if(isset($_POST['columns'][$order['column']]['data'])&&$_POST['columns'][$order['column']]['data']!='0'&&$_POST['columns'][$order['column']]['data']!='num')
				$sort.=($sort==''?'':',')."{$_POST['columns'][$order['column']]['data']} {$order['dir']}";
		}
        if($sort!='')$sql.=" order by {$sort}";
        
        $res['iTotalDisplayRecords']=$total_count;
		$res['iTotalRecords']=$total_count;
		$res['sEcho']=round($_POST['start']);
        
		$res['aaData']=$this->users->execute_query($sql." limit ".($_POST['start']*$_POST['length']).",".$_POST['length']);
        
        $countries=array();
        $total_sites=0;$total_channels=0;
        foreach($this->users->execute_query("select a.*,COALESCE(b.cnt,0) site_count,COALESCE(b.csm,0) channel_count from epg_country a left join (select count(*) cnt,sum(channel_count) csm, c.country_id from (select aa.*,COALESCE(bb.cnt,0) channel_count from epg_site aa left join (select count(*) cnt, epg_site_id from epg_channel group by epg_site_id) bb on aa.id=bb.epg_site_id) c group by c.country_id) b on a.id=b.country_id where a.active=1") as $country){
            $countries[$country['id']]=$country;
            $total_sites+=$country['site_count'];
            $total_channels+=$country['channel_count'];
        }
		for($i=0;$i<count($res['aaData']);$i++) {
            $res['aaData'][$i]['id']=round($res['aaData'][$i]['id']);
            $res['aaData'][
                
                $i]['countries_name']='';
            $res['aaData'][$i]['site_count']=0;
            $res['aaData'][$i]['channel_count']=0;
			foreach(explode(',',$res['aaData'][$i]['countries']) as $country){
                if($country=='*'){
                    $res['aaData'][$i]['countries_name']='All countries';
                    $res['aaData'][$i]['site_count']=$total_sites;
                    $res['aaData'][$i]['channel_count']=$total_channels;
                    break;
                }
                $res['aaData'][$i]['countries_name'].=($res['aaData'][$i]['countries_name']==''?'':', ').$countries[$country]['name'];
                $res['aaData'][$i]['site_count']+=$countries[$country]['site_count'];
                $res['aaData'][$i]['channel_count']+=$countries[$country]['channel_count'];
            }
        }
        
		exit(json_encode($res));
    }

    public function getProductsKTDataTable(){
        header('Content-Type: application/json');	
		$sql="SELECT * FROM epg_product a ";
		$rows=$this->users->execute_query($sql);
		$_POST['pagination']['total']=count($rows);
		$_POST['pagination']['pages']=round($_POST['pagination']['total']/$_POST['pagination']['perpage'])+($_POST['pagination']['total']%$_POST['pagination']['perpage']<5?1:0);
		//if(isset($_POST['sort']['field'])&&isset($_POST['sort']['sort']))$sql.=" order by {$_POST['sort']['field']} {$_POST['sort']['sort']}";
		$res['data']=$this->users->execute_query($sql." limit ".(($_POST['pagination']['page']-1)*$_POST['pagination']['perpage']).",".$_POST['pagination']['perpage']);
        
        $countries=array();
        $total_sites=0;$total_channels=0;
        foreach($this->users->execute_query("select a.*,COALESCE(b.cnt,0) site_count,COALESCE(b.csm,0) channel_count from epg_country a left join (select count(*) cnt,sum(channel_count) csm, c.country_id from (select aa.*,COALESCE(bb.cnt,0) channel_count from epg_site aa left join (select count(*) cnt, epg_site_id from epg_channel group by epg_site_id) bb on aa.id=bb.epg_site_id) c group by c.country_id) b on a.id=b.country_id where a.active=1") as $country){
            $countries[$country['id']]=$country;
            $total_sites+=$country['site_count'];
            $total_channels+=$country['channel_count'];
        }
		for($i=0;$i<count($res['data']);$i++) {
            $res['data'][$i]['id']=round($res['data'][$i]['id']);
            $res['data'][$i]['countries_name']='';
            $res['data'][$i]['site_count']=0;
            $res['data'][$i]['channel_count']=0;
			foreach(explode(',',$res['data'][$i]['countries']) as $country){
                if($country=='*'){
                    $res['data'][$i]['countries_name']='All countries';
                    $res['data'][$i]['site_count']=$total_sites;
                    $res['data'][$i]['channel_count']=$total_channels;
                    break;
                }
                $res['data'][$i]['countries_name'].=($res['data'][$i]['countries_name']==''?'':', ').$countries[$country]['name'];
                $res['data'][$i]['site_count']+=$countries[$country]['site_count'];
                $res['data'][$i]['channel_count']+=$countries[$country]['channel_count'];
            }
		}
		$res['meta']=$_POST['pagination'];
		exit(json_encode($res));
    }
    public function deleteProduct(){
        header('Content-Type: application/json');	
        $id=$this->users->execute_delete('epg_product','id',$_POST['id']);
        exit(json_encode(array('msg'=>'ok')));
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Epg extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'users');
	}
	public function getSitesDataTable()
	{
		header('Content-Type: application/json');	
		$sql="SELECT a.*,COALESCE(c.cnt,0) channels FROM `epg_site` a LEFT JOIN `epg_country` b ON a.country_id=b.id LEFT JOIN (SELECT count(*) cnt, epg_site_id FROM epg_channel GROUP BY epg_site_id) c ON a.id=c.epg_site_id WHERE b.active>0 and b.id={$_POST['country']}";
		$rows=$this->users->execute_query($sql);
		$_POST['pagination']['total']=count($rows);
		$_POST['pagination']['pages']=round($_POST['pagination']['total']/$_POST['pagination']['perpage'])+($_POST['pagination']['total']%$_POST['pagination']['perpage']<5?1:0);
		if(isset($_POST['sort']['field'])&&isset($_POST['sort']['sort']))$sql.=" order by {$_POST['sort']['field']} {$_POST['sort']['sort']}";
		$res['data']=$this->users->execute_query($sql." limit ".(($_POST['pagination']['page']-1)*$_POST['pagination']['perpage']).",".$_POST['pagination']['perpage']);

		for($i=0;$i<count($res['data']);$i++) {
			$res['data'][$i]['id']=round($res['data'][$i]['id']);
			$res['data'][$i]['status']=2;
			$res['data'][$i]['site_channels']=$res['data'];
		}
		$res['meta']=$_POST['pagination'];
		exit(json_encode($res));
	}
	public function getChannelsBySiteDataTable(){
		header('Content-Type: application/json');	
		$sql="SELECT a.* FROM `epg_channel` a WHERE a.epg_site_id={$_POST['site']}";
		$rows=$this->users->execute_query($sql);
		$_POST['pagination']['total']=count($rows);
		$_POST['pagination']['pages']=round($_POST['pagination']['total']/$_POST['pagination']['perpage'])+($_POST['pagination']['total']%$_POST['pagination']['perpage']<5?1:0);
		if(isset($_POST['sort']['field'])&&isset($_POST['sort']['sort']))$sql.=" order by {$_POST['sort']['field']} {$_POST['sort']['sort']}";
		$res['data']=$this->users->execute_query($sql." limit ".(($_POST['pagination']['page']-1)*$_POST['pagination']['perpage']).",".$_POST['pagination']['perpage']);

		for($i=0;$i<count($res['data']);$i++) {
			$res['data'][$i]['id']=round($res['data'][$i]['id']);
		}
		$res['meta']=$_POST['pagination'];
		exit(json_encode($res));
	}
	public function getCustomersKTDataTable(){
		header('Content-Type: application/json');	
		$sql="SELECT a.* FROM `users` a WHERE a.id>0 ";
		$rows=$this->users->execute_query($sql);
		$_POST['pagination']['total']=count($rows);
		$_POST['pagination']['pages']=round($_POST['pagination']['total']/$_POST['pagination']['perpage'])+($_POST['pagination']['total']%$_POST['pagination']['perpage']<5?1:0);
		if(isset($_POST['sort']['field'])&&isset($_POST['sort']['sort']))$sql.=" order by {$_POST['sort']['field']} {$_POST['sort']['sort']}";
		$res['data']=$this->users->execute_query($sql." limit ".(($_POST['pagination']['page']-1)*$_POST['pagination']['perpage']).",".$_POST['pagination']['perpage']);


		for($i=0;$i<count($res['data']);$i++) {
			$res['data'][$i]['id']=round($res['data'][$i]['id']);
			$res['data'][$i]['created_on']=date('Y-m-d H:i:s',$res['data'][$i]['created_on']);
			$res['data'][$i]['num']=$i+1;
		}
		$res['meta']=$_POST['pagination'];
		exit(json_encode($res));
	}

	public function getSitesList(){
		header('Content-Type: application/json');
		$res=$this->users->execute_query('select id,name from epg_site where country_id='.$_POST['id']);
		exit(json_encode($res));
	}
	public function getChannelsList(){
		header('Content-Type: application/json');
		$res=$this->users->execute_query('select id,name from epg_channel where epg_site_id='.$_POST['id']);
		exit(json_encode($res));
	}
	public function setZoneOffset(){
		header('Content-Type: application/json');
		if($_POST['channel_id']==0){
			if($_POST['site_id']==0){
				if($_POST['country_id']==0){
					$sql="update epg_channel set zone={$_POST['zone']}";
				}else{
					foreach($this->users->execute_query("select * from epg_site where country_id={$_POST['country_id']}") as $site){
						$sql="update epg_channel set zone={$_POST['zone']} where epg_site_id={$site['id']}";
					}
				}
			}else $sql="update epg_channel set zone={$_POST['zone']} where epg_site_id={$_POST['site_id']}";
		}
		else $sql="update epg_channel set zone={$_POST['zone']} where id IN ({$_POST['channel_id']})";
		$this->users->execute_query_no_result($sql);
		exit(json_encode(array('msg'=>'ok')));
	}

	public function getCustomersDataTable(){
		header('Content-Type: application/json');	
		$sql="SELECT a.* FROM `users` a WHERE a.id>0 ";
		if(isset($_POST['search']['value'])&&$_POST['search']['value']!=''){
			$sch=$_POST['search']['value'];
			$sql.=" and (username like '%{$sch}%' or email like '%{$sch}%' or first_name like '%{$sch}%' or last_name like '%{$sch}%' or phone like '%{$sch}%' or country like '%{$sch}%' or city like '%{$sch}%' or street like '%{$sch}%')";
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


		for($i=0;$i<count($res['aaData']);$i++) {
			$res['aaData'][$i]['id']=round($res['aaData'][$i]['id']);
			$res['aaData'][$i]['created_on']=date('Y-m-d H:i:s',$res['aaData'][$i]['created_on']);
			$res['aaData'][$i]['num']=$i+1;
		}
		
		exit(json_encode($res));
	}

	public function updateUser(){
		header('Content-Type: application/json');
		$id=isset($_POST['id'])?$_POST['id']:0;
		if($id>0)$this->ion_auth->update($id, $_POST);
		else{
			$id = $this->ion_auth->register($_POST['username'], '123456', $_POST['email'], $_POST, array(1));	
		} 
		exit(json_encode(array('msg'=>$id>0?'ok':'error')));
	}

	public function deleteUser(){
		header('Content-Type: application/json');
		$id=isset($_POST['id'])?$_POST['id']:0;
		$res=true;
		if($id>0)$res=$this->ion_auth->delete_user($id);
		//$this->users->execute_delete('users','id',$id);//
		exit(json_encode(array('msg'=>$res?'ok':'error')));
	}


	public function resetPasswordUser(){
		header('Content-Type: application/json');	
		$id=isset($_POST['id'])?$_POST['id']:0;
		$row=array(
			'password'=>'123456'
		);
		$this->ion_auth->update($id, $row);
		exit(json_encode(array('msg'=>'ok')));
	}

	public function resetActiveUser(){
		header('Content-Type: application/json');	
		$id=isset($_POST['id'])?$_POST['id']:0;
		$row=array(
			'active'=>$_POST['active']
		);
		$this->ion_auth->update($id, $row);
		exit(json_encode(array('msg'=>'ok')));
	}




	public function importChannelsFromXml(){
		header('Content-Type: application/json');
		//Make sure that this is a POST request.
		//if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
		    //If it isn't, send back a 405 Method Not Allowed header.
		//    header($_SERVER["SERVER_PROTOCOL"]." 405 Method Not Allowed", true, 405);
		//    exit;
//}
		$xmldata=file_get_contents($_FILES['file']['tmp_name']);
		/*$xmldata=json_encode($xmldata);
		$xml = simplexml_load_file($_FILES['file']['tmp_name']) or die('Failed to create an object');
		if($xml === false) {
		    header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request", true, 400);
		    foreach(libxml_get_errors() as $xmlError) {
		        echo $xmlError->message . "\n";
		    }
		    exit;
		}
		$arr=$this->xml2array($xml);
		*/
		$xmldata=substr($xmldata,strpos($xmldata,'update="i" site="')+17);
		$site=substr($xmldata,0,strpos($xmldata,'"'));
exit($xmldata);
		$rows=$this->users->execute_query("select * from epg_site where name='{$site}'");
		$sid=0;
		if(count($rows)){
			$sid=$rows[0]['id'];
		}else{
			$row=array(
				'id'=>0,
				'country_id'=>$_POST['country'],
				'name'=>$site,
				'logo'=>'',
				'url'=>''
			);
			$sid=$this->users->execute_insert('epg_site',$row);
		}
		$this->users->execute_query_no_result("delete from epg_channel where epg_site_id={$sid}");
		for(;;) { 
			$xmldata=substr($xmldata,strpos($xmldata,'site_id="')+9);
			$site_id=substr($xmldata,0,strpos($xmldata,'"'));
			$xmldata=substr($xmldata, strlen($site_id)+2);
			
			$xmldata=substr($xmldata,strpos($xmldata,'">')+2);
			$channel=substr($xmldata,0,strpos($xmldata,'</channel>'));
			$xmldata=substr($xmldata, strlen($channel));
			if($site_id==''||$channel=='')break;

			$rows=$this->users->execute_query("select count(*) as cnt from epg_channel where xmltv_id='{$channel}'");
			if($rows[0]['cnt']){
				for($i=1;;$i++){
					$rows=$this->users->execute_query("select count(*) as cnt from epg_channel where xmltv_id='{$channel} ({$i})'");
					if(!$rows[0]['cnt']){
						$channel.=" ({$i})";
						break;
					}
				}
			}
			$row=array(
				'id'=>0,
				'name'=>$channel,
				'icon'=>'',
				'url'=>'',
				'site_id'=>$site_id,
				'xmltv_id'=>$channel,
				'price'=>0,
				'epg_site_id'=>$sid,
				'active'=>1
			);
			$this->users->execute_insert('epg_channel',$row);
		}


		$res=array('msg'=>'ok','country'=>$_POST['country']);
		exit(json_encode($res));
	}

	public function updateEPConfigToXml(){
		$channels='';
		$rows=$this->users->execute_query("select a.*,b.name as sitename from epg_channel a left join epg_site b on a.epg_site_id=b.id where a.active=1");
		foreach ($rows as $row) {
			$channels.='<channel site="'.$row['sitename'].'" site_id="'.$row['site_id'].'" update="i" xmltv_id="'.$row['xmltv_id'].'">'.$row['name'].'</channel>\n';
		}
		$txt='<?xml version="1.0"?>
			<settings>
			  <filename>/root/epg_work/.wg++/guide.xml</filename>
			  <mode></mode>
			  <postprocess grab="y" run="n">rex</postprocess>
			  <user-agent>Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36 Edg/79.0.309.71</user-agent>
			  <logging>on</logging>
			  <retry time-out="5">4</retry>
			  <timespan>0</timespan>
			  <update>f</update>
			  '.$channels.'
			</settings>';
		//$fp=fopen('/epg/WebGrab++.config1.xml','rw');
		//fwrite($fp,$txt);
		$res=array('msg'=>'ok','config'=>$txt);
		exit(json_encode($res));
	}	

	public function updateEPGdataFromXml(){
		$rows=$this->users->execute_query("select * from epg_status order by moment desc");

		$prev_date=str_replace('-','',count($rows)?$rows[0]['moment']:"");
		$prev_date=explode(' ', $prev_date)[0];

		$xmldata=file_get_contents('epg/guide.xml');

		$date=substr($xmldata,strpos($xmldata,'programme start="')+17,8);

		//$file = 'epg/guide.xml';//getcwd().'\\epg\\guide.xml';
		//$filesize = filesize($file);
		if(count($rows)==0||strlen($xmldata)!=$rows[0]['filesize']){
		//if($prev_date!=$date){
			$this->users->execute_query_no_result("delete from epg_programme");// where start>={$date};");
			$row=array(
				'moment'=>substr($date,0,4).'-'.substr($date,4,2).'-'.substr($date,6,2).date(' H:i:s'),
				'filesize'=>strlen($xmldata),
				'status'=>1
			);
			$this->users->execute_insert('epg_status',$row);
			for($xmldata=substr($xmldata,strpos($xmldata,'<channel'));;) {
				$channel=substr($xmldata,0,strpos($xmldata,'/channel>')+9);
				$xmldata=substr($xmldata,strpos($xmldata,'/channel>')+9);

				
				$channel=substr($channel,strpos($channel,'id="')+4);
				$channel_id=substr($channel,0,strpos($channel,'">'));
				$icon='';$url='';

				if(!strpos($channel, 'src="')===false){
					$channel=substr($channel,strpos($channel,'src="')+5);
					$icon=substr($channel,0,strpos($channel,'"'));
				}
				
				if(!strpos($channel, '<url>')===false){
					$channel=substr($channel,strpos($channel,'<url>')+5);
					$url=substr($channel,0,strpos($channel,'</url>'));	
				}

				$this->users->execute_query_no_result("update epg_channel set icon='{$icon}',url='{$url}' where xmltv_id='".$channel_id."'");//mb_convert_encoding($channel_id, 'UTF-8', 'Windows-1252')
				if($channel==''||strpos($xmldata, '<channel')===false)break;		
			}
			
	  		for($xmldata=substr($xmldata,strpos($xmldata,'<programme'));;) {
	  			$programme=substr($xmldata,0,strpos($xmldata,'/programme>')+11);
	  			$xmldata=substr($xmldata,strpos($xmldata,'/programme>')+11);

				$programme=substr($programme,strpos($programme,'programme start="')+17);
				$start=substr($programme,0,14);
				$zone=substr($programme,15,5);

				$programme=substr($programme,strpos($programme,'stop="')+6);
				$stop=substr($programme,0,14);
				
				$programme=substr($programme,strpos($programme,'channel="')+9);
				$channel=substr($programme,0,strpos($programme,'">'));
				$programme=substr($programme, strpos($programme,'">')+2);

				$etc=substr($programme, 0, strpos($programme,'</programme>'));

				$lang=$lang1='';
				$title=$title1='';
				$description=$description1='';

				if(!strpos($programme, 'title lang="')===false){
					$programme=substr($programme,strpos($programme,'<title lang="')+13);
					$lang=substr($programme,0,strpos($programme,'"'));
					$programme=substr($programme,strpos($programme,'">')+2);
					$title=substr($programme,0,strpos($programme,'</title>'));
					$programme=substr($programme, strpos($programme,'</title>')+8);
				}
				
				if((!strpos($programme, 'desc lang="')===false)&&(!strpos($programme, 'title lang="')===false)&&strpos($programme, 'desc lang="')>strpos($programme, 'title lang="')){
					$programme=substr($programme,strpos($programme,'<title lang="')+13);
					$lang1=substr($programme,0,strpos($programme,'"'));
					$programme=substr($programme,strpos($programme,'">')+2);
					$title1=substr($programme,0,strpos($programme,'</title>'));
					$programme=substr($programme, strpos($programme,'</title>')+8);
				}
				
				if(!strpos($programme, 'desc lang="')===false){
					$programme=substr($programme,strpos($programme,'>')+1);
					$description=substr($programme,0,strpos($programme,'</desc>'));
					$programme=substr($programme, strpos($programme,'</desc>')+7);
				}

				if(!strpos($programme, 'title lang="')===false){
					$programme=substr($programme,strpos($programme,'<title lang="')+13);
					$lang1=substr($programme,0,strpos($programme,'"'));
					$programme=substr($programme,strpos($programme,'">')+2);
					$title1=substr($programme,0,strpos($programme,'</title>'));
					$programme=substr($programme, strpos($programme,'</title>')+8);
				}

				if(!strpos($programme, 'desc lang="')===false){
					$programme=substr($programme,strpos($programme,'>')+1);
					$description1=substr($programme,0,strpos($programme,'</desc>'));
					$programme=substr($programme, strpos($programme,'</desc>')+7);
				}

				if($start==''||$stop=='')break;

				$row=array(
					'id'=>0,
					'channel_id'=>$channel,
					'start'=>$start,
					'stop'=>$stop,
					'zone'=>$zone,
					'lang'=>$lang,
					'title'=>$title,
					'description'=>$description,
					'lang1'=>$lang1,
					'title1'=>$title1,
					'description1'=>$description1,
					'etc'=>$etc
				);
				$this->users->execute_insert('epg_programme',$row);
			}
		
			
		
		}

		$rows=$this->users->execute_query("select * from epg_status order by moment desc");
		$date=count($rows)?$rows[0]['moment']:"";
		$res=array('msg'=>'ok','date'=>$date);
		exit(json_encode($res));
	}

	public function removeCountryAtEPG(){
		$this->users->execute_query_no_result("update epg_country set active=0 where id={$_POST['id']};");
		$res=array('msg'=>'ok');
		exit(json_encode($res));
	}

	public function configCountriesAtEPG(){
		$this->users->execute_query_no_result("update epg_country set active=0");
		$this->users->execute_query_no_result("update epg_country set active=1 where id in ({$_POST['ids']});");
		$res=array('msg'=>'ok');
		exit(json_encode($res));
	}

	public function removeChannelsBySite(){
		if(isset($_POST['site'])){
			$this->users->execute_query_no_result("delete from epg_channel where epg_site_id={$_POST['site']};");
			$this->users->execute_query_no_result("delete from epg_site where id={$_POST['site']};");
		}
		$res=array('msg'=>'ok');
		exit(json_encode($res));	
	}

	public function exportConfig(){
		header('Content-Type: application/xml');
		$country=isset($_GET['a'])?$_GET['a']:(isset($_POST['a'])?$_POST['a']:0);
		$txt='<?xml version="1.0" encoding="UTF-8"?>
<site generator-info-name="WebGrab+Plus/w MDB &amp; REX Postprocess -- version 1.1.1/53.17 -- Jan van Straaten" site="bulsat.com">
  <channels>';
    	$sql="select a.*,b.name as sitename from epg_channel a left join epg_site b on a.epg_site_id=b.id left join epg_country c on b.country_id=c.id where c.id>0 ";
    	if($country)$sql.=" and c.id={$country}";
    	$sql.=" order by c.id, b.id, a.id";	
    	$rows=$this->users->execute_query($sql);
    	foreach ($rows as $row) {
    		$txt.='<channel update="i" site="'.$row['sitename'].'" site_id="'.$row['site_id'].'" xmltv_id="'.$row['xmltv_id'].'">'.$row['name'].'</channel>';
    	}
    	$txt.='</channels>
</site>';
		exit($txt);
	}

	public function downloadEPGdata(){
		header('Content-Type: application/xml');
		$rows=$this->users->execute_query("select * from epg_status order by moment desc");
		$date=count($rows)?$rows[0]['moment']:"";
		if($date=='')exit('no result');
		$country=isset($_GET['a'])?$_GET['a']:(isset($_POST['a'])?$_POST['a']:0);

		$current_location_zone='+00:00';
		$current_location_zone_str=str_replace(':', '', $current_location_zone);
		$this->users->execute_query_no_result('SET @@session.time_zone = "'.$current_location_zone.'";');
  		$sql="select a.*,b.name as sitename from epg_channel a left join epg_site b on a.epg_site_id=b.id left join epg_country c on b.country_id=c.id where c.id>0 ";
    	if($country)$sql.=" and c.id={$country}";
    	$sql.=" order by c.id, b.id, a.id";	
    	$rows=$this->users->execute_query($sql);
    	$body='';
    	$prog='';
    	foreach ($rows as $row) {
    		$body.='<channel id="'.$row['xmltv_id'].'">
    		<display-name lang="en">'.$row['name'].'</display-name>
    <icon src="'.$row['icon'].'" />
    <url>'.$row['url'].'</url>
  </channel>';
			
			$zonecode=($row['zone']<0?'-':'+').(abs($row['zone'])<10?'0'.abs($row['zone']):$row['zone']).('00');
			$this->users->execute_query_no_result('SET @@session.time_zone = "'.$current_location_zone.'";');
			  //$programmes=$this->users->execute_query("select *,CONVERT_TZ(`start`, @@session.time_zone, CONCAT(SUBSTRING(`zone`,1,3),':',SUBSTRING(`zone`,4,2)) ) as fstart,CONVERT_TZ(`stop`, @@session.time_zone, CONCAT(SUBSTRING(`zone`,1,3),':',SUBSTRING(`zone`,4,2)) ) as fstop from epg_programme where channel_id='{$row['xmltv_id']}' and start>='{$date}' order by start");
			  $programmes=$this->users->execute_query("select *,CONVERT_TZ(`start`, CONCAT(SUBSTRING(`zone`,1,3),':',SUBSTRING(`zone`,4,2)) , CONCAT(SUBSTRING('{$zonecode}',1,3),':',SUBSTRING('{$zonecode}',4,2)) ) as fstart,CONVERT_TZ(`stop`, CONCAT(SUBSTRING(`zone`,1,3),':',SUBSTRING(`zone`,4,2)) , CONCAT(SUBSTRING('{$zonecode}',1,3),':',SUBSTRING('{$zonecode}',4,2)) ) as fstop from epg_programme where channel_id='{$row['xmltv_id']}' and start>='{$date}' order by start");
  			foreach($programmes as $programme){
  				/*
  				$prog.='
<programme start="'.$programme['fstart'].' '.$current_location_zone_str.'" stop="'.$programme['fstop'].' '.$current_location_zone_str.'" channel="'.$programme['channel_id'].'">';
				*/
				/*
				$prog.='
<programme start="'.$programme['start'].' '.$programme['zone'].'" stop="'.$programme['stop'].' '.$programme['zone'].'" channel="'.$programme['channel_id'].'">';
				*/
				$programme['start']=str_replace('-','',str_replace(' ','',str_replace(':','',$programme['fstart'])));
				$programme['stop']=str_replace('-','',str_replace(' ','',str_replace(':','',$programme['fstop'])));
				$prog.='
<programme start="'.$programme['start'].' '.$zonecode.'" stop="'.$programme['stop'].' '.$zonecode.'" channel="'.$programme['channel_id'].'">';
				/*
  				if($programme['title']!='')$prog.='
	<title lang="'.$programme['lang'].'">'.$programme['title'].'</title>';
				if($programme['description']!='')$prog.='
	<desc lang="'.$programme['lang'].'">'.$programme['description'].'</desc>';
  				if($programme['title1']!='')$prog.='
	<title lang="'.$programme['lang1'].'">'.$programme['title1'].'</title>';
				if($programme['description1']!='')$prog.='
	<desc lang="'.$programme['lang1'].'">'.$programme['description1'].'</desc>';
	*/
				$prog.=$programme['etc'];
  				$prog.='
</programme>';
  			}
    	}
		$txt='<?xml version="1.0" encoding="UTF-8"?>
		<tv generator-info-name="WebGrab+Plus/w MDB &amp; REX Postprocess -- version  V3.1.0.0 -- Jan van Straaten" generator-info-url="http://www.webgrabplus.com">
		'.$body.$prog.'
  </tv>';
		exit($txt);
	}

	/**
	 * function xml2array
	 *
	 * This function is part of the PHP manual.
	 *
	 * The PHP manual text and comments are covered by the Creative Commons 
	 * Attribution 3.0 License, copyright (c) the PHP Documentation Group
	 *
	 * @author  k dot antczak at livedata dot pl
	 * @date    2011-04-22 06:08 UTC
	 * @link    http://www.php.net/manual/en/ref.simplexml.php#103617
	 * @license http://www.php.net/license/index.php#doc-lic
	 * @license http://creativecommons.org/licenses/by/3.0/
	 * @license CC-BY-3.0 <http://spdx.org/licenses/CC-BY-3.0>
	 */
	public function xml2array ( $xmlObject, $out = array () )
	{
	    foreach ( (array) $xmlObject as $index => $node )
	        $out[$index] = ( is_object ( $node ) ) ? $this->xml2array ( $node ) : $node;

	    return $out;
	}



	private static function generateXmlFromArray($array, $node_name) {
	    $xml = '';

	    if (is_array($array) || is_object($array)) {
	        foreach ($array as $key=>$value) {
	            if($value != null){
	                if (is_numeric($key)) {
	                    $key = rtrim($node_name, "s"); //remove the plural if array
	                }
	                if(is_array($value) || is_object($value)){
	                    $xml .= '<' . $key;
	                    foreach ($value as $nextKey => $nextValue) {
	                        if(strpos($nextKey, "__") !== false && $nextValue != null){
	                            $xml .= ' ' . substr($nextKey, 2) . '="' . $nextValue . '"' ;
	                            if(is_object($value)) $value->$nextKey = null; 
	                            else if(is_array($value)) $value[$nextKey] = null;
	                        }
	                    }
	                    $xml .= '>' . self::generateXmlFromArray($value, $key) . '</' . $key . '>';
	                }else if($key == "_"){
	                    $xml = self::generateXmlFromArray($value, $key);
	                }else{
	                    $xml .= '<' . $key . '>' . self::generateXmlFromArray($value, $key) . '</' . $key . '>';   
	                }
	            }else self::generateXmlFromArray($value, $key);
	        }
	    } else {
	        $xml = htmlspecialchars($array, ENT_QUOTES);
	    }
	    return $xml;
	}
}

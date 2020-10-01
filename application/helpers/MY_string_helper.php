<?php

/**
 * Helper class to work with string
 */

// check whether a string starts with the target substring
function starts_with($haystack, $needle)
{
	return substr($haystack, 0, strlen($needle))===$needle;
}

// check whether a string ends with the target substring
function ends_with($haystack, $needle)
{
	return substr($haystack, -strlen($needle))===$needle;
}

function get_friendly_time($date){
	$str=explode(' ',$date);
	if(count($str)>1)$date=$str[1];
	$str=explode(':',$date);
	$h=0;$m=0;
	if(count($str)>0)$h=$str[0]<10?str_replace('0', '', $str[0]):$str[0];
	if(count($str)>1)$m=$str[1];
	return $h.':'.$m;
}

function _get_day($date){
	$str=explode('/',$date);
	if(count($str)>0)if($str[0]>0)return $str[0];
	return 1;
}
function _get_month($date){
	$str=explode('/',$date);
	if(count($str)>1)if($str[1]>0)return $str[1];
	return 1;
}
function _get_year($date){
	$str=explode('/',$date);
	if(count($str)>2)if($str[2]>0)return $str[2];
	return 2019;
}
function _get_hour($time){
	$str=explode(':',$time);
	if(count($str)>0)if($str[0]>0)return $str[0];
	return 1;
}
function _get_minute($time){
	$str=explode(':',$time);
	if(count($str)>1)if($str[1]>0)return $str[1];
	return 1;
}
function _comp_time($t1,$t2){
	$st1=explode(':',$t1);
	$st2=explode(':',$t2);
	if(count($st1)==0&&count($st2)==0)return 0;
	if(count($st2)==0)return -1; 
	if(count($st1)==0)return 1;
	if($st1[0]<$st2[0])return 1;
	if($st1[0]>$st2[0])return -1;
	if(count($st1)==1&&count($st2)==1)return 0;
	if(count($st2)==1)return -1; 
	if(count($st1)==1)return 1;
	if($st1[1]<$st2[1])return 1;
	if($st1[1]>$st2[1])return -1;
	if(count($st1)==2&&count($st2)==2)return 0;
	if(count($st2)==2)return -1; 
	if(count($st1)==2)return 1;
	if($st1[2]<$st2[2])return 1;
	if($st1[2]>$st2[2])return -1;
}
function _get_time_plus_minutes($t,$m){
	$st=explde(':',$t);
	$m1=(int)($m+$st[1])/10;
	$m2=(int)($m+$st[1])%10;
	return (($st[0]+$m1)%24).":".$m2.":".$st[2];
}
function _get_date_plus_days($d,$n){
	$st=explde('/',$d);
	$t=mktime($st[0],$st[1],$st[2],0,0,0)+$n*86400;
	return date("m/d/Y",$t);
}
function getDeliveryList($cdate='',$ctime='',$udate='',$type='card')
{
	if($cdate=="")$cdate=date('d/m/Y');
	if($ctime=="")$ctime=date("H:i:n");
	if($udate=="")$udate=date('d/m/Y');
	$list=array();
	$cnt=0;

	//if(_comp_time($ctime,"13:00:00")<=0){
	$list[$cnt]['type']='Standard Delivery Times';
	$list[$cnt]['title']='Same Day (Evening Express) Delivery:';
	$list[$cnt]['time']='Arrives in between 7 to 12 pm any time';
	$list[$cnt]['description']='*Currently, this service is available for selected postcodes';
	if($type=='card')$list[$cnt]['cost']='5.99';
	else if($type=='gift')$list[$cnt]['cost']='5.99';
	$cnt++;
	//}

	//if(_comp_time($ctime,"13:00:00")<=0){
	$list[$cnt]['type']='Standard Delivery Times';
	$list[$cnt]['title']='Same Day Special Delivery';
	$list[$cnt]['time']='Arrives in between 10 to 20 minutes time specified by customer';
	$list[$cnt]['description']='';
	if($type=='card')$list[$cnt]['cost']='9.99';
	else if($type=='gift')$list[$cnt]['cost']='9.99';
	$cnt++;
	//}

	//if(_comp_time($ctime,"16:00:00")<=0){
	$list[$cnt]['type']='Standard Delivery Times';
	$list[$cnt]['title']='First Class Post';
	$list[$cnt]['time']='Arrives within 1-3 working days';
	$list[$cnt]['description']='';
	$list[$cnt]['cost']='9.99';
	$cnt++;
	//}

	//if(_comp_time($ctime,"15:00:00")<=0){
	$list[$cnt]['type']='UK Next Working Day ';
	$list[$cnt]['title']='UK Next Working Day';
	$list[$cnt]['time']='Guaranteed on chosen date before 1pm - as early as next working day.';
	$list[$cnt]['description']='Signature required.';
	$list[$cnt]['cost']='6.75';
	$cnt++;
	//}

	//if(_comp_time($ctime,"16:00:00")<=0){
	$list[$cnt]['type']='Royal Mail Saturday Special Delivery ';
	$list[$cnt]['title']='Royal Mail Saturday Special Delivery ';
	$list[$cnt]['time']='Guaranteed on chosen Saturday before 1pm.';
	$list[$cnt]['description']='Signature required.';
	$list[$cnt]['cost']='14';
	$cnt++;
	//}


	return $list;
}

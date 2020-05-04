<?php
include_once('config.php');
class Astrologer extends DB{

	function __construct(){
		$this->connect();
	}
	

	function astrologerListing(){
		
		$response = array();
		$arr=array();
		$sql="SELECT * FROM `wl_astrologer` where status='1'  order by sort_order asc";
		$select_query = mysqli_query($this->conn,$sql);
		$arr['Result'] = array("success"=>1,"code"=>0);
		
		while($rec = mysqli_fetch_array($select_query)){
			if($rec['astrologer_image']==""){
			 $image_url=0;
			}else{
			   $image_url = "https://www.astropatrika.com/uploaded_files/astrologer/".$rec['astrologer_image'];
			}
			$arr['Result']['data'][] = array('astrologer_id'=>$rec['astrologer_id'],'astrologer_name'=>$rec['astrologer_name'],"astro_phone"=>$rec['astro_phone'],"astrologer_experience"=>$rec['astrologer_experience'],"astrologer_image"=>$image_url,'astrologer_expertise'=>$rec['astrologer_expertise']);
			
		}
		//print_r($arr);
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	
	}
	

 function astrologerDetail($fields){
		
		$response = array();
		$arr=array();
		$select_query = mysqli_query($this->conn,"SELECT * FROM `wl_astrologer` where status='1' AND astrologer_id='".$fields['astrologer_id']."'");
		$arr['Result'] = array("success"=>1,"code"=>0);
		$rec = mysqli_fetch_array($select_query);
		
		if($rec['astrologer_image']==""){
		 $image_url=0;
		}else{
		   $image_url = "https://www.astropatrika.com/uploaded_files/astrologer/".$rec['astrologer_image'];
		}
		$arr['Result']['data'][] = array('astrologer_id'=>$rec['astrologer_id'],'astrologer_name'=>$rec['astrologer_name'],"astro_phone"=>$rec['astro_phone'],"astrologer_experience"=>$rec['astrologer_experience'],"astrologer_details"=>$rec['astrologer_details'],"astrologer_image"=>$image_url,'astrologer_expertise'=>$rec['astrologer_expertise']);
		 
		return json_encode($arr,JSON_UNESCAPED_SLASHES);
	
	}
	

}
	
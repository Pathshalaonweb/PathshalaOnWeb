<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forum_model extends MY_Model{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_forum($offset=FALSE,$per_page=FALSE)
	{
		
		$keyword = $this->db->escape_str(trim($this->input->get_post('keyword',TRUE)));		
		$condtion = ($keyword!='') ? "status !='2' AND ( topicTitle LIKE '%".$keyword."%') ":"status !='2'";
		
		$fetch_config = array(
		'condition'=>$condtion,
		'order'=>"topicID DESC",
		'limit'=>$per_page,
		'start'=>$offset,							 
		'debug'=>FALSE,
		'return_type'=>"array"							  
		);		
		$result = $this->findAll('wl_forum_topics',$fetch_config);
		return $result;	
		
	}




	
	public function get_forum_by_id($id)
	{
		
		$id = applyFilter('NUMERIC_GT_ZERO',$id);
		
		if($id>0)
		{
			$condtion = "status !='2' AND topicID=$id";
			$fetch_config = array(
			'condition'=>$condtion,							 					 
			'debug'=>FALSE,
			'return_type'=>"object"							  
			);
			$result = $this->find('wl_forum_topics',$fetch_config);
			return $result;		
		}
		
	}
	
	
	// Forum comments start here..............	
	
	public function change_commentstatus(){
	
	   $arr_ids = $_REQUEST['arr_ids'];
	  
		if(is_array($arr_ids))
		{
			//trace($this->input->post());exit;
		
			$str_ids = implode(',', $arr_ids);
			
			if($this->input->post('status_action')=='Activate'){
			
				$query = $this->db->query("UPDATE wl_forum_topic_responses   
				                           SET status='1' 
										   WHERE replyID in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('activate'));
				
			}
			
			if($this->input->post('status_action')=='Deactivate'){
			
				$query = $this->db->query("UPDATE wl_forum_topic_responses  
				                           SET status='0' 
										   WHERE replyID in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('deactivate'));	
				
			}
			
			if($this->input->post('status_action')=='Delete'){
			
				$query = $this->db->query("DELETE FROM wl_forum_topic_responses 
				                           WHERE replyID in ($str_ids)");
										   
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('deleted'));	
			}
		}
	}
	
   
   public function getForumcommentCount($id=FALSE){
	    
		$srchkeywrd=$this->db->escape_str($this->input->post('keyword'));
		
		$condwhere="wl_forum_topic_responses.status !='2' ";
		
		if($srchkeywrd!=''){
		
		 $condwhere.="AND (wl_forum_topics.topicTitle like '%$srchkeywrd%') ";
		 
		}
		if($id!=''){
		
		   $condwhere.="AND wl_forum_topic_responses.topicID='".$id."' ";
		 
		}
		
		$this->db->select('*');
		$this->db->from('wl_forum_topic_responses');
		$this->db->where($condwhere);
		$this->db->join('wl_forum_topics', 'wl_forum_topic_responses.topicID = wl_forum_topics.topicID');
		$query=$this->db->get();
		
		$numrows=$query->num_rows();
		
		return $numrows;
	
	}
	
	
	public function getForumcomment($offset=FALSE,$per_page=FALSE,$id=FALSE){
	    
		$srchkeywrd=$this->db->escape_str($this->input->get_post('keyword'));
		 
		$condwhere="wl_forum_topic_responses.status !='2' ";
		
		if($srchkeywrd!=''){
		
		 $condwhere.="AND (wl_forum_topic_responses.name like '%$srchkeywrd%' or wl_forum_topics.topicTitle like '%$srchkeywrd%') ";
		 
		}
		if($id!=''){
		
		   $condwhere.="AND wl_forum_topic_responses.topicID='".$id."' ";
		 
		}
		
		$this->db->select('wl_forum_topic_responses.*,wl_forum_topics.topicTitle');
		$this->db->from('wl_forum_topic_responses');
		$this->db->where($condwhere);
		$this->db->join('wl_forum_topics', 'wl_forum_topic_responses.topicID = wl_forum_topics.topicID');
		$this->db->order_by("wl_forum_topic_responses.replyID", "desc"); 
		$this->db->limit($offset,$per_page);
		
		$query=$this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result_array();
		}
	}
	
	public function getForumcomment_by_id($id){
	
		if($id!='' && is_numeric($id)){
			$this->db->select("*");
			$this->db->where("replyID",$id);
			$query = $this->db->get('wl_forum_topic_responses');
			if ($query->num_rows() > 0){
				return $query->row();
			}
		}
	}
	
	public function get_totalcomment_by_topicid($id){
	
		if($id!='' && is_numeric($id)){
			$this->db->select("*");
			$this->db->where("topicID",$id);
			$query = $this->db->get('wl_forum_topic_responses');
			return $query->num_rows();
		}
	}
	
	
	// End  Forum comments start here..............	
	
	
}
// model end here
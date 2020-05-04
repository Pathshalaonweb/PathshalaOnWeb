<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load the database library
       // $this->load->database();
        $this->userTbl = 'wl_customers';
    }

    /*
     * Get rows from the users table
    */
  public function findAll($tbl,$exparams=array())
	{
		$fields      = !array_key_exists('field',$exparams)       ? "*"         : $exparams['field'];
		$conditions  = !array_key_exists('condition',$exparams)   ?  'NULL'     : $exparams['condition'];	 
		$order       = !array_key_exists('order',$exparams)       ?  'NULL'     : $exparams['order'];
		$start       = !array_key_exists('start',$exparams)       ?  '0'        : $exparams['start'];
		$limit       = !array_key_exists('limit',$exparams)       ?  'NULL'     : $exparams['limit'];
		$debug       = !array_key_exists('debug',$exparams)       ?  FALSE      : $exparams['debug'];	
		$return_type = !array_key_exists('return_type',$exparams) ? "array"     : $exparams['return_type'];
		
		if ($conditions != 'NULL') 
		{ 
			$this->db->where($conditions);
		}
	
		if ($fields != 'NULL') 
		{ 
			$this->db->select($fields);
		}
		
	
		if ($order != 'NULL') 
		{ 
			$this->db->order_by($order);
		}
	
		if ($limit != 'NULL') 
		{ 
			$this->db->limit($limit,$start);
		}
	
		$query = $this->db->get($tbl);
		if ( $debug )
		{
			echo  $this->db->last_query();
			//exit();
		}
		
		$numRows=$query->num_rows();
	
		$this->total_rec_found=$this->findCount($tbl,$conditions);		
	
		if(array_key_exists('return_type',$exparams) && trim(strtolower($exparams['return_type']))=='num')
		{
			return $numRows;
		}else
		{			
			if( $numRows > 0 )
			{
				if($return_type!='object' && array_key_exists('index',$exparams) && $exparams['index']!='')
				{
					$result=array();
					foreach($query->result_array() as $row)
					{
						$indexval=$row[$exparams['index']];
						$result[$indexval]=$row;
					}
					
					return $result;
					
				}else
				{
					return ($return_type=='object')  ? $query->result()  :  $query->result_array() ;
				}
			}
		}
	}

public function findCount($tbl,$conditions)
	{	  
		$this->db->select("COUNT(*) AS count");
		$this->db->limit(1,0);
		if ($conditions != 'NULL') 
		{ 
			$this->db->where($conditions);
		}
	
		$count = $this->db->count_all_results($tbl);		
		return $count;
	}

	public function find($tbl,$exparams=array())
	{
		$exparams['start'] = '0';
		$exparams['limit'] = '1';
		$data = $this->findAll($tbl, $exparams );
		if ( is_array($data) || is_object($data) ) 
		{
			return $data[0];
			
		}else
		{
			if( is_numeric($data) )
			{
				return $data;
			}
		}
	}

    	 
	 public function get_members($param=array())
	 {		
		
		$status			    =   @$param['status'];	
		$customer_id		=   @$param['customer_id'];	//phone_number
		$email		        =   @$param['email'];
		$otp		        =   @$param['otp'];
		$phone_number		=   @$param['phone_number'];
		
		$keyword			=   trim($this->input->get_post('keyword',TRUE));		
		$keyword			=   $this->db->escape_str($keyword);
		
		if($customer_id!='')
		{
			$this->db->where("customers_id","$customer_id");
		}		
		if($status!='')
		{
			$this->db->where("status","$status");
		}
		
		if($email!='')
		{
			$this->db->where("user_name","$email");
		}
		if($otp!='')
		{
			$this->db->where("otp","$otp");
		}
		if($phone_number!='')
		{
			$this->db->where("phone_number","$phone_number");
		}
	    if($keyword!=''){
			
			$this->db->where("(user_name LIKE '%".$keyword."%' OR CONCAT_WS(' ',first_name,last_name) LIKE '%".$keyword."%' OR gender LIKE '%".$keyword."%' )");
		}
		
     	$this->db->order_by('customers_id','desc');	
		//$this->db->limit($limit,$offset);
		$this->db->select("SQL_CALC_FOUND_ROWS *,CONCAT_WS(' ',first_name) AS name ",FALSE);
		$this->db->from('wl_customers');
		$this->db->where('status !=','2');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		//$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
				
	}
    
    
	
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        
        //fetch data by conditions
        
        if(array_key_exists("conditions",$params)){
            
            foreach($params['conditions'] as $key => $value){
                $this->db->where($key,$value);
                
            }
        }
        
        if(array_key_exists("customers_id",$params)){
            $this->db->where('customers_id',$params['customers_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();    
            }elseif(array_key_exists("returnType",$params) && $params['returnType'] == 'single'){
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->row_array():false;
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():false;
            }
        }
		
		//return fetched data
        return $result;
    }
    
    /*
     * Insert user data
     */
    public function insert($data){
        //add created and modified date if not exists
        if(!array_key_exists("account_created_date", $data)){
            $data['account_created_date'] = date("Y-m-d H:i:s");
        }
        if(!array_key_exists("last_login_date", $data)){
            $data['last_login_date'] = date("Y-m-d H:i:s");
        }
        
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        return $insert?$this->db->insert_id():false;
    }
    
    /*
     * Update user data
     */
    public function update($data, $id){
        //add modified date if not exists
        if(!array_key_exists('last_login_date', $data)){
            $data['last_login_date'] = date("Y-m-d H:i:s");
        }
        
        //update user data in users table
        $update = $this->db->update($this->userTbl, $data, array('customers_id'=>$id));
        
        //return the status
        return $update?true:false;
    }
    
    /*
     * Delete user data
     */
    public function delete($id){
        //update user from users table
        $delete = $this->db->delete('wl_customers',array('customers_id'=>$id));
        //return the status
        return $delete?true:false;
    }

}
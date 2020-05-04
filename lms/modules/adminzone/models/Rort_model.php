<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Port_model extends MY_Model
 {
public function getp()
{
	return 1;
}
    public function get_port($opts=array())
    {

        if(array_key_exists('select',$opts) && @$opts['select']!='')
        {
                $this->db->select($opts['select'],FALSE);			
        }else{
                $this->db->select('SQL_CALC_FOUND_ROWS *', FALSE);					
        }

        $this->db->from('tbl_boat_port');

        $this->db->where("status !=", '2');

        if(array_key_exists('keyword',$opts) && @$opts['keyword']!='')
        {
          $keyword = $this->db->escape_str(trim($opts['keyword']));
                $this->db->where("(port_name LIKE '%".$keyword."%' OR location LIKE '%".$keyword."%'
                                                                     OR city LIKE '%".$keyword."%'
                                                                     OR country LIKE '%".$keyword."%' )");
        }

        if(array_key_exists('status',$opts) && @$opts['status']!='')
        {
                $status = $this->db->escape_str($opts['status']);
          $this->db->where("status", $status);
        }

        if(array_key_exists('where',$opts) && @$opts['where']!='')
        {
          $this->db->where($opts['where']);
        }		

        if(array_key_exists('order',$opts) && @$opts['sort_order']!='')
        {
          $this->db->order_by($opts['sort_order']);
        }else {
          $this->db->order_by('up_date', 'DESC');
        }

        if(array_key_exists('limit',$opts) && applyFilter('NUMERIC_GT_ZERO',@$opts['limit'])>0)
        {			
         // echo $opts['offset'];
                 if(array_key_exists('offset',$opts) && applyFilter('NUMERIC_GT_ZERO',@$opts['offset'])!= -1){	
                         $this->db->limit($opts['limit'], $opts['offset']);
                 }else{
                         $this->db->limit($opts['limit']);
                 }
        }	

        if(array_key_exists('return_type',$opts) && @$opts['return_type'] != '')
        {
          $cquery = $this->db->get();
                switch($opts['return_type']){
                        case 'num' :
                                $result = $cquery->num_rows();
                                break;
                        case 'object' :
                                $result = $cquery->result();
                                break;
                        default :
                                $result = $cquery->result_array();
                                break;
                }
        }	else {
          $result = $this->db->get()->result_array();
        }

        if(array_key_exists('debug',$opts) && @$opts['debug'] == TRUE)
        {			
                echo_sql();
        }

        return $result;
    }
	 
}
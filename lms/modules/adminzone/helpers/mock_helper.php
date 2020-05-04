<?php
	


if ( ! function_exists('count_test'))
{
	function count_test($condtion='')
	{		
		 $ci = CI();
		 $condtion = "status !='2' ".$condtion;	 
		 $sql="SELECT COUNT(mock_id)  AS total_test FROM tbl_mock WHERE $condtion ";		 
		 $query=$ci->db->query($sql)->row_array();
		 return  $query['total_test'];
		 
	}
}
if ( ! function_exists('count_sub'))
{
	function count_sub($condtion='')
	{		
		 $ci = CI();
		 $condtion = "status !='2' ".$condtion;	 
		 $sql="SELECT COUNT(subject_id)  AS total_sub FROM tbl_mock_subject WHERE $condtion ";		 
		 $query=$ci->db->query($sql)->row_array();
		 return  $query['total_sub'];
		 
	}
}
	if ( ! function_exists('count_t_que'))
{
	function count_t_que($condtion='')
	{		
		 $ci = CI();
		 $condtion = "status !='2' ".$condtion;	 
		 $sql="SELECT COUNT(question_id)  AS total_t_que FROM tbl_mock_question WHERE $condtion ";		 
		 $query=$ci->db->query($sql)->row_array();
		 return  $query['total_t_que'];
		 
	}
}

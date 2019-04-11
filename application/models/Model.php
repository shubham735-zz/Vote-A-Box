<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Model extends CI_Model {
		public function __construct(){
			parent::__construct();
			
			}

		/* Insert data to table  */
		public function insertData($data , $tableName)
		{
			$this->db->insert($tableName, $data);
			return $this->db->insert_id();
		}

		/* Select data from table */
		public function selectData($fields='*', $tableName , $condition=array())
		{
			$this->db->select($fields);
			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			/*Get Data form table*/
			$this->db->from($tableName);
			$query = $this->db->get();	
			
			$result = $query->result();
			return $result;

		}

		/* Select row from table */
		public function rowData($tableName, $condition=array(), $fields='*')
		{
			$this->db->select($fields);
			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			/*Get Data form table*/
			$this->db->from($tableName);
			$query = $this->db->get();	
			$result = $query->result();
			return $result;
		}

		/* Count no. of rows in table */
		public function count($fields='*' , $tableName , $condition=array() )
		{
			$this->db->select($fields);
			/*Check for Condition*/
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			/*Get Data form table*/
			$this->db->from($tableName);
			$query = $this->db->get();	
			$result = $query->num_rows();
			return $result;
		}

		/* Update record in any Table */
		public function updateData($tableName, $condition=array(), $data)
		{
			if ($condition!='' || !empty($condition)) {
				$this->db->where($condition);
			}
			$this->db->update($tableName, $data);
			return true;
		}

		/* Delete record from any table */
		public function deleteData($tableName, $condition=array())
		{
			if (!empty($condition)) {
				$this->db->where($condition);
			}
			$this->db->delete($tableName);
			return true;
		}

		/* Custom query */
		public function customQuery($query)
		{
			$query = $this->db->query($query);
			$result = $query->result();
			return $result;
		}

		/* Get Maximum data */
		public function selectMaxData($tableName, $fields)
		{
			$this->db->select_max($fields);
			$result = $this->db->get($tableName)->row();  
			return $result->$fields;
		}

		/* Get Minimum data */
		public function selectMinData($tableName, $fields)
		{
			$this->db->select_min($fields);
			$result = $this->db->get($tableName)->row();  
			return $result->$fields;
		}

		/* Difference between two date */
		public function dates_bw_dates($a,$b)
		{
			$start = $a;
			$end = $b;
			$init_date = strtotime($start);
			$dst_date = strtotime($end);
			$offset = $dst_date-$init_date;
			$dates = floor($offset/60/60/24) + 1;
			$date_array=array();
			for ($i = 0; $i < $dates; $i++)
			{
			$newdate = date("Y-m-d", mktime(12,0,0,date("m", strtotime($start)),
			(date("d", strtotime($start)) + $i), date("Y", strtotime($start))));
			$date_array[$i]=$newdate;
			}
			return $date_array;
		}

		/* Get current date and time */
		public function get_current_datetime()
		{
			 return date('Y-m-d H:i:s',mktime(date("H")+12,date("i")+30,date("s"),date("m"),date("d"),date("Y")));
		}
	}

// *******************************************End Of Model**********************************************
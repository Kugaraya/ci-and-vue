<?php

/**
 * @author Kim Testa @https://github.com/TK-Works
 * @copyright 2019
 * @license MIT Open-source
 */
class MY_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	private function is_zero_limitandoffset($limit, $offset) {
        return ($limit == 0 && $offset == 0);
    }
	
	/** 
	 * The model method for retrieving data from database
	 * @method query()
	 * @return object[]
	 * @param string/array 	$table   ex. 'table', array('table1', 'table2')
	 * @param associative-array 		$where  ex. array('id' => $id)
	 * @param string 		$orderby  ex. 'ASC', 'DESC'
	 * @param int 			$limit   ex. 1
	 * @param int 			$offset  ex. 1
	 */
	
	private function query($table, $where='', $orderby='', $limit=0, $offset=0) {
		if ($orderby) {
			$this->db->order_by($orderby);
		}
		
		if (!$where) {
			return $this->is_zero_limitandoffset($limit, $offset) ? $this->db->get($table) : $this->db->get($table, $limit, $offset);
		} else {
			return $this->is_zero_limitandoffset($limit, $offset) ? $this->db->get_where($table, $where) : $this->db->get_where($table, $where, $limit, $offset);
		}
	}

	/** 
	 * The model method for retrieving data from database
	 * @method query()
	 * @return object[]
	 * @param string/array 	$table   ex. 'table'
	 * @param associative-array 		$where  ex. array('id' => $id)
	 * @param string 		$orderby  ex. 'ASC', 'DESC'
	 */

	function get_result($table, $where='', $order_by='') {
        if (!$where) {
            if ($order_by) {
                return $this->query($table, '', $order_by)->result();
            } else {
                return $this->query($table)->result();
            }
        } else {
            if ($order_by) {
                return $this->query($table, $where, $order_by)->result();
            } else {
                return $this->query($table, $where)->result();
            }
        }
	}

	/** 
	 * The model method for retrieving data from database
	 * @method query()
	 * @return array[]
	 * @param string/array 	$table   ex. 'table'
	 * @param associative-array		$where  ex. array('id' => $id)
	 * @param string 		$orderby  ex. 'ASC', 'DESC'
	 */

	function get_result_array($table, $where='', $order_by='') {
        if (!$where) {
            if ($order_by) {
                return $this->query($table, '', $order_by)->result_array();
            } else {
                return $this->query($table)->result_array();
            }
        } else {
            if ($order_by) {
                return $this->query($table, $where, $order_by)->result_array();
            } else {
                return $this->query($table, $where)->result_array();
            }
        }
	}

	/** 
	 * The model method for entering specific select queries
	 * @method query_result()
	 * @return object[]
	 * @param string $query ex. 'SELECT * FROM table WHERE id=$id LIMIT = 0 ORDER DESC'
	 */
	
	function query_result($query) {	
		return $this->db->query($query)->result();
	}

	/** 
	 * The model method for entering specific select queries
	 * @method query_result_array()
	 * @return array[]
	 * @param string $query ex. 'SELECT * FROM table WHERE id=$id LIMIT = 0 ORDER DESC'
	 */

	function query_result_array($query) {
		return $this->db->query($query)->result_array();
	}

	/** 
	 * The model method for inserting information into database
	 * @method insert()
	 * @return int
	 * @param mixed $table ex. 'table', array('table1', 'table2')
	 * @param associative-array $data  ex. associative array with key and value
	 */
	
	function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
	}
	
	/** 
	 * The model method for updating information in database
	 * @method update()
	 * @return int
	 * @param mixed $table ex. 'table', array('table1', 'table2')
	 * @param associative-array $data  ex. associative array with key and value
	 * @param associative-array $where 
	 */
    
    function update($table, $data, $where) {
        $this->db->where($where)
        		 ->update($table, $data);
        return $this->db->affected_rows();
    }
	
	/** 
	 * The model method for deleting information from database
	 * NOTE: Should be an optional method, as much as possible, utilize flagging rows
	 * instead of deleting rows of information that are most likely important
	 * @method delete()
	 * @return int
	 * @param mixed $table ex. 'table', array('table1', 'table2')
	 * @param associative-array $data  ex. associative array with key and value
	 */

    function delete($table, $where) {
        $this->db->where($where)
        		 ->delete($table);
        return $this->db->affected_rows();
    }
}

?>

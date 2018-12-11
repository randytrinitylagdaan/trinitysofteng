<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trinityDataRegistrar extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		https://tua.edu.ph/triune/auth
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://tua.edu.ph/triune
	 *
	 * AUTHOR: Randy D. Lagdaan
	 * DESCRIPTION: InfoTech Data Controller.  
	 * DATE CREATED: October 1, 2018
     * DATE UPDATED: October 1, 2018
	 */
	var	$LOGFOLDER = 'ictjrs';

    function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->library('form_validation'); 
    }//function __construct()

// The getAllStudentListREGISTRAR will get all post data from front end to make it usable in backend then clean all pages and rows last name, etc. then get all students with the specific lastname and firstname inside the triune_students then put it all in the result["total"] variable then sort it by last name and first name both in ascending order
    public function getAllStudentListREGISTRAR() {
			
		$post = $this->input->post();  
		$clean = $this->security->xss_clean($post);
		
		$page = isset($clean['page']) ? intval($clean['page']) : 1;
		$rows = isset($clean['rows']) ? intval($clean['rows']) : 10;
		$lastName = isset($clean['lastName']) ? $clean['lastName'] : '';
		$firstName = isset($clean['firstName']) ? $clean['firstName'] : '';
		$currentDepartment = isset($clean['currentDepartment']) ? $clean['currentDepartment'] : '';
		$active = isset($clean['active']) ? $clean['active'] : '';

		
		$offset = ($page-1)*$rows;
		$result = array();
		$whereSpcl = "triune_students.lastName like '$lastName%'";
		$whereSpcl = $whereSpcl . " and triune_students.firstName like '$firstName%'";
	 


		$results = $this->_getRecordsData($data = array('count(*) as totalRecs'), 
			$tables = array('triune_students'), $fieldName = null, $where = null, $join = null, $joinType = null, 
			$sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = array($whereSpcl), $groupBy = null );

			//$row = mysql_fetch_row($results);
			$result["total"] = intval($results[0]->totalRecs);

			$results = $this->_getRecordsData($data = array('*'), 
			$tables = array('triune_students'), 
			$fieldName = null, $where = null, 
			$join = null, 
			$joinType =null, 
			$sortBy = array('lastName', 'firstName'), $sortOrder = array('asc', 'asc'), 
			$limit = array($rows, $offset), 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = array($whereSpcl), $groupBy = null );
			
			$result["rows"] = $results;

			echo json_encode($result);
    }

// The getAllStudentListREGISTRAR will get all post data from front end to make it usable in backend then clean all pages and rows last name, etc. then get all students from k12 with the specific lastname and firstname inside the triune_students_k12 then put it all in the result["total"] variable then sort it by last name and first name both in ascending order
    public function getAllStudentK12ListREGISTRAR() {
			
		$post = $this->input->post();  
		$clean = $this->security->xss_clean($post);
		
		$page = isset($clean['page']) ? intval($clean['page']) : 1;
		$rows = isset($clean['rows']) ? intval($clean['rows']) : 10;
		$lastName = isset($clean['lastName']) ? $clean['lastName'] : '';
		$firstName = isset($clean['firstName']) ? $clean['firstName'] : '';
		$currentDepartment = isset($clean['currentDepartment']) ? $clean['currentDepartment'] : '';
		$active = isset($clean['active']) ? $clean['active'] : '';

		
		$offset = ($page-1)*$rows;
		$result = array();
		$whereSpcl = "triune_students_k12.lastName like '$lastName%'";
		$whereSpcl = $whereSpcl . " and triune_students_k12.firstName like '$firstName%'";
	 


		$results = $this->_getRecordsData($data = array('count(*) as totalRecs'), 
			$tables = array('triune_students_k12'), $fieldName = null, $where = null, $join = null, $joinType = null, 
			$sortBy = null, $sortOrder = null, $limit = null, 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = array($whereSpcl), $groupBy = null );

			//$row = mysql_fetch_row($results);
			$result["total"] = intval($results[0]->totalRecs);

			$results = $this->_getRecordsData($data = array('*'), 
			$tables = array('triune_students_k12'), 
			$fieldName = null, $where = null, 
			$join = null, 
			$joinType =null, 
			$sortBy = array('lastName', 'firstName'), $sortOrder = array('asc', 'asc'), 
			$limit = array($rows, $offset), 
			$fieldNameLike = null, $like = null, 
			$whereSpecial = array($whereSpcl), $groupBy = null );
			
			$result["rows"] = $results;

			echo json_encode($result);
    }
		
}
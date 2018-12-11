<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trinityDataReference extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		https://tua.edu.ph/triune/auth
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://tua.edu.ph/triune
	 *
	 * AUTHOR: Randy D. Lagdaan
	 * DESCRIPTION: Data Controller.
	 * DATE CREATED: July 16, 2018
     * DATE UPDATED: July 16, 2018
	 */

    function __construct() {
        parent::__construct();
		$this->load->library('session');
        $this->load->library('form_validation');
    }//function __construct()

// to get values from ID and unitcode for the supply units
    public function getSupplyUnits() {
		$results = $this->_getRecordsData($data = array('ID', 'unitCode'),
			$tables = array('triune_supply_units'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('unitCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}


//geting information for asset groups
    public function getAssetGroup() {
		$results = $this->_getRecordsData($data = array('assetName', 'concat(assetGroupCd, ";",  assetSubGroupCd, ";", assetCompGroupCd) as assetCode'),
			$tables = array('triune_asset_group'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('assetName'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//getting information for suppliers
    public function getSuppliers() {
		$results = $this->_getRecordsData($data = array('ID', 'supplierName'),
			$tables = array('triune_supplier'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('supplierName'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//inputting data for orgunit
    public function getOrgUnit() {
		$results = $this->_getRecordsData($data = array('orgUnitCode', 'orgUnitName'),
			$tables = array('triune_organization_unit'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('orgUnitCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//inputting data for request type
    public function getRequestType() {
		$results = $this->_getRecordsData($data = array('requestTypeCode', 'requestTypeDescription'),
			$tables = array('triune_request_type_reference'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('requestTypeDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//inputting department code for department info
    public function getDepartmentK12() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_department_info_k12'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('departmentCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}


    public function getFacultyListK12() {
//inputting employee data and getting records from triune_faculty_k12, triune_employee_data
		$selectFields = "triune_employee_data.employeeNumber,  ";
		$selectFields = $selectFields . "concat(triune_employee_data.lastName, ', ', triune_employee_data.firstName, ' ', triune_employee_data.middleName , ';' , triune_employee_data.employeeNumber) as fullName";

		$results = $this->_getRecordsData($data = array($selectFields),
			$tables = array('triune_faculty_k12', 'triune_employee_data'), $fieldName = null, $where = null,
			$join = array('triune_faculty_k12.employeeNumber = triune_employee_data.employeeNumber'), $joinType = array('inner'),
			$sortBy = array('lastName', 'firstName'), $sortOrder = array('asc', 'asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//gets records from employee designation from triune_employee_designation
    public function getEmployeeDesignation() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_designation'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('designationDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//displaying course information of k12 from triune_course_info_k12
    public function getCourseInformationLevelActiveK12() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_course_info_k12'), $fieldName = array('active'), $where = array(1), $join = null, $joinType = null,
			$sortBy = array('courseCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = array("levelCode <> 'Z'"), $groupBy = null );

			echo json_encode($results);
	}

//displaying grade component reference of k12 from triune_grading_component_reference
    public function getGradeComponentReferenceK12() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_grading_component_reference'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('gradingComponentCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//displaying subject component SH from triune_subject_component
    public function getSubjectComponentSH() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_subject_component'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('subjectComponentCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//displaying subject component of K12 from triune_subject_component
    public function getSubjectComponentK12() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_subject_component'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('subjectComponentCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//dispalaying Curriculum courses from triune_college_courses.courseCode, triune_college_courses.shortCourseDescription
    public function getCurriculumCoursesREGISTRAR() {
		$results = $this->_getRecordsData($data = array('triune_college_courses.courseCode, triune_college_courses.shortCourseDescription'),
			$tables = array('triune_college_courses', 'triune_curriculum'), $fieldName = null, $where = null,
			$join = array('triune_curriculum.courseCode = triune_college_courses.courseCode'), $joinType = array('inner'),
			$sortBy = array('courseGroup', 'triune_college_courses.courseCode'), $sortOrder = array('asc', 'asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = array("triune_college_courses.courseGroup <> 'K12'"), $groupBy = null );

			echo json_encode($results);
	}
//display curriculum year from triune_curriculum
    public function getCurriculumYearREGISTRAR() {
		$courseCode = $_GET["courseCode"];
		//echo $locationCode;
		$results = $this->_getRecordsData($data = array('sy'),
			$tables = array('triune_curriculum'), $fieldName = array('courseCode'), $where = array($courseCode), $join = null, $joinType = null,
			$sortBy = array('courseCode'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display curriculum details from triune_curriculum
    public function getCurriculumDetailsREGISTRAR() {
		$courseCode = $_GET["courseCode"];
		$sy = $_GET["sy"];
		//$courseCode = '3025A';
		//$sy = '1819';
		//echo $locationCode;
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_curriculum'), $fieldName = array('courseCode', 'sy'), $where = array($courseCode, $sy), $join = null, $joinType = null,
			$sortBy = array('yearLevel', 'sem', 'subjectCode'), $sortOrder = array('asc', 'asc', 'asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for prefix name from triune_employee_prefix_name
    public function getPrefixNameTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_prefix_name'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('prefixName'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for gender from triune_employee_gender
    public function getGenderTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_gender'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = null, $sortOrder = null, $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for civil status from triune_employee_civil_status
    public function getCivilStatusTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_civil_status'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = null, $sortOrder = null, $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for bloodtype from triune_employee_blood_type
    public function getBloodTypeTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_blood_type'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = null, $sortOrder = null, $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for religionDescription from triune_employee_religion
    public function getReligionTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_religion'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('religionDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for citizenshipDescription from triune_employee_citizenship
    public function getCitizenshipTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_citizenship'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('citizenshipDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//displaay data for barangayDescription from triune_employee_city_barangay
    public function getBarangayTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_city_barangay'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('barangayDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for townDescription from triune_employee_city_town
    public function getTownTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_city_town'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('townDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for cityDescription from triune_employee_city
    public function getCityTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_city'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('cityDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}


//display data for birthPlace from triune_employee_birthplace
    public function getBirthPlaceTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_birthplace'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('birthPlace'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for country from triune_country
    public function getCountry() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_country'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('country'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for provincialBarangayDescription from triune_employee_provincial_barangay
    public function getProvincialBarangayTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_provincial_barangay'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('provincialBarangayDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for provincialTownDescription from triune_employee_provincial_town
    public function getProvincialTownTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_provincial_town'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('provincialTownDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for provincialCityDescription from triune_employee_provincial_city
    public function getProvincialCityTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_provincial_city'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('provincialCityDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for jobTitleDescription from triune_employee_job_title
    public function getJobTitleTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_job_title'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('jobTitleDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for departmentDescription from triune_employee_department
    public function getEmployeeDepartmentTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_department'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('departmentDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for positionClass from triune_employee_position_class
    public function getPositionClassTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_position_class'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('positionClass'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for jobStatusDescription from triune_employee_job_status
    public function getJobStatusTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_job_status'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('jobStatusDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//get record from triune_thrims_reports_list
    public function getReportsListEmployeeTHRIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_thrims_reports_list'), $fieldName = array('reportType'), $where = array('employee'),
			$join = null, $joinType = null, $sortBy = array('reportsName'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}


//get data from triune_employee_data for getEmployeeListTHRIMS
    public function getEmployeeListTHRIMS() {

		$selectFields = "triune_employee_data.employeeNumber,  ";
		$selectFields = $selectFields . "concat(triune_employee_data.lastName, ', ' , triune_employee_data.firstName, ' ', triune_employee_data.middleName) as fullName";

		$results = $this->_getRecordsData($data = array($selectFields),
			$tables = array('triune_employee_data'), $fieldName = null, $where = null,
			$join = null, $joinType = null,
			$sortBy = array('lastName', 'firstName'), $sortOrder = array('asc', 'asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//get data from triune_employee_data for getEmployeeActiveListTHRIMS
    public function getEmployeeActiveListTHRIMS() {

		$selectFields = "triune_employee_data.employeeNumber,  ";
		$selectFields = $selectFields . "concat(triune_employee_data.lastName, ', ' , triune_employee_data.firstName, ' ', triune_employee_data.middleName,';',triune_employee_data.employeeNumber) as fullName";

		$results = $this->_getRecordsData($data = array($selectFields),
			$tables = array('triune_employee_data'), $fieldName = array('active'), $where = array(-1),
			$join = null, $joinType = null,
			$sortBy = array('lastName', 'firstName'), $sortOrder = array('asc', 'asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//get data from 'triune_employee_gender'
    public function getGender() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_employee_gender'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = null, $sortOrder = null, $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for locationDescription from triune_location
    public function getLocationTBAMIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_location'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('locationDescription'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

//display data for locationType from triune_location_type
    public function getLocationTypeTBAMIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_location_type'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('locationType'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for roomType from triune_room_type
    public function getRoomTypeTBAMIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_room_type'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('roomType'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//displaydata  for roomNumber from triune_rooms
    public function getRoomsTBAMIMS() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_rooms'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('roomNumber'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
//display data for connectionType from triune_connection_type
    public function getConnectionType() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_connection_type'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('connectionType'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}
// display data for durationType from triune_connection_duration
    public function getDurationType() {
		$results = $this->_getRecordsData($data = array('*'),
			$tables = array('triune_connection_duration'), $fieldName = null, $where = null, $join = null, $joinType = null,
			$sortBy = array('durationType'), $sortOrder = array('asc'), $limit = null,
			$fieldNameLike = null, $like = null,
			$whereSpecial = null, $groupBy = null );

			echo json_encode($results);
	}

}

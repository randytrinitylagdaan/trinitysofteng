<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class trinityREGISTRAR extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		https://tua.edu.ph/triune/auth
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://tua.edu.ph/triune
	 *
	 * AUTHOR: Randy D. Lagdaan
	 * DESCRIPTION: REGISTRAR Controller. Included 
	 * DATE CREATED: August 18, 2018
     * DATE UPDATED: August 18, 2018
	 */
	
	//** The code redirects a user to view the library */
    function __construct() {
        parent::__construct();
		$this->load->library('session');
    }//function __construct()
	
	//** The code redirects a user to view the registrar curriculum setup list */
    public function curriculumSetupREGISTRAR() {
        //echo "HELLO WORLD";
        $this->load->view('REGISTRAR/curriculum-setup-list');
    }
	//** The code redirects a user to view the curriculum details registrar and can edit the course code and the school year*/
    public function showCurriculumDetailsREGISTRAR() {
       $data['courseCode'] = $_POST['courseCode'];
       $data['sy'] = $_POST['sy'];
	   
       $this->load->view('REGISTRAR/curriculum-details', $data);
    }
	//** The code redirects a user to view the registrar student profile list */
    public function studentListREGISTRAR() {
        //echo "HELLO WORLD";
        $this->load->view('REGISTRAR/student-profile-list');
    }	
	//** The code redirects a user to view the registrar student k12 profile list*/
    public function studentListREGISTRARK12() {
        //echo "HELLO WORLD";
        $this->load->view('REGISTRAR/student-profile-k12-list');
    }	

	
}
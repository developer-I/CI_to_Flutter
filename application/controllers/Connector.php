<?php 
class Connector extends CI_Controller 
{   
    function __construct()
	{
	parent::__construct();
    $this->load->library('session');
    $this->load->helper('date');
    $this->load->model('Connector_Model');
	}
    public function signup()
	{
        $this->load->view('Signup.php');
    }
    public function login()
	{   
       $this->load->view('login.php');
    }
    public function insertData()
	{   
       $result['data']=$this->Connector_Model->insertData_model();
       $this->load->view('UserProfile',$result);
    }
    public function loginCheck()
	{   
        $email=$this->input->post('email');
        $this->session->set_userdata('email',$email);
        $this->Connector_Model->loginCheck_model();
    }
    public function profile()
	{   
       $result['data']=$this->Connector_Model->displayrecordsprofile_model();
       $this->load->view('UserProfile',$result);
    }
    public function timeinout()
	{   
      $this->Connector_Model->Checkdate_model();
    }
    public function attendance()
	{   
      $this->load->view('attendance.php');
    }
    public function unset_session_data()
    { 
       $this->session->unset_userdata('email'); 
       $this->load->view('Thankyou'); 
    }
    public function photo_capture()
    { 
        
        $this->Connector_Model->photo_capture_model();
    }
    public function reports()
	{   
       
    //    $result['data']=$this->Connector_Model->reports_model();
       $this->load->view('Report');
    }
    
    public function update()
	{   
       $this->Connector_Model->update_model();
      
    }
    public function delete()
	{   
      $this->Connector_Model->delete_model();
    }
    public function report_date(){
        $image_date=$this->input->post('image_date');
        $result['data']=$this->Connector_Model->report_date_model($image_date);
        $this->load->view('Report',$result);

    }
    public function encode_data()
	{   
      $this->Connector_Model->encode_data_model();
    }

    public function App_insert_data()
	{   
        $email=$_REQUEST['email'];
        $pass=$_REQUEST['pass'];
        $fname=$_REQUEST['fname'];
        $lname=$_REQUEST['lname'];
        $gender=$_REQUEST['gender'];
        $mobile=$_REQUEST['mobile'];

      $result['data'] = $this->Connector_Model->App_insert_data_model($fname,$lname,$email,$pass,$gender,$mobile);

    }

    public function App_insert_login_data()
	{   
     $this->Connector_Model->App_insert_data_login_model();
    }
    
}
?>
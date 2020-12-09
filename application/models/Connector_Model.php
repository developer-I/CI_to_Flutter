<?php

class Connector_Model extends CI_Model 
{
	public function __construct()
	{
	
	$this->load->database();
	$this->load->helper('date');
	}
	public function insertData_model()
	{     
        $data['firstname']=$this->input->post('firstname');
        $data['middlename']=$this->input->post('middlename');
        $data['lastname']=$this->input->post('lastname');
        $data['gender']=$this->input->post('gender');
        $data['phone']=$this->input->post('phone');
        $data['email']=$this->input->post('email');
        $data['password']=$this->input->post('password');
        $pemail = $this->input->post('email');
        
        if( $this->db->insert('user',$data) == 1)
        {
            $query=$this->db->query("select * from user where email='$pemail'");
	        return $query->result();
        }
        else
        {
            echo 'Database not found';
        }
          
    }
    public function loginCheck_model()
    {

        $email=$this->input->post('email');
        $pass=$this->input->post('password');
        $designation=$this->input->post('designation');
        
        $query = $this->db->query("select id,designation from user where email='$email' and password='$pass'");
        
        

      if ($query->num_rows() > 0)
    {
        foreach ($query->result() as $row)  
        {
            if($row->designation == $designation)
            {
                if($designation == 'admin')
                {
                    $result['data']=$this->Connector_Model->displayrecords_model();
                    $this->load->view('adminPanel',$result);
                }
                else if ($designation == 'employee') 
                {
                    
                    $query=$this->db->query("select * from user where email='$email'");
                    $result['data']= $query->result();  
                    $this->load->view('UserProfile',$result);
                    
                }
            }
            else
            {
                 echo 'You are selected wrong designation !!!!! try again';
            }
        }
    }
    else
    {
        echo 'Check your password and email !!!! ';
    }
}
    public  function displayrecords_model()
	{
	$query=$this->db->query("select * from user");
	return $query->result();
    }

    public  function displayrecordsprofile_model()
	{
        $email = $this->session->userdata('email');
	    $query=$this->db->query("select * from user where email = '$email'");
	    return $query->result();
    }
    public  function photo_capture_model(){
        
    
    $img = $_POST['image'];
    $folderPath = "./asserts/.";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    

    $this->Connector_Model->photo_capture_db_model($fileName);
  

    }


    public  function photo_capture_db_model($file)
    {

        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $CurDate = $now->format('Y-m-d');
        $email = $this->session->userdata('email');
        $query=$this->db->query("select id from user where email = '$email'");
        $id = 0;
        foreach($query->result() as $row){
            $id = $row->id;
        }
        

        if( $query=$this->db->query("Insert into attendance_img (user_id,Image,CurrDate) values ('$id','$file','$CurDate')") == 1)
        {
            $this->load->view('Success_attendance.php');
        }
        else
        {
            echo "Check Please .....";
        }
    }

    // public function reports_model()
	// {
	//     $query=$this->db->query("select id,firstname,lastname from user");
	//     return $query->result();
    // }
    public function photo_onscreen_model($id)
	{
        
	    $query=$this->db->query("select image from attendance_img where user_id = $id");
	    return $query->result();
    }

    public function update_model()
	{
	    // $query=$this->db->query("select image from attendance_img where user_id = $id");
        // return $query->result();
        
        if(count($_POST)>0){
            if($_POST['type']==2){
                $id=$_POST['id'];
                $firstname=$_POST['firstname'];
                $lastname=$_POST['lastname'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $designation=$_POST['designation'];
                $sql = $this->db->query("UPDATE `user` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`phone`='$phone',`designation`='$designation' WHERE id=$id");
                if (mysqli_query($sql)) {
                    echo json_encode(array("statusCode"=>200));
                } 
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error();
                }
               
            }
        }
    }

    public function delete_model()
	{

        if(count($_POST)>0){
            if($_POST['type']==3){
                $id=$_POST['id'];
                $sql = $this->db->query("DELETE FROM `user` WHERE id=$id ");
                if (mysqli_query($conn, $sql)) {
                    echo $id;
                } 
                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error();
                }
                
            }
        }
    }


    public function Checkdate_model(){

        $email = $this->session->userdata('email');
        $query=$this->db->query("select id from user where email = '$email'");
        
        $id = 0;
        
        
        $now = new DateTime();
        $now->setTimezone(new DateTimezone('Asia/Kolkata'));
        $CurTime = $now->format('H:i:s');
        $CurDate = $now->format('Y-m-d');
        $datec = " ";
        $timein;
        $timeout = " ";
        
        
        foreach($query->result() as $row){
            $id = $row->id;
        }
        $query=$this->db->query("select currentdate from timeinout where user_id = '$id' and currentdate = '$CurDate'");
        // echo sizeof($query->result());
        if(sizeof($query->result()) > 0)
        {
            foreach($query->result() as $row){
                $datec = $row->currentdate;
            }

            if($datec == $CurDate)
            {
                $this->Connector_Model->current_date_model($id,$CurDate,$CurTime);
            }
            else
            {
               $this->db->query("UPDATE timeinout SET currentdate = '$CurDate' WHERE user_id = '$id'"); 
               $this->load->view('TimeIn'); 
            }
        }
        else
        {
            $this->db->query("INSERT INTO timeinout(user_id,currentdate) values ('$id','$CurDate')");
            $this->load->view('TimeIn'); 
            
        }
        
        // $query=$this->db->query("select currentdate from timeinout where user_id = '$id'");
      }

    
    public function timein_model($CurTime,$id,$CurDate){

       
            $this->db->query("UPDATE timeinout SET timein = '$CurTime' where user_id = '$id' and currentdate = '$CurDate'"); 
            // $query=$this->db->query("select timein from timeinout where user_id = '$id' and currentdate = '$CurDate'");
            // foreach($query->result() as $row){
            //     $timein = $row->timein;
            // }
            $this->load->view('TimeOut'); 
            // echo "hero";
        

    }
    public function timeout_model($id,$CurDate,$CurTime){

        
        $this->db->query("UPDATE timeinout SET timeout = '$CurTime' where user_id = '$id' and currentdate = '$CurDate'"); 
            
            echo "Thankyou !!!";

        
    }
    public function current_date_model($id,$CurDate,$CurTime){
              $queryc=$this->db->query("select timein,timeout from timeinout where user_id = '$id' and currentdate = '$CurDate'");
                foreach($queryc->result() as $row){
                    $timein = $row->timein;
                    $timeout = $row->timeout;
                  }
                 if($timein == 0){
                    $this->Connector_Model->timein_model($CurTime,$id,$CurDate);
                    
                }
                else {
                  
                    $this->Connector_Model->timeout_model($id,$CurDate,$CurTime);
                    
                }
    }

    public function report_date_model($image_date){
        $queryc=$this->db->query("select image , user_id from attendance_img where CurrDate = '$image_date'");
                return $queryc->result() ;
    }

    public function encode_data_model(){
        $query = $this->db->query("SELECT * FROM user");
        foreach($query->result() as $row){
              $data['firstname'] = $row->firstname;
              $data['lastname'] = $row->lastname;
              $data['mobile'] = $row->phone;
              $data['gender'] = $row->gender;

              $res[]=$data;
          }



          echo json_encode($res);

    }


    public function App_insert_data_model($fname,$lname,$email,$pass,$gender,$mobile){
        $query = $this->db->query("Insert into user (firstname,lastname,email,password,gender,phone) values ('$fname','$lname','$email','$pass','$gender','$mobile')");
        return $query->result() ;
    }

}
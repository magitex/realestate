<?php
class Customer extends MY_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Customer_Model');
    if ($this->session->userdata('user_role') != 'Administrator') {
      die('you have no access on this page......go away');
    }
  }

  public function addCustomerPage(){
    $data['content_view'] = 'Customer/add-Customer-view';
    $this->templates->admin($data);
  }

  public function deleteCustomerRec(){
    $id=$this->input->get('Customer_id');
    $response=$this->Customer_Model->deleteCustomer($id);
      if($response==true){
        if ($this->Customer_Model->deleteCustomer($id)) {
          $this->session->set_flashdata('message', 'Customer has been deleted');
  
        } else {
          $this->session->set_flashdata('message', 'Something went wrong');
        }
        return redirect('Customer/viewCustomerPage');
    } else {
      echo "Error";
    }
  }

  public function viewCustomerPage(){
    $data = null;
    $data['get_all_Customer'] = $this->Customer_Model->getAllCustomer($data);
    $data['get_all_senior'] = $this->Customer_Model->getAllSenior($data);
    $data['content_view'] = 'Customer/all-Customer-view';
    $this->templates->admin($data);
  }

  public function makeCustomerSeniorPage(){
    $data = null;
    $data['get_all_Customer'] = $this->Customer_Model->getAllCustomer($data);
    $data['content_view'] = 'Customer/make-Customer-senior-view';
    $this->templates->admin($data);
  }

  public function addCustomer(){
    $this->form_validation->set_rules('user_name', 'Employee Name', 'required');
   // $this->form_validation->set_rules('Customer_role', 'Employee Role', 'required');
    $this->form_validation->set_rules('user_email', 'Email address', 'required');
    $this->form_validation->set_rules('user_password', 'Password', 'required');
 $this->form_validation->set_rules('phone', 'Phone', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    if ($this->form_validation->run()) {
      $data = $this->input->post();
      $data['user_password'] = md5($this->input->post('user_password'));

      if ($this->Customer_Model->addCustomerQuery($data)) {
        $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');

      } else {
        $this->session->set_flashdata('message', 'Your Submission Not Saved Successfull');
      }
      return redirect('Customer/addCustomerPage');
    } else{
      $this->addCustomerPage();
    }
  }


  public function makeCustomerSenior(){
    $data['senior_id'] = $this->input->post('senior_id');
    $datajunior = $this->input->post('junior_id');


    $countJunior = count($datajunior);
    //print_r($this->Customer_Model->makeCustomerSeniorQuery($data));

    for ($i=0; $i < $countJunior; $i++) {
      $chkSenior = $this->input->post('senior_id');;
      $checkJunior = $datajunior[$i];
      $chkExistence = $this->Customer_Model->seniorJuniorExist($chkSenior, $checkJunior);

      if($chkExistence){
        $this->session->set_flashdata('errmessage', 'Your Submission Not Saved Succesfully into the Database');
        return redirect('Customer/makeCustomerSeniorPage');
      }else{
        for ($i=0; $i < $countJunior; $i++) {
          $data['junior_id'] = $datajunior[$i];
          $this->Customer_Model->makeCustomerSeniorQuery($data);
        }
      }
    }



    // for ($i=0; $i < $countJunior; $i++) {
    //   $data['junior_id'] = $datajunior[$i];
    //   $this->Customer_Model->makeCustomerSeniorQuery($data);
    // }

     $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
     return redirect('Customer/makeCustomerSeniorPage');

    // if ($this->Customer_Model->makeCustomerSeniorQuery($data)) {
    //   $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
    // }
    //return redirect('Customer/makeCustomerSeniorPage');


  }
}
?>

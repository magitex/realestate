<?php
class Projectcategory extends MY_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Projectcategory_Model');
    if ($this->session->userdata('user_role') != 'Administrator') {
      die('you have no access on this page......go away');
    }
  }

  public function addProjectcategoryPage(){
    $data['content_view'] = 'Projectcategory/add-projectcategory-view';
    $this->templates->admin($data);
  }

  public function deleteProjectcategoryRec(){
    $id=$this->input->get('id');
    $response=$this->Projectcategory_Model->deleteProjectcategory($id);
      if($response==true){
        if ($this->Projectcategory_Model->deleteProjectcategory($id)) {
          $this->session->set_flashdata('message', 'Projectcategory has been deleted');
  
        } else {
          $this->session->set_flashdata('message', 'Something went wrong');
        }
        return redirect('Projectcategory/viewProjectcategoryPage');
    } else {
      echo "Error";
    }
  }

  public function viewProjectcategoryPage(){
    $data = null;
    $data['get_all_projectcategory'] = $this->Projectcategory_Model->getAllProjectcategory($data);
    $data['get_all_senior'] = $this->Projectcategory_Model->getAllSenior($data);
    $data['content_view'] = 'Projectcategory/all-Projectcategory-view';
    $this->templates->admin($data);
  }

  public function makeProjectcategorySeniorPage(){
    $data = null;
    $data['get_all_Projectcategory'] = $this->Projectcategory_Model->getAllProjectcategory($data);
    $data['content_view'] = 'Projectcategory/make-Projectcategory-senior-view';
    $this->templates->admin($data);
  }

  public function addProjectcategory(){
    $this->form_validation->set_rules('name', 'Projectcategory Name', 'required');
  

    if ($this->form_validation->run()) {
      $data = $this->input->post();
     

      if ($this->Projectcategory_Model->addProjectcategoryQuery($data)) {
        $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');

      } else {
        $this->session->set_flashdata('message', 'Your Submission Not Saved Successfull');
      }
      return redirect('Projectcategory/addProjectcategoryPage');
    } else{
      $this->addProjectcategoryPage();
    }
  }


  public function makeProjectcategorySenior(){
    $data['senior_id'] = $this->input->post('senior_id');
    $datajunior = $this->input->post('junior_id');


    $countJunior = count($datajunior);
    //print_r($this->Projectcategory_Model->makeProjectcategorySeniorQuery($data));

    for ($i=0; $i < $countJunior; $i++) {
      $chkSenior = $this->input->post('senior_id');;
      $checkJunior = $datajunior[$i];
      $chkExistence = $this->Projectcategory_Model->seniorJuniorExist($chkSenior, $checkJunior);

      if($chkExistence){
        $this->session->set_flashdata('errmessage', 'Your Submission Not Saved Succesfully into the Database');
        return redirect('Projectcategory/makeProjectcategorySeniorPage');
      }else{
        for ($i=0; $i < $countJunior; $i++) {
          $data['junior_id'] = $datajunior[$i];
          $this->Projectcategory_Model->makeProjectcategorySeniorQuery($data);
        }
      }
    }



    // for ($i=0; $i < $countJunior; $i++) {
    //   $data['junior_id'] = $datajunior[$i];
    //   $this->Projectcategory_Model->makeProjectcategorySeniorQuery($data);
    // }

     $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
     return redirect('Projectcategory/makeProjectcategorySeniorPage');

    // if ($this->Projectcategory_Model->makeProjectcategorySeniorQuery($data)) {
    //   $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
    // }
    //return redirect('Projectcategory/makeProjectcategorySeniorPage');


  }
}
?>

<?php
class Category extends MY_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Category_Model');
    if ($this->session->userdata('user_role') != 'Administrator') {
      die('you have no access on this page......go away');
    }
  }

  public function addCategoryPage(){
    $data['content_view'] = 'Category/add-category-view';
    $this->templates->admin($data);
  }

  public function deleteCategoryRec(){
    $id=$this->input->get('id');
    $response=$this->Category_Model->deleteCategory($id);
      if($response==true){
        if ($this->Category_Model->deleteCategory($id)) {
          $this->session->set_flashdata('message', 'Category has been deleted');
  
        } else {
          $this->session->set_flashdata('message', 'Something went wrong');
        }
        return redirect('Category/viewCategoryPage');
    } else {
      echo "Error";
    }
  }

  public function viewCategoryPage(){
    $data = null;
    $data['get_all_Category'] = $this->Category_Model->getAllCategory($data);
    $data['get_all_senior'] = $this->Category_Model->getAllSenior($data);
    $data['content_view'] = 'Category/all-Category-view';
    $this->templates->admin($data);
  }

  public function makeCategorySeniorPage(){
    $data = null;
    $data['get_all_Category'] = $this->Category_Model->getAllCategory($data);
    $data['content_view'] = 'Category/make-Category-senior-view';
    $this->templates->admin($data);
  }

  public function addCategory(){
    $this->form_validation->set_rules('name', 'Category Name', 'required');
  

    if ($this->form_validation->run()) {
      $data = $this->input->post();
     

      if ($this->Category_Model->addCategoryQuery($data)) {
        $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');

      } else {
        $this->session->set_flashdata('message', 'Your Submission Not Saved Successfull');
      }
      return redirect('Category/addCategoryPage');
    } else{
      $this->addCategoryPage();
    }
  }


  public function makeCategorySenior(){
    $data['senior_id'] = $this->input->post('senior_id');
    $datajunior = $this->input->post('junior_id');


    $countJunior = count($datajunior);
    //print_r($this->Category_Model->makeCategorySeniorQuery($data));

    for ($i=0; $i < $countJunior; $i++) {
      $chkSenior = $this->input->post('senior_id');;
      $checkJunior = $datajunior[$i];
      $chkExistence = $this->Category_Model->seniorJuniorExist($chkSenior, $checkJunior);

      if($chkExistence){
        $this->session->set_flashdata('errmessage', 'Your Submission Not Saved Succesfully into the Database');
        return redirect('Category/makeCategorySeniorPage');
      }else{
        for ($i=0; $i < $countJunior; $i++) {
          $data['junior_id'] = $datajunior[$i];
          $this->Category_Model->makeCategorySeniorQuery($data);
        }
      }
    }



    // for ($i=0; $i < $countJunior; $i++) {
    //   $data['junior_id'] = $datajunior[$i];
    //   $this->Category_Model->makeCategorySeniorQuery($data);
    // }

     $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
     return redirect('Category/makeCategorySeniorPage');

    // if ($this->Category_Model->makeCategorySeniorQuery($data)) {
    //   $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
    // }
    //return redirect('Category/makeCategorySeniorPage');


  }
}
?>

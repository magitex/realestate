<?php
class Project extends MY_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('Project_Model');
	    $this->load->model('User/User_Model');

	    $this->load->model('Projectcategory/Projectcategory_Model');

  }

  //add my todo view page
  public function addProjectPage(){
   $data = null;
    $data['get_all_projectCategory'] = $this->Projectcategory_Model->getAllProjectcategory($data);
	    $data['get_all_user'] = $this->User_Model->getAllUser($data);

    $data['content_view'] = 'Project/add-project-view';
    $this->templates->admin($data);
  }

  public function addToDoJuniorPage(){
    $this->load->model('User/User_Model');
    $data = null;
    $data['get_all_user'] = $this->User_Model->getAllUser($data);

    $user = $this->session->userdata('user_id');
    $data['get_junior'] = $this->ToDo_Model->getJuniorQuery($user);
    $data['content_view'] = 'ToDo/add-todo-junior-view';
    $this->templates->admin($data);
  }

  public function addJuniorToDo(){
    $this->form_validation->set_rules('todo_name', 'ToDo Name', 'required');
    $this->form_validation->set_rules('assign_to', 'Vendor', 'required');
    $this->form_validation->set_rules('totalcost', 'Totalcost', 'required');
    $this->form_validation->set_rules('start_date', 'Start date', 'required');
    $this->form_validation->set_rules('Totalhous', 'totalhous', 'required');

    if ($this->form_validation->run()) {
	
    /*  $data['todo_name'] = $this->input->post('todo_name');
      $data['todo_status'] = 0;
      $data['todo_date'] = date("Y/m/d");
      $data['assign_to'] = $this->input->post('assign_to');
      $data['assign_from'] = $this->session->userdata('user_id');
      if (! empty($this->input->post('todo_comment'))) {
        $data['todo_comment'] = $this->input->post('todo_comment'); 
      }*/
if($this->input->post('category')!='')
			{
			 $data['category']=implode(',',$this->input->post('category'));
			}
			 if($_FILES['document']['name']!='')
		   {
            $config['upload_path'] = '../assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('document');
            $uploadFileInfo = $this->upload->data();
			 $data['document']=$this->db->escape_like_str($uploadFileInfo['file_name']);
			
			}
				 if($_FILES['image']['name']!='')
		   {
            $config['upload_path'] = '../assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $uploadFileInfo = $this->upload->data();
			 $data['image']=$this->db->escape_like_str($uploadFileInfo['file_name']);
			
			}
      if ($this->Project_Model->addProjectQuery($data)) {
        $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
      }

      return redirect('Project/addProjectPage');
    } else{
      $this->addToDoPage();
    }
  }

  //insert my todo data to database method
  public function addMyProject(){
       $this->form_validation->set_rules('title', 'Title', 'required');
  /*  $this->form_validation->set_rules('assign_to', 'Vendor', 'required');
    $this->form_validation->set_rules('totalcost', 'Totalcost', 'required');
    $this->form_validation->set_rules('start_date', 'Start date', 'required');
    $this->form_validation->set_rules('Totalhous', 'totalhous', 'required');*/
 

      if ($this->form_validation->run()) {
	        $data = $this->input->post();
$data['assign_by'] = $this->session->userdata('user_id');
        /*$data['todo_name'] = $this->input->post('todo_name');
        $data['todo_status'] = 0;
        $data['todo_date'] = date("Y/m/d");
        $data['assign_to'] = $this->session->userdata('user_id');
        $data['assign_from'] = $this->session->userdata('user_id');
        if (! empty($this->input->post('todo_comment'))) {
          $data['todo_comment'] = $this->input->post('todo_comment');
        }*/
		if($this->input->post('category')!='')
			{
			 $data['category']=implode(',',$this->input->post('category'));
			}
			//echo $_FILES['document']['name']
 if($_FILES['document']['name']!='')
		   {
            $config['upload_path'] = '../assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('document');
            $uploadFileInfo = $this->upload->data();
			 $data['document']=$this->db->escape_like_str($uploadFileInfo['file_name']);
			
			}
				 if($_FILES['image']['name']!='')
		   {
            $config['upload_path'] = '../assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
            $config['max_size'] = '10000';
            $config['max_width'] = '10240';
            $config['max_height'] = '7680';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $uploadFileInfo = $this->upload->data();
			 $data['image']=$this->db->escape_like_str($uploadFileInfo['file_name']);
			
			}
        if ($this->Project_Model->addProjectQuery($data)) {
          $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
        }

        return redirect('Project/viewMyProject');
      } else{
        $this->addProjectPage();
      }
  }

  public function viewMyProject(){
    $user = $this->session->userdata('user_id');
    $data['get_my_todo_data'] = $this->Project_Model->getMyPrpoject($user);
    $data['content_view'] = 'Project/my-project-view';
    $this->templates->admin($data);
  }

  public function viewMyJuniorToDo(){
    $this->load->model('User/User_Model');
    $user = $this->session->userdata('user_id');
    $data = null;
    $data['get_all_user'] = $this->User_Model->getAllUser($data);
    $data['get_my_junior_todo_data'] = $this->ToDo_Model->getJuniorToDoQuery($user);
    $data['content_view'] = 'ToDo/my-junior-todo-view';
    $this->templates->admin($data);
  }

  public function updateMyToDo(){
      $data['todo_status'] = 1;
      $todoid = $this->input->post('todoid');
      if (! empty($this->input->post('todo_comment'))) {
        $data['todo_comment'] = $this->input->post('todo_comment');
      }

      if ($this->ToDo_Model->updateMyToDoQuery($data, $todoid)) {
        $this->session->set_flashdata('message', 'Your Submission Saved Succesfully into the Database');
      }

      return redirect('ToDo/viewMyToDo');

  }
    public function deleteproject(){
    $id=$this->input->get('id');
    $response=$this->Project_Model->deleteProject($id);
      if($response==true){
       
          $this->session->set_flashdata('message', 'Project has been deleted');
  
        return redirect('Project/viewMyProject');
    } else {
      echo "Error";
    }
  }

}

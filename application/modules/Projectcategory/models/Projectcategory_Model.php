<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Projectcategory_Model extends CI_Model{
    public function __construct(){
      parent::__construct();
    }
    //add Category to database query
    public function addProjectcategoryQuery($data){
      return $this->db->insert('projectcategory', $data);
    }

    public function makeProjectcategorySeniorQuery($data){
      return $this->db->insert('senior', $data);
    }

    public function seniorJuniorExist($chkSenior, $checkJunior){
      $this->db->select('*');
      $this->db->from('senior');
      $this->db->where('senior_id =', $chkSenior);
      $this->db->where('junior_id =', $checkJunior);

      $this->db->or_where('senior_id =', $checkJunior);
      $this->db->where('junior_id =', $chkSenior);

      $result = $this->db->get();

      if ($result->num_rows() > 0) {
        return $result->row();
      }
    }

    public function countEmployees() {
      $query = $this->db->get('category');
      return $query->num_rows();
  }

    public function getAllProjectcategory(){
      $this->db->select('*');
      $this->db->from('projectcategory');
      //$this->db->where('Category_role', 'Employee');
      $result = $this->db->get();
      return $result->result_array();
    }

    function deleteProjectcategory($id)
  {
    $this->db->where("id", $id);
    $this->db->delete("projectcategory");
    return true;
  }

    public function getAllSenior(){
      $this->db->select('*');
      $this->db->from('senior');
      $result = $this->db->get();
      return $result->result_array();
    }
  }
?>

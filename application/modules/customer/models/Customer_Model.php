<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class Customer_Model extends CI_Model{
    public function __construct(){
      parent::__construct();
    }
    //add Customer to database query
    public function addCustomerQuery($data){
      return $this->db->insert('users', $data);
    }

    public function makeCustomerSeniorQuery($data){
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
      $query = $this->db->get('users');
      return $query->num_rows();
  }

    public function getAllCustomer(){
      $this->db->select('*');
      $this->db->from('users');
      $this->db->where('user_role', 'Customer');
      $result = $this->db->get();
      return $result->result_array();
    }

    function deleteCustomer($id)
  {
    $this->db->where("user_id", $id);
    $this->db->delete("users");
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

<?php
class Employer_model extends CI_Model
{
    function employer_insert($data)
    {
        $this->db->insert('employers', $data);
    }

    function employer_login($username,$password)
    {
        $this->db->where('email',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('employers');

        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}
?>
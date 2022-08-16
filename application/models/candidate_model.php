<?php
class Candidate_model extends CI_Model
{
    function candidate_insert($data)
    {
        $this->db->insert('candidates', $data);
    }

    function candidate_login($username,$password)
    {
        $this->db->where('email',$username);
        $this->db->where('password',$password);
        $query = $this->db->get('candidates');

        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    function my_profile($id)
    {
        $this->db->where('id',$this->session->userdata('candidate_id'));
        $query = $this->db->get('candidates');
        return $query->result();
    }

    function edit($id)
    {
        $query = "
            SELECT 
                *
            FROM 
                candidates 
            WHERE
                id = $id
            ";
        return $this->db->query($query)->result();
    }

    function candidate_update($data,$id)
    {
        $this->db->where('id',$id);
        return $this->db->update('candidates', $data);
    }

    function get_resume($id)
    {
         $this->db->where('id',$id);
         $this->db->select('resume');
         $query = $this->db->get('candidates');
         return $query->row_array();
    }
}
?>
<?php
class Jobs_model extends CI_Model
{
    function job_insert($data)
    {
        $this->db->insert('jobs', $data);
    }

    public function myjob($empid)
    {
        $query = "
            SELECT 
                jobs.*,COUNT(aj.job_id) as applications
            FROM 
                jobs LEFT JOIN applied_jobs aj 
            ON 
                jobs.id = aj.job_id 
            WHERE jobs.employer_id = $empid
            GROUP BY jobs.id;
        ";
        return $this->db->query($query)->result();
    }


    function deleterecords($id)
    {
      $this->db->where("id", $id);
      $this->db->delete("jobs");
      return true;
    }

    function edit($id)
    {
        $this->db->select('*');
        $this->db->from('jobs');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    function job_update($data,$id)
    {
        $this->db->where('id',$id);
        return $this->db->update('jobs', $data);
    }

    function getjobs()
    {
        // $query =$this->db->query("
        //     SELECT
        //     jobs.job_title, employers.company_name, jobs.job_location, jobs.job_type
        //     FROM
        //     jobs INNER JOIN employers
        //     ON
        //     jobs.employer_id = employers.id;"
        // );

        $this->db->select('jobs.id,jobs.job_title, employers.company_name, jobs.job_location, jobs.job_type');
        $this->db->join('employers','jobs.employer_id = employers.id','inner');
        $query = $this->db->get('jobs');
        
        return $query->result();
    }

    function filter_records($job_type, $job_location)
    {
        
        if($job_type AND $job_location)
        {
            $query = "
                SELECT 
                    jobs.id,jobs.job_title, e.company_name, jobs.job_location, jobs.job_type
                FROM
                    jobs
                INNER JOIN employers e
                ON 
                    jobs.employer_id = e.id
                WHERE
                    jobs.job_type = '$job_type' AND jobs.job_location = '$job_location'
                ";
            return $this->db->query($query)->result();
        }
        else
        {

            if($job_location == 'all location')
            {
                $query = "
                    SELECT 
                        jobs.id,jobs.job_title, e.company_name, jobs.job_location, jobs.job_type
                    FROM
                        jobs
                    INNER JOIN employers e
                    ON 
                        jobs.employer_id = e.id
                    WHERE
                        jobs.job_type IN('Full time','Part time','contract Based') OR jobs.job_location IN('mumbai','delhi','bangalore')
                    ";
                return $this->db->query($query)->result();
            }
            else
            {
                $query = "
                    SELECT 
                        jobs.id,jobs.job_title, e.company_name, jobs.job_location, jobs.job_type
                    FROM
                        jobs
                    INNER JOIN employers e
                    ON 
                        jobs.employer_id = e.id
                    WHERE
                        jobs.job_type = '$job_type' OR jobs.job_location = '$job_location'
                    ";
                    return $this->db->query($query)->result();
            }
            
        }
    }

    function job_details($id)
    {
        $query = "
            SELECT
                jobs.*,e.company_name
            FROM
                jobs
            INNER JOIN employers e ON jobs.employer_id = e.id

            WHERE
                jobs.id = $id
            ";   
        return $this->db->query($query)->result();
    }

    function job_data($id)
    {
        $query = "
            SELECT
                e.id as company_id,jobs.id as job_id, jobs.experience
            FROM
                jobs
            INNER JOIN employers e ON jobs.employer_id = e.id
            WHERE jobs.id = $id
            ";
        return $this->db->query($query)->row_array();
    }

    function apply_job($job_data)
    {
        $this->db->insert('applied_jobs', $job_data);      
    }

    public function my_applied_job()
    {
        $this->db->where('candidate_id',$this->session->userdata('candidate_id'));
        $query = $this->db->get('applied_jobs');
        return $query->result();
    }

    public function get_applied_job($candidate_id)
    {
        $query = "
            SELECT jobs.job_title, e.company_name, e.current_location,jobs.experience,aj.applied_on
            FROM 
                jobs
            INNER JOIN employers e ON jobs.employer_id = e.id
            INNER JOIN applied_jobs aj ON aj.job_id = jobs.id
            WHERE
                aj.candidate_id = $candidate_id
            ";
        return $this->db->query($query)->result_object();
    }

    public function job_applicants($id)
    {
        $query = "
            SELECT 
                CONCAT(cand.first_name,' ',cand.last_name) as name,
                cand.ctc,
                cand.current_location,
                cand.id,
                cand.resume
            FROM
                applied_jobs aj 
            INNER JOIN candidates cand ON aj.candidate_id = cand.id
            WHERE aj.job_id = ? 
            ";
         return $this->db->query($query,$id)->result();
    }
    
}
?>
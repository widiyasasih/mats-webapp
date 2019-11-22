<?php
class Racks_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function insert_rack()
    {
        $data = array(
            'code' => $this->input->post('code'),
            'description' => $this->input->post('description')
        );

        $this->db->insert('racks', $data);
    }

    public function get_racks($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('racks.*');
            $this->db->order_by('racks.code');
            return $this->db->get('racks')->result_array();
        }else {
            $this->db->select('racks.*');
            $this->db->order_by('racks.code');
            return $this->db->get_where('racks', array('id' => $id))->row_array();
        }
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'code' => $this->input->post('code'),
            'description' => $this->input->post('description')
        );

        $this->db->update('racks', $data, array('id' => $id));
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('racks');
        return true;
    }
}
?>
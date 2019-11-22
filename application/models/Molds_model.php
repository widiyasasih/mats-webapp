<?php
class Molds_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_id_mold()
    {
        $this->db->select_max('id');
        return $this->db->get('molds')->row_array();
    }

    public function insert_mold($upload_img)
    {
        if ($this->input->post('condition') !== 'show_input') {
            $condition = $this->input->post('condition');
        }else {
            $condition = $this->input->post('condition2');
        }
        $data = array(
                'id' => $this->input->post('id'),
                'code' => $this->input->post('code'),
                'name' => $this->input->post('name'),
                'condition' => $condition,
                'rack_id' => $this->input->post('rack'),
                'description' => $this->input->post('description'),
                'image' => $upload_img
            );
        $this->db->insert('molds', $data);
    }

    public function insert_mold_models()
    {
        $checked = $this->input->post('checked');
        $model = $this->input->post('model');
        foreach ($checked as $i) {
            $data = array(
                'mold_id' => $this->input->post('id'),
                'model_id' => $model[$i],
            );
            $this->db->insert('mold_models', $data);
            // var_dump($data);
        }
    }

    public function get_molds($id = FALSE)
    {
        if ($id === FALSE) {
            $this->db->select('m.*, md.model, r.code rack, r.description r_desc, 
                          group_concat(DISTINCT concat(md.model) order by md.model SEPARATOR ", ") models');
            $this->db->join('mold_models mm', 'mm.mold_id = m.id', 'LEFT OUTER');
            $this->db->join('racks r', 'r.id = m.rack_id', 'LEFT OUTER');
            $this->db->join('modeltypes md', 'md.id = mm.model_id', 'LEFT OUTER');
            $this->db->group_by('m.id');
            $this->db->order_by('m.code');
            return $this->db->get('molds m')->result_array();
        }else {
            $this->db->select('m.*, m.id id, md.model, md.id model_id, r.code rack, r.description r_desc, 
                          group_concat(DISTINCT concat(md.model) order by md.model SEPARATOR ", ") models');
            $this->db->join('mold_models mm', 'mm.mold_id = m.id', 'LEFT OUTER');
            $this->db->join('racks r', 'r.id = m.rack_id', 'LEFT OUTER');
            $this->db->join('modeltypes md', 'md.id = mm.model_id', 'LEFT OUTER');
            $this->db->group_by('m.id');
            // $this->db->order_by('m.code');
            return $this->db->get_where('molds m', array('m.id' => $id))->row_array();
        }
    }

    public function get_models_by_id($id = TRUE)
    {
        $this->db->select('md.model model, md.id model_id, mm.id mm_id, mm.model_id md_id');
        $this->db->join('mold_models mm', 'mm.model_id = md.id AND mm.mold_id = '.$id, 'LEFT OUTER');
        $this->db->join('molds m', 'm.id = mm.mold_id','LEFT OUTER');
        $query = $this->db->get('modeltypes md')->result_array();
        return $query;
    }

    public function update($upload_img = TRUE)
    {
        $id = $this->input->post('id');
        if ($this->input->post('condition') !== 'show_input') {
            $condition = $this->input->post('condition');
        }else {
            $condition = $this->input->post('condition2');
        }
        $data = array(
            'code' => $this->input->post('code'),
            'name' => $this->input->post('name'),
            'condition' => $condition,
            'rack_id' => $this->input->post('rack'),
            'description' => $this->input->post('description'),
            'image' => $upload_img
        );
        $this->db->update('molds', $data, array('molds.id' => $id));
        // echo 'update';
    }
    
    public function update_mold_models()
    {
        $checked = $this->input->post('checked');
        $mm_id = $this->input->post('mold_models_id');
        $id = $this->input->post('id');
        $model = $this->input->post('model');
        
        $new_checked = [];
        foreach ($checked as $i => $value) {
            $new_checked[$value] = $value;
        }
        // //intersect to catch a key which checked
        $delist = array_intersect_key($mm_id, $new_checked);

        // get a key which checked and value is unset
        $result = array_filter($delist, function($v, $k) {
            return $v == ''; // $k is unset to ignore
        }, ARRAY_FILTER_USE_BOTH);

        var_dump($new_checked);
        var_dump($delist);
        var_dump($result);

        foreach ($result as $i => $value) {
            $data = array(
                'mold_id' => $id,
                'model_id' => $model[$i]
            );
            $this->db->insert('mold_models', $data);
        }
    }

    public function delete_mold_models()
    {
        // var_dump($_POST);
        $checked = $this->input->post('checked');
        $uncheck = $this->input->post('uncheck');
        $mm_id = $this->input->post('mold_models_id');
        $id = $this->input->post('id');
        $model = $this->input->post('model');
        
        $new_checked = [];
        foreach ($checked as $i => $value) {
            $new_checked[$value] = $value;
        }
        //get a key which different
        $delist = array_diff_key($uncheck, $new_checked);

        var_dump($new_checked);
        var_dump($delist);

        foreach ($delist as $i => $value) {
            $this->db->where('id', $mm_id[$i]);
            $this->db->where('id !=', NULL);
            $this->db->delete('mold_models');
        }
    }

     public function delete($id = TRUE)
    {
        // var_dump($id);
        $this->db->delete('molds', array('id' => $id));
        return true;
    }
}
?>
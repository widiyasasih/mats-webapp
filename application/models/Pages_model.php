<?php
    class Pages_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }
        
        public function get_total_pos($month = TRUE, $year = TRUE)
        {
            $this->db->join('dateneeds d', 'd.id = po.dateneed_id', 'LEFT');
            $query = $this->db->get_where('purchase_order po', array('d.month' => $month, 'd.year' => $year));
            return $query->result_array();
            // var_dump();
        }
        
        public function get_max_month($year = TRUE)
        {
            $this->db->select_max('d.month');
            $query = $this->db->get_where('dateneeds d', array('d.year' => $year));
            return $query->row_array();
            // var_dump();
        }

        public function get_date($month = TRUE, $year = TRUE)
        {
            $this->db->select('d.id date_id, d.*, m.*');
            $this->db->join('months m', 'm.id = d.month', 'INNER');
            $query = $this->db->get_where('dateneeds d', array('d.month' => $month));
            return $query->row_array();
            // var_dump();
        }

        public function get_sum_pos($month = TRUE, $year = TRUE)
        {
            $this->db->select('sum(Concat(ip.qty*ip.custom_price)) result');
            $this->db->join('purchase_order po', 'po.id = ip.po_id', 'LEFT');
            $this->db->join('dateneeds d', 'd.id = po.dateneed_id', 'LEFT');
            $query = $this->db->get_where('items_po ip', array('d.month' => $month, 'd.year' => $year));
            return $query->row_array();
            // var_dump();
        }

        public function get_total_sps($month = TRUE, $year = TRUE)
        {
            $this->db->join('dateneeds d', 'd.id = sp.dateneed_id', 'LEFT');
            $query = $this->db->get_where('submission_slip sp', array('d.month' => $month, 'd.year' => $year));
            return $query->result_array();
            // var_dump();
            // die('continue');
        }

        public function get_sum_ammount($month = TRUE, $year = TRUE)
        {
            $this->db->select('
                i.*, i.id id, i.id item_id, u.unit, u.id as id_unit, m.*, md.*, SUM(m.total) totals, 
                SUM((m.total*m.custom_price)+(IF(m.custom_price=0,(m.total)*(i.price),0))) nominals');
            $this->db->order_by('item_name');
            $this->db->join('units u', 'u.id = i.unit_id');
            $this->db->join('materialneeds as m', 'm.item_id = i.id' ,'RIGHT');
            $this->db->join('modeltypes as md', 'md.id = m.model_id' ,'RIGHT');
            $this->db->join('dateneeds as d', 'd.id = m.dateneed_id' ,'RIGHT');
            // $this->db->join('modeltypes md', 'md.id = m.model_id');
            $this->db->group_by('i.id');
            // $this->db->group_by('model');
            $this->db->where('d.month', $month);
            $this->db->where('d.year', $year);
            $query = $this->db->get('items i')->result_array();
            // var_dump($query);
            return $query;
        }

        public function get_needs($year = TRUE)
        {
            $this->db->select('
                m.id m_id, d.*, mn.month mon, m.*,
                SUM((m.total*m.custom_price)+(IF(m.custom_price=0,(m.total)*(i.price),0))) nominals');
            $this->db->order_by('mn.id', 'DESC');
            $this->db->join('dateneeds as d', 'd.id = m.dateneed_id' ,'LEFT');
            $this->db->join('items as i', 'i.id = m.item_id' ,'LEFT');
            $this->db->join('months as mn', 'mn.id = d.month' ,'LEFT');
            $this->db->where('d.year', $year);
            $this->db->group_by('mon');
            $query = $this->db->get('materialneeds m')->result_array();
            // var_dump($query);
            return $query;
        }

        public function get_deadline_pos($month = TRUE, $year = TRUE)
        {
            $this->db->select('
                po.*, po.id po_id, v.vendor, s.supplier, po.delivery deliv_max,
                d.*, d.id date_id, ip.*, ip.id ip_id, 
                sum(Concat(ip.qty*ip.custom_price)) result');
            $this->db->join('purchase_order po', 'po.id = ip.po_id', 'LEFT OUTER');
            $this->db->join('vendors as v', 'v.id = po.vendor_id' ,'LEFT OUTER');
            $this->db->join('suppliers as s', 's.id = po.supplier_id' ,'LEFT OUTER');
            $this->db->join('dateneeds d', 'd.id = po.dateneed_id', 'LEFT OUTER');
            $this->db->order_by('deliv_max', 'DESC');
            $this->db->group_by('po.id');
            $query = $this->db->get_where('items_po ip', array('d.month' => $month, 'd.year' => $year));
            return $query->result_array();
            // var_dump();
        }

        function fetch_data($query)
        {
            // $this->db->select('m.*');
            // $this->db->from('molds m');
            // // $this->db->join('racks r', 'r.id = m.rack_id', 'INNER');
            // $this->db->where('m.code', $query);
            // $this->db->group_start();

            if($query != ''){
            // using query bcz need derivative select 
            $result_query = $this->db->query('
                SELECT s.*
                FROM (
                    SELECT 
                        m.id m_id, m.name name, m.code code, m.image image, m.condition cd, m.description description, 
                        r.id r_id, r.code rack,
                        mm.id mm_id, 
                        md.model model, md.id md_id,
                        group_concat(DISTINCT concat(model) order by model SEPARATOR ", ") models
                    FROM molds m 
                    LEFT OUTER JOIN racks r ON m.rack_id = r.id
                    LEFT OUTER JOIN mold_models mm ON mm.mold_id = m.id
                    LEFT OUTER JOIN modeltypes md ON md.id = mm.model_id
                    GROUP BY m_id
                ) s 
                WHERE s.name LIKE "%'.$query.'%" OR
                      s.code LIKE "%'.$query.'%" OR
                      s.image LIKE "%'.$query.'%" OR
                      s.cd LIKE "%'.$query.'%" OR
                      s.models LIKE "%'.$query.'%" OR
                      s.description LIKE "%'.$query.'%" OR
                      s.rack LIKE "%'.$query.'%"
                GROUP BY s.m_id
                ');
            }

            // $this->db->like(array(
                //     'code' => $query
                // ));
                // $this->db->or_like(array(
                //     'name' => $query,
                //     'rack_id' => $query,
                //     'description' => $query,
                //     'image' => $query
                // ));
            // $this->db->group_end();

            return $result_query->result_array();
        }
    }
?>
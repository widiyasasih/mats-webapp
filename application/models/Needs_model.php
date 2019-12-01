<?php 
    class Needs_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_data($date_id = FALSE)
        {
            $this->db->select('months.month, m.id mn_id, months.romawi, months.id as month_id, dateneeds.year, dateneeds.id as date_id');
            $this->db->order_by('dateneeds.year', 'DESC');
            $this->db->order_by('months.id', 'DESC');
            $this->db->group_by('months.id', 'DESC');
            $this->db->join('months', 'months.id = dateneeds.month', 'LEFT');
            $this->db->join('materialneeds m', 'm.dateneed_id = dateneeds.id', 'LEFT');
            if ($date_id === FALSE) {
                $query = $this->db->get('dateneeds');
                return $query->result_array();
            }else{
                $query = $this->db->get_where('dateneeds', array('dateneeds.id' => $date_id ));
                return $query->row_array();
            }
            
        }

        public function get_models()
        {
            $query = $this->db->get('modeltypes');
            return $query->result_array();
        }

        public function get_model($model_id = NULL)
        {
            if ($model_id === NULL) {
                $model = $this->input->post('model_id');
                $this->db->where('id', $model);
                $query = $this->db->get('modeltypes');
                return $query->row_array();
            } else {
                $query = $this->db->get_where('modeltypes', array('id' => $model_id));
                return $query->row_array();
            }
        }
 
        public function get_items_by_model($id = TRUE)
        {
            $this->db->order_by('model');
            $this->db->join('dateneeds', 'dateneeds.id = materialneeds.dateneed_id');
            $this->db->join('items', 'items.id = materialneeds.item_id');
            $this->db->join('modeltypes', 'modeltypes.id = materialneeds.model_id');
            $this->db->join('units', 'units.id = items.unit_id');
            $query = $this->db->get_where('materialneeds', array('dateneed_id'=>$id));
            return $query->result_array();
        }


        public function get_models_by_date($date_id = TRUE)
        {
            $this->db->select('modeltypes.*');
            $this->db->join('materialneeds', 'materialneeds.model_id = modeltypes.id');
            $this->db->where('dateneed_id', $date_id);
            $this->db->group_by('modeltypes.id');
            $query = $this->db->get('modeltypes');
            return $query->result_array();
        }

        public function get_units()
        {
            $this->db->order_by('unit', 'ASC');
            $query = $this->db->get('units');
            return $query->result_array();
            
        }

        public function check_date($month = NULL, $year = NULL)
        {
            if ($month && $year !== NULL) {
                $this->db->select('dateneeds.*, months.month as mon');
                $this->db->join('months', 'months.id = dateneeds.month', 'LEFT');
                $this->db->where('dateneeds.month', $month);
                $this->db->where('year', $year);
                $query = $this->db->get_where('dateneeds', array('dateneeds.month' => $month));
            }else {
                $month = $this->input->post('month');
                $year = $this->input->post('year');
                $this->db->select('dateneeds.*, months.month as mon');
                $this->db->join('months', 'months.id = dateneeds.month', 'LEFT');
                $this->db->where('dateneeds.month', $month);
                $this->db->where('year', $year);
                $query = $this->db->get_where('dateneeds', array('dateneeds.month' => $month));
            }
            return $query->row_array();
        }

        public function get_date($date_id)
        {
            $this->db->select('dateneeds.*, months.month as mon');
            $this->db->join('months', 'months.id = dateneeds.month', 'LEFT');
            // $this->db->where('dateneeds.month', $month);
            // $this->db->where('year', $year);
            $query = $this->db->get_where('dateneeds', array('dateneeds.id' => $date_id));
            return $query->row_array();
        }

         public function view_date()
        {
            $month = $this->input->post('month');
            $year = $this->input->post('year');
            
            $this->db->select('dateneeds.id');
            $this->db->join('months', 'months.id = dateneeds.month', 'LEFT');
            $this->db->where('dateneeds.month', $month);
            $this->db->where('year', $year);
            $query = $this->db->get_where('dateneeds', array('dateneeds.month' => $month));
            return $query->row_array();
        }
        
        public function create_date()
        {
            $data = array(
                'month' => $this->input->post('month'),
                'year' => $this->input->post('year'),
                'created_by' => $this->session->userdata('user_id')
            );
            return $this->db->insert('dateneeds', $data);
            // var_dump($_POST);
        }

        public function delete_card($date_id = TRUE)
        {
            $this->db->where('id', $date_id);
            $this->db->delete('dateneeds');
            return true;
            // var_dump($_POST);
        }

        public function delete_model_on_card($id = TRUE, $date_id = TRUE)
        {
            $date = $_POST['date'];
            $model = $_POST['model'];
            if ($id && $date_id === TRUE) {
                $this->db->where('dateneed_id', $this->input->post('date'));
                $this->db->where('model_id', $this->input->post('model'));
                $this->db->delete('materialneeds');
            }else {
                $this->db->where('dateneed_id', $date_id);
                $this->db->where('model_id', $id);
                $this->db->delete('materialneeds');
            }
            return true;
            // var_dump($_POST);
        }

        public function create_item()
        {
            $data = array(
                'item_name' => $this->input->post('item_nm'),
                'unit_id' => $this->input->post('unit'),
                'price' => $this->input->post('price')   
            );
            return $this->db->insert('items', $data);            
        }

        public function add_items($id)
        {
            $data = array(
                'dateneed_id' => $this->input->post('item_nm'),
                'item_id' => $this->input->post('id'),
                'model_id' => $this->input->post('id_model'),   
                'total' => $this->input->post('ttl'),
                'custom_price' => $this->input->post('manualprice')   

            );
            return $this->db->insert('items', $data);
        }

        public function get_items()
        {
                $this->db->select('items.*, units.unit, units.id as id_unit');
                $this->db->order_by('item_name');
                $this->db->join('units', 'units.id = items.unit_id');
                $query = $this->db->get('items');
                return $query->result_array();
        }

        public function get_items_for_edit($model_id = TRUE, $date_id = TRUE)
        {
            $this->db->select('i.id, i.price, i.item_name, u.unit, m.id as need_id, m.model_id, m.dateneed_id, m.total, m.custom_price');
            $this->db->join('units as u', 'u.id = i.unit_id', 'LEFT OUTER');
            $this->db->join('materialneeds as m', 'm.item_id = i.id AND m.model_id = '.$model_id.' AND'.' m.dateneed_id = '.$date_id,'LEFT OUTER');
            $this->db->order_by('i.item_name');
            $query = $this->db->get_where('items as i');
            return $query->result_array();
        }

        public function sum_view($model_id = TRUE, $date_id = TRUE)
        {
            $this->db->select('i.id, i.price, i.item_name, u.unit, m.id as need_id, m.model_id, m.dateneed_id, m.total, m.custom_price,
                               count(m.total) items,
                               SUM((m.total*m.custom_price)+(IF(m.custom_price=0,(m.total)*(i.price),0))) nominals');
            $this->db->join('units as u', 'u.id = i.unit_id', 'LEFT OUTER');
            $this->db->join('materialneeds as m', 'm.item_id = i.id AND m.model_id = '.$model_id.' AND'.' m.dateneed_id = '.$date_id,'LEFT OUTER');
            $this->db->order_by('i.item_name');
            $query = $this->db->get_where('items as i');
            return $query->row_array();
            
        }

        public function get_recap_items($date_id = TRUE)
        {
            $this->db->select('i.*, u.unit, u.id as id_unit, m.*');
            $this->db->order_by('item_name');
            $this->db->join('units u', 'u.id = i.unit_id');
            $this->db->join('materialneeds as m', 'm.item_id = i.id' ,'RIGHT');
            $this->db->group_by('i.id');
            $this->db->where('m.dateneed_id >', 0);
            $this->db->where('m.dateneed_id', $date_id);
            $query = $this->db->get('items i');
            return $query->result_array();
        }

        public function insert_items()
        {
            $checked = $this->input->post('check_item');
            $dateneed_id = $this->input->post('date');
            $item_id = $this->input->post('item');
            $model_id = $this->input->post('model');
            $total = $this->input->post('ttl');
            $custom_price = $this->input->post('manualprice');
            
            foreach ($checked as $i)
            {
                $data = array(
                    'dateneed_id' => $dateneed_id,
                    'item_id' => $item_id[$i],
                    'model_id' => $model_id,
                    'total' => $total[$i],
                    'custom_price' => $custom_price[$i],
                );
                // var_dump($data);
                $query = $this->db->insert('materialneeds', $data);
            }
        }

        public function update_items()
        {
            $need = $this->input->post('need');
            // var_dump($need);
            $checked = $this->input->post('check_item');
            $dateneed_id = $this->input->post('date');
            $item_id = $this->input->post('item');
            $model_id = $this->input->post('model');
            $total = $this->input->post('ttl');
            $custom_price = $this->input->post('manualprice');
            
            foreach ($checked as $i)
            {
                $data = array(
                    'dateneed_id' => $dateneed_id,
                    'item_id' => $item_id[$i],
                    'model_id' => $model_id,
                    'total' => $total[$i],
                    'custom_price' => $custom_price[$i],
                );
                // $this->db->where('id', $need[$i]); // this get an error all row from other card will update 
                $query = $this->db->update('materialneeds', $data, array('id' => $need[$i]));
            }
        }

        public function delete_items()
        {
            $need = $this->input->post('need');
            $uncheck = $this->input->post('uncheck');
            $checked = $this->input->post('check_item');

            //new container of checked key and value set to the new key
            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            //get a key which different
            $delist = array_diff_key($uncheck, $new_checked);

            foreach ($delist as $j) {
                // var_dump($need[$j]);
                $this->db->where('id', $need[$j]);
                $this->db->where('id !=', NULL);
                $query = $this->db->delete('materialneeds');
                // return true; // not using cz will delete only one row
                
            }
        }

        public function insert_items_to_list()
        {
            // var_dump($_POST);
            $need = $this->input->post('need');
            $checked = $this->input->post('check_item');
            $dateneed_id = $this->input->post('date');
            $item_id = $this->input->post('item');
            $model_id = $this->input->post('model');
            $total = $this->input->post('ttl');
            $custom_price = $this->input->post('manualprice');
            //new container of checked key and value set to the new key
            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            //intersect to catch a key which checked
            $delist = array_intersect_key($need, $new_checked);
            // var_dump($delist);
            //get a key which checked and value is unset
            $result = array_filter($delist, function($v, $k) {
                return $v == ''; // $k is unset to ignore
            }, ARRAY_FILTER_USE_BOTH);

            foreach ($result as $j => $value)
            {
                $data = array(
                    'dateneed_id' => $dateneed_id,
                    'item_id' => $item_id[$j],
                    'model_id' => $model_id,
                    'total' => $total[$j],
                    'custom_price' => $custom_price[$j],
                );
                $query = $this->db->insert('materialneeds', $data);
            }
        }

        public function get_group_items($date_id)
        {
            // $test = array(
            //     array('Year', 'Model 1','Model 2','Model 3','Model 4'), 
            //     array('A', '200', '100', '150', '50'), 
            //     array('B', '50', '80', '120', '160'), 
            //     array('C', '0', '50', '200', '180')
            // );

            // $data = transposeData($data);
            // $retData = array();
            // foreach ($test as $row => $columns) {
            // foreach ($columns as $row2 => $column2) {
            //     $retData[$row2][$row] = $column2;
            // }
            // }
            // var_dump($retData);
            // // return $retData;

            $this->db->select('i.*, i.id item_id, u.unit, u.id as id_unit, m.*, md.*, SUM(m.total) totals,
                               GROUP_CONCAT(DISTINCT CONCAT(md.model, "</td><td>: &nbsp " , m.total, "&nbsp pcs. ", IF(m.custom_price>0, 
                                  CONCAT("(Rp.", m.custom_price, "/", unit, ")<font color=red>*</font>"), CONCAT("(Rp.", i.price, "/", unit, ")"))) 
                                  ORDER BY m.total SEPARATOR "</tr><tr><td>") as final_total,
                               GROUP_CONCAT(DISTINCT CONCAT(md.model, "&nbsp (" , m.total, " pcs.)") ORDER BY m.total SEPARATOR " | ") as hover_result,
                               SUM((m.total*m.custom_price)+(IF(m.custom_price=0,(m.total)*(i.price),0))) nominals');
            $this->db->order_by('item_name');
            $this->db->join('units u', 'u.id = i.unit_id', 'LEFT OUTER');
            $this->db->join('materialneeds as m', 'm.item_id = i.id' ,'LEFT OUTER');
            $this->db->join('modeltypes as md', 'md.id = m.model_id' ,'LEFT OUTER');
            // $this->db->join('items_po as ip', 'ip.item_id = i.id' ,'LEFT OUTER');
            // $this->db->join('modeltypes md', 'md.id = m.model_id');
            $this->db->group_by('i.id');
            // $this->db->group_by('model');
            $this->db->where('m.dateneed_id >', 0);
            $this->db->where('m.dateneed_id', $date_id);
            $query = $this->db->get('items i')->result_array();
            // var_dump($query);
            return $query;
        }

        public function get_tot_items($date_id)
        {
            $this->db->select('i.*, u.unit, u.id as id_unit, m.*, md.*');
            $this->db->order_by('item_name');
            $this->db->join('units u', 'u.id = i.unit_id');
            $this->db->join('materialneeds as m', 'm.item_id = i.id' ,'RIGHT');
            $this->db->join('modeltypes as md', 'md.id = m.model_id' ,'RIGHT');
            // $this->db->join('modeltypes md', 'md.id = m.model_id');
            // $this->db->group_by('i.id');
            // $this->db->group_by('model');
            $this->db->where('m.dateneed_id >', 0);
            $this->db->where('m.dateneed_id', $date_id);
            $query = $this->db->get('items i')->result_array();
            // var_dump($query);
            return $query;

        }

        public function get_model_unselected($date_id)
        {
            $query1 =  $this->db->query('SELECT model_id FROM materialneeds WHERE dateneed_id ='.$date_id)->result(); //get data (still object)
            $unselected = array();
            foreach($query1 as $row){
                $unselected[] = $row->model_id;
            } // generate object to be array
            $model_id = implode(",",$unselected); //array to be string
            $ids = explode(",", $model_id); //string to be array
            $this->db->select('md.*');
            $this->db->order_by('md.model');
            $this->db->where_not_in('md.id', $ids); //this need array format
            $query = $this->db->get('modeltypes md')->result_array();
            return $query;
            // var_dump($query1);
        }

        public function get_cv()
        {
            $this->db->select('main_cv_profile.*');
            $query = $this->db->get_where('main_cv_profile', array('id' => 1))->row_array();
            return $query;
            // var_dump($query1);
        }

        public function get_max_no($date_id)
        {
            $this->db->select_max('no');
            $query = $this->db->get_where('purchase_order', array('dateneed_id' => $date_id))->row_array();
            return $query;
            // echo $date_id;
            // var_dump($date_id);
        }

        public function get_max_id_po()
        {
            $this->db->select_max('id');
            $query = $this->db->get_where('purchase_order')->row_array();
            return $query;
            // echo $date_id;
            // var_dump($date_id);
        }

        public function create_po()
        {
            $no_po = $this->input->post('no_po');
            $cv_id = $this->input->post('cv_id');
            $id_po = $this->input->post('id_po');
            $delivery_date = $this->input->post('delivery_date');
            $supplier = $this->input->post('supplier');
            $vendor = $this->input->post('vendor');
            $description = $this->input->post('description');
            $known_by = $this->input->post('known_by');
            $approved_by = $this->input->post('approved_by');
            $city = $this->input->post('city');
            $sender_date = $this->input->post('sender_date');
            $sender = $this->input->post('sender');
            $checked = $this->input->post('check_item');
            $dateneed_id = $this->input->post('date');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $custom_price = $this->input->post('manualprice');
            
            $data = array(
                'id' => $id_po,
                'no' => $no_po,
                'cv_id' => $cv_id,
                'dateneed_id' => $dateneed_id,
                'delivery' => $delivery_date,
                'city_sender_id' => $city,
                'date_sender' => $sender_date,
                'created_by' => $this->session->userdata('user_id'),
                'supplier_id' => $supplier,
                'vendor_id' => $vendor,
                'description' => $description,
                'known_by' => $known_by,
                'approved_by' => $approved_by,
            );
            // var_dump($data);
            $query = $this->db->insert('purchase_order', $data);
        }

        public function insert_items_po()
        {
            $id_po = $this->input->post('id_po');
            $checked = $this->input->post('check_item');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $custom_price = $this->input->post('manualprice');
            $delivery = $this->input->post('delivery_item');
            
            foreach ($checked as $i)
            {
                $data = array(
                    'item_id' => $item_id[$i],
                    'po_id' => $id_po,
                    'qty' => $qty[$i],
                    'custom_price' => $custom_price[$i],
                    'delivery' => $delivery[$i],
                );
                $query = $this->db->insert('items_po', $data);
            }
        }

        public function update_po()
        {            
            $no_po = $this->input->post('no_po');
            $cv_id = $this->input->post('cv_id');
            $id_po = $this->input->post('id_po');
            $delivery_date = $this->input->post('delivery_date');
            $supplier = $this->input->post('supplier');
            $vendor = $this->input->post('vendor');
            $description = $this->input->post('description');
            $city = $this->input->post('city');
            $sender_date = $this->input->post('sender_date');
            $sender = $this->input->post('sender');
            $checked = $this->input->post('check_item');
            $dateneed_id = $this->input->post('date');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $custom_price = $this->input->post('manualprice');
            
            $data = array(
                'id' => $id_po,
                'no' => $no_po,
                'cv_id' => $cv_id,
                'dateneed_id' => $dateneed_id,
                'delivery' => $delivery_date,
                'city_sender_id' => $city,
                'date_sender' => $sender_date,
                'created_by' => $sender,
                'supplier_id' => $supplier,
                'vendor_id' => $vendor,
                'description' => $description,
            );
            $query = $this->db->update('purchase_order', $data, array('id' => $id_po));
            // var_dump($_POST);
            // echo 'Update po';
        }

        public function update_items_po()
        {
            $ip_id = $this->input->post('po_item_id');
            $id_po = $this->input->post('po_id');
            $checked = $this->input->post('check_item');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $custom_price = $this->input->post('manualprice');
            $delivery = $this->input->post('delivery_item');
            
            foreach ($checked as $i)
            {
                $data = array(
                    'item_id' => $item_id[$i],
                    'po_id' => $id_po,
                    'qty' => $qty[$i],
                    'custom_price' => $custom_price[$i],
                    'delivery' => $delivery[$i],
                );
                $query = $this->db->update('items_po', $data, array('id' => $ip_id[$i]));
            }
        }

        public function delete_items_po()
        {
            $ip_id = $this->input->post('po_item_id');
            $uncheck = $this->input->post('uncheck');
            $checked = $this->input->post('check_item');

            //new container of checked key and value set to the new key
            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            //get a key which different
            $delist = array_diff_key($uncheck, $new_checked);

            foreach ($delist as $j) {
                // var_dump($need[$j]);
                $this->db->where('id', $ip_id[$j]);
                $this->db->where('id !=', NULL);
                $query = $this->db->delete('items_po');
                // return true; // not using cz will delete only one row
            }
        }

        public function insert_items_to_list_po()
        {
            // $need = $this->input->post('need');
            $ip_id = $this->input->post('po_item_id');
            $id_po = $this->input->post('po_id');
            $checked = $this->input->post('check_item');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $custom_price = $this->input->post('manualprice');
            $delivery = $this->input->post('delivery_item');

            //new container of checked key and value set to the new key
            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            // //intersect to catch a key which checked
            $delist = array_intersect_key($ip_id, $new_checked);

            // get a key which checked and value is unset
            $result = array_filter($delist, function($v, $k) {
                return $v == ''; // $k is unset to ignore
            }, ARRAY_FILTER_USE_BOTH);
            // var_dump($result);

            foreach ($result as $i => $value)
            {
                $data = array(
                    'item_id' => $item_id[$i],
                    'po_id' => $id_po,
                    'qty' => $qty[$i],
                    'custom_price' => $custom_price[$i],
                    'delivery' => $delivery[$i],
                );
                $query = $this->db->insert('items_po', $data);
            }
        }

        public function get_po($date_id)
        {
            // $this->db->select('
            //     po.*, po.id po_id, v.vendor, s.supplier supplier_name, po.delivery deliv_max,
            //     d.*, d.id date_id, ip.*, ip.id ip_id, 
            //     sum(Concat(ip.qty*ip.custom_price)) result');
            // $this->db->join('purchase_order po', 'po.id = ip.po_id', 'LEFT OUTER');
            // $this->db->join('vendors as v', 'v.id = po.vendor_id' ,'LEFT OUTER');
            // $this->db->join('suppliers as s', 's.id = po.supplier_id' ,'LEFT OUTER');
            // $this->db->join('dateneeds d', 'd.id = po.dateneed_id', 'LEFT OUTER');
            // // $this->db->join('submission_slip as ss', 'ss.po_id = po.id' ,'LEFT OUTER');
            // $this->db->where('po.dateneed_id', $date_id);
            // $this->db->order_by('deliv_max', 'DESC');
            // $this->db->group_by('po.id');
            // $query = $this->db->get_where('items_po ip')->result_array();;

            $this->db->select('p.*, p.id po_id, s.supplier supplier_name, ss.id ss_id,  count(ss.id) ss, d.year, cv.*, m.*');
            $this->db->join('suppliers as s', 's.id = p.supplier_id' ,'LEFT');
            // $this->db->join('vendors as v', 'v.id = p.vendor_id' ,'LEFT');
            // $this->db->join('personincharges as pc', 'pc.id = p.created_by' ,'LEFT');
            $this->db->join('dateneeds as d', 'd.id = p.dateneed_id' ,'LEFT');
            $this->db->join('months as m', 'm.id = d.month' ,'LEFT');
            // $this->db->join('cv_branchs as b', 'b.id = p.city_sender_id' ,'LEFT');
            $this->db->join('main_cv_profile as cv', 'cv.id = p.cv_id' ,'LEFT');
            $this->db->join('submission_slip as ss', 'ss.po_id = p.id' ,'LEFT');
            // $this->db->join('items_po ip', 'ip.po_id = p.id' ,'LEFT');
            // $this->db->join('items_sp as isp', 'isp.sp_id = ss.id' ,'LEFT');
            // $this->db->join('items_po as ip', 'ip.po_id = p.id' ,'LEFT');
            $this->db->order_by('p.id', 'DESC');
            $this->db->group_by('p.id');
            $query = $this->db->get_where('purchase_order p', array('dateneed_id' => $date_id))->result_array();
            return $query;
            // var_dump($query);
        }

        public function get_sp($date_id)
        {
            $this->db->select('
                po.*, po.id po_id, v.vendor, s.supplier supplier_name, po.delivery deliv_max,
                d.*, d.id date_id, ip.*, ip.id ip_id, 
                count(sp.id) count_sp');
            $this->db->join('dateneeds d', 'd.id = po.dateneed_id', 'LEFT OUTER');
            $this->db->join('submission_slip as ss', 'ss.po_id = po.id' ,'LEFT OUTER');
            $this->db->where('po.dateneed_id', $date_id);
            $this->db->order_by('deliv_max', 'DESC');
            $this->db->group_by('po.id');
            $query = $this->db->get_where('purchase_order po')->result_array();;
            return $query;
            // var_dump($query);
        }

        public function get_po_by_id($id)
        {
            $this->db->select('p.dateneed_id, p.no, d.year, mon.month, mon.romawi, cv.initial');
            $this->db->join('dateneeds as d', 'd.id = p.dateneed_id' ,'LEFT');
            $this->db->join('main_cv_profile as cv', 'cv.id = p.cv_id' ,'LEFT');
            $this->db->join('months as mon', 'mon.id = d.month' ,'LEFT');
            $query = $this->db->get_where('purchase_order p', array('p.id' => $id))->row_array();
            return $query;
            // var_dump($query);
        }

        public function view_po($id)
        {
            $this->db->select('p.*, p.id po_id, p.description descript, p.modified_at mod_at, p.created_at creat_at,
                               s.*, v.*, pc.*, d.*, pc.id known_by, pc.name known_by_nm, pc_ab.id approved_by, pc_ab.name approved_by_nm, u.fullname user,
                               cv.*, cv.address add_cv, cv.id cv_id,
                               b.*, b.city city_sender, mon.*,
                               s.attn attn_s, s.telp_primary tp_s, s.telp_alt ta_s, s.fax f_s,
                               concat(p.no,"/", cv.initial,"/", mon.romawi,"/", d.year) nopo');
            $this->db->order_by('p.id', 'DESC');
            $this->db->join('suppliers as s', 's.id = p.supplier_id' ,'LEFT');
            $this->db->join('vendors as v', 'v.id = p.vendor_id' ,'LEFT');
            $this->db->join('personincharges as pc', 'pc.id = p.known_by' ,'LEFT');
            $this->db->join('personincharges as pc_ab', 'pc_ab.id = p.approved_by' ,'LEFT');
            $this->db->join('dateneeds as d', 'd.id = p.dateneed_id' ,'LEFT');
            $this->db->join('cv_branchs as b', 'b.id = p.city_sender_id' ,'LEFT');
            $this->db->join('main_cv_profile as cv', 'cv.id = p.cv_id' ,'LEFT');
            $this->db->join('months as mon', 'mon.id = d.month' ,'LEFT');
            $this->db->join('users as u', 'u.id = p.created_by' ,'LEFT');
            $query = $this->db->get_where('purchase_order p', array('p.id' => $id))->row_array();
            return $query;
            // var_dump($query);
        }

        public function view_items_po($id)
        {
            $this->db->select('p.*, i.*, ip.*, u.*, ip.delivery deliv_item');
            $this->db->join('purchase_order as p', 'ip.po_id = p.id' ,'RIGHT');
            $this->db->join('items as i', 'i.id = ip.item_id' ,'RIGHT');
            $this->db->join('units as u', 'u.id = i.unit_id' ,'RIGHT');
            $query = $this->db->get_where('items_po ip', array('ip.po_id' => $id))->result_array();
            return $query;
            // var_dump($id);
        }

        public function get_items_for_edit_po($date_id = TRUE, $id = TRUE)
        {
            $this->db->select('i.id item_id, i.*, 
                               u.unit, u.id as id_unit, m.*, md.*, 
                               ip.qty, ip.delivery deliv_item, ip.rest_of_total, ip.custom_price cp, ip.id ip_id, SUM(m.total) totals, 
                               GROUP_CONCAT(DISTINCT CONCAT(md.model, "</td><td>: &nbsp " , m.total, "&nbsp pcs. ", IF(m.custom_price>0, 
                                  CONCAT("(Rp.", m.custom_price, "/", unit, ")<font color=red>**</font>"), CONCAT("(Rp.", i.price, "/", unit, ")")))
                                  ORDER BY m.total SEPARATOR "</tr><tr><td>") as final_total,
                               GROUP_CONCAT(DISTINCT CONCAT(md.model, "&nbsp (" , m.total, " pcs.)") ORDER BY m.total SEPARATOR " | ") as hover_result,
                               SUM((m.total*m.custom_price)+(IF(m.custom_price=0,(m.total)*(i.price),0))) nominals');
            $this->db->order_by('item_name');
            $this->db->join('units u', 'u.id = i.unit_id', 'LEFT OUTER');
            $this->db->join('materialneeds as m', 'm.item_id = i.id' ,'LEFT OUTER');
            $this->db->join('modeltypes as md', 'md.id = m.model_id' ,'LEFT OUTER');
            $this->db->join('items_po as ip', 'ip.item_id = i.id AND ip.po_id = '.$id, 'LEFT OUTER');
            $this->db->join('purchase_order as po', 'po.id = ip.po_id AND po.dateneed_id = '.$date_id ,'LEFT OUTER');
            // $this->db->join('modeltypes md', 'md.id = m.model_id');
            $this->db->group_by('i.id');
            // $this->db->group_by('model');
            // $this->db->where('m.dateneed_id >', 0);
            $this->db->where('m.dateneed_id', $date_id);
            $query = $this->db->get('items i')->result_array();
            // var_dump($query);
            return $query;
        }

        public function delete_pos($date_id)
        {
            $this->db->where('dateneed_id', $date_id);
            $this->db->delete('purchase_order');
            return true;
            // var_dump($id);
        }

        public function delete_po($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('purchase_order');
            return true;
            // var_dump($id);
        }

        public function get_sum_po($id)
        {
            $this->db->select('p.*, i.*, ip.*, u.*, ip.delivery deliv_item,
                               sum(concat(ip.custom_price*ip.qty)) nominals');
            // $this->db->order_by('p.id', 'DESC');
            $this->db->join('purchase_order as p', 'ip.po_id = p.id' ,'RIGHT');
            $this->db->join('items as i', 'i.id = ip.item_id' ,'RIGHT');
            $this->db->join('units as u', 'u.id = i.unit_id' ,'RIGHT');
            $query = $this->db->get_where('items_po ip', array('ip.po_id' => $id))->row_array();
            return $query;
            // var_dump($id);
        }

        public function get_max_modified_at($id)
        {
            $query = $this->db->query('SELECT  p.modified_at FROM `purchase_order` p 
                              LEFT JOIN items_po ip ON ip.po_id = p.id WHERE p.id ='.$id.'
                              UNION ALL
                              SELECT ip.modified_at FROM `items_po` ip
                              LEFT JOIN purchase_order p ON ip.po_id = p.id WHERE ip.po_id ='.$id);
            return $query->result_array();
            // var_dump($id);
        }

        public function get_id_sp()
        {
            $this->db->select_max('ss.id');
            // $this->db->order_by('p.id', 'DESC');
            $query = $this->db->get('submission_slip ss')->row_array();
            return $query;
        }

        public function get_items_sp_for_edit($id = TRUE)
        {
            $this->db->select('ip.id ip_id, ip.qty qty_po, ip.custom_price, ip.po_id, isp.*, isp.id isp_id, i.item_name, i.id item_id, po.*, u.unit unit');
            $this->db->join('items_po ip', 'ip.item_id=i.id', 'LEFT OUTER');
            $this->db->join('items_sp isp', 'isp.item_id=i.id AND isp.sp_id ='.$id, 'LEFT OUTER');
            $this->db->join('submission_slip sp', 'sp.id=isp.sp_id', 'LEFT OUTER');
            $this->db->join('purchase_order po', 'po.id=sp.po_id', 'LEFT OUTER');
            $this->db->join('units u', 'u.id=i.unit_id', 'LEFT OUTER');
            $this->db->where('ip.po_id !=', NULL);
            $this->db->group_by('ip.item_id');
            $query = $this->db->get('items i')->result_array();
            return $query;
            // var_dump($id);
        }

        public function get_items_po($id = TRUE)
        {
            $this->db->select('i.item_name, i.id id, ip.custom_price, po.id po_id, ip.qty qty, u.unit unit');
            $this->db->join('purchase_order po', 'po.id=ip.po_id', 'LEFT OUTER');
            $this->db->join('items i', 'i.id=ip.item_id', 'LEFT OUTER');
            $this->db->join('units u', 'u.id=i.unit_id', 'LEFT OUTER');
            $query = $this->db->get_where('items_po ip', array('po_id' => $id))->result_array();
            return $query;
            // var_dump($id);
        }

        public function create_sp()
        {
            $sp_id = $this->input->post('sp_id');
            $po_id = $this->input->post('po_id');
            $date_sub = $this->input->post('date_sub');
            $description = $this->input->post('description');
            
            $data = array(
                'id' => $sp_id,
                'po_id' => $po_id,
                'date_submission' => $date_sub,
                'description' => $description,
                'created_by' => $this->session->userdata('user_id'),
            );
            // var_dump($data);
            $query = $this->db->insert('submission_slip', $data);
        }

        public function insert_items_sp()
        {
            $checked = $this->input->post('check_item');
            $sp_id = $this->input->post('sp_id');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $man = $this->input->post('man');
            $price = $this->input->post('prc');
            foreach ($checked as $i)
            {
                $data = array(
                    'sp_id' => $sp_id,
                    'item_id' => $item_id[$i],
                    'qty' => $qty[$i],
                    'man_qty' => $man[$i],
                    // 'price' => $price[$i],
                );
                $query = $this->db->insert('items_sp', $data);
            }
        }

        public function get_max_id_sp()
        {
            $date_id = $this->input->post('dateneed_id');
            $this->db->select_max('ss.id');
            $query = $this->db->get_where('submission_slip ss', array('dateneed_id' => $date_id));
            return $query->row_array();
            // var_dump($id);
        }

        public function get_sps($id = TRUE)
        {
            $query = $this->db->query('
                             SELECT r.*, count(r.item_id) items, 
                                sum(if(r.man_qty = 0, (r.custom_price*r.qty), (r.custom_price)*(r.man_qty))) nominals,
                                sum(if(r.man_qty = 0, 1*r.qty, 1*man_qty)) pcs
                             FROM (
                                SELECT 
                                    po.id po_id, 
                                    i.item_name item_name, i.id item_id, 
                                    sp.id sp_id, sp.po_id id_po, sp.description, sp.date_submission date_submission,
                                    isp.qty qty, isp.man_qty man_qty,
                                    ip.custom_price custom_price,
                                    u.username created_by_nm
                                FROM items i
                                LEFT OUTER JOIN items_sp isp ON isp.item_id=i.id
                                LEFT OUTER JOIN items_po ip ON ip.item_id=i.id
                                LEFT OUTER JOIN purchase_order po ON po.id=ip.po_id
                                LEFT OUTER JOIN submission_slip sp ON sp.id=isp.sp_id
                                LEFT OUTER JOIN users u ON u.id=sp.created_by
                             ) r
                             WHERE (po_id = '.$id.' AND id_po = '.$id.') AND (po_id != 0 AND sp_id != 0)
                             GROUP BY sp_id
                             ORDER BY sp_id
                             ');
            return $query->result_array();
            // var_dump($query);
        }

        public function get_all_sp($id = TRUE)
        {
            $query = $this->db->query('
                             SELECT r.*, count(r.item_id) items, 
                                sum(if(r.man_qty = 0, (r.custom_price*r.qty), (r.custom_price)*(r.man_qty))) nominals,
                                sum(if(r.man_qty = 0, 1*r.qty, 1*man_qty)) pcs
                             FROM (
                                SELECT 
                                    po.id po_id, po.no no, cv.initial initial, m.month month, m.romawi romawi, d.year year,
                                    i.item_name item_name, i.id item_id, 
                                    sp.id sp_id, sp.po_id id_po, sp.description, sp.date_submission date_submission,
                                    isp.qty qty, isp.man_qty man_qty,
                                    ip.custom_price custom_price,
                                    u.username created_by_nm
                                FROM items i
                                LEFT OUTER JOIN items_sp isp ON isp.item_id=i.id
                                LEFT OUTER JOIN items_po ip ON ip.item_id=i.id
                                LEFT OUTER JOIN purchase_order po ON po.id=ip.po_id
                                LEFT OUTER JOIN submission_slip sp ON sp.id=isp.sp_id
                                LEFT OUTER JOIN dateneeds d ON d.id=po.dateneed_id
                                LEFT OUTER JOIN months m ON m.id=d.month
                                LEFT OUTER JOIN main_cv_profile cv ON cv.id=po.cv_id
                                LEFT OUTER JOIN users u ON u.id=sp.created_by
                             ) r
                             WHERE po_id != 0 AND sp_id != 0
                             GROUP BY sp_id
                             ');
            return $query->result_array();
            // var_dump($query);
        }

        public function get_sum_sp($id = TRUE, $po_id = TRUE)
        {
            $query = $this->db->query('
                             SELECT r.*, count(r.item_id) items, 
                                sum(if(r.man_qty = 0, (r.custom_price*r.qty), (r.custom_price)*(r.man_qty))) nominals,
                                sum(if(r.man_qty = 0, 1*r.qty, 1*man_qty)) pcs
                             FROM (
                                SELECT 
                                    po.id po_id, 
                                    i.item_name item_name, i.id item_id, 
                                    sp.id sp_id, sp.description, sp.date_submission date_submission,
                                    isp.qty qty, isp.man_qty man_qty,
                                    ip.custom_price custom_price,
                                    u.username created_by_nm
                                FROM items i
                                LEFT OUTER JOIN items_sp isp ON isp.item_id=i.id
                                LEFT OUTER JOIN items_po ip ON ip.item_id=i.id
                                LEFT OUTER JOIN purchase_order po ON po.id=ip.po_id
                                LEFT OUTER JOIN submission_slip sp ON sp.id=isp.sp_id
                                LEFT OUTER JOIN users u ON u.id=sp.created_by
                                WHERE po.id = '.$po_id.' AND (po.id != 0 AND sp.id != 0)
                             ) r
                             WHERE r.sp_id = '.$id.'
                             GROUP BY sp_id
                             ');
            return $query->row_array();
            // var_dump($query);
        }

        public function view_sp($id)
        {
            $this->db->select('ss.*, ss.description s_desc, ss.id sp_id, s.*, v.*, d.*, cv.*, po.dateneed_id');
            $this->db->join('purchase_order as po', 'po.id = ss.po_id' ,'LEFT');
            $this->db->join('suppliers as s', 's.id = po.supplier_id' ,'LEFT');
            $this->db->join('vendors as v', 'v.id = po.vendor_id' ,'LEFT');
            $this->db->join('dateneeds as d', 'd.id = po.dateneed_id' ,'LEFT');
            $this->db->join('main_cv_profile as cv', 'cv.id = po.cv_id' ,'LEFT');
            $query = $this->db->get_where('submission_slip ss', array('ss.id' => $id))->row_array();
            return $query;
            // var_dump($id);
        }

        public function get_items_sp($id)
        {
            $this->db->select('ip.id ip_id, ip.custom_price, ip.po_id, isp.*, i.item_name, i.id id, po.*, u.unit unit');
            $this->db->join('items_po ip', 'ip.item_id=i.id', 'LEFT OUTER');
            $this->db->join('items_sp isp', 'isp.item_id=i.id AND isp.sp_id ='.$id, 'LEFT OUTER');
            $this->db->join('submission_slip sp', 'sp.id=isp.sp_id', 'LEFT OUTER');
            $this->db->join('purchase_order po', 'po.id=sp.po_id', 'LEFT OUTER');
            $this->db->join('units u', 'u.id=i.unit_id', 'LEFT OUTER');
            $this->db->where('ip.po_id !=', NULL);
            $this->db->where('isp.sp_id !=', NULL);
            $this->db->group_by('ip.item_id');
            $query = $this->db->get('items i')->result_array();
            return $query;
            // var_dump($id);
        }

        public function get_sum_items_sp($id)
        {
            $this->db->select('sum(concat)');
            $this->db->join('submission_slip as ss', 'ss.id = is.sp_id' ,'LEFT OUTER');
            $this->db->join('items as i', 'i.id = is.item_id' ,'LEFT OUTER');
            $query = $this->db->get_where('items_sp is', array('is.sp_id' => $id))->result_array();
            return $query;
            // var_dump($id);
        }

        public function update_sp()
        {            
            $id_sp = $this->input->post('id_sp');
            $po_id = $this->input->post('po_id');
            $date_sub = $this->input->post('date_sub');
            $description = $this->input->post('description');


            
            $data = array(
                'po_id' => $po_id,
                'date_submission' => $date_sub,
                'description' => $description,
                'created_by' => $this->session->userdata('user_id'),
            );
            // var_dump($data);
            $query = $this->db->update('submission_slip', $data, array('id' => $id_sp));
        }

        public function update_items_sp()
        {
            $unchecked = $this->input->post('unchecked');
            $checked = $this->input->post('check_item');
            $sp_id = $this->input->post('sp_id');
            $id_sp = $this->input->post('id_sp');
            $isp_id = $this->input->post('isp_id');
            $item_id = $this->input->post('item');
            $qty_po = $this->input->post('qty_po');
            // if ($this->input->post('man') != 0) {
                $man = $this->input->post('man');
            // }else {
            //     $man = $this->input->post('qty');
            // }
            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            $delist = array_intersect_key($man, $new_checked);

            // get a key which checked and value is unset
            $result = array_filter($delist, function($v, $k) {
                return $v !== ''; // $k is unset to ignore
            }, ARRAY_FILTER_USE_BOTH);
            // var_dump($delist);
            // var_dump($result);
            foreach ($result as $i => $value)
            {
                $data = array(
                    'sp_id' => $id_sp,
                    'item_id' => $item_id[$i],
                    'qty' => $qty_po[$i],
                    'man_qty' => $man[$i],
                );
                // var_dump($isp_id[$i]);
                $query = $this->db->update('items_sp', $data, array('id' => $isp_id[$i]));
            }
        }

        public function insert_items_update_sp()
        {
            $unchecked = $this->input->post('unchecked');
            $checked = $this->input->post('check_item');
            $sp_id = $this->input->post('sp_id');
            $id_sp = $this->input->post('id_sp');
            $item_id = $this->input->post('item');
            $qty = $this->input->post('qty');
            $man = $this->input->post('man');
            // $price = $this->input->post('prc');

            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            // //intersect to catch a key which checked
            $delist = array_intersect_key($sp_id, $new_checked);

            // get a key which checked and value is unset
            $result = array_filter($delist, function($v, $k) {
                return $v == ''; // $k is unset to ignore
            }, ARRAY_FILTER_USE_BOTH);
            // var_dump($delist);
            // var_dump($result);

            foreach ($result as $i => $value)
            {
                $data = array(
                    'sp_id' => $id_sp,
                    'item_id' => $item_id[$i],
                    'qty' => $qty[$i],
                    'man_qty' => $man[$i],
                    // 'price' => $price[$i],
                );
                $query = $this->db->insert('items_sp', $data);
            }
        }

        public function delete_items_update_sp()
        {
            $unchecked = $this->input->post('unchecked');
            $checked = $this->input->post('check_item');
            $isp_id = $this->input->post('isp_id');
            // $price = $this->input->post('prc');

            $new_checked = [];
            foreach ($checked as $i => $value) {
                $new_checked[$value] = $value;
            }
            //get a key which different
            $delist = array_diff_key($unchecked, $new_checked);
            // var_dump($delist);
            foreach ($delist as $i) {
                // var_dump($need[$j]);
                $this->db->where('id', $isp_id[$i]);
                $this->db->where('id !=', NULL);
                $query = $this->db->delete('items_sp');
                // return true; // not using cz will delete only one row
                
            }
        }

        public function delete_sps($date_id)
        {
            $this->db->where('dateneed_id', $date_id);
            $this->db->delete('submission_slip');
            return true;
            // var_dump($id);
        }

        public function delete_sp($id = TRUE)
        {
            $this->db->where('id', $id);
            $this->db->delete('submission_slip');
            return true;
            // var_dump($id);
        }

         // public function get_tot_items($date_id = 49)
        // {
        //     // $test = array(
        //     //     array('Year', 'Model 1','Model 2','Model 3','Model 4'), 
        //     //     array('A', '200', '100', '150', '50'), 
        //     //     array('B', '50', '80', '120', '160'), 
        //     //     array('C', '0', '50', '200', '180')
        //     // );

        //     // $data = transposeData($data);
        //     // $retData = array();
        //     // foreach ($test as $row => $columns) {
        //     // foreach ($columns as $row2 => $column2) {
        //     //     $retData[$row2][$row] = $column2;
        //     // }
        //     // }
        //     // var_dump($retData);
        //     // // return $retData;

        //     $this->db->select('i.*, u.unit, u.id as id_unit, m.*, md.*');
        //     $this->db->order_by('item_name');
        //     $this->db->join('units u', 'u.id = i.unit_id');
        //     $this->db->join('materialneeds as m', 'm.item_id = i.id' ,'RIGHT');
        //     $this->db->join('modeltypes as md', 'md.id = m.model_id' ,'RIGHT');
        //     // $this->db->join('modeltypes md', 'md.id = m.model_id');
        //     // $this->db->group_by('i.id');
        //     // $this->db->group_by('model');
        //     $this->db->where('m.dateneed_id >', 0);
        //     $this->db->where('m.dateneed_id', $date_id);
        //     $query = $this->db->get('items i')->result_array();
        //     // var_dump($query);
        //     // return $query;

        //     $new_id = array();
        //     $new_total = array();
        //     foreach ($query as $row => $column) {
        //         $new_id[] = $column['model_id'];
        //         $new_total[] = $column['total'];
        //     }
        //     $new_array = array(
        //         'id_model_n' => $new_id,
        //          'total_n' => $new_total 
        //     );
        //     // var_dump($new_array);
        //     // return;
        //     return $new_array;
        //     // $query2 = $new_array->array_result();

        //     // $retData = array();
        //     // foreach ($new_array as $row => $columns) {
        //     // foreach ($columns as $row2 => $column2) {
        //     //     $retData[$row2][$row] = $column2;
        //     // }
        //     // }
        //     // return $retData;
        //     // $user = array();
        //     // if ($query->num_rows > 0) {
        //     //     while($row = $query->fetch_assoc()) {
        //     //         $id = $row['model_id'];
        //     //         $user[$id] = $row['total'];
        //     //     }
        //     // }

        // }

    }
?>
<?php
class Product_model extends CI_Model
{

        public function __construct()
        {
                $this->load->database();
        }

        public function get_product($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $query = $this->db->get('menu');
                        return $query->result_array();
                }

                $query = $this->db->get_where('menu', array('id' => $slug));
                return $query->row_array();
        }


        public function get_dates($slug = FALSE)
        {
                if ($slug === FALSE) {
                        $this->db->where('status', 'active');
                        $query = $this->db->get('po_purchase_meal_hdr');
                        return $query->result_array();
                }

                $query = $this->db->get_where('po_purchase_meal_hdr', array('id' => $slug, 'status' => 'active'));
                return $query->row_array();
        }

        // public function insert_data()
        // {
        //         $data = array(
        //                 'email' => $this->input->post('Email'),
        //                 'student_name' => $this->input->post("Name"),
        //                 'grade_level' => $this->input->post('Grade'),
        //                 'parent_phone_number' => $this->input->post("Phone_Number"),
        //                 'submitted_date' => date('Y-m-d H:i:s')
        //         );



        //         $clean_data = $this->security->xss_clean($data);

        //         $this->db->insert('order_hdr', $clean_data);
        // }

        public function get_menu_daily_set()
        {
                $this->db->select('menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, menu.id, menu.link');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 1);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_child_menus()
        {
                $this->db->select('menu.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price, po_purchase_meal_dtl.parent, menu.link,category.Sort');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('parent !=', 0);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $this->db->order_by('category.Sort', 'ASC');
                $query = $this->db->get();
                $result = $query->result_array();

                // Group child menus by parent
                $child_menus = [];
                foreach ($result as $row) {
                        $parent = $row['parent'];
                        unset($row['parent']);  // remove parent from row
                        $child_menus[$parent][] = $row;
                }

                return $child_menus;
        }


        public function get_menu_pasta()
        {
                $this->db->select('menu.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 3);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                //      
                $query = $this->db->get();
                return $query->result_array();
        }


        public function get_menu_breakfast()
        {
                $this->db->select('menu.id, menu.name, po_purchase_meal_dtl.date, po_purchase_meal_dtl.price');
                $this->db->from('po_purchase_meal_dtl');
                $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                $this->db->join('category', 'po_purchase_meal_dtl.id_category = category.id');
                $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                $this->db->where('id_category', 4);
                $this->db->where('po_purchase_meal_hdr.status', 'active');
                $query = $this->db->get();
                return $query->result_array();
        }

        public function get_holidays()
        {
                $query = $this->db->get('holiday');
                return $query->result_array();
        }

        public function submit_order1()
        {
                $this->load->database();

                // Load the database library
                $this->db->trans_start();

                $this->db->select('id');
                $this->db->from('po_purchase_meal_hdr');
                $this->db->where('status', 'active');
                $query = $this->db->get();

                $row = $query->row();
                if (isset($row)) {
                        $id_po_purchse_meal_hdr = $row->id;
                }

                // Get form data
                $data = array(
                        'email' => $this->input->post('Email'),
                        'id_po_purchase_meal_hdr' => $id_po_purchse_meal_hdr,
                        'student_name' => $this->input->post('Name'),
                        'grade_level' => $this->input->post('Grade'),
                        'parent_phone_number' => $this->input->post('Phone_Number'),
                        'submitted_date' => date('Y-m-d H:i:s'), // Current date and time
                        'notes' => $this->input->post('Notes'), // Current date and time
                );

                // Insert data into order_hdr
                $this->db->insert('order_hdr', $data);

                // Get the ID of the last inserted row INI IDNYA ntar ambil ini!
                $order_hdr_id = $this->db->insert_id();

                // Get the array of selected checkboxes
                $selected_checkboxes = $this->input->post('checkboxes');

                // Loop through the array of selected checkboxes
                for ($i = 0; $i < count($selected_checkboxes); $i++) {
                        list($checkbox_value, $checkbox_date) = explode('|', $selected_checkboxes[$i]);


                        // Fetch the id from po_purchase_meal_dtl where status is 'ACTIVE' and date equals to the checkbox date
                        $this->db->select('po_purchase_meal_dtl.id');
                        $this->db->from('po_purchase_meal_dtl');
                        $this->db->join('po_purchase_meal_hdr', 'po_purchase_meal_dtl.id_po_purchase_meal_hdr = po_purchase_meal_hdr.id');
                        $this->db->join('menu', 'po_purchase_meal_dtl.id_menu = menu.id');
                        $this->db->where('po_purchase_meal_hdr.status', 'ACTIVE');
                        $this->db->where('menu.id', $checkbox_value);
                        $this->db->where('po_purchase_meal_dtl.date', $checkbox_date);
                        $query = $this->db->get();
                        $result = $query->row_array();

                        if (!empty($result)) {
                                $id_po_purchase_meal_dtl = $result['id'];

                                // Insert data into order_dtl
                                $data = array(
                                        'id_order' => $order_hdr_id,
                                        'id_po_purchase_meal_dtl' => $id_po_purchase_meal_dtl,
                                        'cancel' => '0' // Assuming 0 means not cancelled
                                );
                                $this->db->insert('order_dtl', $data);
                        }
                }

                $this->db->trans_complete();

                if ($this->db->trans_status() === FALSE) {
                        $this->db->trans_rollback();
                        // Transaction failed
                        return FALSE;
                } else {
                        // Transaction successful
                        $this->db->trans_commit();
                        return $order_hdr_id; //bisa return id orderf
                }
        }

        public function get_last_order_details($id_order) //tambahin id 
        {
                $this->db->select('id, email, student_name, grade_level, parent_phone_number');
                $this->db->where('id', $id_order);
                $this->db->order_by('id', 'DESC');

                $result = $this->db->get('order_hdr')->row();

                //bikin buat nama menu, date, sama price nya
                //check hari keberapa dari minggu, bikin friday monday dll trus concat
                // $this->db->select('');
                // select 


                return $result;
        }

        // begin
        public function get_last_order_menu($id_order) //simpan semua nama menu (name) yang dipilih berdasarkan satu order (di id_order)
        {
                $this->db->select('od.id_order, me.name, CONCAT(DAYNAME(pd.date), ", ", DATE_FORMAT(pd.date, "%e %M %Y")) AS date, pd.price, pd.parent, pd.id_menu');
                $this->db->from('po_purchase_meal_dtl AS pd');
                $this->db->join('order_dtl od', 'pd.id = od.id_po_purchase_meal_dtl', 'left');
                $this->db->join('menu me', 'pd.id_menu = me.id', 'left');
                $this->db->where('od.id_order IS NOT NULL', null, false);
                $this->db->where('od.id_order', $id_order);
                $this->db->order_by('pd.date', 'ASC');

                $result = $this->db->get()->result_array();
                return $result;
        }

        //end
        public function get_date($id)
        {
                $this->db->select('*');
                $this->db->from('po_purchase_meal_hdr');
                $this->db->where('id', $id);
                $query = $this->db->get();
                return $query->result_array();
        }

        public function summary($id)
        {
                $this->db->select(
                        'po_purchase_meal_dtl.id as id,
                            po_purchase_meal_dtl.price,
                            po_purchase_meal_dtl.date as po_date,
                            order_dtl.id_po_purchase_meal_dtl, 
                            order_hdr.student_name,
                            order_hdr.submitted_date as date,
                            order_hdr.id as id_ord,
                            order_hdr.grade_level as grade,
                            menu.id as menu_id,
                            menu.name as menu,
                            category.category as category'
                );
                $this->db->from('order_dtl');
                $this->db->join('po_purchase_meal_dtl', 'order_dtl.id_po_purchase_meal_dtl = po_purchase_meal_dtl.id');
                $this->db->join('order_hdr', 'order_dtl.id_order = order_hdr.id');
                $this->db->join('menu', 'menu.id = po_purchase_meal_dtl.id_menu');
                $this->db->join('category', 'category.id = po_purchase_meal_dtl.id_category');
                $this->db->where('order_hdr.id', $id);
                $query = $this->db->get();
                return $query->result_array();
        }

        public function getActiveMealId()
        {
                $this->db->select('id');
                $this->db->where('status', 'active');
                $query = $this->db->get('po_purchase_meal_hdr');
                $result = $query->row_array();
                return $result ? $result['id'] : null;
        }

        public function get_last_order_id($id_order)
        {
                $this->db->select('id');
                $this->db->where('id', $id_order);
                $this->db->order_by('id', 'DESC');
                
                $result = $this->db->get('order_hdr')->row();
                return $result ? $result->id : null;
        }

        // BEGIN TRIAL
        public function get_total_price_order($id_po_weekly, $id_menu_arr) #jadinya id_po_menu 2 mingguan
        {       
                // $this->db->select_sum('price'); // total harga dijumlahin
                // $this->db->where('id_po_purchase_meal_hdr', $id_po_weekly); // po 2 mingguan, id ke-n
                // $this->db->where('id_menu', $id_menu); // menu yang dipilih, baru satu doang


                // #bakal nambahin semua harga jika sama dengan periode tertentu, return total harga dari semua menu dari satu PO Meal
                // $result = $this->db->get('po_purchase_meal_dtl')->row(); // ambil dari tabel apa
                // $total_price = $result->price; // Retrieve the sum of the total price

                // return $total_price;

                $this->db->select_sum('price');
                $this->db->where('id_po_purchase_meal_hdr', $id_po_weekly);
                $this->db->where_in('id_menu', $id_menu_arr); // Use where_in for an array of id_menu values
            
                $result = $this->db->get('po_purchase_meal_dtl')->row();
                $total_price = $result ? $result->price : 0; // Handle the case where no rows are returned
            
                return $total_price;
        }
        // END TRIAL
}

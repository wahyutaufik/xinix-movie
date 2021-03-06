<?php
/**
 * Description of horror *
 * @author generator
 */

class film extends app_crud_controller {
	function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('cover','title','description','size','quality','category_id','publish');
        $config['names'] = array('Cover','Title','Deskripsi','Size','Quality','Category','Publish');
        $config['formats'] = array('callback_foto_1','row_detail','plain_limit(30)','','param_short','callback__category','param_short');
        $config['actions'] = array(
                    'edit' => 'film/edit',
                    'trash' => 'film/trash',
                    'publish' => 'film/publish'
                    );
       
        return $config;
    }
    
    function publish($id){
        $data = $this->_model()->get($id);
        $status = '';
        if ($data['publish'] == 1) {
            $status = 2 ;
        }else{
            $status = 1 ;
        }
        $_POST['publish'] = $status;
        if ($_POST) {
            try{
                $this -> _model() ->before_save($_POST,$id);
                $this->db->where('id',$id);
                $this->db->update('film', $_POST);

                add_info(($id)? l('Record updated') : l('Record added'));

                if (!$this->input->is_ajax_request()){
                    redirect($this->_get_uri('listing'));
                }  
            } catch (Exception $e) {
                add_error(l($e->getMessage()));
            }
        }
    }

    function _category($value){

        $result = $this->db->query('SELECT name FROM category WHERE id = ?', array($value))->row_array();
        
        return $result['name'];
    }

    function foto_1($value) {

        if (!empty($value)) {
            return '<img src ="' . base_url('data/' . $value) . '" width="70" height="">';
        } else {
            return "";
        }
    }

    function detail($id){
        $film = $this->_model()->get($id);
        $this->_data['film'] = $film;
    }

    function _save($id = null) {
        $this->_view = $this->_name . '/' . 'show';
        $model = $this->_model();
        $user = $this->auth->get_user();

        $categorys = $this->_model()->query('SELECT * FROM category')->result_array();
        $this->_data['categorys'] = $categorys;
            
        $this->_data['category_options']= array(''=> l('(Please select)'));
        foreach ($categorys as $cat) {
            $this->_data['category_options'][$cat['id']] = $cat['name'];
        }
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {

                    $this->load->library('upload');

                    if (!empty($_FILES)) {
                        foreach ($_FILES as $key => $file) {
                            if ($file['error'] == 0) {

                                $config = array();
                                $config['upload_path'] = './data/film/' . $key;
                                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                $config['encrypt_name'] = true;
                                $config['field'] = $key;
                                $this->upload->initialize($config);

                                if (!file_exists($config['upload_path'])) {
                                    mkdir($config['upload_path'], 0777, true);
                                }
                                $this->upload->do_upload($config['field']);
                                $upload_data = $this->upload->data();
                                $_POST[$key] = 'film/' . $key . '/' . $upload_data[0]['file_name'];
                            }
                        }
                    }


                    $new_id = $this->_model()->save($_POST,$id);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect($this->_get_uri('listing'));
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        } else {
            if (!empty($id)) {
                $id = $this->uri->segment(3);
                $this->_data['id'] = $id;
                $_POST = $model->get($id);
            }
        }
    } 

    function cat($cat_id, $offset = 0){
        $this->load->library('pagination');
        $config_grid = $this->_config_grid();
        $config_grid['sort'] = $this->_get_sort();

        $filter = $this->_get_filter();
        $this->_data['filter'] = $filter;
        $this->load->library('xgrid', $config_grid, 'listing_grid');
        $count = 0;
        $per_page = 8;
        $count = $this->db->query('SELECT COUNT(*) count FROM film WHERE status !=0 AND category_id = ? ORDER BY created_time DESC', array($cat_id) )->row()->count;
        $films = $this->db->query('SELECT * FROM film WHERE category_id = ? ORDER BY updated_time DESC LIMIT ?, ?', array($cat_id, intval($offset), intval($per_page)))->result_array();
        // xlog($films);exit;
        $this->load->library('pagination');
               // xlog($this->db->last_query());
        $this->pagination->initialize(array(
            'total_rows' => $count,
            'per_page' => $per_page,
            'uri_segment' => 4,
            'base_url' => site_url('web/cat/'.$cat_id),
        ));
        $this->_data['films'] = $films;
    } 
}

<?php
/**
 * Description of category *
 * @author generator
 */

class category extends app_crud_controller {

    function _config_grid() {
        $config = parent::_config_grid();
        $config['fields'] = array('image','name','description');
        $config['names'] = array('Image','Title','Deskripsi');
        $config['formats'] = array('callback_foto_1','row_detail','plain_limit(60)');
       
        return $config;
    }

    function foto_1($value) {

        if (!empty($value)) {
            return '<img src ="' . base_url('data/' . $value) . '" width="70" height="">';
        } else {
            return "";
        }
    }

	function _save($id = null) {
        $this->_view = $this->_name . '/' . 'show';
        $model = $this->_model();
        $user = $this->auth->get_user();
        
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {

                    $this->load->library('upload');

                    if (!empty($_FILES)) {
                        foreach ($_FILES as $key => $file) {
                            if ($file['error'] == 0) {

                                $config = array();
                                $config['upload_path'] = './data/category/' . $key;
                                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                $config['encrypt_name'] = true;
                                $config['field'] = $key;
                                $this->upload->initialize($config);

                                if (!file_exists($config['upload_path'])) {
                                    mkdir($config['upload_path'], 0777, true);
                                }
                                $this->upload->do_upload($config['field']);
                                $upload_data = $this->upload->data();
                                $_POST[$key] = 'category/' . $key . '/' . $upload_data[0]['file_name'];
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
    
}

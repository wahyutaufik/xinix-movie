<?php
/**
 * Description of web *
 * @author generator
 */

class web extends app_crud_controller {

	function __construct() {
		parent::__construct();
		$this->_layout_view = 'layouts/web';
    }

    function _check_access() {
        return TRUE;
    }

    function index($id=null){
        $user = $this->_model('user')->get($id);
        $this->_data['user'] = $user;
        $this->_layout_view = 'layouts/web';
        $this->load->helper('format');
        $this->load->helper('security');

        $film = $this->db->query("SELECT * FROM film WHERE status !=0 ORDER BY created_time DESC")->result_array();
        $this->_data['film'] = $film;
        // xlog($request);exit;

    }

    function category(){
        
        $category_film = $this->db->query("SELECT * FROM category")->result_array();
        $this->_data['category_film'] = $category_film;

    }


    function request_movie($id=null){

        $this->load->helper('format');
        $request = $this->_model('request')->get($id);
        
        $user = $this->auth->get_user();
        $request = $this->db->query("SELECT * FROM request WHERE status !=0 ORDER BY created_time DESC")->result_array();
        $this->_data['request'] = $request;
        if ($_POST) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {
                    $_POST['user_id'] = $user['id'];
                    $new_id = $this->_model('request')->save($_POST);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect(site_url());
                        exit;
                    }
                } catch (Exception $e) {
                    $this->_data['errors'] = '<p>' . $e->getMessage() . '</p>';
                }
            }
        }

    }

    function detail_film($id){
        
        $this->load->helper('format');
        $film = $this->_model('film')->get($id);
        $this->_data['film'] = $film;
    }

    function detail_user($id=null){
        
        // xlog($id);exit;
        $this->load->helper('format');
        $user = $this->_model('user')->get($id);
        $this->_data['user'] = $user;
    }

    function privacy(){
        

    }

    function signup($id=null){
        
        $model = $this->_model('user');

        if ($_POST || $_FILES) {
            if ($this->_validate()) {
                $this->db->trans_start();
                try {

                    $this->load->library('upload');

                    if (!empty($_FILES)) {
                        foreach ($_FILES as $key => $file) {
                            if ($file['error'] == 0) {

                                $config = array();
                                $config['upload_path'] = './data/user';
                                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                                $config['encrypt_name'] = true;
                                $config['field'] = 'image';
                                $this->upload->initialize($config);

                                if (!file_exists($config['upload_path'])) {
                                    mkdir($config['upload_path'], 0777, true);
                                }
                                $this->upload->do_upload($config['field']);
                                $upload_data = $this->upload->data();
                                $_POST[$key] = 'user/' . $upload_data[0]['file_name'];
                            }
                        }
                    }


                    $new_id = $this->_model('user')->save($_POST,$id);
                    if ($this->input->is_ajax_request()) {
                        echo true;
                        exit;
                    } else {
                        redirect($this->_get_uri());
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

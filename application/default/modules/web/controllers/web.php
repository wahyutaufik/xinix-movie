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

    function index(){
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

    function privacy(){
        

    }

    function detail_film($id){
        
        $this->load->helper('format');
        $film = $this->_model('film')->get($id);
        $this->_data['film'] = $film;
    }

}

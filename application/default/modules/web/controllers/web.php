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

    }

    function category(){
        $data = $this->uri->segment(3);
        $category_film = $this->db->query("SELECT * FROM category")->result_array();
        $this->_data['category_film'] = $category_film;

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
            'uri_segment' => 3,
            'base_url' => site_url('film/cat/'.$cat_id),
        ));
        $this->_data['films'] = $films;
    }

    function request(){
        $data = $this->uri->segment(3);

    }

    function privacy(){
        $data = $this->uri->segment(3);

    }

    function detail_film($id){
        $data = $this->uri->segment(3);
        $this->load->helper('format');
        $film = $this->_model('film')->get($id);
        $this->_data['film'] = $film;

        $film_code = $film['trailer'];
        $youtube = explode("v=", $film_code);
    }

}

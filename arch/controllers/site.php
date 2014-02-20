<?php

/**
 * site.php
 *
 * @package     arch-php
 * @author      xinixman <xinixman@xinix.co.id>
 * @copyright   Copyright(c) 2012 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (dd/mm/yyyy hh:mm:ss) (author)
 * 2011/11/21 00:00:00   xinixman <xinixman@xinix.co.id>
 *
 *
 */

class site extends app_base_controller {

    function index() {
    	$category_film = $this->db->query("SELECT * FROM category")->result_array();
    	// xlog($category_film);exit;
    	$this->_data['category_film'] = $category_film;
    }

}

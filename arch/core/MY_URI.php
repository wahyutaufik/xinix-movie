<?php 

/**
 * MY_URI.php
 *
 * @package     arch-php
 * @author      jafar <jafar@xinix.co.id>
 * @copyright   Copyright(c) 2011 PT Sagara Xinix Solusitama.  All Rights Reserved.
 *
 * Created on 2011/11/21 00:00:00
 *
 * This software is the proprietary information of PT Sagara Xinix Solusitama.
 *
 * History
 * =======
 * (yyyy/mm/dd hh:mm:ss) (author)
 * 2011/11/21 00:00:00   jafar <jafar@xinix.co.id>
 *
 *
 */

class MY_URI extends CI_URI {
	var $extension = '';
	var $original_uri = '';

	function _set_uri_string($str) {
		$this->original_uri = $str;
		
		$pos = strrpos($str, '.');
		$this->extension = pathinfo($str, PATHINFO_EXTENSION);
		$rpos = strrpos($str, '.');
		if ($rpos !== FALSE) {
			$str = substr($str, 0, $rpos);
		}
		parent::_set_uri_string($str);
	}
}
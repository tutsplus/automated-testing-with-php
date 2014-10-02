<?php
require_once 'DbAccess.php';

class RealDao implements DbAccess {

	private $data = [];

	function insert($value) {
		sleep(1);
		$this->data[] = $value;
	}

	function selectAll() {
		sleep(1);
		return $this->data;
	}
}
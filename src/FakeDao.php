<?php
require_once 'DbAccess.php';

class FakeDao implements DbAccess {

	private $data = [];

	function insert($value) {
		$this->data[] = $value;
	}

	function selectAll() {
		return $this->data;
	}
}
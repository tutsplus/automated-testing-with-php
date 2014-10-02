<?php

class MathematicalLibrary {

	private $calculator;
	private $display;
	private $dao;

	function __construct(Calculator $calculator, Display $display, DbAccess $dao = null) {
		$this->calculator = $calculator;
		$this->display = $display;
		$this->dao = $dao ? : new RealDao();
	}

	function double($number) {
		$this->calculator->op1 = $number;
		$this->calculator->op2 = $number;
		return $this->calculator->add();
	}

	function isSumEven($n1, $n2) {
		$this->calculator->op1 = $n1;
		$this->calculator->op2 = $n2;
		$sum = $this->calculator->add();

		if ($sum % 2 == 0) {
			return true;
		} else {
			return false;
		}
	}

	function displayTriple($number) {
		$this->calculator->op1 = $this->double($number);
		$this->calculator->op2 = $number;
		$result = $this->calculator->add();
		$this->display->show($result);
		$this->display->show($result);
		$this->display->show($result);
	}

	function doubleAndSave($number) {
		$this->dao->insert($this->double($number));
	}

} 
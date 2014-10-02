<?php

class Calculator {

	public $op1;
	public $op2;

	function add() {
		return $this->op1 + $this->op2;
	}

	function isDivisible() {
		return $this->op1 % $this->op2 == 0;
	}

	function tellMeTheSum() {
		return 'The sum of ' . $this->op1 . ' and ' . $this->op2 . ' is ' . $this->add();
	}

}
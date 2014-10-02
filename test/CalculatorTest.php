<?php

require_once __DIR__ . '/../src/Calculator.php';

class CalculatorTest extends PHPUnit_Framework_TestCase {

	private static $calc;

	static function setUpBeforeClass() {
		self::$calc = new Calculator();
		self::$calc->op1 = 4;
		self::$calc->op2 = 2;
	}

	function testItCAnAddTwoNumbers() {
		// Setup - Arrange
		$expectedSum = 6;

		// Execute / Exercise
		$this->assertEquals($expectedSum, self::$calc->add());
	}

	function testItCanTellIfTwoNumbersAreDivisible() {

		// Exercise
		$this->assertTrue(self::$calc->isDivisible());

	}

	function testItCanTellIfTwoNumbersAreNOTDivisible() {
		// Setup - Arrange
		self::$calc->op1 = 5;
		self::$calc->op2 = 2;

		// Exercise
		$this->assertFalse(self::$calc->isDivisible());

	}

	function testItCanTellTheSum() {

		$actualResult = self::$calc->tellMeTheSum();

//		$this->assertEquals('The sum of 1 plus 2 is 3', $actualResult);

//		$this->assertContains('sum', $actualResult);
//		$this->assertContains("$this->calc->op1", $actualResult);
//		$this->assertContains("$this->calc->op2", $actualResult);
//		$this->assertContains("$expectedSum", $actualResult);

		$this->assertRegExp('/^.*sum.*(5.*2)|(2.*5).*7/', $actualResult);
	}

	function testItCanAddTwoNumberss() {
		$calculator = new Calculator();
		$n1 = 1;
		$n2 = 2;
		$expectedSum = 3;
		$actualSum = $calculator->add($n1, $n2);
		$this->assertEquals($expectedSum, $actualSum);
	}

}
 
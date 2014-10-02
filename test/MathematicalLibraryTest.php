<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/MathematicalLibrary.php';
require_once __DIR__ . '/../src/Display.php';
require_once __DIR__ . '/../src/RealDao.php';
require_once __DIR__ . '/../src/FakeDao.php';

class MathematicalLibraryTest extends PHPUnit_Framework_TestCase {

	function testItCanDouble() {
		$mathLib = new MathematicalLibrary(new Calculator(), new DummyDisplay());
		$this->assertEquals(4, $mathLib->double(2));
	}

	function testItCanTellIfASumIsEven() {
		$mathLib = new MathematicalLibrary($this->aCalculatorWithSum(2), new DummyDisplay());
		$this->assertTrue($mathLib->isSumEven(1,1));
	}

	function testItCanTellIfASumIsOdd() {
		$mathLib = new MathematicalLibrary($this->aCalculatorWithSum(3), new DummyDisplay());
		$this->assertFalse($mathLib->isSumEven(1,1));
	}

	function testItCanDisplayTripple() {
		$spyDisplay = \Mockery::mock('Display');
		$mathLib = new MathematicalLibrary(new Calculator(), $spyDisplay);

		$spyDisplay->shouldReceive('show')->atLeast()->once()->with(9);

		$mathLib->displayTriple(3);

		\Mockery::close();
	}

	function testItCanDoubleAndSave() {
		$dao = new FakeDao();
		$mathLib = new MathematicalLibrary(new Calculator(), new DummyDisplay(), $dao);

		$mathLib->doubleAndSave(2);

		$this->assertEquals(4, $dao->selectAll()[0]);
	}

	private function aCalculatorWithSum($sum) {
		$stubCalc = \Mockery::mock('Calculator');
		$stubCalc->shouldReceive('add')->andReturn($sum);
		return $stubCalc;
	}

	// Test Doubles
	// Dummy Object
	// Test Stubs
	// Test Spy
	// Mock Objects
	// Fake Objects

}


class DummyDisplay extends Display {
	function __construct() {
		return;
	}

}

class SpyDisplay extends  Display {
	private $shownValue;

	public function getShownValue() {
		return $this->shownValue;
	}

	function __construct() {
		return;
	}

	function show($value) {
		$this->shownValue = $value;
	}
}

class ComplexNumber {

	private $realPart;
	private $imaginaryPaart;
}
 
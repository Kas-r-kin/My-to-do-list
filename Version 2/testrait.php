<?php

/*require_once("traitement.php");*/

class Test extends PHPUnit_Framework_TestCase {

	public function testadd(){
		$a = 1;
		$b = 2;

		$c = $a + $b;
		$d = $a + $a;

		$this->assertEquals($c, 3);
		$this->assertTrue($d == 2);
	 }

}

?>

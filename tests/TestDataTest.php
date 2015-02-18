<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

class TestDataTest extends Clips\TestCase {
	/**
	 * @Clips\TestData("demo")
	 */
	public function testTestData() {
		$this->assertNotNull($this->data);
	}
}

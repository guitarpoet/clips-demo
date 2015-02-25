<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

class UserModelTest extends Clips\TestCase {
	public function doSetUp() {
		$this->model = $this->tool->model('user');
	}

	public function testGetUserModel() {
		$this->assertNotNull($this->model);
		$this->assertEquals($this->model->table, 'users');
	}
}

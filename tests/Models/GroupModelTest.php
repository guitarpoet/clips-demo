<?php in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

class GroupModelTest extends Clips\TestCase {
	public function doSetUp() {
		$this->model = $this->tool->model('group');
	}

	public function testGetModel() {
		$this->assertNotNull($this->model);
		$this->assertEquals($this->model->table, 'groups');
	}

	public function testModelOperations() {
		$id = $this->model->insert(array('name' => 'admin'));
		$g = $this->model->load($id);
		$this->assertNotNull($g);
		$this->assertEquals($g->name, 'admin');
		$this->model->delete($id);
		$g = $this->model->load($id);
		$this->assertNull($g);
	}
}

<?php

use Phinx\Migration\AbstractMigration;

class DemoMigration extends AbstractMigration {

	public function init() {
		$this->tool = &Clips\get_clips_tool();
		$this->template = $this->tool->library('MigrationTool');
		$this->config = Clips\parse_json(file_get_contents(Clips\path_join(__DIR__, 'demo.json')));
	}
    
    /**
     * Migrate Up.
     */
    public function up() {
		$this->init();
		$this->template->up($this, $this->config);
		$group_id = $this->template->insert($this, 'demo_groups', array(array('name' => 'admin')));
		$this->group_id = $group_id[0];

		$this->fake_data = $this->tool->load_class('FakeData', true);

		Clips\n_times(40, function() {
			$this->template->insert($this, 'demo_users', array(array('username' => $this->fake_data->fakeName()->simple_name, 'group_id' => $this->group_id)));
		});
    }

    /**
     * Migrate Down.
     */
    public function down() {
		$this->init();
		$this->template->down($this, $this->config);
		$this->execute('delete from demo_users');
		$this->execute('delete from demo_groups');
    }
}

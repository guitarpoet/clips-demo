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
		$this->template->insert($this, 'demo_groups', array(array('name' => 'admin')));
    }

    /**
     * Migrate Down.
     */
    public function down() {
		$this->init();
		$this->template->down($this, $this->config);
		$this->execute('delete from demo_groups');
    }
}

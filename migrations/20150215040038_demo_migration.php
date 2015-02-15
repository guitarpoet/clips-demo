<?php

use Phinx\Migration\AbstractMigration;

class DemoMigration extends AbstractMigration {

	public function init() {
		$this->tool = &Clips\get_clips_tool();
		$this->template = $this->tool->library('MigrationTool');
		$this->config = Clips\parse_json(file_get_contents(Clips\path_join(__DIR__, 'demo.json')));
	}
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up() {
		$this->init();
		$this->template->up($this, $this->config);
    }

    /**
     * Migrate Down.
     */
    public function down() {
		$this->init();
		$this->template->down($this, $this->config);
    }
}

<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;

/**
 * Auto generated controller by Scaffold for table groups.
 *
 * @author Andy
 * @version 1.0
 * @date Thu Mar 12 09:54:44 2015
 *
 * @Clips\Widget({"html", "lang", "grid"})
 * @Clips\Model({ "group" });
 */
class GroupController extends Controller {

	/**
	 * @Clips\Widgets\DataTable("group")
	 * @Clips\Actions("group")
	 */
	public function index() {
		return $this->render('group/index');
	}

	/**
	 * @Clips\Form("group_edit")
	 * @Clips\Actions("group")
	 */
	public function show($id) {
		$data = $this->group->load($id);
		$this->formData("group_edit", $data);
		return $this->render('group/show', array());
	}

	/**
	 * @Clips\Form("group_create")
	 * @Clips\Actions("group")
	 */
	public function create() {
		return $this->render('group/create', array());
	}

	/**
	 * @Clips\Form("group_create")
	 */
	public function create_form() {
		$this->user->insert($this->group->cleanFields('groups', $this->post()));
		return $this->redirect(\Clips\site_url('group/index'));
	}

	/**
	 * @Clips\Form("group_edit")
	 * @Clips\Actions("group")
	 */
	public function edit($id) {
		$data = $this->group->load($id);
		$this->formData("group_edit", $data);
		return $this->render('group/edit', array());
	}

	/**
	 * @Clips\Form("group_edit")
	 */
	public function edit_form() {
		$data = $this->group->cleanFields('groups', $this->post());
		$result = $this->group->update((Object)$data);
		if ($result) {
			return $this->redirect(\Clips\site_url("group/index"));
		} else {
			$this->error('Error in updating group.', 'update');
		}
	}

	public function delete($id = null) {
		if($id) {
			$this->group->delete($id);
		}
		else {
			 $this->group->delete($this->post('ids'));
		}
		return $this->redirect(\Clips\site_url('group/index'));
	}
}

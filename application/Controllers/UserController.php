<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct script access allowed");

use Clips\Controller;

/**
 * Auto generated controller by Scaffold for table users.
 *
 * @author Andy
 * @version 1.0
 * @date Tue Mar 17 13:51:22 2015
 *
 * @Clips\Widget({"html", "lang", "grid", "scaffold"})
 * @Clips\Model({ "user", "group" });
 */
class UserController extends Controller {

	/**
	 * @Clips\Widgets\DataTable("user")
	 * @Clips\Actions("user")
	 */
	public function index() {
		return $this->render('user/index');
	}

	/**
	 * @Clips\Form("user_edit")
	 * @Clips\Actions("user")
	 */
	public function show($id) {
		$data = $this->user->load($id);
		$this->formData("user_edit", $data);
		return $this->render('user/show', array('groups' => $this->group->get()));
	}

	/**
	 * @Clips\Form("user_create")
	 * @Clips\Actions("user")
	 */
	public function create() {
		return $this->render('user/create', array('groups' => $this->group->get()));
	}

	/**
	 * @Clips\Form("user_create")
	 */
	public function create_form() {
		$this->user->insert($this->user->cleanFields('users', $this->post()));
		return $this->redirect(\Clips\site_url('user/index'));
	}

	/**
	 * @Clips\Form("user_edit")
	 * @Clips\Actions("user")
	 */
	public function edit($id) {
		$data = $this->user->load($id);
		$this->formData("user_edit", $data);
		return $this->render('user/edit', array('groups' => $this->group->get()));
	}

	/**
	 * @Clips\Form("user_edit")
	 */
	public function edit_form() {
		$data = $this->user->cleanFields('users', $this->post());
		$result = $this->user->update((Object)$data);
		if ($result) {
			return $this->redirect(\Clips\site_url("user/index"));
		} else {
			$this->error('Error in updating user.', 'update');
		}
	}

	public function delete($id = null) {
		if($id) {
			$this->user->delete($id);
		}
		else {
			 $this->user->delete($this->post('ids'));
		}
		return $this->redirect(\Clips\site_url('user/index'));
	}
	
}

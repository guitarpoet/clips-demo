<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;

/**
 * @Clips\Widget({"html", "lang", "grid"})
 * @Clips\Model({"user", "group"});
 */
class UserController extends Controller {

	/**
	 * @Clips\Widgets\DataTable("user")
	 */
	public function index() {
		return $this->render('user/index');
	}

	/**
	 * @Clips\Form("user_edit")
	 * @Clips\Scss("user/show");
	 */
	public function show($id) {
		$data = $this->user->load($id);
		$this->formData("user_edit", $data);
		return $this->render('user/show', array('groups' => $this->group->get(), 'edit_url'=>\Clips\site_url('/user/edit/'.$id)));
	}


	/**
	 * @Clips\Form("user_create")
	 */
	public function create() {
		return $this->render('user/create', array('groups' =>
			$this->group->get()));
	}

	public function create_form() {
		$this->user->insert($this->user->cleanFields('users', $this->post()));
		return $this->redirect(\Clips\site_url('user/index'));
	}

	/**
	 * @Clips\Form("user_edit")
	 */
	public function edit($id) {
		$data = $this->user->load($id);
		$this->formData("user_edit", $data);
		return $this->render('user/edit', array('groups' => $this->group->get()));
	}

	public function edit_form() {
		$data = $this->user->cleanFields('users', $this->post());
		$result = $this->user->update((Object)$data);
		if ($result) {
			return $this->redirect(\Clips\site_url("/user/index"));
		} else {
			echo 'error';
		}
	}

	public function delete() {
		$ret = $this->user->delete($this->post('ids'));
		return $this->json($ret);
	}

}
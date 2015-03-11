<?php namespace Demo\Controllers; in_array(__FILE__, get_included_files()) or exit("No direct sript access allowed");

use Clips\Controller;

/**
 * @Clips\Widget({"html", "grid"})
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
	 * @param $id
	 * @return \Clips\Models\ViewModel
	 *
	 * @Clips\Form("user")
	 */
	public function show($id) {
		$data = $this->user->load($id);
		$this->formData("user", $data);
		return $this->render('user/show', array('groups' => $this->group->get(), 'edit_url'=>\Clips\site_url('/user/edit/'.$id)));
	}

	/**
	 * @Clips\Form("user")
	 */
	public function edit($id) {
		$data = $this->user->load($id);
		$this->formData("user", $data);
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
		$data = $this->post();

		$data = array(
			'state' => false
		);
		return $this->json($data);
	}

}
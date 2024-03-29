<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JokesController extends CI_Controller {

	public function index()
	{
		$this->load->model('JokeModel');

		$data['jokes'] = $this->JokeModel->get_jokes();
		$this->load->view('index', $data);
	}
	public function view_joke($joke_id) {
		$this->load->Model('JokeModel');
		$data['joke'] = $this->JokeModel->get_joke_by_id($joke_id);

		$this->load->view('view_joke', $data);
	}
	public function confirm_delete($joke_id) {
		$data['joke_id'] = $joke_id;
		$this->load->view('confirm_delete', $data);
	}
	public function delete_joke($joke_id) {
		$this->load->model('JokeModel');
		$this->JokeModel->delete_joke_by_id($joke_id);
		redirect('JokesController');
	}
}

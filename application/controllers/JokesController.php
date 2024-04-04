<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property $JokeModel
 */
class JokesController extends CI_Controller {



	public function index()
	{
		$this->load->view('index');
	}
	public function index_json() {
		$this->load->model('JokeModel');
		$data['jokes'] = $this->JokeModel->get_jokes();
		echo json_encode($data);
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
	public function add_joke_form() {
		$this->load->view('add-joke-form');
	}
	public function add_joke()
	{
		$joke_title = $this->input->post('joke_title');
		$joke_content = $this->input->post('joke_content');
		echo $joke_title . $joke_content;

		$this->load->model('JokeModel');
		$this->JokeModel->add_joke($joke_title, $joke_content);
		$data['id'] = $this->db->insert_id();
		redirect('JokesController/view_joke'.'/' .$data['id']);
	}
	public function filter_jokes_json()
	{
		$filter = $this->input->post('filter');

		$this->load->model('JokeModel');

		if ($filter === 'recent') {
			$data['jokes'] = $this->JokeModel->get_recent_jokes();
		} elseif ($filter === 'old') {
			$data['jokes'] = $this->JokeModel->get_old_jokes();
		} else {
			$data['jokes'] = $this->JokeModel->get_all_jokes();
		}

		echo json_encode($data);
	}
}

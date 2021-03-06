<?php 

class People extends CI_Controller{
	public function index(){
		$data['judul'] = 'List of People';

		$this->load->model('People_model', 'people');

		// PAGINTION
			// load library
		$this->load->library('pagination');
		
			// config
		$config['base_url'] = 'http://localhost/belajarCodeIgniter/people/index';
		$config['total_rows'] = $this->people->countAllPeople();
		$config['per_page'] = 8;
		$config['num_links'] = 3;

			// styling
		$config['full_tag_open'] = '<nav> <ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="page-item active"><a hreg="#" class="page-link">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		$config['attributes'] = ['class' => 'page-link'];

			// initialize
		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$data['peoples'] = $this->people->getpeople($config['per_page'], $data['start']);
		$this->load->view('templates/header', $data);
		$this->load->view('people/index', $data);
		$this->load->view('templates/footer');
	}
}
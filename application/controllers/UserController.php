<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = 'User';
        $data['user'] = $this->ModelUser->getUser()->result_array();


        $this->load->view('dist/user/view', $data);
    }

    public function create()
    {
        $data['title'] = 'User';
        $this->load->view('dist/user/create', $data);
    }

    function save()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		$data = 
		array('username' =>$username,
			  'password' =>md5($password),
			  'role' =>$role
		);

		$this->ModelUser->simpan($data,'User');
		redirect('UserController');
	}

    function hapus($id)
	{
		$where = array('id_user' => $id);
		$this->ModelUser->delete($where,'user');
		redirect('UserController');
	}

    function edit($id_user)
	{
		$where = array('id_user' =>$id_user);
        $data['title'] = 'User';
		$data['user'] = $this->ModelUser->edit($where,'user');

		$this->load->view('dist/user/form_edit',$data);
	}

	function update()
	{
		$id_user = $this->input->post('id_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');

		$data = 
		array('id_user' =>$id_user,
                'username' =>$username,
			    'password' =>md5($password),
                'role' =>$role
		);

		$where = array('id_user' =>$id_user);

		$this->ModelUser->update($where,$data,'user');
		redirect('UserController');
	}
}
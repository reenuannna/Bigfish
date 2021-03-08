<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdCtr extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model');
		$this->load->library('session');
		$this->load->library("form_validation");
		$this->load->library('pagination');
		$this->load->library('email');
		 
        
	}
	public function index()
	{
		$this->load->view('admin/index');
	}
	public function home()
	{
		$data['result']=$this->Model->count('user');
		$this->load->view('admin/home',$data);
	}
	public function view()
	{
		$result['data']=$this->Model->select('user');
		$this->load->view('admin/userview',$result);
	}
	public function email()
	{
		$this->load->view('admin/email');
	}
	public function sendemail()
	{
		$config=array();
		$config['protocol']='smtp';
		$config['smtp_host']='smtp.gmail.com';
		$config['smtp_port']='465';
		$config['smtp_timeout']='7';
		$config['smtp_user']="annammareenu@gmail.com";
		$config['smtp_pass']='**@annamma@**';
		$config['charset'] = 'utf-8';
		$config['newline'] ="\r\n";
		$config['mail_type']='text';
		$config['wordwrap'] = TRUE;
		$config['validation'] = TRUE;
		$this->email->initialize($config);
        
		$from=$this->email->smtp_user;
        $to = $this->input->post('email');
        $subject = $this->input->post('sub');
        $message = $this->input->post('msg');
        $this->email->from('annammareenu@gmail.com');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send()) 
		{
            echo 'Email has been sent successfully';
        } 
		else 
		{
            echo $this->email->print_debugger();
        }
    }

	public function adminlogin()
	{
		$email=$this->input->post('username');
		$pass=$this->input->post('pass');
		$data=$this->Model->userlogin('admin',$email,$pass);
		if($data!=false)
		{
			$this->session->set_userdata('id',$data['ad_id']);
			redirect(base_url('index.php/AdCtr/home'));
		}
		else
		{
			$this->session->set_flashdata('error',"invalid email or password");
			redirect(base_url('index.php/UserCtr/index'));
		}
	}
	// --------------------------PRODUCT DETAILS-----------------------
	public function productTable()
	{
		$config=array();
		$config['base_url']=base_url('index.php/AdCtr/productTable');
		$total_row=$this->Model->count('products');
		$config['total_rows']=$total_row;
		$config['per_page']=4;
		$config['use_page_numbers']=TRUE;
		$config['num_links']=$total_row;
		$start=0;
		$this->pagination->initialize($config);
		// if($this->uri->segment(3))
		// {
			$page=$this->uri->segment(3)?$this->uri->segment(3):1;

			$start=($page-1)*$config['per_page'];
		// }
		// else
		// {
		// 	$page=1;
		// }
		 
		$result['data']=$this->Model->pageSelect('products',$config['per_page'],$start);
		$result['links']=$this->pagination->create_links();
		$this->load->view('admin/productTable',$result);
	}
	public function productForm()
	{
		$result['data']=$this->Model->select('product_types');
		$this->load->view('admin/productForm',$result);
	}
	public function insertProduct()
	{
		$name=$this->input->post('txt_name');
		$type=$this->input->post('txt_type');
		$qnty=$this->input->post('txt_qnty');
		$price=$this->input->post('txt_price');
		$config['upload_path']='./upload/';
		$config['allowed_types']='*';
		$this->load->library('upload',$config);
		if(!$this->upload->do_upload('txt_img'))
		{
			print_r($this->upload->display_errors());
		}
		else
		{
			$image=$this->upload->data();
			$img=$image['file_name'];
			$data=array(
				'name'=>$name,
				'type'=>$type,
				'pr_price'=>$price,
				'kg'=>$qnty,
				'image'=>$img
			);
			$this->Model->insert('products',$data);
			redirect(base_url('index.php/AdCtr/productTable'));
		}
	}

}

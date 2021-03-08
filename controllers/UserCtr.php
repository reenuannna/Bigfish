<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtr extends CI_Controller {

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

	}
	public function index()
	{
		
			
			$id=$this->session->userdata('id');
			$data['username']=$this->Model->selectById('user',$id,'reg_id');
			$data['cartno']=$this->Model->cartCount('cart',$id);
			
			$this->load->view('user/index',$data);
		}

		
	
	public function login()
	{
			$id=$this->session->userdata('id');
			$data['username']=$this->Model->selectById('user',$id,'reg_id');
			$data['cartno']=$this->Model->cartCount('cart',$id);
			$this->load->view('user/login',$data);
	}
	public function userlogin()
	{


		$email=$this->input->post('username');
		$pass=$this->input->post('pass');
		$data=$this->Model->userlogin('user',$email,$pass);
		if($data!=false)
		{
			$this->session->set_userdata('id',$data['reg_id']);
			echo "<script>history.go(-2);</script>";
			
			// $valarray=array('id'=>$data['reg_id'],
			// 				'userpage'=>current_url());
			// // $this->session->set_userdata('id',$data['reg_id']);
			
			// // // redirect(base_url());
			// $this->session->set_userdata($valarray); 
			// // // $referred_from = $this->session->userdata('referred_from'); 
			// // redirect($this->session->userdata('userpage'));
			// redirect($page);
		}
		else
		{
			$this->session->set_flashdata('error',"invalid email or password");
			redirect(base_url('index.php/UserCtr/login'));
		}
	}
	public function logout()
	{
		  $this->session->sess_destroy();
		  redirect(base_url());
	}
	public function register()
	{
		$this->load->view('user/register');
	}
	public function registerData()
	{
		$this->form_validation->set_rules("txt_name","Name","required");
		$this->form_validation->set_rules("txt_address","Address","required");
		$this->form_validation->set_rules("txt_email","Email","required");
		$this->form_validation->set_rules("txt_mob","Mobile","required|numeric");
		$this->form_validation->set_rules("txt_pass","Password","required");
		$this->form_validation->set_rules("txt_cpass","Confirm Password","required");
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('user/register');		
		}
		else
		{
			$name=$this->input->post('txt_name');
			$address=$this->input->post('txt_address');
			$mobile=$this->input->post('txt_mob');
			$email=$this->input->post('txt_email');
			$pass=$this->input->post('txt_pass');
			$data=array(
				'ur_name'=>$name,
				'address'=>$address,
				'mobile'=>$mobile,
				'email'=>$email,
				'password'=>$pass
			);
			$this->Model->insert('user',$data);
			$data=$this->Model->userlogin('user',$email,$pass);
		if($data!=false)
		{
			$this->session->set_userdata('id',$data['reg_id']);
			redirect(base_url());
		}
		
		}
	}
	
	public function about()
	{
		$id=$this->session->userdata('id');
		$data['username']=$this->Model->selectById('user',$id,'reg_id');
		$data['cartno']=$this->Model->cartCount('cart',$id);
		$this->load->view('user/about',$data);
	}
	public function product()
	{
		
		$config=array();
		$config['base_url']=base_url('index.php/UserCtr/product');
		$total_row=$this->Model->count('products');
		$config['total_rows']=$total_row;
		$config['per_page']=9;
		$config['use_page_numbers']=TRUE;
		$start=0;
		$this->pagination->initialize($config);
		$page=$this->uri->segment(3)?$this->uri->segment(3):1;
		$start=($page-1)*$config['per_page'];
		$result['data']=$this->Model->pageSelect('products',$config['per_page'],$start);
		$result['links']=$this->pagination->create_links();
		$id=$this->session->userdata('id');
		$result['username']=$this->Model->selectById('user',$id,'reg_id');
		$result['cartno']=$this->Model->cartCount('cart',$id);
		$this->load->view('user/shop',$result);
	}
	public function productDetails()
	{
		$id=$this->uri->segment(3);
		$pid="pr_id";
		$result['data']=$this->Model->selectById('products',$id,$pid);
		$id=$this->session->userdata('id');
		$result['username']=$this->Model->selectById('user',$id,'reg_id');
		$result['cartno']=$this->Model->cartCount('cart',$id);
		$this->load->view('user/single-product',$result);
	}

	public function cart()
	{
		if($this->session->userdata('id')=="")
		{
			redirect(base_url('index.php/UserCtr/login'));
		}
		else
		{
		$userid=$this->session->userdata('id');
		$id=$this->uri->segment(3);
		$qunty=$this->input->post('quantity');
		$total=$this->input->post('total');
		$data=array(
			'pr_id'=>$id,
			'qunty'=>$qunty,
			'total'=>$total,
			'user_id'=>$userid);
		$this->Model->insert('cart',$data);
		redirect(base_url('index.php/UserCtr/viewcart'));
	}
}
public function viewcart()
{
	$id=$this->session->userdata('id');
	$cond1="cart.user_id=user.reg_id";
		$cond2="cart.user_id='$id'";
		$cond3="products.pr_id=cart.pr_id";
		$result['cartrst']=$this->Model->joinCondSelect('cart','user','products',$cond1,$cond2,$cond3);
		$result['username']=$this->Model->selectById('user',$id,'reg_id');
		$result['cartno']=$this->Model->cartCount('cart',$id);
		$this->load->view('user/cart',$result);
}
public function update()
{
	$userid=$this->session->userdata('id');
	$pid=$this->input->post('pid');
	$qunty=$this->input->post('qty');
	$total=$this->input->post('total');
	$cid=$this->input->post('c_id');
	$data=array(
		'pr_id'=>$pid,
		' qunty'=>$qunty,
		'total'=>$total,
		'user_id'=>$userid);
	$id="c_id='$cid'";
	$this->Model->update('cart',$data,$id);
}
public function order()
{
	$id=$this->session->userdata('id');
	$data1['username']=$this->Model->selectById('user',$id,'reg_id');
	$data1['cartno']=$this->Model->cartCount('cart',$id);
	$this->load->view('user/order',$data1);
}
	public function contact()
	{
		$id=$this->session->userdata('id');
		$data1['username']=$this->Model->selectById('user',$id,'reg_id');
		$data1['cartno']=$this->Model->cartCount('cart',$id);
		$this->load->view('user/contact-us',$data1);
	}
}

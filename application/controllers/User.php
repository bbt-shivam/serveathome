<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->model('User_model');
        $this->load->model('Common_model');
        // Your own constructor code
    }
	
	public function logged_in()
	{
		if(! $this->session->userdata('user'))
			redirect('signup');
	}
	public function check_logged_in()
	{
		if(! $this->session->userdata('user'))
			echo '1';
	}
	public function checkProvider()
	{
		if($this->session->has_userdata('user'))
		{
			$check = $this->User_model->check_provider($this->session->userdata('user')['uid']);
			if(count($check)>0)
			{
				$this->load->view('provider/index');
			}
			else
			{
				$this->load->view('providerRegistration');
			}
		}
		else
		{
			redirect('signup');
		}
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function about()
	{
		$this->load->view('about');
	}
	public function blog()
	{
		$this->load->view('blog');
	}
	public function blogSingle()
	{
		$this->load->view('blog-single');
	}
	public function contact()
	{
		$this->load->library('form_validation');
		$this->load->view('contact');
	}

	public function inquirySend()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstName','First Name','required');
		$this->form_validation->set_rules('lastName','Last Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('subject','Subject','required');
		$this->form_validation->set_rules('message','Message','required');

		if($this->form_validation->run() == False)
		{
			$this->load->view('contact');
		}
		else
		{
			$data = $this->input->post();
			$insert['fname']=$data['firstName'];
			$insert['lname']=$data['lastName'];
			$insert['email']=$data['email'];
			$insert['subject']=$data['subject'];
			$insert['message']=$data['message'];
			$insert['reply']=0;

			$this->db->insert('user_inquiry',$insert);

			$this->session->set_flashdata('contactSend','Your msg has been send..  We will reply you on your email..');

			redirect(base_url('contact/'));
		}
	}

	public function autocomplete()
	{
		$keyword = $this->input->post('key');
		// $city = $this->input->post('city');
		$data['response']='False';
		$result = $this->User_model->autocomplete($keyword);
		if(count($result)) 
		{
			$data['response']='True';
			$data['suggest']=array();
			foreach ($result as $row) 
			{
				array_push($data['suggest'],$row['cname']);
			}
		}
		echo json_encode($data);
		//echo 'hi';
	}
	public function searchRedirect()
	{
		$req = $this->input->post();
		$cid=$this->db->select('cid')->where('cname',$req['catName'])->get('category')->result_array();
		if(count($cid)>0)
		{
			redirect(base_url('sp/').$cid[0]['cid']);
		}
		else
		{
			$parent = $this->db->select('cid')->from('category')->like('cname',$req['catName'])->limit(1)->get()->result_array();
			if(count($parent)>0)
			{
				//redirect(base_url('sp/').$parent[0]['cid']);
			}
			else
			{
				$this->session->set_flashdata('searchResult','This service is not available in your city..');
				redirect(base_url());
			}
		}
	}
	public function profile()
	{
		if($this->session->has_userdata('user'))
		{
			$this->load->library('form_validation');
			$this->load->view('profile');
		}
		else
		{
			redirect('signup');
		}
	}
	public function categoryPage()
	{
		$this->load->view('category');
	}
	public function subcategoryPage($cid)
	{
		$data['category']=$cid;
		$this->load->view('subcategory',$data);
	}
	

	public function editprofile()
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Full Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('contact','Contact Number','numeric|exact_length[10]');
		
		if($this->form_validation->run() == False)
		{
			$this->load->view('profile');
		}
		else
		{
			$data=$this->input->post();
			$id=$_SESSION['user']['uid'];
			$set['name']=$data['name'];
			$set['email']=$data['email'];
			$set['dob']=$data['dob'];
			$set['contact']=$data['contact'];
			$set['gender']=$data['gender'];
			$where['uid']=$id;
			$this->db->where($where)->update('user',$set);
			redirect(base_url('profile'));
			print_r($data);
		}

	}
	public function addNewAdderss()
	{
		$this->logged_in();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('pincode','Pincode','required|numeric|exact_length[6]');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('locality','Locality','required');
		$this->form_validation->set_rules('landmark','Landmark','required');

		if($this->form_validation->run()==False)
		{
			$res['show']='address';
			$this->load->view('profile',$res);
		}
		else
		{
			$req=$this->input->post();
			$uid=$this->session->userdata('user')['uid'];

			$ins['uid']=$uid;
			$ins['cityid']=$req['city'];
			$ins['address']=$req['address'];
			$ins['landmark']=$req['landmark'];
			$ins['locality']=$req['locality'];
			$ins['pincode']=$req['pincode'];
			$ins['addline']=0;

			$check = $this->User_model->get_useraddress($uid);
			if(count($check)>0)
			{
				$this->db->where('uid',$uid)->update('user_address',$ins);
			}
			else
			{
				$this->db->insert('user_address',$ins);
			}
			$res['show']='address';
			$this->load->view('profile',$res);
		}
	}

	public function deleteAddress($addrid)
	{
		$this->logged_in();
		$this->load->library('form_validation');
		$this->Common_model->delete_address($addrid);
		$res['show']='addressDel';
		$this->load->view('profile',$res);
	}


	// public function sociallogin()
	// {

	// 	$data=$this->input->post();
	// 	// $data['email'];
	// 	$result=$this->db->where(array('UserEmail'=>$data['UserEmail']))->get('userdetails')->result_array();
	// 	if(count($result)>0)
	// 	{
	// 		$_SESSION['userDetails']=$result;

	// 	}
	// 	else
	// 	{
	// 		$user['UserName']=$data['UserName'];
	// 		$user['UserEmail']=$data['UserEmail'];
	// 		$this->db->insert('userdetails',$user);
	// 		$uid=$this->db->insert_id();
	// 		$result=$this->db->where(array('uid'=>$uid))->get('userdetails')->result_array();
	// 		$_SESSION['userDetails']=$result;
	// 	}
	// 	// redirect(base_url());

	// }
	
	public function googleLogin()
	{
		$req = $this->input->post();
		$result=$this->db->where(array('email'=>$req['email']))
		 	->get('user')->result_array();
		if(count($result)>0)
		{
			$this->session->set_userdata('user',$result[0]);
		}
		else
		{
			$insert['email']=$req['email'];
			$insert['name']=$req['name'];
			$this->db->insert('user',$insert);

			$uid=$this->db->insert_id();

			$res=$this->db->where(array('uid'=>$uid))
				->get('user')->result_array();
			$this->session->set_userdata('user',$res[0]);
		}
	}
	public function orders($state=0)
	{
		$this->logged_in();

		$this->load->library('cart');
		$this->cart->destroy();

		$data['orders'] = $this->User_model->get_all_orders($this->session->userdata('user')['uid'],$state);
		// $data['orders']['order_dtls'] = $this->User_model->get_order_dtls($data['orders'][0]['oid']);
		$this->load->view('orders',$data);
		// echo '<pre>';
		// print_r($data);
	}

	public function confirmDelivery()
	{
		$this->logged_in();
		$req=$this->input->post();

		$order=$this->User_model->get_order($req['odid']);

		$checkcode = $this->db->select('*')->where(array('staffid'=>$order[0]['staffid'],'code'=>$req['code']))->get('p_staff')->result_array();

		if(count($checkcode)>0)
		{
			$update['order_status']=2;
			$this->db->where('oid',$req['odid'])->update('orders',$update);

			$update2['p_wallet']=$order[0]['final_price'];
			$this->db->where('pid',$order[0]['pid'])->update('provider',$update2);

			if($order[0]['staffid']!= null)
			{
				$updateStaff['status']=0;
				$this->db->where('staffid',$order[0]['staffid'])->update('p_staff',$updateStaff);
			}
		}
		else
		{
			$this->session->set_flashdata('conCodeErr','Enter Correct code..!');
			$this->session->set_flashdata('flag','1');
		}
		redirect(base_url('orders'));
		
	}


	public function cancleOrder()
	{
		$this->logged_in();
		$req=$this->input->post();

		$order=$this->User_model->get_order($req['odid']);

		$update['order_status']=-1;
		$update['reason']=$req['reason'];
		$this->db->where('oid',$req['odid'])->update('orders',$update);

		$userWallet['wallet']=$order[0]['final_price'];
		$this->db->where('uid',$order[0]['uid'])->update('user',$userWallet);

		if($order[0]['staffid']!= null)
		{
			$updateStaff['status']=0;
			$this->db->where('staffid',$order[0]['staffid'])->update('p_staff',$updateStaff);
		}

		$this->session->set_flashdata('orderStatus','Order Canclled successfully.. Amount will be added to user wallet');
		redirect(base_url('orders'));

	}



	public function giveRating()
	{
		$this->logged_in();
		$req=$this->input->post();
		// print_r($req);

		$date = new DateTime();
		$today = $date->format('Y-m-d H:i:s');

		$sdate = $date->format('Y-m-d');

		$insert['uid']=$req['uid'];
		$insert['pid']=$req['pid'];
		$insert['oid']=$req['oid'];
		$insert['ratings']=$req['rating'];
		$insert['description']=$req['description'];
		$insert['date']=$sdate;
		$this->db->insert('review',$insert);

		$this->session->set_flashdata('rateMsg','Success');
		redirect(base_url('orders'));
	}

	public function deleteRating($rid)
	{
		$this->logged_in();

		$this->db->delete('review',array('rid'=>$rid));
		redirect(base_url('orders'));
	}

	public function providers($pid)
	{
		$this->load->library('cart');
		$data['provider']=$this->Common_model->get_provider($pid);
		$data['cid']=$this->Common_model->get_service_category($pid);
		foreach($data['cid'] as $c){
			$data['services']=$this->Common_model->get_services($pid,$c['cid']);
		}
		// echo '<pre>';
		// print_r($data);
		$this->load->view('listings-single',$data);
	}
	public function subCategory($cid=0)
	{
		$result=$this->User_model->getSubcategory($cid);
		foreach ($result as $subcat) {
			echo '<option value="'.$subcat['cid'].'">'.$subcat['cname'].'</option>';
		}
	}

	public function facebookLogin()
	{
		require_once APPPATH.'third_party/Facebook/autoload.php';
		$fb = new Facebook\Facebook([
			'app_id' => '257067635295518', // Replace {app-id} with your app id
			'app_secret' => '02249cc2e8e06e7621c48b3f7a7f9cbd',
			'default_graph_version' => 'v3.2',
		]);

		$helper = $fb->getRedirectLoginHelper();

		try {
		  $accessToken = $helper->getAccessToken();
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		if (! isset($accessToken)) {
		  if ($helper->getError()) {
		    header('HTTP/1.0 401 Unauthorized');
		    echo "Error: " . $helper->getError() . "\n";
		    echo "Error Code: " . $helper->getErrorCode() . "\n";
		    echo "Error Reason: " . $helper->getErrorReason() . "\n";
		    echo "Error Description: " . $helper->getErrorDescription() . "\n";
		  } else {
		    header('HTTP/1.0 400 Bad Request');
		    echo 'Bad request';
		  }
		  exit;
		}

		// Logged in
		// echo '<h3>Access Token</h3>';
		// var_dump($accessToken->getValue());

		// The OAuth 2.0 client handler helps us manage access tokens
		$oAuth2Client = $fb->getOAuth2Client();

		// Get the access token metadata from /debug_token
		$tokenMetadata = $oAuth2Client->debugToken($accessToken);
		// echo '<h3>Metadata</h3>';
		// var_dump($tokenMetadata);

		// Validation (these will throw FacebookSDKException's when they fail)
		$tokenMetadata->validateAppId('257067635295518'); // Replace {app-id} with your app id
		// If you know the user ID this access token belongs to, you can validate it here
		//$tokenMetadata->validateUserId('123');
		$tokenMetadata->validateExpiration();

		if (! $accessToken->isLongLived()) {
		  // Exchanges a short-lived access token for a long-lived one
		  try {
		    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
		  } catch (Facebook\Exceptions\FacebookSDKException $e) {
		    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
		    exit;
		  }

		  echo '<h3>Long-lived</h3>';
		  var_dump($accessToken->getValue());
		}

		//$_SESSION['fb_access_token'] = (string) $accessToken;
		$token = (string) $accessToken;

		try {
		  // Returns a `Facebook\FacebookResponse` object
		  $response = $fb->get('/me?fields=id,name,email', $token);
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}

		$user = $response->getGraphUser();
		$email=$user['email'];
		$result=$this->User_model->check_email($email);

		if(count($result)>0)
		{
			$this->session->set_userdata('user',$result[0]);
			redirect(base_url());
		}
		else
		{
			$data['name']=$user['name'];
			$data['email']=$user['email'];
			$this->db->insert('user',$data);
			$result=$this->User_model->check_email($email);
			if(count($result)>0)
			{
				$this->session->set_userdata('user',$result[0]);
				redirect(base_url());
			}
		}
		// User is logged in with a long-lived access token.
		// You can redirect them to a members-only page.
		//header('Location: https://example.com/members.php');
	}

	public function loginCheck()
	{
		$data=$this->input->post();
		$result=$this->User_model->authenticate($data);

		if(count($result)>0)
		{
			$this->session->set_userdata('user',$result[0]);
			//echo $this->session->userdata('user')['name'];
			redirect(base_url());
		}
		else
		{
//			echo "invalid";
			$this->session->set_flashdata('message',"Invalid Email or Password");
			redirect(base_url('signUp'));
		}
	}
	public function logOut()
	{
		$this->session->sess_destroy();
//		$this->session->unset_userdata();
		redirect(base_url());
	}
	public function signUp()
	{
		$this->load->library('form_validation');
		require_once APPPATH.'third_party/Facebook/autoload.php';
		$fb = new Facebook\Facebook([
		  'app_id' => '257067635295518', // Replace {app-id} with your app id
		  'app_secret' => '02249cc2e8e06e7621c48b3f7a7f9cbd',
		  'default_graph_version' => 'v3.2',
		  ]);

		$helper = $fb->getRedirectLoginHelper();

		$permissions = ['email']; // Optional permissions
		$loginUrl = $helper->getLoginUrl(base_url('facebookLogin'), $permissions);
		$data['fb']=htmlspecialchars($loginUrl);
		//echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
		$this->load->view('signup',$data);
	}
	public function signIn()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Your name','required|alpha');
		$this->form_validation->set_rules('email','Your email','required|is_unique[user.email]|valid_email');
		$this->form_validation->set_rules('password','Your password','required|min_length[4]');
		$this->form_validation->set_rules('cpassword','Your confirm password','required|matches[password]');

		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('signup');
		}
		else
		{
			$data=$this->input->post();
			$insert['name']=$data['name'];
			$insert['email']=$data['email'];
			$insert['password']=md5($data['password']);
			$this->db->insert('user',$insert);
			redirect(base_url());
		}
	}

	public function sp($cid=0,$page=1)
	{
		$this->load->library('cart');
		$this->cart->destroy();
		
		$this->load->library('pagination');
		$config['base_url']=base_url('sp/').$cid;
		$config['per_page']=4;
		$config['uri_segment']=3;
		$config['use_page_numbers']=true;
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<span>';
		$config['first_tag_close'] = '</span>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<span>';
		$config['last_tag_close'] = '</span>';
		$config['num_rows']=10;

		if($cid==0)
		{
			$config['total_rows']=$this->User_model->total_providers($cid);
			$this->pagination->initialize($config);
			$data['links']=$this->pagination->create_links();
			$data['providers']=$this->User_model->provider($cid,$page);
			$data['flag']=0;
		}
		else
		{
			$config['total_rows']=$this->User_model->total_providers($cid);
			$this->pagination->initialize($config);
			$data['links']= $this->pagination->create_links();
			$data['providers']=$this->User_model->provider($cid,$page);
			$data['flag']=1;
		}
		if(count($data['providers']) > 0)
		{
			$this->load->view('listings',$data);
		}
		else
		{
			$this->session->set_flashdata('searchResult','This service is not available in your city..');
			redirect(base_url());
		}
	}

	//review

	public function getReview($sid)
	{
		$result=$this->User_model->get_review($sid);
		print_r($result);
	}

	// cart

	public function cart($sid=0)
	{
		$res=$this->db->where(array('sid'=>$sid))
				->get('services')->result_array();
		$this->load->library('cart');
		$checkCart =  $this->cart->contents();
		$qtyCheck=0;
		foreach ($checkCart as $check) {
			if($check['id']==$sid)
				$qtyCheck += $check['qty'];
		}

		if(count($res)>0)
		{
			if($qtyCheck == 0)
			{
				$cart['id']=$sid;
				$cart['name']='sname';
				$cart['qty']=1;
				$cart['url']=$res[0]['simage'];
				$cart['price']=$res[0]['price'];
				$this->cart->insert($cart);
			}
				// redirect(base_url('displayCart'));
				//$dat['crt']=$this->cart->contents();
				$cart =  $this->cart->contents();
				$dat['items']=0;
				foreach ($cart as $c) {
					$dat['items'] += $c['qty'];
				}
				// $dat['items'] = 
				$dat['total'] = $this->cart->total();
				// print_r($dat['items']);
				echo json_encode($dat);
		}
		
	}
	function displayCart()
	{
		$this->load->library('cart');
		$dat['crt']=$this->cart->contents();
		$this->load->view('cart',$dat);
	}
	public function removecart($sid)
	{
		$this->load->library('cart');
		$checkCart =  $this->cart->contents();
		$rowid=0;
		foreach ($checkCart as $check) {
			if($check['id']==$sid){
				$rowid = $check['rowid'];
			}
		}
		
		$this->cart->remove($rowid);
		//redirect(base_url('cart'));
	}
	public function updatecart($id)
	{
		$data=$this->input->get();
		$this->load->library('cart');
		$cart['qty']=$data['qty'];
		$cart['id']=$data['id'];
		$cart['rowid']=$data['rowid'];
		
		$this->cart->update($cart);
		// echo 1;
	}
	public function confirmOrderPage()
	{
		$this->logged_in();
		$this->load->library('cart');
		$this->load->library('form_validation');
		$dat['crt']=$this->cart->contents();
		$this->load->view('confirmOrder',$dat);
	}

	public function payment()
	{
		$this->logged_in();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('custname','Name','required');
		$this->form_validation->set_rules('phone','Phone','required|numeric|min_length[10]|max_length[12]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('address','Address','required');
		$this->form_validation->set_rules('locality','Locality','required');
		$this->form_validation->set_rules('landmark','Landmark','required');
		$this->form_validation->set_rules('pincode','Name','required|exact_length[6]|numeric');


		if($this->form_validation->run() == False)
		{
			$this->load->library('cart');
			$dat['crt']=$this->cart->contents();
			$this->load->view('confirmOrder',$dat);
		}
		else
		{

			$data=$this->input->post();
			$this->session->set_userdata('orders',$data);

			if($data['paymentMethod']=='W')
			{
				$checkBalance = $this->db->select('wallet')->where('uid',$this->session->userdata('user')['uid'])->get('user')->result_array();
				if(count($checkBalance)>0)
				{
					if($checkBalance[0]['wallet'] >= $data['finalPrice'])
					{
						$data = $this->session->userdata('orders');

						$date = new DateTime();
						$today = $date->format('Y-m-d H:i:s');

						$sdate = $date->format('Y-m-d');

						$insert['uid'] = $this->session->userdata('user')['uid'];
						$insert['payment_status']='paid';
		
						$insert['txnid']='';
						$insert['method']='wallet';
						$insert['order_amount']=$data['total'];
						$insert['discount']=$data['dis'];
						$insert['order_status']=0;
						$insert['final_price']=$data['finalPrice'];
						$insert['order_date']=$today;
						$insert['service_date']=$sdate;
						$insert['uname']=$data['custname'];
						$insert['contact']=$data['phone'];
						$insert['email']=$data['email'];
						$insert['cpnid']=$this->session->userdata('coupan')['cpnid'];

						$address = $data['address'].',<br>  '.$data['locality'].',<br> '.$data['landmark'].',<br> Surat,<br> Gujrat - '.$data['pincode'];
						$insert['address']=$address;

						$this->db->insert('orders',$insert);
						$this->session->unset_userdata('coupan'); 
						$oid = $this->db->insert_id();

						foreach($data['sid'] as $sid)
						{
							
							$price = $this->User_model->get_price($sid);
							
							$ins['oid'] = $oid;
							$ins['sid'] = $sid;
							$ins['price'] = $price[0]['price'];

							$this->db->insert('order_dtls',$ins);
						}

						$newWalletAmount = $checkBalance[0]['wallet']-$data['finalPrice'];
						$updt['wallet']=$newWalletAmount;
						$ud=$this->session->userdata('user')['uid'];
						$this->db->where('uid',$ud)->update('user',$updt);
						// echo "<pre>";
						// print_r($data);
						$this->load->library('cart');
						$this->cart->destroy();
						redirect(base_url('invoice/').$oid);
					}
					else
					{
						$this->load->library('cart');
						$dat['crt']=$this->cart->contents();
						$this->session->set_flashdata('walletBalance','Insuffcient balance in wallet.. Try another payment option..');
						$this->load->view('confirmOrder',$dat);
						
					}
				}
			}
			elseif($data['paymentMethod']=='C')
			{
				echo 'COD';
			}
			elseif($data['paymentMethod']=='P')
			{
			
		
				// $this->load->library('cart');
				// $data=$this->input->post();

				$MERCHANT_KEY = "POibCycj";
				$SALT = "dGxZsc6928";
				// Merchant Key and Salt as provided by Payu.

				$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
				//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

				// $action = '';
				$posted = array();
		        $posted['key']=$MERCHANT_KEY;
		        $posted['amount']=$data['finalPrice'];
		        $posted['firstname']=$data['custname'];
		        $posted['email']=$data['email'];	
		        $posted['phone']=$data['phone'];
		        $posted['address']=$data['address'];
		        $posted['productinfo']='5 product';
		        $posted['surl']=base_url('successPayment');
		        $posted['furl']=base_url('displayCart');
		        $posted['service_provider']='payu_paisa';
		        $posted['action'] = 'ABC';
		        $posted['formError'] = 0;
		        $posted['txnid'] = '';

				$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		        $posted['txnid']=$txnid; 

				$hash = '';
				// Hash Sequence
				$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
				if(empty($posted['hash']) && sizeof($posted) > 0) {
				  if(
				          empty($posted['key'])
				          || empty($posted['txnid'])
				          || empty($posted['amount'])
				          || empty($posted['firstname'])
				          || empty($posted['email'])
				          || empty($posted['phone'])
				          || empty($posted['productinfo'])
				          || empty($posted['surl'])
				          || empty($posted['furl'])
						  || empty($posted['service_provider'])
				  ) {
				    $formError = 1;
				  } else {
				    // $posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
					$hashVarsSeq = explode('|', $hashSequence);
				    $hash_string = '';	
					foreach($hashVarsSeq as $hash_var) {
				      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
				      $hash_string .= '|';
				    }

				    $hash_string .= $SALT;


				    $hash = strtolower(hash('sha512', $hash_string));
				    $posted['action'] = $PAYU_BASE_URL . '/_payment';
				  }
				} elseif(!empty($posted['hash'])) {
				  $hash = $posted['hash'];
				  $posted['action'] = $PAYU_BASE_URL . '/_payment';
				}
				 $posted['hash']=$hash;

				$this->load->view('payumoney',$posted);
			}
		}
	}

	public function successPayment()
	{
		$this->logged_in();
		$data = $this->session->userdata('orders');

		$date = new DateTime();
		$today = $date->format('Y-m-d H:i:s');

		$sdate = $date->format('Y-m-d');

		$insert['uid'] = $this->session->userdata('user')['uid'];
		$req = $this->input->post();
		if($req['status']=='success')
			$insert['payment_status']='paid';
		
		$insert['txnid']=$req['txnid'];
		$insert['method']='card';
		$insert['order_amount']=$data['total'];
		$insert['discount']=$data['dis'];
		$insert['order_status']=0;
		$insert['final_price']=$data['finalPrice'];
		$insert['order_date']=$today;
		$insert['service_date']=$sdate;
		$insert['uname']=$data['custname'];
		$insert['contact']=$data['phone'];
		$insert['email']=$data['email'];
		$insert['cpnid']=$this->session->userdata('coupan')['cpnid'];

		$address = $data['address'].',<br>  '.$data['locality'].',<br> '.$data['landmark'].',<br> Surat,<br> Gujrat - '.$data['pincode'];
		$insert['address']=$address;

		$this->db->insert('orders',$insert);
		$this->session->unset_userdata('coupan'); 
		$oid = $this->db->insert_id();

		foreach($data['sid'] as $sid)
		{
			
			$price = $this->User_model->get_price($sid);
			
			$ins['oid'] = $oid;
			$ins['sid'] = $sid;
			$ins['price'] = $price[0]['price'];

			$this->db->insert('order_dtls',$ins);
		}
		// echo "<pre>";
		// print_r($data);
		$this->load->library('cart');
		$this->cart->destroy();
		redirect(base_url('invoice/').$oid);
		
	}



	public function invoice($oid)
	{
		$this->logged_in();
		$data['order']=$this->User_model->get_order($oid);
		$data['order_dtls']=$this->User_model->get_order_dtls($oid);
		foreach ($data['order_dtls'] as $o) 
		{
			$data['service'][]=$this->User_model->get_service($o['sid']);	
		}	
		$data['user']=$this->User_model->get_user($data['order'][0]['uid']);
		$data['user_address']=$this->Common_model->get_address($data['order'][0]['uid']);
		$pid=$this->Common_model->get_service_provider($data['order_dtls'][0]['sid']);
		$data['provider']=$this->Common_model->get_provider($pid[0]['pid']);
		// $data['provider_address']=$this->Common_model->get_provider_address($data['provider'][0]['addrid']);
		 // echo '<pre>';
		 // print_r($data);
		$this->load->view('invoice',$data);
	}



	//..............send email...............

	public function sendMail($sendTo,$subject,$message)
    {
    	// -------------static-------------
    	$this->load->library('email');
    	$this->email->from('sth4131@gmail.com','serverathome - services at your home');
    	$this->email->to($sendTo);
    	$this->email->subject($subject);
    	$this->email->message($message);
    	if(! $this->email->send())
    	{
    		echo 'error';
    	}
    	else
    	{
    		echo 'success';
    	}
    }

   	public function sendLink()
	{
		$email=$this->input->post('email');
		$where['email']=$email;
		if(count($this->db->where($where)->get('user')->result_array())>0)
		{

			$str = "abcdefghijklmnopqrstuvwxyz12345467890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$randomString = substr(str_shuffle($str),0,6);
			echo $randomString;
			$sendTo=$email;
			$subject="forget password link";
			$message="your salt is : ".$randomString."<br>
			<a href=".base_url('setNewPassword/').$randomString."> click here to reset password </a>
			";
			$_SESSION['confirmSalt'] = $randomString;
			$_SESSION['emailfp'] = $email;
			 $this->sendMail($sendTo,$subject,$message);
		}
			
			// $message=' Forgot password link has been sent to your email id - '.$email;
			// $mobile="7990361072";
	
			// $this->sendSms($mobile,$message);
	
		redirect(base_url('signUp'));

	}

	// ----------------------send sms-----------------
	public function sendSms($mobile,$message)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.msg91.com/api/sendhttp.php?Group_id=group_id&authkey=321482AkIGpjkt5e5f9790P1&mobiles=$mobile&unicode=&country=91&message=$message&sender=TESTIN&route=4",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo 'success'.$response;
		}
	}

	public function sendOTP()
	{
		$otp = $this->generate_otp(5);

		$SESSION['user_otp'] = $otp;
		$user = $this->User_model->get_user($this->session->userdata('user')['uid']);
		if(isset($user[0]['contact']) && $user[0]['contact'] !='')
		{
			$phone = $user[0]['contact'];
			$msg = 'Your One time password is '.$otp;
			//echo $phone;
			//$responce=$this->sendSms($phone,$msg);
			echo 'phone';
		}
		else
		{
			$email = $user[0]['email'];
			$subject = 'Change Password';
			$msg = 'Your One time password is '.$otp;
			$this->sendMail($email,$subject,$msg);
			echo 'emil sent';
		}
		
	}

	private function generate_otp(int $length = 4)
    {
        $otp = "";
        $numbers = "0123456789";
        for ($i = 0; $i < $length; $i++) {
            $otp .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        return $otp;
    }

    public function verify_otp($otp)
    {
        // Get the otp value 
        $user_otp = $otp;
        if ($user_otp == $_SESSION['user_otp']) {
            echo 1;
        } else {
            echo 0;
        }
   
    }
   
    public function changeUserPassword()
    {
    	$this->logged_in();
    	
    	$this->load->library('form_validation');
    	$this->form_validation->set_rules('oldPassword','Old Password','callback_password_check');
    	$this->form_validation->set_rules('newPassword','New Password','required');
    	$this->form_validation->set_rules('conPassword','Confirm Password','required|matches[newPassword]');

    	if($this->form_validation->run()==False)
    	{
    		$this->load->view('profile');
    	}
    	else
    	{
    		$uid = $this->session->userdata('user')['uid'];
    		$update['password'] = md5($this->input->post('newPassword'));
    		$this->db->where('uid',$uid)
    			->update('user',$update);
    			redirect('logout');
    	}
    	
    	// echo'<pre>';
    	// print_r($data);
    }
    public function password_check($oldpass)
    {
        $uid = $this->session->userdata('user')['uid'];
        $user = $this->User_model->get_user($uid);

        if($user[0]['password'] !== md5($oldpass)) {
            $this->form_validation->set_message('password_check', 'The {field} does not match');
            return false;
        }

        return true;
    }

	public function setNewPassword()
	{

    	$data['confirmSalt'] = $_SESSION['confirmSalt'];
    	if(isset($_POST['btnsubmit']))
    	{
    		$userData = $this->input->post();
			// print_r($data);
    		$where['email'] = $userData['email'];
    		$userDetails = $this->db->where($where)->get('user')->result_array();
			if(count($userDetails) > 0)
			{
				// print_r($userDetails);
				// print_r($userData);
				// print_r($data);
				if($userData['confirmSalt'] == $_SESSION['confirmSalt'] && $userData['email'] == $_SESSION['emailfp']){
					// echo "salt match";
					if($userData['password'] == $userData['cpassword']){

						if(strlen($userData['password']) > 3 && strlen($userData['cpassword']) < 15 ){
							$whereUpdate['uid'] = $userDetails[0]['uid'];
							$update['password'] = md5($userData['password']);

							if($this->db->where($whereUpdate)->update('user',$update))
							{
								//$this->load->view('login');
								redirect('signup');
							}
						}
						else
						{
							$this->session->set_flashdata('emaildt',$userData['email']);
							$this->session->set_flashdata('saltdt',$userData['confirmSalt']);
							$this->session->set_flashdata('passValErr','Password must need to be greater than 3 and less than 15');
							$this->load->view('setnewpass',$data);								
						}
					}
					else
					{
						$this->session->set_flashdata('emaildt',$userData['email']);
						$this->session->set_flashdata('saltdt',$userData['confirmSalt']);
						$this->session->set_flashdata('passErr','Password does not match, Enter proper password');
						$this->load->view('setnewpass',$data);	
					}
				}
				else
				{
					$this->session->set_flashdata('emaildt',$userData['email']);
					$this->session->set_flashdata('saltdt',$userData['confirmSalt']);
					$this->session->set_flashdata('saltErr','Salt not match, Re-enter the propper salt');
					$this->load->view('setnewpass',$data);
				}
			}
			else
			{
				$this->session->set_flashdata('emaildt',$userData['email']);
				$this->session->set_flashdata('saltdt',$userData['confirmSalt']);
				$this->session->set_flashdata('emailErr','Email is not found, Please confirm your email');
				$this->load->view('setnewpass',$data);
			}
    	}
    	else
    	{
    		$this->load->view('setnewpass',$data);
    	}
    }

    public function featuredServices()
    {
    	$result = $this->User_model->get_featured_services();
    	echo '<pre>';
    	print_r($result);
    }

    public function providerFilter($cid)
    {
    	$this->User_model->checkPerent($cid);
    }

    // city

    public function getCity($sid)
    {
    	$cities = $this->Common_model->get_city($sid);
    		echo "<option>--Select city--</option>";
    	foreach ($cities as $city) {
    		echo "<option value=".$city['cityid'].">".$city['city_name']."</option>";
    	}
    }

    public function applyCoupan($cpnid)
    {
    	$this->logged_in();
    	
    	$checkCoupan = $this->User_model->checkCoupan($cpnid);
    	if(count($checkCoupan) > 0)
    	{
    		echo 'Coupan already used..';
    	}
    	else
    	{
    		$coupan = $this->db->select('*')
				->from('coupans')
				->where('cpnid',$cpnid)
        		->get()->result_array();
        	$this->session->set_userdata('coupan',$coupan[0]);
    		echo 'Coupan Applied: '.$coupan[0]['cpn_code'];
    	}
    }

    public function removeCoupan()
    {
    	$this->session->unset_userdata('coupan');
    	echo 'Coupan removed';
    }



}

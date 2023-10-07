<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	class C_admin extends CI_Controller
	{
		// constructor
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Common_model');
			$this->load->model('Admin_model');
		}
		// my functions
		function check_default($post_string)
		{
		  return $post_string == '0' ? FALSE : TRUE;
		}
		public function file_check($str)
		{
			$this->load->helper('file');
	        $allowed_type = array('image/jpg','image/gif','image/jpeg','image/png');
	        $mime = get_mime_by_extension($_FILES['cat_image']['name']);
	        if(isset($_FILES['cat_image']['name']) && $_FILES['cat_image']['name']!="")
	        {
	            if(in_array($mime, $allowed_type)){
	                return true;
	            }
	            else
	            {
	                $this->form_validation->set_message('file_check', 'Please select only jpg,gif,png,jpeg image file.');
	                return false;
	            }
	        }
	        else
	        {
	            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
	            return false;
	        }
   		}
		public function image_name($prefix,$name)
		{
			$str=strtolower($name);
			$str2=strtok($str, " ");
			return $prefix.$str2;
		}

		// login functions
		public function index()
		{
			$this->logged_in();
			$this->load->view('admin/index');
		}
		public function login()
		{
			$this->load->view('admin/login');
		}
		public function loginCheck()
		{
			$data=$this->input->post();
			$result=$this->Admin_model->authenticate($data);
			if(count($result)>0)
			{
				echo "success";
				$this->session->set_userdata('admin',$result[0]);
				redirect(base_url('C_admin/home'));
			}
			else
			{
				$this->session->set_flashdata('message',"Invalid Email or Password");
				redirect(base_url('C_admin/login'));
			}
		}
		public function logged_in()
		{
			if(! $this->session->userdata('admin'))
			{
				$this->session->set_flashdata('warning','You have to login first...');
				redirect('C_admin/login');
			}
		}
		public function logOut()
		{
			$this->session->sess_destroy();
			redirect(base_url('C_admin/login'));
		}
		public function forgotPasswordPage()
		{
			$this->load->library('form_validation');
			$this->load->view('admin/forgotPassword');
		}

		public function sendLink()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','required');
			$email=$this->input->post('email');
			$admin=$this->db->where('email',$email)->get('admin')->result_array();
			if(count($admin)>0)
			{
				$str = "abcdefghijklmnopqrstuvwxyz12345467890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$randomString = substr(str_shuffle($str),0,6);
				// echo $randomString;
				$sendTo=$email;
				$subject="forget password link";
				$message="username: ".$admin[0]['username']." - your salt is : ".$randomString."<br>
				<a href=".base_url('C_admin/setNewPasswordPage/').$randomString."> Click here to change the password </a>
				";
				 $this->sendMail($sendTo,$subject,$message);
				 $this->session->set_flashdata('emailErr','Forgot password link has been sent to your email id - '.$email);
				 redirect('C_admin/forgotPasswordPage');
			}
			else
			{
				$this->session->set_flashdata('emailErr','This email id is not ragistered..');
				$this->load->view('admin/forgotPassword');
			}
				
				//$message=' Forgot password link has been sent to your email id - '.$email;
				// $mobile="7990361072";
		
				// $this->sendSms($mobile,$message);

		}
		public function changePasswordPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('admin/changePassword');
		}

		public function changePassword()
	    {
	    	$this->logged_in();

	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('oldPassword','Old Password','callback_password_check');
	    	$this->form_validation->set_rules('newPassword','New Password','required|min_length[8]|max_length[12]');
	    	$this->form_validation->set_rules('conPassword','Confirm Password','required|matches[newPassword]');

	    	if($this->form_validation->run()==False)
	    	{
	    		$this->load->view('admin/changePassword');
	    	}
	    	else
	    	{
	    		$aid = $this->session->userdata('admin')['id'];
	    		$req = $this->input->post();
	    		$update['password'] = $req['newPassword'];
	    		$this->db->where('id',$aid)
	    			->update('admin',$update);
	    			redirect('C_admin/logout');
	    	}
	    	
	    	// echo'<pre>';
	    	// print_r($data);
	    }
	    public function password_check($oldpass)
	    {
	        $aid = $this->session->userdata('admin')['id'];
	        $admin = $this->Admin_model->get_admin($aid);

	        if($admin[0]['password'] !== $oldpass) {
	            $this->form_validation->set_message('password_check', 'The {field} does not match');
	            return false;
	        }

	        return true;
	    }

	    public function setNewPasswordPage($salt)
	    {
	    	$this->load->library('form_validation');
	    	$data['salt']=$salt;
	    	$this->load->view('admin/setNewPassword',$data);
	    }
		public function setNewPassword()
		{
			$userData = $this->input->post();
	    	$data['salt'] = $userData['salt'];
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('confirmSalt','Salt','required');
			$this->form_validation->set_rules('password','New Password','required|min_length[8]|max_length[12]');
			$this->form_validation->set_rules('conpassword','Confirm Password','required|matches[password]');
			if($this->form_validation->run()==False)
			{
				$this->load->view('admin/setNewPassword',$data);
			}
			else
			{
				// print_r($data);
	    		$where['email'] = $userData['email'];
	    		$userDetails = $this->db->where($where)->get('admin')->result_array();
				if(count($userDetails) > 0)
				{
					if($userData['confirmSalt'] == $data['salt'])
					{
							$whereUpdate['id'] = $userDetails[0]['id'];
							$update['password'] = $userData['password'];

							if($this->db->where($whereUpdate)->update('admin',$update)){
								$this->session->set_flashdata('passwordChanged'.'Password changed successfully');
								$this->load->view('admin/login',);
							}
					}
					else
					{
						$this->session->set_flashdata('saltErr','Salt not match, Re-enter the propper salt');
						$this->load->view('admin/setNewPassword',$data);
					}
				}
				else
				{
					$this->session->set_flashdata('emailErr','Email is not found, Please confirm your email');
					$this->load->view('admin/setNewPassword',$data);
				}
		    
			}
			
	    }
	    public function profile()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$aid=$this->session->userdata('admin')['id'];
			$data['admin']=$this->Admin_model->get_admin($aid);
			$this->load->view('admin/adminProfile',$data);
		}
		public function editProfile()
		{
			$this->logged_in();
			$req=$this->input->post();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('contact','Mobile','required|numeric|max_length[12]|min_length[10]');
			if($this->form_validation->run()==False)
			{
				$aid=$this->session->userdata('admin')['id'];
				$data['admin']=$this->Admin_model->get_admin($aid);
				$this->load->view('admin/adminProfile',$data);
			}
			else
			{
				$update['name']=$req['name'];
				$update['username']=$req['username'];
				$update['email']=$req['email'];
				$update['contact']=$req['contact'];
				$where['id']=$req['aid'];
				$this->db->where($where)->update('admin',$update);
				$this->session->set_flashdata('profileMsg','Profile Updated successfuly..');
				redirect('C_admin/profile');
			}
		}

		public function editAddress()
		{
			$this->logged_in();
			$req=$this->input->post();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('pincode','Pincode','required|numeric|exact_length[6]');
			if($this->form_validation->run()==False)
			{
				$aid=$this->session->userdata('admin')['id'];
				$data['admin']=$this->Admin_model->get_admin($aid);
				$this->load->view('admin/adminProfile',$data);
			}
			else
			{
				$update['address']=$req['address'];
				$update['pincode']=$req['pincode'];
				$update['state']=$req['state'];
				$update['city']=$req['city'];
				$where['id']=$req['aid'];
				$this->db->where($where)->update('admin',$update);
				$this->session->set_flashdata('addressMsg','Address Updated successfuly..');
				redirect('C_admin/profile');
			}
		}
		
		//dashboard 
		public function home()
		{
			$this->logged_in();
			$this->load->view('admin/index');
		}

		//category functions
		public function category()
		{
			$this->logged_in();
			$data['category']=$this->Admin_model->categories();
			$this->load->view('admin/category',$data);

		}
		public function addCategoryPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('admin/addCategory');
		}
		public function addCategory()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Category name','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('cat_image', '', 'callback_file_check');

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('admin/addCategory');
			}
			else
			{
				$req=$this->input->post();
				$config['upload_path']='assets/admin/img/category/';
				$config['allowed_types']='jpg|png|gif|jpeg';
				$prefix='cat-';
				$config['file_name']=$this->image_name($prefix,$req['name']);
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('cat_image'))
				{
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg_upload',$error);
					$this->load->view('admin/addCategory');
				}
				else
				{
					$data=$this->upload->data();
					$req['image']=$data['file_name'];
					$this->Admin_model->category_insert($req);
					$this->session->set_flashdata('msg_upload',"Category added successfully");
					redirect(base_url('C_admin/category'));
				}
			
			}
		}
		public function deleteCategory($cid='null',$cimg=0)
		{
			$this->logged_in();
			if($cid!='null')
			{
				$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/admin/img/category/'.$cimg;
				$this->Admin_model->deleteCategory($cid,$path);
				$this->session->set_flashdata('msg_upload',"Category Deleted successfully");
				redirect(base_url('C_admin/category'));
			}
		}

		public function editCategoryPage($cid)
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$data['cat']=$this->Admin_model->categories($cid);
			$this->load->view('admin/editCategory',$data);
		}
		public function editCategory()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('cat_image', '', 'callback_file_check');
			
			$req=$this->input->post();
			$config['upload_path']='assets/admin/img/category/';
			$config['allowed_types']='jpg|png|gif|jpeg';
			if($req['cid']==0)
					$prefix='cat-';
			else
					$prefix='subcat-';

			$config['file_name']=$this->image_name($prefix,$req['name']);
			$this->load->library('upload', $config);

			if(!empty($_FILES['cat_image']['name']))
			{
				if($this->form_validation->run()==FALSE)
				{
					$data['cat']=$this->Admin_model->categories($req['cid']);
					$this->load->view('admin/editCategory',$data);
					//redirect('C_admin/editCategoryPage/'.$req['cid']);
				}
				else
				{
					$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/admin/img/category/'.$req['oldImage'];
				 	unlink($path);
				
					if( ! $this->upload->do_upload('cat_image'))
					{
						$error=$this->upload->display_errors();
						$this->session->set_flashdata('msg_upload',$error);
						$this->load->view('admin/addCategory');
					}
					else
					{
						$data=$this->upload->data();
						$req['image']=$data['file_name'];
						$this->Admin_model->update_category($req);
						if($req['parentId']==0)
						{
							$this->session->set_flashdata('msg_upload','Image updated Successfully');
							redirect(base_url('C_admin/category'));
						}
						else
						{
							$this->session->set_flashdata('msg_upload','Image updated Successfully');
							redirect(base_url('C_admin/subcategoryPage'));
						}
					}
				}
			}
			else
			{
				if($req['parentId']==0)
					{
						// $this->session->set_flashdata('msg_upload','Image updated Successfully');
						redirect(base_url('C_admin/category'));
					}
					else
					{
						// $this->session->set_flashdata('msg_upload','Image updated Successfully');
						redirect(base_url('C_admin/subcategoryPage'));
					}
			}
		}

		
		// subcategory functions
		
		public function subcategoryPage($prid=0)
		{
			$this->logged_in();
			if($prid==0)
			{
				$data['category']=$this->Admin_model->get_business_subcategories();
				$this->load->view('admin/subcategory',$data);
			}
			else
			{
				$res=$this->Admin_model->get_subcategory($prid);
				echo '<option selected="selected" value="0">-- Select Parent Subcategory--</option>';
				foreach ($res as $r) 
				{
					echo '<option value="'.$r['cid'].'">'.$r['cname'].'</option>';
				}
			}
		}
		public function addSubcategoryPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('admin/addSubcategory');
		}
		public function addSubcategory()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Category name','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('category','Category','required|callback_check_default');
			$this->form_validation->set_message('check_default','Please select category');
			$this->form_validation->set_rules('cat_image', '', 'callback_file_check');
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('admin/addSubcategory');
			}
			else
			{
				$req=$this->input->post();
				$config['upload_path']='assets/admin/img/category/';
				$config['allowed_types']='jpg|png|gif|jpeg';
				$prefix='subcat-';
				$config['file_name']=$this->image_name($prefix,$req['name']);
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('cat_image'))
				{
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg_upload',$error);
					$this->load->view('admin/addSubcategory');
				}
				else
				{
					// if($req['parent_subcategory']==0)
						$req['parentId']=$req['category'];
					// else
					// 	$req['parentId']=$req['parent_subcategory'];

					$data=$this->upload->data();
					$req['image']=$data['file_name'];
					$this->Admin_model->category_insert($req);
					$this->session->set_flashdata('msg_upload',"Subcategory added successfully");
					redirect(base_url('C_admin/subcategoryPage'));
				}
			}
		}
		public function deleteSubcategory($cid='null',$cimg=0)
		{
			$this->logged_in();
			if($cid!='null')
			{
				$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/admin/img/category/'.$cimg;
				$this->Admin_model->deleteCategory($cid,$path);
				$this->session->set_flashdata('msg_upload',"Subcategory Deleted successfully");
				redirect(base_url('C_admin/subcategoryPage'));
			}
		}







		// //Service category functions
		public function serviceCategory()
		{
			$this->logged_in();
			$data['category']=$this->Admin_model->service_categories();
			$this->load->view('admin/servicecategory',$data);
			// foreach ($data['category'] as $cat) {
			// 	foreach ($cat as $c) {
			// 		echo $c['cname'].'<br>';
			// 	}
			// }
		}
		public function addServiceCategoryPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('admin/addServiceCategory');
		}

		public function addServiceCategory()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name','Category name','required');
			$this->form_validation->set_rules('category','Business category','required');
			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('admin/addServiceCategory');
			}
			else
			{
				$req=$this->input->post();
				$this->Admin_model->service_category_insert($req);
				$this->session->set_flashdata('msg_upload',"Service Category added successfully");
				redirect(base_url('C_admin/serviceCategory'));
			
			}
		}
		public function deleteServiceCategory($cid='null')
		{
			$this->logged_in();
			if($cid!='null')
			{
				$this->Admin_model->deleteServiceCategory($cid);
				$this->session->set_flashdata('msg_upload',"Service category Deleted successfully");
				redirect(base_url('C_admin/serviceCategory'));
			}
		}

		
		// service functions
		public function services()
		{
			$this->logged_in();
			$data['services']=$this->Admin_model->get_services();
			$this->load->view('admin/services',$data);
		}

		//coupans functions
		public function coupans()
		{
			$this->logged_in();
			$data['coupans']=$this->Admin_model->get_coupans();
			$this->load->view('admin/coupans',$data);
		}
		public function addCoupanPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('admin/addCoupan');
		}
		public function addCoupan()
		{
			$this->logged_in();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('coupanCode','Coupan Code','required|alpha_numeric');
			$this->form_validation->set_rules('coupanType','Coupan Type','required');
			$this->form_validation->set_rules('discount','Discount','required|numeric');
			$this->form_validation->set_rules('description','Coupan description','required');
			$this->form_validation->set_rules('quantity','No. of coupan','required|numeric');
			$this->form_validation->set_rules('applicableFor','Applicable for','required');
			$this->form_validation->set_rules('validTill','Valid Till','required');

			if($this->form_validation->run() == False)
			{
				$this->load->view('admin/addCoupan');
			}
			else
			{
				$req=$this->input->post();
				// print_r($req);
				$this->Admin_model->add_coupan($req);
				$this->session->set_flashdata('msgCoupan','Coupan added successfully');
				redirect('C_admin/coupans');
			}
			
		}

		public function editCoupanPage($cpnid)
		{
			$this->logged_in();
			$this->load->library('form_validation');
			// $data['coupan']=$this->Admin_model->gte_coupan_by_cpnid($cpnid);
			$data['coupan_id']=$cpnid;
			$this->load->view('admin/editCoupan',$data);
		}

		public function editCoupan()
		{
			$this->logged_in();
			$req=$this->input->post();
			$data['coupan_id']=$req['cpnid'];
			$this->load->library('form_validation');

			$this->form_validation->set_rules('coupanCode','Coupan Code','required|alpha_numeric');
			$this->form_validation->set_rules('coupanType','Coupan Type','required');
			$this->form_validation->set_rules('discount','Discount','required|numeric');
			$this->form_validation->set_rules('description','Coupan description','required');
			$this->form_validation->set_rules('quantity','No. of coupan','required|numeric');
			$this->form_validation->set_rules('applicableFor','Applicable for','required');
			$this->form_validation->set_rules('validTill','Valid Till','required');

			if($this->form_validation->run() == False)
			{
				$this->load->view('admin/editCoupan',$data);
			}
			else
			{
				// print_r($req);
				$this->Admin_model->edit_coupan($req);
				$this->session->set_flashdata('msgCoupan','Coupan Updated successfully');
				redirect('C_admin/coupans');
			}
		}

		public function deleteCoupan($cpnid)
		{
			$this->logged_in();
			$this->Admin_model->delete_coupan($cpnid);
			$this->session->set_flashdata('msgCoupan','Coupan deleted successfully');
			redirect('C_admin/coupans');
		}

		public function validateCoupan($coupanCode)
		{
			$result=$this->db->where(array('cpn_code'=>strtoupper(trim($coupanCode))))->get('coupans')->result_array();
			if (count($result) > 0) echo 'Not Valid';
			else echo "Valid";
		}

		// provider functions
		public function getProviders($status=0)
		{	
			$this->logged_in();
			$data['providers']=$this->Admin_model->get_all_providers($status);
			$this->load->view('admin/providers',$data);

		}
		public function viewProvider($uid)
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$data['provider']=$this->Common_model->get_provider_details($uid);
			$data['paddress']=$this->Common_model->get_provider_address($uid);
			// echo '<pre>';
			// print_r($data);
			if($data['provider'][0]['status']==0)
				$this->load->view('admin/viewRequest',$data);
			elseif($data['provider'][0]['status']==1)
			{
				$data['totalOrders']=$this->Common_model->count_provider_orders($data['provider'][0]['pid']);
				$data['services']=$this->Common_model->get_services($data['provider'][0]['pid']);
				$this->load->view('admin/viewProvider',$data);
			}
			else
			{
				$this->load->view('admin/viewRequest',$data);
			}


		}
		public function providers($uid=0)
		{
			$this->logged_in();
			$data['providers']=$this->Admin_model->get_provider($uid);
			$this->load->view('admin/providers',$data);
		}
		public function rejectProviderRequest()
		{
			$this->logged_in();
			$data=$this->input->post();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('reason','Reason','required');
			$data['provider']=$this->Common_model->get_provider_details($data['uid']);
			$data['paddress']=$this->Common_model->get_provider_address($data['uid']);
			if($this->form_validation->run()==False)
			{
				$this->load->view('admin/viewRequest',$data);
			}
			else
			{
				$update['reason']=$data['reason'];
				$update['status']= -1;
				$where['pid']=$data['pid'];
				if($this->db->where($where)->update('provider',$update))
				{
					$this->session->set_flashdata('requestMsg','Request rejected..');
					redirect('C_admin/getProviders');	
				}
			}
		}
		public function acceptRequest($pid)
		{
			$this->logged_in();
			$update['reason']=null;
			$update['status']= 1;
			$where['pid']=$pid;
			if($this->db->where($where)->update('provider',$update))
			{
				$provider=$this->Admin_model->get_provider();
				$email = $this->db->select('email')->from('user')->where('uid',$provider[0]['uid'])->get()->result_array();

				$this->sendMail('sth4131@gmail.com','Business Request','Congratulations Your SERVEATHOME Business profile has been approved. Now You can sell your service on SERVEATHOME.');

				$this->session->set_flashdata('requestMsg','Request accepted..');
				redirect('C_admin/getProviders');
			}
		}

		// users functions
		public function users($uid=0)
		{
			$this->logged_in();
			$data['customers']=$this->Admin_model->get_customer($uid);
			$this->load->view('admin/customers',$data);
		}

		// location functions

		public function locationPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$result['countries']=$this->Common_model->get_country();
			$result['states']=$this->Common_model->get_state();
			$result['cities']=$this->Common_model->get_city();
			$this->load->view('admin/location',$result);
		}
		public function addCountry()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('country','Country','required');
			if($this->form_validation->run()==False)
			{
				$result['countries']=$this->Common_model->get_country();
				$result['states']=$this->Common_model->get_state();
				$result['cities']=$this->Common_model->get_city();
				$this->load->view('admin/location',$result);
			}
			else
			{
				$req=$this->input->post();
				$insert['country_name']=$req['country'];
				$this->db->insert('country',$insert);
				$this->session->set_flashdata('Country','Country added.');
				redirect('C_admin/locationPage');
			}
		}
		public function addState()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('country','Country','required');
			$this->form_validation->set_rules('state','State','required');
			if($this->form_validation->run()==False)
			{
				$result['countries']=$this->Common_model->get_country();
				$result['states']=$this->Common_model->get_state();
				$result['cities']=$this->Common_model->get_city();
				$this->load->view('admin/location',$result);
			}
			else
			{
				$req=$this->input->post();
				$insert['countryid']=$req['country'];
				$insert['state_name']=$req['state'];
				$this->db->insert('state',$insert);
				$this->session->set_flashdata('State','State added.');
				redirect('C_admin/locationPage');
			}
		}
		public function addCity()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('city','City','required');
			if($this->form_validation->run()==False)
			{
				$result['countries']=$this->Common_model->get_country();
				$result['states']=$this->Common_model->get_state();
				$result['cities']=$this->Common_model->get_city();
				$this->load->view('admin/location',$result);
			}
			else
			{
				$req=$this->input->post();
				$insert['stateid']=$req['state'];
				$insert['city_name']=$req['city'];
				$this->db->insert('city',$insert);
				$this->session->set_flashdata('City','City added.');
				redirect('C_admin/locationPage');
			}
		}
		
		public function fillState($cid)
		{
			$result = $this->Common_model->get_state($cid);
			echo '<option  selected="selected" disabled>--Select State--</option>';
			foreach ($result as $c) 
			{
				echo '<option value="'.$c['stateid'].'">'.$c['state_name'].'</option>';
			}
		}

		public function deleteCountry($cid)
		{
			$this->db->delete('country',array('countryid'=>$cid));
			redirect('C_admin/locationPage');
		}
		public function deleteState($sid)
		{
			$this->db->delete('state',array('stateid'=>$sid));
			redirect('C_admin/locationPage');
		}
		public function deleteCity($cid)
		{
			$this->db->delete('city',array('cityid'=>$cid));
			redirect('C_admin/locationPage');
		}

		// orders

		public function userInquiry()
		{
			$data['inquiry']=$this->Admin_model->get_inquiry();
			$this->load->view('admin/userInquiry',$data);
		}

		public function sendUserReply()
		{
			$data = $this->input->post();
			$this->sendMail($data['email'],$data['subject'],$data['reply']);
			$update['reply']=1;
			$this->db->where('inqid',$data['inqid'])->update('user_inquiry',$update);
			redirect(base_url('C_admin/userInquiry'));

		}

		public function markReadInquiry($id)
		{	
			$update['reply']=1;
			$this->db->where('inqid',$id)->update('user_inquiry',$update);
			redirect(base_url('C_admin/userInquiry'));
		}

		// sms and mail
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
	    		 $this->email->print_debugger();
	    	}
	    	else
	    	{
	    		echo 'success';
	    	}
	    }

    	//  OTP functions

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

	    public function bbt()
	    {
	    	$this->sendMail('bbtgameplot@gmail.com','dsf','asyhdgjashdvgjahsdvjh');
	    }

	    public function reportExl($action)
		{
			// Create new Spreadsheet object
			  $spreadsheet = new Spreadsheet();
			  $sheet = $spreadsheet->getActiveSheet();

			// Set document properties
			    $spreadsheet->getProperties()->setCreator('serveathome')
			      ->setLastModifiedBy('serveathome')
			      ->setTitle('Report')
			      ->setSubject('')
			      ->setDescription('');

			// add style to the header
			   
			    //auto fit column to content
				foreach(range('A', 'Z') as $columnID) 
				{
			      $spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
			    }


			      

			// set the names of header cells
			   
			    if($action == 'u'){
			    	$getdata = $this->Admin_model->userReport();
			    	 $filename= 'Users_Report.xls';
			    }
			    elseif($action == 'sp'){
			    	$getdata = $this->Admin_model->providerReport();
			    	 $filename= 'Service_Providers_Report.xls';
			    }
			    elseif($action == 'bc'){
			    	$getdata = $this->Admin_model->categoryReport();
			    	 $filename= 'Business_category_Report.xls';
			    }
			    elseif($action == 'cp'){
			    	$getdata = $this->Admin_model->coupanReport($action);
			    	 $filename= 'Coupan_Report.xls';
			    }
			   

			    $row=1;
			    $column='A';
			    foreach($getdata[0] as $key => $value)
			    {
			    	
				    $sheet->setCellValue($column.$row, $key);
				    $column++;
			    }
			     

			    // Add some data
			    $row = 2;
			   
			    foreach($getdata as $get)
			    {
			    	$column='A';
			    	foreach ($get as $key => $value) 
			    	{
			    		$sheet->setCellValue($column.$row, $value);
			        	$column++;
			    	}
			        
			      	$row++;
			    }

			//Create file excel.xlsx
			  $writer = new Xlsx($spreadsheet);
			  header('Content-Disposition: attachment;filename='.$filename);
			  $writer->save('php://output');
				
		}










	}
?>

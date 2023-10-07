<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	class C_provider extends CI_Controller
	{
		// 
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Provider_model');
			$this->load->model('Common_model');
			// Your own constructor code
		}
		// My functions
		function check_default($post_string)
		{
		  return $post_string == '0' ? FALSE : TRUE;
		}
		public function file_check($str)
		{
			$this->load->helper('file');
	        $allowed_type = array('image/jpg','image/gif','image/jpeg','image/png');
	        $mime = get_mime_by_extension($_FILES['image']['name']);
	        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
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
   		public function file_check1($str)
		{
			$this->load->helper('file');
	        $allowed_type = array('image/jpeg');
	        $mime = get_mime_by_extension($_FILES['image']['name']);
	        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!="")
	        {
	            if(in_array($mime, $allowed_type)){
	                return true;
	            }
	            else
	            {
	                $this->form_validation->set_message('file_check1', 'Please select only jpeg image file.');
	                return false;
	            }
	        }
	        else
	        {
	            $this->form_validation->set_message('file_check1', 'Please choose a file to upload.');
	            return false;
	        }
   		}
		public function generateSname()
		{
			if($this->session->has_userdata('user'))
			{
				$str=random_string('alnum',3);
				$p=$this->Provider_model->get_provider();
				$name='ser'.$p[0]['pid'].'-'.$str;
				return $name;
			}
			else
			{
				redirect('signup');
			}

		}
		public function image_name($prefix,$name)
		{
			$this->load->helper('string');
			$str=strtolower($name);
			$str2=strtok($str, " ");
			$str3=random_string('alnum',3);
			$uid=$this->session->userdata('user')['uid'];
			$n=$prefix.$uid.$str2.$str3;
			return $n;
		}
		public function fillCity($sid)
		{
			$result=$this->Common_model->get_city($sid);
			foreach ($result as $city) {
				echo '<option value='.$city['stateid'].'>'.$city['city_name'].' </option>';
			}
		}
		public function logged_in()
		{
			if(! $this->session->userdata('user'))
				redirect('signup');
		}

		public function index()
		{
			$this->logged_in();
			$check['provider'] = $this->Provider_model->get_provider();
			if(count($check['provider'])>0)
			{
				$this->load->library('form_validation');
				$uid=$this->session->userdata('user')['uid'];
				$data['provider']=$this->Common_model->get_provider_details($uid);
				$data['paddress']=$this->Common_model->get_provider_address($uid);

				if($check['provider'][0]['status']==0)
				{
					$this->load->view('provider/disabledProfile',$data);
				}
				else if($check['provider'][0]['status']==1)
					$this->load->view('provider/index',$check);
				else if($check['provider'][0]['status']==2)
					$this->load->view('provider/providerProfile',$data);
				else if($check['provider'][0]['status']== -1)
					$this->load->view('provider/disabledProfile',$data);
			}
			else
			{
				$this->load->library('form_validation');
				$this->load->view('provider/providerRegistration');
			}
		}

		public function providerProfile()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$uid=$this->session->userdata('user')['uid'];
			$result['provider'] = $this->Common_model->get_provider_details($uid);
			$result['paddress'] = $this->Common_model->get_provider_address($uid);
			if($result['provider'][0]['status']==0)
			{
				$this->load->view('provider/disabledProfile',$result);
			}
			else if($result['provider'][0]['status']==1)
			{
				$this->load->view('provider/providerProfile',$result);
			}
			else if($result['provider'][0]['status']==-1)
			{
				$this->load->view('provider/disabledProfile',$result);
			}
		}
		public function updateImage()
		{
			if(!empty($_FILES))
			{	
				$provider = $this->Provider_model->get_provider();
				$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/provider/img/profile/'.$provider[0]['image'];
				$this->Common_model->remove_image($path);
				$config['upload_path']='assets/provider/img/profile/';
				$config['allowed_types']='jpg|png|gif|jpeg';
				$config['file_name']=$provider[0]['image'];

				$this->load->library('upload', $config);

				$this->upload->do_upload('image');
				$this->session->set_flashdata('photo','Photo Updated successfully..');
				redirect('C_provider/providerProfile');

			}
		}
		public function editProfile()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('shop_name','Shop/Business name','required');
			if($this->form_validation->run()==False){
				$this->session->set_flashdata('profileMsg','Shop/Business name must required');
				redirect('C_provider/providerProfile');
			}
			else
			{
				$data=$this->input->post();
				$where['pid']=$data['pid'];
				$update['shop_name']=$data['shop_name'];
				$this->db->where($where)->update('provider',$update);
				$this->session->set_flashdata('profileMsg','Name updated successfully');
				redirect('C_provider/providerProfile');
			}
		}
		public function editAddress()
		{
			$this->logged_in();
			$req=$this->input->post();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('pincode','Pincode','required|numeric|exact_length[6]');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('locality','Locality','required');
			$this->form_validation->set_rules('landmark','Landmark','required');
			if($this->form_validation->run()==False)
			{
				$uid=$this->session->userdata('user')['uid'];
				$data['provider']=$this->Common_model->get_provider_details($uid);
				$data['paddress']=$this->Common_model->get_provider_address($uid);
				$this->load->view('provider/providerProfile',$data);
			}
			else
			{
				$update['address']=$req['address'];
				$update['pincode']=$req['pincode'];
				$update['landmark']=$req['landmark'];
				$update['locality']=$req['locality'];
				$update['cityid']=$req['city'];
				$where['addrid']=$req['addrid'];
				$this->db->where($where)->update('user_address',$update);
				redirect('C_provider/providerProfile');
			}
		}


		public function register()
		{
			$this->logged_in();
			$req = $this->input->post();
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('shopName','Shop / Company name','required');
			$this->form_validation->set_rules('phone','Shop Contact No','required|numeric|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('gstin','GSTIN','alpha_numeric|exact_length[15]');
			$this->form_validation->set_rules('image', '', 'callback_file_check');
			$this->form_validation->set_rules('category','Business Category','required|callback_check_default');
			$this->form_validation->set_rules('subcategory','Service Type','required');

			$this->form_validation->set_message('check_default','Please select Business Category');
			// if(isset($req['address']) && $req['address']!='' || isset($req['noAddress']) && $req['noAddress']==1)
			// {
				$this->form_validation->set_rules('city','City','required');
				$this->form_validation->set_rules('address','Address','required');
				$this->form_validation->set_rules('pincode','Pincode','required|numeric|exact_length[6]');
				$this->form_validation->set_rules('state','State','required');
				$this->form_validation->set_rules('locality','Locality','required');
				$this->form_validation->set_rules('landmark','Landmark','required');
			//}

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('provider/providerRegistration');
			}
			else
			{
				$config['upload_path']='assets/provider/img/profile/';
				$config['allowed_types']='jpg|png|gif|jpeg';
				$prefix='sp';
				$config['file_name']=$this->image_name($prefix,$req['shopName']);

				$this->load->library('upload', $config);

				if( ! $this->upload->do_upload('image'))
				{
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg_upload',$error);
					$this->load->view('provider/providerRegistration');
				}
				else
				{
					$data=$this->upload->data();
					$uid=$this->session->userdata('user')['uid'];
					// if(isset($req['selectAddress'])&&$req['selectAddress'] != 0)
					// {
					// 	$update['addline'] = 1;
					// 	$this->db->where('addrid',$req['selectAddress'])
					// 		->update('user_address',$update);
					// }
					$insert['uid']=$uid;
					if(isset($req['subcategory'])&&$req['subcategory']==0)
					{
						$insert['cid']=$req['category'];
						$insert['scategory']=0;
					}
					else
					{
						$insert['cid']=$req['subcategory'];
						$insert['scategory']=1;
					}
					$insert['shop_name']=$req['shopName'];
					$insert['shop_contact']=$req['phone'];
					$insert['image']=$data['file_name'];
					$insert['gstin']=$req['gstin'];
					// $insert['pancardno']=$req['PANno'];
					$insert['p_wallet']=0;
					$insert['status']=0;
					$insert['reason']='Your account will activated soon after successfull varification.';
					$this->db->insert('provider',$insert);

					// if(isset($req['address']) && $req['address']!='')
					// {
						$ins['uid']=$uid;
						$ins['cityid']=$req['city'];
						$ins['address']=$req['address'];
						if(isset($req['landmark']))
							$ins['landmark']=$req['landmark'];

						$ins['locality']=$req['locality'];
						$ins['pincode']=$req['pincode'];
						$ins['addline']=1;
						
						$this->db->insert('user_address',$ins);
					//}
				}
					
				$this->load->view('provider/step2');
			}
		}
		public function step2()
		{
			$this->logged_in();
			$req = $this->input->post();

			$this->load->library('form_validation');
			$this->form_validation->set_rules('acno','Account Number','required');
			$this->form_validation->set_rules('acname','Account Holder Name','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('bankName','Bank Name','required|alpha_numeric_spaces');
			$this->form_validation->set_rules('IFSC','IFSC code','required|alpha_numeric');
			$this->form_validation->set_rules('image', '', 'callback_file_check1');
			$this->form_validation->set_rules('PANno','Pan Card number','required|alpha_numeric|exact_length[10]');
			$this->form_validation->set_rules('PANname','Full Name','required|alpha_numeric_spaces');


			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('provider/step2');
			}
			else
			{
				$config['upload_path']='assets/provider/img/document/';
				$config['allowed_types']='jpeg';
				$config['file_name']=$req['PANno'];
				$this->load->library('upload', $config);
				if( ! $this->upload->do_upload('image'))
				{
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg_upload',$error);
					$this->load->view('provider/step2');
				}
				else
				{
					$data=$this->upload->data();
					$provider=$this->Provider_model->get_provider();
					$insert['pid']=$provider[0]['pid'];
					$insert['acno']=$req['acno'];
					$insert['acname']=$req['acname'];
					$insert['bname']=$req['bankName'];
					$insert['ifsc_code']=$req['IFSC'];
					$insert['pan_no']=$req['PANno'];
					$insert['pan_name']=$req['PANname'];
					$insert['pan_image']=$data['file_name'];;
					$this->db->insert('bank_dtls',$insert);
					// echo 'success';
					redirect(base_url('C_provider'));
				}
			}
		}

		public function cancleRequest($pid)
		{
			$this->logged_in();
			$provider=$this->Provider_model->get_provider();
			$bank=$this->Provider_model->get_bank_detail($pid);

			$path1=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/provider/img/profile/'.$provider[0]['image'];
			$path2=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/provider/img/document/'.$bank[0]['pan_image'];

			$this->Common_model->remove_image($path1);
			$this->Common_model->remove_image($path2);

			$this->db->delete('bank_dtls', array('pid' => $pid));
			$this->db->delete('provider', array('pid' => $pid));

			$this->session->set_flashdata('msg_cancle',"Request Cancelled");
			redirect(base_url());
		}


		// public function lock()
		// {
		// 	if($this->session->has_userdata('user'))
		// 	{
		// 		$this->load->view('provider/lockScreen');
		// 	}
		// 	else
		// 	{
		// 		redirect('signup');
		// 	}
		// }
		// staff functions

		public function staffPage()
		{
			$this->logged_in();
			$provider = $this->Provider_model->get_provider();
			$data['staff'] = $this->Provider_model->get_staff($provider[0]['pid']);
			$this->load->view('provider/staff',$data);
		}
		public function addStaffPage()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('provider/addStaff');
		}
		public function addStaff()
		{
			$this->logged_in();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','Staff Name','required');
			$this->form_validation->set_rules('contact','Staff Contact No','required|numeric|min_length[10]|max_length[12]');
			$this->form_validation->set_rules('image', '', 'callback_file_check');

			if($this->form_validation->run()==False)
			{
				$this->load->view('provider/addStaff');
			}
			else
			{
				$this->load->helper('string');

				$config['upload_path']='assets/provider/img/staff/';
				$config['allowed_types']='jpg|jpeg|png|gif';
				$config['max_size']='1024';
				$str=random_string('alnum',5);

				$p=$this->Provider_model->get_provider();
				$name='ss'.$p[0]['pid'].'-'.$str;
			
				$config['file_name']=$name;	

				$password = $str;

				$this->load->library('upload',$config);

				if(! $this->upload->do_upload('image'))
				{
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg_upload',$error);
					$this->load->view('provider/addStaff');
				}
				else
				{
					$data=$this->upload->data();
					$req=$this->input->post();
					$req['image']=$data['file_name'];

					$provider = $this->Provider_model->get_provider();
					$insert['pid']=$p[0]['pid'];
					$insert['code']=$password;
					$insert['name']=$req['name'];
					$insert['contact']=$req['contact'];
					$insert['status']=0;
					$insert['image']=$data['file_name'];

					$this->db->insert('p_staff',$insert);
					$this->session->set_flashdata('msg_upload',"Staff added successfully");
					redirect(base_url('C_provider/staffPage'));
				}

			}
		}

		public function editStaffPage($staffid)
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$data['staff_id']=$staffid;
			$this->load->view('provider/editStaff',$data);
		}

		public function editStaff()
		{
			$this->logged_in();
			$this->load->library('form_validation');

			$this->form_validation->set_rules('name','Staff Name','required');
			$this->form_validation->set_rules('contact','Staff Contact No','required|numeric|min_length[10]|max_length[12]');
			// $this->form_validation->set_rules('image', '', 'callback_file_check');

			$req = $this->input->post();
			$data['staff_id']=$req['staffid'];
			if($this->form_validation->run()==False)
			{
				$this->load->view('provider/editStaff',$data);
			}
			else
			{
				if(!empty($_FILES['image']['name']))
				{
					$staff=$this->Provider_model->get_staff_by_staffid($req['staffid']);
					$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/provider/img/staff/'.$staff[0]['image'];
					$this->Common_model->remove_image($path);

					$this->load->helper('string');
					$config['upload_path']='assets/provider/img/staff/';
					$config['allowed_types']='jpg|jpeg|png|gif';
					$config['max_size']='1024';
					$config['file_name']=$staff[0]['image'];	

					$this->load->library('upload',$config);

					if(! $this->upload->do_upload('image'))
					{
						$error=$this->upload->display_errors();
						$this->session->set_flashdata('msg_upload',$error);

						$service['edit'] = $this->Provider_model->get_service_by_sid($req['sid']);
						$this->load->view('provider/editService',$service);
					}
					else
					{
						$data=$this->upload->data();
						$req['image']=$data['file_name'];

						$this->Provider_model->update_staff($req);
						$this->session->set_flashdata('msg_upload',"Staff Updated successfully");
						redirect(base_url('C_provider/staffPage'));
					}
				}
				else
				{
					$this->Provider_model->update_staff($req);
					$this->session->set_flashdata('msg_upload',"Staff Updated successfully");
					redirect(base_url('C_provider/staffPage'));
				}
			}
		}

		public function deleteStaff($staffid)
		{
			$this->logged_in();
			$staff=$this->Provider_model->get_staff_by_staffid($staffid);
			$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/provider/img/staff/'.$staff[0]['image'];
			$this->Common_model->remove_image($path);
			$this->db->delete('p_staff', array('staffid' => $staffid));
			$this->session->set_flashdata('msg_upload',"Staff Deleted successfully");
			redirect(base_url('C_provider/staffPage'));
		}



		// service functions
		public function services()
		{
			$this->logged_in();
			$provider=$this->Provider_model->get_provider();
			$data['services']=$this->Provider_model->get_services($provider[0]['pid']);
			$this->load->view('provider/services',$data);
		}

		public function addServicePage()
		{	
			$this->logged_in();
			$this->load->library('form_validation');
			$this->load->view('provider/addService');
		}
		public function editServicePage($sid)
		{	
			$this->logged_in();
			$this->load->library('form_validation');
			$service['edit'] = $this->Provider_model->get_service_by_sid($sid);
			$this->load->view('provider/editService',$service);
		}

		// public function removeImage()
		// {
		// 	$file = $this->input->post('file');
		// 	if ($file && file_exists('assets/'.$file))
		// 	{
		// 		unlink('assets/'.$file);
		// 	}
		// }
		public function fileUpload()
		{
			$this->logged_in();
			if(!empty($_FILES))
			{
				$this->load->helper('string');
				$name=$this->generateSname();
				$config['upload_path']='assets/images/services/';
				$config['allowed_types']='jpg|jpeg|png|gif';
				$config['max_size']='1024';
				$config['file_name']=$name;	

				$this->load->library('upload',$config);

				if($this->upload->do_upload('file'))
				{
					$uploadData = $this->upload->data();
					$fileName=$uploadData['file_name'];
					if(isset($_SESSION['files']))
					{
						$filesnamelist = $_SESSION['files'];
						array_push($filesnamelist,$fileName);
						$this->session->set_userdata('files',$filesnamelist);
					}
					else
					{
						$filesnamelist = array($fileName);
						$this->session->set_userdata('files',$filesnamelist);
					}
					
				}
				else
				{
					echo $this->upload->display_errors();
					echo "failed to upload";
				}
			}
		}
		public function addService()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			$this->form_validation->set_rules('sname','Service name','required');
			$this->form_validation->set_rules('mrp','MRP','numeric');
			$this->form_validation->set_rules('sprice','Service Price','required|numeric');
			$this->form_validation->set_rules('image', '', 'callback_file_check');
			$this->form_validation->set_rules('stime','Service Time','numeric');
			// $this->form_validation->set_rules('sdescription','Service Description','required');
			$this->form_validation->set_rules('category','Category','required|callback_check_default');
			// $this->form_validation->set_rules('subcategory','Subcategory','required|callback_check_default');
			$this->form_validation->set_message('check_default','Please select category');

			if($this->form_validation->run()==FALSE)
			{
				$this->load->view('provider/addService');
			}
			else
			{
				$this->load->helper('string');
				$name=$this->generateSname();
				$config['upload_path']='assets/images/services/';
				$config['allowed_types']='jpg|jpeg|png|gif';
				// $config['max_size']='1024';
				$config['file_name']=$name;	

				$this->load->library('upload',$config);

				if(! $this->upload->do_upload('image'))
				{
					$error=$this->upload->display_errors();
					$this->session->set_flashdata('msg_upload',$error);
					$this->load->view('provider/addService');
				}
				else
				{
					$data=$this->upload->data();
					$req=$this->input->post();
					$req['simage']=$data['file_name'];
					if(isset($req['subcategory']))
						$req['cat']=$req['subcategory'];
					else
						$req['cat']=$req['category'];

					$this->Provider_model->service_insert($req);
					$this->session->set_flashdata('msg_upload',"service added successfully");
					redirect(base_url('C_provider/services'));
				}
			}
		}
		public function deactivateService($sid)
		{
			$this->logged_in();
			$update['s_status']='1';
			$this->db->query('update services set s_status = 0 where sid = '.$sid);
			$this->session->set_flashdata('msg_upload','Service Deactivated successfully');
			redirect('C_provider/services');
		}
		public function deleteService($sid)
		{
			$this->logged_in();
			$service=$this->Provider_model->get_service_by_sid($sid);
			$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/images/services/'.$service[0]['simage'];
			$this->Common_model->remove_image($path);
			$this->Provider_model->delete_service($sid);
			$this->session->set_flashdata('msg_upload',"Service Deleted successfully");
			redirect(base_url('C_provider/services'));
		}
		public function editService()
		{
			$this->logged_in();
			$this->load->library('form_validation');
			if(!empty($_FILES['image']['name']))
			{
				$this->form_validation->set_rules('image', '', 'callback_file_check');
			}
			$this->form_validation->set_rules('sname','Service name','required');
			$this->form_validation->set_rules('status','Status','required');
			$this->form_validation->set_rules('sprice','Service Price','required|numeric');
			$this->form_validation->set_rules('stime','Service Time','numeric');
			$this->form_validation->set_rules('sdescription','Service Description','required');
			$this->form_validation->set_rules('category','Category','required|callback_check_default');
			
			$req=$this->input->post();

			if(! $this->form_validation->run()==False)
			{
				if(!empty($_FILES['image']['name']))
				{
					$data=$this->Provider_model->get_service_by_sid($req['sid']);
					$path=$_SERVER['DOCUMENT_ROOT'].'/serveathome/assets/images/services/'.$data[0]['simage'];
					$this->Common_model->remove_image($path);

					$this->load->helper('string');
					$name=$this->generateSname();
					$config['upload_path']='assets/images/services/';
					$config['allowed_types']='jpg|jpeg|png|gif';
					$config['file_name']=$name;	

					$this->load->library('upload',$config);

					if(! $this->upload->do_upload('image'))
					{
						$error=$this->upload->display_errors();
						$this->session->set_flashdata('msg_upload',$error);

						$service['edit'] = $this->Provider_model->get_service_by_sid($req['sid']);
						$this->load->view('provider/editService',$service);
					}
					else
					{
						$data=$this->upload->data();
						$req['simage']=$data['file_name'];
						if(isset($req['subcategory']))
							$req['cat']=$req['subcategory'];
						else
							$req['cat']=$req['category'];

						$this->Provider_model->update_service($req);
						$this->session->set_flashdata('msg_upload',"service Updated successfully");
						redirect(base_url('C_provider/services'));
					}
				}
				else
				{
					if(isset($req['subcategory']))
						$req['cat']=$req['subcategory'];
					else
						$req['cat']=$req['category'];

					$this->Provider_model->update_service($req);
					$this->session->set_flashdata('msg_upload',"service Updated successfully");
					redirect(base_url('C_provider/services'));
				}
			}
			else 
			{
				$service['edit'] = $this->Provider_model->get_service_by_sid($req['sid']);
				$this->load->view('provider/editService',$service);
			}

		}

		public function getSubcategory($cid)
		{
			$this->logged_in();
			$result=$this->Provider_model->get_Subcategory($cid);
			echo '<option class="mdl-menu__item" value="0">-- All --</option>';
			foreach ($result as $cat) 
			{
				echo '<option class="mdl-menu__item" value="'.$cat['cid'].'">'.$cat['cname'].'</option>';
			}
		}

		// orders

		public function ordersPage($status='null')
		{
			$this->logged_in();
			$pid = $this->Provider_model->get_provider();

			$data['orders'] = $this->Provider_model->get_order($pid[0]['pid'],$status);
			$this->load->view('provider/orders',$data);
			// echo '<pre>';
			// print_r($data);
		}

		public function viewOrder($oid)
		{
			$this->logged_in();
			$data['order']=$this->Provider_model->view_order($oid);
			$data['orderDtls']=$this->Provider_model->get_order_dtls($oid);
			$this->load->view('provider/viewOrder',$data);
		}

		public function allocateOrder($staffid,$oid)
		{
			$this->logged_in();

			$order=$this->Provider_model->view_order($oid);
			if($order[0]['staffid']!= null)
			{
				$oldstaff = $order[0]['staffid'];
				$updateStaff['status']=0;
				$this->db->where('staffid',$oldstaff)->update('p_staff',$updateStaff);
			}

			$update['staffid']=$staffid;
			$update['order_status']=1;
			$staffUpdate['status']=1;
			$this->db->where('oid',$oid)->update('orders',$update);
			$this->db->where('staffid',$staffid)->update('p_staff',$staffUpdate);
			$this->session->set_flashdata('orderStatus','Order Accepted..');
			redirect(base_url('C_provider/viewOrder/').$oid);
		}

		public function cancleOrder()
		{
			$this->logged_in();
			$req=$this->input->post();

			$order=$this->Provider_model->view_order($req['odid']);

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
			redirect(base_url('C_provider/viewOrder/'.$req['odid']));

		}

		public function invoice($oid)
		{
			$this->logged_in();
			$data['order']=$this->db->where('oid',$oid)->get('orders')->result_array();

			$data['order_dtls']=$this->Provider_model->get_order_dtls($oid);
			foreach ($data['order_dtls'] as $o) 
			{
				$data['service'][]=$this->Provider_model->get_service_by_sid($o['sid']);	
			}	
			$data['user']=$this->Provider_model->get_user($data['order'][0]['uid']);
			$data['user_address']=$this->Common_model->get_address($data['order'][0]['uid']);
			$pid=$this->Common_model->get_service_provider($data['order_dtls'][0]['sid']);
			$data['provider']=$this->Common_model->get_provider($pid[0]['pid']);
			// 
			$this->load->view('provider/invoice',$data);
		}

		public function report()
		{
			$this->load->library('fpdf_gen');
			$this->fpdf->setFont('Arial','B',40);
			$this->fpdf->cell(40,20,'This is my CI PDF');
			echo $this->fpdf->Output('Mypdf.pdf','D');

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
			   
			    if($action == 'st'){
			    	$getdata = $this->Provider_model->staffRport();
			    	 $filename= 'Staff Report.xls';
			    }
			    elseif($action == 'sr'){
			    	$getdata = $this->Provider_model->serviceReport();
			    	 $filename= 'Service Report.xls';
			    }
			    elseif($action == 'fd'){
			    	$getdata = $this->Provider_model->feedbackReport();
			    	 $filename= 'Feedback Report.xls';
			    }
			    elseif($action == 'dl' || $action == 'wk' || $action == 'mt' || $action == 'y'){
			    	$getdata = $this->Provider_model->orderReport($action);
			    	 $filename= 'Order Report.xls';
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
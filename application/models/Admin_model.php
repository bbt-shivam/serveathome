<?php
	class Admin_model extends CI_Model
	{
		public function authenticate($data)
		{
			return $this->db->where(array('username'=>$data['username'],'password'=>$data['password']))
				->get('admin')->result_array();
		}
		public function categories($cid='')
		{
			if($cid=='')
				return $this->db->where('parent_id',0)->get('category')->result_array();
			else
				return $this->db->where('cid',$cid)->get('category')->result_array();
		}
		public function category_insert($data)
		{
			 if(isset($data['parentId']))
			 {
				$insert['cname']=$data['name'];
				$insert['parent_id']=$data['parentId'];
				$insert['cimg']=$data['image'];
				$insert['roll']=1;
				$this->db->insert('category',$insert);
			 }
			 else
			 {
				$insert['cname']=$data['name'];
				$insert['roll']=0;
				$insert['cimg']=$data['image'];
				$this->db->insert('category',$insert);
			}
			
		}
		public function service_categories($parent_id=0)
		{
			if($parent_id==0)
				return $this->db->where(array('roll'=>null))
					->get('category')->result_array();
			else
				return $this->db->where(array('parent_id'=>$parent_id,'roll'=>null))
					->get('category')->result_array();
		}
		public function service_category_insert($data)
		{
			$insert['cname']=$data['name'];
			$insert['parent_id']=$data['category'];
			$this->db->insert('category',$insert);	
		}
		public function deleteServiceCategory($cid)
		{
			$this->db->delete('category', array('cid' => $cid));
		}
		public function deleteCategory($cid,$path)
		{
			$this->db->delete('category', array('cid' => $cid));
			unlink($path);
		}
		public function update_category($data)
		{
			$set['cname']=$data['name'];
			$set['parent_id']=$data['parentId'];
			$where['cid']=$data['cid'];
			if(isset($data['image']))
			{
				$set['cimg']=$data['image'];
				$this->db->update('category',$set,$where);
			}
			else
			{
				$this->db->update('category',$set,$where);
			}
		}	
		public function get_all_subcategory()
		{
			return $this->db->where_not_in('parent_id',0)
					->get('category')->result_array();
		}
		public function get_subcategory($cid)
		{
			return $this->db->where('parent_id',$cid)
					->get('category')->result_array();
		}
		
		public function get_business_subcategories($cid='')
		{
			if($cid=='')
			{
				$data=$this->db->where('roll',1)->get('category')->result_array();
				return $data;
			}
			else
			{
				$data=$this->db->where(array('parent_id'=>$cid,'roll',1))->get('category')->result_array();
				return $data;
			}
		}

		public function get_inquiry()
		{
			return $this->db
				->limit(10)
				->order_by('inqid')
				->where('reply',0)
				->get('user_inquiry')->result_array();
		}

		public function get_admin($aid)
		{
			return $this->db->where('id',$aid)->get('admin')->result_array();
		}
		public function get_all_providers($status)
		{
				return $this->db->select('u.*,p.*,ua.*,c.*')
				->from('user as u,provider as p,user_address as ua, category as c')
				->join('user','p.uid = u.uid')
				->join('user_address','ua.uid = u.uid')
				->join('category','c.cid = p.cid')
				->where(array('ua.addline'=>1,'p.status'=>$status))
				->group_by('u.uid')
				// ->order_by('p.pid')
				->get()->result_array();
		}

		public function get_provider($uid=0)
		{
			if($uid==0)
			{
				return $this->db->select('u.name, u.email, u.dob, u.contact, u.gender, ua.cityid, p.p_wallet, ua.address, p.status')
					->from('user as u,provider as p,user_address as ua')
					->join('user','p.uid = u.uid')
					->join('user_address','ua.uid = u.uid')
					->group_by('u.uid')
					// ->order_by('p.pid')
					->get()->result_array();
			}
			else
			{
				return $this->db->select('u.name, u.email, u.dob, u.contact, u.gender, p.pancardno, p.p_wallet, ua.address, ua.areaid')
					->from('user as u,provider as p,user_address as ua')
					->join('user','p.uid = u.uid')
					->join('user_address','ua.uid = u.uid')
					->where(array('u.uid'=>$uid))
					->group_by('u.uid')
					->order_by('p.pid')
					->get()->result_array();
			}
		}

		public function get_customer($uid=0)
		{
			if($uid==0)
			{
				return $this->db->get('user')->result_array();
			}
			else
			{
				return $this->db->where(array('u.uid'=>$uid))
					->get('user')->result_array();
			}
		}

		public function count_users()
		{
			$result =  $this->db->group_by('uid')->get('user')->result_array();
			return count($result);
		}
		public function count_provider()
		{
			$result =  $this->db->where('status',1)->group_by('pid')->get('provider')->result_array();
			return count($result);
		}
		public function count_new_provider()
		{
			$result =  $this->db->where('status',0)->group_by('pid')->get('provider')->result_array();
			return count($result);
		}
		public function count_inactive_provider()
		{
			$result =  $this->db->where('status',2)->group_by('pid')->get('provider')->result_array();
			return count($result);
		}
		public function count_userinquiry()
		{
			$result =  $this->db->where('reply',0)->group_by('inqid')->get('user_inquiry')->result_array();
			return count($result);
		}
		public function count_services()
		{
			$result =  $this->db->group_by('sid')->get('services')->result_array();
			return count($result);
		}

		public function get_services($cid=0)
		{
			if($cid==0)
			{
				return $this->db->select('s.*,c.*,p.*')
					->from('services as s,category as c,provider as p')
					->join('category','c.cid = s.cid')
					->join('provider','s.pid = p.pid')
					->group_by('sid')
					->order_by('sid')
					->get()->result_array();
			}
			else
			{
				return $this->db->select('s.sid, c.cid, c.cname, sname, sdescription, si.iid, si.url')
					->from('services as s,category as c,service_images as si')
					->join('category','c.cid = s.cid')
					->join('service_images','s.sid = si.sid')
					->where(array('c.cid'=>$cid))
					->group_by('sid')
					->order_by('sid')
					->get()->result_array();
			}
		}
		public function get_coupans()
		{
			return $this->db->get('coupans')->result_array();
		}

		public function gte_coupan_by_cpnid($cpnid)
		{
			return $this->db->where('cpnid',$cpnid)->get('coupans')->result_array();
		}

		public function get_area($aid)
		{
			return $this->db->where('areaid',$aid)
				->get('area')->result_array();
		}
		public function get_city($cid)
		{
			return $this->db->where('cityid',$cid)
				->get('city')->result_array();
		}
		public function add_coupan($req)
		{
			$insert['cpn_code']=strtoupper($req['coupanCode']);
			$insert['cpn_type']=$req['coupanType'];
			$insert['discount']=$req['discount'];
			$insert['description']=$req['description'];
			$insert['valid_till']=$req['validTill'];
			$insert['applicable_for']=$req['applicableFor'];
			$insert['quantity']=$req['quantity'];
			$insert['status']=1;
			$this->db->insert('coupans',$insert);
		}
		public function edit_coupan($req)
		{
			// $insert['cpn_code']=strtoupper($req['coupanCode']);
			$update['cpn_type']=$req['coupanType'];
			$update['discount']=$req['discount'];
			$update['description']=$req['description'];
			$update['valid_till']=$req['validTill'];
			$update['applicable_for']=$req['applicableFor'];
			$update['quantity']=$req['quantity'];
			$update['status']=$req['status'];
			$this->db->where('cpnid',$req['cpnid'])->update('coupans',$update);
		}
		public function delete_coupan($cpnid)
		{
			$this->db->delete('coupans',array('cpnid' => $cpnid));
		}

		Public function userReport()
		{
			$result = $this->db->select('name, email, dob, contact, gender, date')
			->get('user')
			->result_array();

			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}

		public function providerReport()
		{
			$result = $this->db->select('p.shop_name, u.email, p.shop_contact, p.gstin, b.pan_no, b.acno, b.acname, b.bname, b.ifsc_code, p.status, p.reason')
			->from('user as u, provider as p, bank_dtls as b')
			->join('user','u.uid=p.pid')
			->join('bank_dtls','b.pid=p.pid')
			->group_by('p.pid')
			->get()
			->result_array();

			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}

		public function categoryReport()
		{
			$result = $this->db->select('cname')
			->where('roll',1)
			->get('category')
			->result_array();

			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}

		public function coupanReport()
		{
			$result = $this->db->select('cpn_code, cpn_type, discount, description, valid_till, applicable_for, quantity, status')
			->get('coupans')
			->result_array();

			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}


	}

?>

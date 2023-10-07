<?php

	class User_model extends CI_Model
	{

		public function autocomplete($keyword)
		{


			$result =  $this->db->select('c.cname, c.parent_id')
			->from('category as c, provider as p, user as u, user_address as ua')
			->join('category','c.cid = p.cid')
			->join('user','u.uid = p.uid')
			->join('user_address','u.uid = ua.uid')
			// ->where('ua.cityid',$city)
			->where('ua.addline',1)
			//->where('c.roll <=',1)
			->like('c.cname',$keyword)
			->group_by('c.cid')
			->get()->result_array();
			return $result;
		}

		public function authenticate($data)
		{
			return $this->db->where(array('email'=>$data['email'],'password'=>md5($data['password'])))
				->get('user')->result_array();
		}

		public function get_user($uid)
		{
			return $this->db->where('uid',$uid)
				->get('user')->result_array();
		}

		public function check_provider($uid)
		{
			return $this->db->select('u.*')
				->from('user as u, provider as p')
				->join('provider','p.uid = u.uid')
				->where('p.uid',$uid)
				->get()->result_array();
		}

		public function check_email($email)
		{
			return $this->db->where(array('email'=>$email))
				->get('user')->result_array();
		}
		public function category()
		{
			$result=$this->db->where(array('parent_id'=>0,'roll'=>0))
					->get('category')->result_array();
			return $result;
		}

		public function popular_category()
		{
			$result=$this->db->where(array('parent_id'=>0,'roll'=>0))
					->order_by('cid')
					->limit(5)
					->get('category')->result_array();
			return $result;
		}
		public function getSubcategory($cid)
		{
			$result=$this->db->where(array('parent_id'=>$cid,'roll'=>1))
					->get('category')->result_array();
			return $result;
		}
		public function fillCity()
		{
			$result=$this->db->get('city')->result_array();
			return $result;
		}

		public function get_parent($cid)
		{
			return $this->db->where('cid',$cid)->get('category')->result_array();
		}
		public function provider($cid=0, $page=1)
		{
			$start=($page-1)*4;
			if($cid==0)
			{
				return $this->db->select('p.*, u.*, ua.*,c.*')
					->from('provider as p, user as u, user_address as ua, category as c')
					->join('user','u.uid = p.uid')
					->join('category','c.cid = p.cid')
					->join('user_address','ua.uid = u.uid')
					->where('p.status',1)
					->group_by('pid')
					->limit(4,$start)
					->order_by('pid')
					->get()->result_array();
			}
			else
			{
				$parent = $this->User_model->get_parent($cid);
				return $this->db->select('p.*, u.*, ua.*,c.*')
					->from('provider as p, user as u, user_address as ua, category as c')
					->join('user','u.uid = p.uid')
					->join('category','c.cid = p.cid')
					->join('user_address','ua.uid = u.uid')
					->where('p.status',1)
					->where(array('p.cid'=>$cid))
					->or_where('p.cid',$parent[0]['parent_id'])
					// ->or_where('c.cid',$parent[0]['parent_id'])
					->where('p.status',1)
					->group_by('pid')
					->limit(4,$start)
					->order_by('pid')
					->get()->result_array();
			}
		}

		public function services($cid=0,$page=1)
		{
		//	$result=$this->db->query("select services.sid, sname, sdescription, iid, url from services, service_images where services.sid = service_images.sid order by services.sid desc")->result_array();
			$start=($page-1)*4;
			if($cid==0)
			{
				return $this->db->select('s.*, c.*, si.iid, si.url')
					->from('services as s,category as c,service_images as si')
					->join('category','c.cid = s.cid')
					->join('service_images','s.sid = si.sid')
					->group_by('sid')
					->limit(4,$start)
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
					->limit(4,$start)
					->order_by('sid')
					->get()->result_array();
			}
		}

		public function total_providers($cid=0)
		{
			if($cid==0)
			{
				$result=$this->db->select('p.*, u.*, ua.*,c.*')
					->from('provider as p, user as u, user_address as ua, category as c')
					->join('user','u.uid = p.uid')
					->join('category','c.cid = p.cid')
					->join('user_address','ua.uid = u.uid')
					->group_by('pid')
					->order_by('pid')
					->get()->result_array();
					return count($result);
			}
			else
			{
				$parent = $this->User_model->get_parent($cid);
				$result = $this->db->select('p.*, u.*, ua.*,c.*')
					->from('provider as p, user as u, user_address as ua, category as c')
					->join('user','u.uid = p.uid')
					->join('category','c.cid = p.cid')
					->join('user_address','ua.uid = u.uid')
					->where(array('p.cid'=>$cid))
					->or_where('p.cid',$parent[0]['parent_id'])
					->group_by('pid')
					->order_by('pid')
					->get()->result_array();
					return count($result);
			}
		}

		public function get_providers()
		{
			return $this->db->select('p.*, ua.*')
				->from('provider as p, user_address as ua, user as u')
				->get('provider')->result_array();
		}

		public function get_service($sid)
		{
			$result=$this->db->select('s.*')
				->from('services as s')
				->where(array('s.sid'=>$sid))
				->group_by('s.sid')
				->get()->result_array();
				return $result;
		}
		//review
		

		public function get_useraddress($uid)
		{
			$result =  $this->db->select('ua.*,c.*,s.*')
				->from('user as u,user_address as ua, city as c, state as s')
				->join('user_address','u.uid = ua.uid')
				->join('city','c.cityid = ua.cityid')
				->join('state','s.stateid = c.stateid')
				->where(array('ua.uid'=>$uid))
				->where('ua.addline',0)
				->group_by('ua.addrid')
				->get()->result_array();
				return $result;
		}

		public function get_coupan($uid)
		{
			$result = $this->db->select('*')
				->from('coupans')
				->where('valid_till >=', date("Y-m-d"))
				->where('status',1)
				->where('applicable_for',0)
        		->or_where('applicable_for',$uid)
        		->get()->result_array();

        	return $result;
		}

		public function checkCoupan($cpnid)
		{
			$uid = $this->session->userdata('user')['uid'];
			$result = $this->db->select('o.*')
				->from('orders as o, user as u')
				->join('user','u.uid = o.uid')
				->where('o.cpnid',$cpnid)
				->where('o.uid',$uid)
				->get()->result_array();
			return $result;
		}

		public function get_price($sid)
		{
			$result =  $this->db->select('price')
				->from('services')
				->where(array('sid'=>$sid))
				->get()->result_array();
				return $result;
	
		}

		public function get_order($oid)
		{
			return $this->db->select('o.*,s.*')
				->from('orders as o, order_dtls as od, services as s')
				->join('order_dtls','od.oid=o.oid')
				->join('services','s.sid=od.sid')
				->group_by('o.oid')
				->where('o.oid',$oid)
				->get()->result_array();
		}

		public function get_all_orders($uid,$state=0)
		{
			if($state==0)
			{
				return $this->db->select('o.*, p.*')
				->from('orders as o, order_dtls as od, provider as p, services as s')
				->join('order_dtls','od.oid = o.oid')
				->join('services','s.sid = od.sid')
				->join('provider','p.pid = s.pid')
				->where('o.uid',$uid)
				->where('o.order_status',$state)
				->or_where('o.order_status',1)
				->order_by('o.order_date','DESC')
				->group_by('o.oid')
				->get('orders')->result_array();
			}
			else
			{
				return $this->db->select('o.*, p.*')
				->from('orders as o, order_dtls as od, provider as p, services as s')
				->join('order_dtls','od.oid = o.oid')
				->join('services','s.sid = od.sid')
				->join('provider','p.pid = s.pid')
				->where('o.uid',$uid)
				->where('o.order_status',$state)
				->order_by('o.order_date','DESC')
				->group_by('o.oid')
				->get('orders')->result_array();
			}
			
		}

		public function get_order_dtls($oid)
		{
			return $this->db->select('od.*, s.*')
				->from('services as s, order_dtls as od')
				->join('services','s.sid = od.sid')
				->where('od.oid',$oid)
				->group_by('od.odtlsid')
				->get()->result_array();
		}

		public function get_recomended_services()
		{
			$category = $this->db->select('distinct(c.cname), c.cid, c.cimg, c.parent_id')
				->from('orders as o, order_dtls as od, services as s, category as c')
				->join('order_dtls','o.oid = od.oid')
				->join('services','s.sid = od.sid')
				->join('category','c.cid = s.cid')
				->group_by('c.parent_id')
				->order_by('count(od.sid)','DESC')
				->limit(8)
				->get()->result_array();
			foreach ($category as $c) {
				$result[] =  $this->User_model->get_parent($c['parent_id']);
			}

			return $result;
		}

		public function get_helth_wellness()
		{
			$result = $this->db->select('c.*')
				->from('category as c, provider as p')
				->join('provider','p.cid = c.cid')
				->where('c.parent_id',8)
				->or_where('c.parent_id',1)
				->or_where('c.parent_id',2)
				->or_where('c.cid',2)
				->group_by('c.cid')
				->get()->result_array();
				return $result;
		}

		public function customer_served()
		{
			$result = $this->db->select('*')
				->from('orders')
				->where('order_status',2)
				->group_by('uid')
				->get()->result_array();
				return count($result);
		}

		public function service_provider()
		{
			$result = $this->db->select('*')
				->from('provider')
				->where('status',1)
				->group_by('pid')
				->get()->result_array();
				return count($result);
		}

		public function services_categories()
		{
			$result = $this->db->select('*')
				->from('category')
				->where('roll',1)
				->group_by('cid')
				->get()->result_array();
				return count($result);
		}













	}

	


?>

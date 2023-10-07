<?php
	class Common_model extends CI_Model
	{
		public function remove_image($path)
		{
			unlink($path);
		}
		public function check_provider($uid)
		{
			return $this->db->select('u.*')
				->from('user as u, provider as p')
				->join('provider','p.uid = u.uid')
				->where('p.uid',$uid)
				->get()->result_array();
		}
		public function get_service_by_sid($sid)
		{
			return $this->db->where('sid',$sid)->get('services')->result_array();
		}
		public function get_country()
		{
			return $this->db->get('country')->result_array();
		}
		public function get_state($cid=0)
		{
			if($cid==0)
			{
				return $this->db->select('s.*')
					->from('state as s, country as c')
					->join('country','c.countryid = s.countryid')
					->group_by('s.stateid')
					->get()
					->result_array();
			}
			else
			{
				return $this->db->select('s.*')
					->from('state as s, country as c')
					->join('country','c.countryid = s.countryid')
					->where('s.countryid',$cid)
					->group_by('s.stateid')
					->get()
					->result_array();
			}
		}
		public function get_city($sid=0)
		{
			if($sid==0)
			{
				return $this->db->select('c.*')
				->from('state as s, city as c')
				->join('state','c.stateid = c.stateid')
				->group_by('c.cityid')
				->get()
				->result_array();
			}
			else
			{
				return $this->db->select('c.*')
				->from('state as s, city as c')
				->join('state','c.stateid = c.stateid')
				->where('c.stateid',$sid)
				->group_by('c.cityid')
				->get()
				->result_array();
			}
			
		}

		public function get_state_by_city($cityid)
		{
			return $this->db->select('s.*')
				->from('state as s, city as c')
				->join('city','s.stateid = c.stateid')
				->where('c.cityid',$cityid)
				->group_by('s.stateid')
				->get()
				->result_array();
		}
		public function get_address($uid=0)
		{
			if($uid==0)
			{
				$uid = $this->session->userdata('user')['uid'];
				return $this->db->select('ua.*, c.*, s.*')
					->from('user_address as ua, state as s, city as c')
					->join('city','c.cityid = ua.cityid')
					->join('state','s.stateid = c.stateid')
					->where('ua.uid',$uid)
					->group_by('ua.addrid')
					->get()
					->result_array();
			}	
			else
			{
				$uid = $this->session->userdata('user')['uid'];
				return $this->db->select('ua.*, c.*, s.*')
					->from('user_address as ua, state as s, city as c')
					->join('city','c.cityid = ua.cityid')
					->join('state','s.stateid = c.stateid')
					->where('ua.uid',$uid)
					->group_by('ua.addrid')
					->get()
					->result_array();
			}
		}

		public function get_provider_address($uid)
		{
			return $this->db->select('ua.*, c.*, s.*')
					->from('user_address as ua, state as s, city as c')
					->join('city','c.cityid = ua.cityid')
					->join('state','s.stateid = c.stateid')
					->where('ua.uid',$uid)
					->where('ua.addline',1)
					->group_by('ua.addrid')
					->get()
					->result_array();
		}

		public function delete_address($addrid)
		{
			$this->db->delete('user_address',array('addrid' => $addrid));
		}

		public function get_provider($pid)
		{
			return $this->db->select('p.*, u.*, ua.*,c.*,ct.*')
					->from('provider as p, user as u, user_address as ua, category as c, city as ct')
					->join('user','u.uid = p.uid')
					->join('category','c.cid = p.cid')
					->join('user_address','ua.uid = u.uid')
					->join('city','ct.cityid = ua.cityid')
					->where(array('ua.addline'=>1,'p.pid'=>$pid))
					->group_by('p.pid')
					->get()->result_array();
		}
		public function get_provider_details($uid)
		{
			return $this->db->select('p.*,b.*,ua.*,c.*,u.*')
				->from('category as c,provider as p,user as u,user_address as ua,bank_dtls as b')
				->join('category','c.cid = p.cid')
				->join('bank_dtls','b.pid = p.pid')
				->join('user','u.uid = p.uid')
				->join('user_address','ua.uid = u.uid')
				->where(array('ua.addline'=>1,'p.uid'=>$uid))
				->group_by('p.pid')
				->get()->result_array();
		}
		public function get_service_provider($sid)
		{
			return $this->db->select('p.pid')
					->from('provider as p, services as s')
					->join('provider','p.pid = s.pid')
					->where('s.sid',$sid)
					->get()->result_array();
		}

		public function get_avg_review($pid)
		{
			$this->db->select_avg('ratings');
			$result=$this->db->select('count(pid)')
				->where('pid',$pid)
				->group_by('rid')
				->get('review')
				->result_array();
				return $result;
		}

		public function get_review($pid)
		{	
			$result=$this->db->select('ratings,description,r.date,u.name')
				->where(array('pid'=>$pid))
				->from('review as r, user as u')
				->join('user','u.uid = r.uid')
				->group_by('r.uid')
				->get()->result_array();
			return $result;
		}	

		public function count_star($pid,$star)
		{
			// $total = $this->get_avg_review($pid);
			$result=$this->db->select('count(pid)')
				->where('pid',$pid)
				->where('ratings',$star)
				->get('review')
				->result_array();
			return $result[0]['count(pid)']; 

		}

		public function check_order_rating($oid)
		{
			return $this->db->select('*')
				->where('oid',$oid)
				->get('review')->result_array();
		}
		

		public function get_Subcategory($cid)
		{
			$result=$this->db->where('parent_id',$cid)
					->get('category')->result_array();
			return $result;
		}

		public function get_services($pid,$cid=0)
		{
			return $this->db->select('s.*,c.cname')
				->from('services as s, provider as p, category as c')
				->join('provider','p.pid = s.pid')
				->join('category','c.cid = s.cid')
				->where('s.pid',$pid)
				->group_by('s.sid')
				->get()
				->result_array();
		}

		public function count_service_orders($sid)
		{
			// $result =  $this->db->select('count(sid)')
			// 	->where('sid',$sid)
			// 	->get('order_dtls')->result_array();

			$result = $this->db->select('o.*')
				->from('orders as o, order_dtls as od')
				->join('order_dtls','od.oid = o.oid')
				->where('o.order_status',2)
				->where('od.sid',$sid)
				->group_by('od.oid')->get()->result_array();

			if(count($result) > 0)
				return count($result);
			else
				return 0;
		}

		public function count_provider_orders($pid)
		{
			$result = $this->db->select('o.oid')
				->from('provider as p, orders as o, order_dtls as od, services as s')
				->join('order_dtls','o.oid = od.oid')
				->join('services','s.sid = od.sid')
				->join('provider','s.pid = p.pid')
				->where('p.pid',$pid)
				->where('o.order_status',2)
				->group_by('o.oid')
				->order_by('o.oid')
				->get()->result_array();

			return count($result);

		}

		public function get_service_category($pid)
		{
			return $this->db->select('s.sid,s.cid,c.cname')
			->from('services as s, category as c')
			->join('category','s.cid = c.cid')
			->where('s.pid',$pid)
			->group_by('s.cid')
			->get()
			->result_array();
		}
 


 		public function get_staff_by_staffid($staff)
		{
			return $this->db->select('*')
				->where('staffid',$staff)
				->get('p_staff')->result_array();
		}

		public function count_month_order()
		{
			return $this->db->query('SELECT count(oid) as TotalOrder, order_date 
				FROM orders WHERE substr(order_date, 1, 7) = date("Y-m") AND order_status = 2 GROUP BY order_date')->result_array();

			// return $this->db->select('count(oid), order_date')
			// 	// ->where(substr('order_date', 1, 7),date('Y-m'))
			// 	->where('order_status',2)
			// 	// ->group_by('substr(order_date, 1, 10)')
			// 	->get('orders')->result_array();
		}



	}

?>
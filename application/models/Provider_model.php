<?php
	class Provider_model extends CI_Model
	{
		public function check_provider($uid)
		{
			return $this->db->select('u.*')
				->from('user as u, provider as p')
				->join('provider','p.uid = u.uid')
				->where('p.uid',$uid)
				->get()->result_array();
		}
		
		public function get_services($pid)
		{
			return $this->db->select('s.*,c.*')
					->where(array('s.pid'=>$pid))
					->from('services as s,category as c')
					->join('category','c.cid = s.cid')
					->group_by('sid')
					->order_by('sid')
					->get()->result_array();
		}
		public function get_service_by_sid($sid)
		{
			return $this->db->where('sid',$sid)->get('services')->result_array();
		}

		public function get_staff($pid)
		{
			return $this->db->select('s.*')
				->from('p_staff as s, provider as p')
				->join('provider','p.pid = s.pid')
				->where('s.pid',$pid)
				->group_by('s.staffid')
				->get()->result_array();
		}
		public function get_available_staff()
		{
			$provider=$this->get_provider();
			return $this->db->select('s.*')
				->from('p_staff as s, provider as p')
				->join('provider','p.pid = s.pid')
				->where('s.pid',$provider[0]['pid'])
				// ->where('s.status',0)
				->group_by('s.staffid')
				->get()->result_array();
		}
		public function get_staff_by_staffid($staff)
		{
			return $this->db->select('*')
				->where('staffid',$staff)
				->get('p_staff')->result_array();
		}

		public function update_staff($data) 
		{
			$this->db->where('staffid',$data['staffid'])->update('p_staff',$data); 
		}

		public function get_provider()
		{
			$uid=$this->session->userdata('user')['uid'];
			return $this->db->where(array('uid'=>$uid))
				->get('provider')->result_array();
		}

		public function get_bank_detail($pid)
		{
			return $this->db->where(array('pid'=>$pid))
				->get('bank_dtls')->result_array();
		}

		public function get_roll()
		{
			$result=$this->db->where(array('parent_id'=>0,'roll'=>0))
				->get('category')->result_array();
			return $result;
		}

		public function check_business_subcategory()
		{
			$uid=$this->session->userdata('user')['uid'];
			$cid=$this->db->select('cid')
				->where(array('uid'=>$uid))
				->get('provider')->result_array();

			$result=$this->db->where(array('cid'=>$cid[0]['cid'],'roll'=>0))
				->get('category')->result_array();
			return $result;
		}

		public function get_category($cid='')
		{
			if($cid=='')
			{
				$uid=$this->session->userdata('user')['uid'];
				$cid=$this->db->select('cid')
					->where(array('uid'=>$uid))
					->get('provider')->result_array();
				$result=$this->db->where(array('parent_id'=>$cid[0]['cid']))
					->get('category')->result_array();
				return $result;
			}
			else
			{
				$result=$this->db->where(array('parent_id'=>$cid))
					->get('category')->result_array();
				return $result;
			}
		}

		public function get_Subcategory($cid)
		{
			return $this->db->where('parent_id',$cid)
				->get('category')->result_array();
		}
		public function service_insert($data)
		{
			$pid=$this->Provider_model->get_provider();
			$insert['cid']=$data['cat'];
			$insert['pid']=$pid[0]['pid'];
			$insert['sname']=$data['sname'];
			$insert['simage']=$data['simage'];
			$insert['mrp']=$data['mrp'];
			$insert['price']=$data['sprice'];
			$insert['sdescription']=$data['sdescription'];
			$insert['s_status']=0;
			if($data['stime'] != '')
				$insert['time']=$data['stime'];

			$insert['cityid']=1;
			$this->db->insert('services',$insert);
			$this->session->set_flashdata('msg_upload',"Service uploaded successfully");
			return $this->db->insert_id();
		}
		// public function update_images($sid,$url)
		// {
		// 	$insert['sid']=$sid;
		// 	$insert['url']=$url;
		// 	$this->db->insert('service_images',$insert);
		// }

		public function update_service($data)
		{
			$pid=$this->Provider_model->get_provider();
			if(isset($data['simage']))
				$update['simage']=$data['simage'];
			
			$update['cid']=$data['cat'];
			$update['pid']=$pid[0]['pid'];
			$update['sname']=$data['sname'];
			$update['price']=$data['sprice'];
			$update['sdescription']=$data['sdescription'];
			$update['s_status']=$data['status'];
			if($data['stime'] != '')
				$update['time']=$data['stime'];
			
			$this->db->where('sid',$data['sid'])->update('services',$update);
			$this->session->set_flashdata('msg_upload',"Service Updated successfully");
			return $this->db->insert_id();
		}


		public function delete_service($sid)
		{
			$this->db->delete('services', array('sid' => $sid));
		} 

		public function get_order($pid,$status='null')
		{
			if($status=='null')
			{
				return $this->db->select('s.*,o.*,od.*')
					->from('services as s, orders as o, order_dtls as od')
					->join('order_dtls','od.oid = o.oid')
					->join('services','s.sid = od.sid')
					->where('s.pid',$pid)
					->group_by('o.oid')
					->get()->result_array();
			}
			else
			{
				return $this->db->select('s.*,o.*,od.*')
					->from('services as s, orders as o, order_dtls as od')
					->join('order_dtls','od.oid = o.oid')
					->join('services','s.sid = od.sid')
					->where('s.pid',$pid)
					->where('o.order_status',$status)
					->group_by('o.oid')
					->get()->result_array();
			}

		}

		public function view_order($oid)
		{
			return $this->db->select('o.*,od.*,s.*')
				->from('orders as o, order_dtls as od, services as s')
				->join('order_dtls','o.oid=od.oid')
				->join('services','s.sid=od.sid')
				->where('o.oid',$oid)
				->group_by('o.oid')
				->get()->result_array();
		}

		public function count_new_order()
		{
			$provider=$this->get_provider();
			$result = $this->db->select('o.*')
					->from('services as s, orders as o, order_dtls as od, provider as p')
					->join('order_dtls','od.oid = o.oid')
					->join('services','s.sid = od.sid')
					->join('provider','p.pid = s.pid')
					->where('s.pid',$provider[0]['pid'])
					->where('o.order_status',0)
					->group_by('o.oid')
					->get()->result_array();
			return count($result);
		}

		public function count_running_order()
		{
			$provider=$this->get_provider();
			$result = $this->db->select('o.*')
					->from('services as s, orders as o, order_dtls as od, provider as p')
					->join('order_dtls','od.oid = o.oid')
					->join('services','s.sid = od.sid')
					->join('provider','p.pid = s.pid')
					->where('s.pid',$provider[0]['pid'])
					->where('o.order_status',1)
					->group_by('o.oid')
					->get()->result_array();
			return count($result);
		}

		public function count_canclled_order()
		{
			$provider=$this->get_provider();
			$result = $this->db->select('o.*')
					->from('services as s, orders as o, order_dtls as od, provider as p')
					->join('order_dtls','od.oid = o.oid')
					->join('services','s.sid = od.sid')
					->join('provider','p.pid = s.pid')
					->where('s.pid',$provider[0]['pid'])
					->where('o.order_status',-1)
					->group_by('o.oid')
					->get()->result_array();
			return count($result);
		}

		public function count_total_order()
		{
			$provider=$this->get_provider();
			$result = $this->db->select('o.*')
					->from('services as s, orders as o, order_dtls as od, provider as p')
					->join('order_dtls','od.oid = o.oid')
					->join('services','s.sid = od.sid')
					->join('provider','p.pid = s.pid')
					->where('s.pid',$provider[0]['pid'])
					->where('o.order_status',2)
					->group_by('o.oid')
					->get()->result_array();
			return count($result);
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

		public function get_user($uid)
		{
			return $this->db->where('uid',$uid)
				->get('user')->result_array();
		}


		public function staffRport()
		{
			$result =  $this->db->select('name, code, contact')->get('p_staff')->result_array();

			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}

		public function serviceReport()
		{
			$provider=$this->get_provider();

			$result = $this->db->select('s.sname, s.mrp, s.price, s.time, c.cname,  s.sdescription')
					->where(array('s.pid'=>$provider[0]['pid']))
					->from('services as s,category as c')
					->join('category','c.cid = s.cid')
					->group_by('sid')
					->order_by('sid')
					->get()->result_array();

				if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}

		public function feedbackReport()
		{
			$provider=$this->get_provider();
			$result=$this->db->select('ratings,description,r.date,u.name')
				->where(array('pid'=>$provider[0]['pid']))
				->from('review as r, user as u')
				->join('user','u.uid = r.uid')
				->group_by('r.uid')
				->get()->result_array();
			
			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}

		public function orderReport($action)
		{
			$provider=$this->get_provider();

			if($action == 'dl'){
				$result = $this->db->query('SELECT o.* FROM services as s, orders as o, order_dtls as od  WHERE od.oid = o.oid AND s.sid = od.sid AND s.pid = '.$provider[0]['pid'].' AND o.order_date > DATE_SUB(NOW(), INTERVAL 1 DAY) GROUP BY o.oid ORDER BY o.oid')->result_array();
			}
			elseif ($action == 'wk') {
				$result = $this->db->query('SELECT o.* FROM services as s, orders as o, order_dtls as od  WHERE od.oid = o.oid AND s.sid = od.sid AND s.pid = '.$provider[0]['pid'].' AND o.order_date > DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY o.oid ORDER BY o.oid')->result_array();
			}
			elseif ($action == 'mt') {
				$result = $this->db->query('SELECT o.* FROM services as s, orders as o, order_dtls as od  WHERE od.oid = o.oid AND s.sid = od.sid AND s.pid = '.$provider[0]['pid'].' AND o.order_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) GROUP BY o.oid ORDER BY o.oid')->result_array();
			}
			elseif ($action == 'y') {
				$result = $this->db->query('SELECT o.* FROM services as s, orders as o, order_dtls as od  WHERE od.oid = o.oid AND s.sid = od.sid AND s.pid = '.$provider[0]['pid'].' AND o.order_date > DATE_SUB(NOW(), INTERVAL 1 YEAR) GROUP BY o.oid ORDER BY o.oid')->result_array();
			}

			if(count($result)>0)
				return $result;
			else
				return array('0' => array(''=>'No data found'));
		}



	}
?>
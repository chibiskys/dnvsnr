<?php 
	class Member {
		private $db;
		private $tbname = "member";

		
		public function __construct(&$dbObj) {
			$this->db = $dbObj;
		}

				
		public function hasMember($username) {
			$sql = "select * from " . $this->tbname . " where username = '" . $username . "'";
			$dataInfo = $this->db->getRow($sql);
			if (!empty($dataInfo)) {
				return false;
			} 
			return true;
		}

		public function addMember($data) {
			if ($this->hasMember($data["username"])) {
				return $this->db->add($this->tbname,$data);	
			} 
			return false;
		}

		public function login($data) {
			$sql = "select * from " . $this->tbname . " where username = '" . $data['username'] . "'";
			$dataInfo = $this->db->getRow($sql);
			if (!empty($dataInfo)) {
				if ($data["userpwd"] == $dataInfo["userpwd"]) {
					return $dataInfo;
				} else {
					return false;
				}
			}
		}

		public function getMemberInfo($id) {
			return $this->db->getRow("select * from " . $this->tbname . " where id = " . $id);
		}

		public function getMemberNameById($id) {
			$memberInfo = $this->getMemberInfo($id);
			return $memberInfo["username"];
		}

	}

	
	// $memberInfo = array(
	// 		'username' => 'wzl',
	// 		'userpwd' => '123456'
	// 	);
	// $memberModel->addMember($memberInfo);
 ?>
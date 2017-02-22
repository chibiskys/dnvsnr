<?php 
	//require("../lib/Mysql.class.php");
	class MsgModel {
		private $db;
		private $tbName = "message";

		public function __construct($dbObj) {
			$this->db = $dbObj;
		}

		public function getMsgList($p,$pagesize) {
			$sql = "SELECT m.*,c.`cat_name`,c.`pid` FROM message AS m LEFT JOIN category AS c ON m.cat_id = c.cat_id ORDER BY m.message_id DESC limit " . ($p-1) * $pagesize . " , " . $pagesize;
			return $this->db->getAll($sql);
		}

		public function getMsgListByCatId($p,$pagesize,$cat_id) {
			$sql = "SELECT m.*,c.`cat_name`,c.`pid` FROM message AS m LEFT JOIN category AS c ON m.cat_id = c.cat_id where m.cat_id = {$cat_id} ORDER BY m.message_id DESC limit " . ($p-1) * $pagesize . " , " . $pagesize;
			return $this->db->getAll($sql);
		}

		public function addMsg($data) {
			return $this->db->add($this->tbName,$data);
		}

		public function delMsg($id) {
			return $this->db->delete("delete from message where message_id = " . $id);
		}

		public function getTotal() {
			return $this->db->getCol("select count(*) as total from message");
		}

		public function getTotalByCatId($catid) {
			return $this->db->getCol("select count(*) as total from message where cat_id = " . $catid);
		}

		public function getMsgInfo($id) {
			return $this->db->getRow("select * from message where message_id = " . $id);
		}

		public function updateMsg($data,$condition) {
			return $this->db->update($this->tbName,$data,$condition);
		}
	}

	// $msgModel = new MsgModel($mysql);
	
 ?>
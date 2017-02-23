<?php 
	class CommentModel {
		private $tbname = "comment";
		private $db;

		public function __construct(&$dbObj) {
			$this->db = $dbObj;
		}

		public function addComment($data) {
			return $this->db->add($this->tbname,$data);	
		}

		public function getCommentList($p,$pagesize) {
			$sql = "select * from " . $this->tbname . " where message_id = " . $_REQUEST["id"] . " and is_show = 1 order by comment_id desc";
			$sql .= " limit " . ($p - 1) * $pagesize . "," . $pagesize;
			return $this->db->getAll($sql);
		}

		public function getTotal($id) {
			return $this->db->getCol("select count(*) from comment where message_id = " . $id . " and is_show = 1");
		}

	}
 ?>
<?php 
	class SlideModel {
		private $db;
		private $tbName = "slide";

		public function __construct(&$db) {
			$this->db = $db;
		}	

		public function addSlide($data) {
			return $this->db->add($this->tbName,$data);
		}

		public function deleteSlide($id) {
			return $this->db->delete("delete from " . $this->tbName . " where slide_id = $id");
		}

		public function getSlideInfo($id) {
			return $this->db->getRow("select * from slide where slide_id = " . $id);	
		}

		public function updateSlide($data,$condition) {
			return $this->db->update($this->tbName,$data,$condition);
		}

		public function getSlideList() {
			return $this->db->getAll("select * from {$this->tbName} order by slide_id desc");
		}

	}
 ?>
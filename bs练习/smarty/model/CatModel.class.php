<?php 
	class CatModel {
		private $db;
		private $tbName = "category";

		public function __construct(&$dbObj) {
			$this->db = $dbObj;
		}

		public function addCat($catInfo) {
			if (empty($catInfo["cat_name"])) return false; 
			if ($this->hasCat($catInfo["cat_name"])) {
				return $this->db->add($this->tbName,$catInfo);
			} else {
				return false;
			}
		}

		public function editCat($id) {
			return $this->db->getRow("select * from " . $this->tbName . " where cat_id = " . $id);
		}

		public function updateCat($catInfo,$condition) {
			if ($this->hasCat($catInfo["cat_name"])) {
				return $this->db->update($this->tbName,$catInfo,$condition);	
			} else {
				return false;
			}
			
		}

		public function deleteCat($id) {
			return $this->db->delete("delete from " . $this->tbName . " where cat_id = " . $id);
		}

		public function getCatList() {
			return $this->db->getAll("select * from " . $this->tbName . " order by cat_id desc");
		}

		public function hasCat($catName) {
			$sql = "select * from $this->tbName where cat_name = '" . $catName . "'";
			$catInfo = $this->db->getRow($sql);
			if (empty($catInfo)) {
				return true;
			} 
			return false;
		}
	}

 ?>
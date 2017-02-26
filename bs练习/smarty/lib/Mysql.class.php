<?php 
	header('content-type:text/html;charset=utf-8');
	class Mysql {
		private $dbHost;
		private $dbUser;
		private $dbPwd;
		private $dbName;

		/**
		 * 构造方法
		 * @param [type] $h  [description]
		 * @param [type] $u  [description]
		 * @param [type] $p  [description]
		 * @param [type] $db [description]
		 */
		public function __construct($h,$u,$p,$db) {
			$this->dbHost = $h;
			$this->dbUser = $u;
			$this->dbPwd = $p;
			$this->dbName = $db;
			if ($this->connect()) {
				$this->selectDb();
				$this->setDbCode();
			} else {
				echo 'connect error';	
			}
			
		}		

		/**
		 * 连接数据库
		 * @return [type] [description]
		 */
		public function connect() {
			return mysql_connect($this->dbHost,$this->dbUser,$this->dbPwd,$this->dbName);
		}

		/**
		 * 选择数据库
		 * @return [type] [description]
		 */
		public function selectDb() {
			mysql_select_db($this->dbName);
		}

		/**
		 * 设置数据库编码
		 */
		public function setDbCode() {
			mysql_query('set names utf8');
		}

		/**
		 * 执行mysql_query返回资源result
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		public function query($sql) {
			return mysql_query($sql);
		}

		/**
		 * 返回所有记录
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		public function getAll($sql) {
			$res = $this->query($sql);
			$list = array();
			while ($row = mysql_fetch_assoc($res)) {
				$list[] = $row;
			}
			return $list;
		}

		/**
		 * 返回一条记录
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		public function getRow($sql) {
			$res = $this->query($sql);
			return mysql_fetch_assoc($res);
		}

		/**
		 * 返回首行首列
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		public function getCol($sql) {
			$res = $this->query($sql);
			$row = mysql_fetch_row($res);
			return $row[0];
		}

		/**
		 * 删除一条记录
		 * @param  [type] $sql [description]
		 * @return [type]      [description]
		 */
		public function delete($sql) {
			return $this->query($sql);
		}

		/**
		 * 添加一条记录
		 * @param [type] $tbname [description]
		 * @param [type] $data   [description]
		 */
		public function add($tbname,$data) {
			$sql = "insert into " . $tbname ."(";
			$keys = implode(',', array_keys($data));
			$sql .= $keys . ") values ('";
			$sql .= implode("','", array_values($data));
			$sql .= "')";
			return $this->query($sql);
		}

		/**
		 * 修改一条记录
		 * @param  [type] $tbname    [description]
		 * @param  [type] $data      [description]
		 * @param  [type] $condition [description]
		 * @return [type]            [description]
		 */
		public function update($tbname,$data,$condition) {
			$sql = "update " . $tbname . " set ";
			foreach ($data as $k=>$v) {
				$sql .= $k . " = '" . $v . "',";
			}
			$sql = substr($sql, 0, -1);
			$sql .= " " . $condition;
			return $this->query($sql);
		}
	}

	$mysql = new Mysql('localhost','root','root','php');

 ?>
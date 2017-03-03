<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		.paging a {display:inline-block;padding:2px 4px;margin-left:4px;border:1px solid #ccc;text-decoration: none;color:#333;font-size: 12px;font-family: '微软雅黑';}
		.paging a.active {background: #F5EEEE;}
	</style>
</head>
<body>
	
</body>
</html>
<?php 
	class Page {
		private $total;
		private $pagesize;
		private $page;
		private $p;
		private $url;
		private $step = 8;
		private $offset = 5;

		public function __construct($total,$pagesize) {
			$this->total = $total ? $total : 0;
			$this->pagesize = $pagesize ? $pagesize : 5;	
			$this->page = ceil($this->total / $this->pagesize);
			$this->setCurrentPage();
			$this->setCurrentUrl();
		}

		public function setCurrentPage() {
			$p = !empty($_REQUEST["p"]) ? $_REQUEST["p"] : 1;
			if (!empty($p)) {
				if ($p > 0) {
					if ($p > $this->page) {
						$this->p = $this->page;
					} else {
						$this->p = $p;
					}
				} else {
					$this->p = 1;
				} 
			} else {
				$this->p = 1;
			}
		}

		public function setCurrentUrl() {
			$page_url = $_SERVER["REQUEST_URI"];
			$url_parse = parse_url($page_url);
			$new_url = "";
			if (isset($url_parse["query"])) {
				$args = array();
				parse_str($url_parse["query"],$args);
				if (isset($args['p'])) {
					unset($args['p']);
				}
				$new_url = $url_parse["path"] . "?" . http_build_query($args) . "&";
			} else {
				$new_url = $url_parse["path"] . "?";
			}
			
			$this->url = $new_url;
		}

		public function build_page_list() {
			$str = '';
			$str .= '<div class="paging">';
			$str .= $this->firstPage();
			$str .= $this->prePage();

			$start = '';
			$end = '';
			if ($this->p < $this->step - 1) {
				$start = 1;
				$end = $this->step;
				if ($end > $this->page) {
					$end = $this->page;
				}
			} else {
				$start = $this->p - $this->offset;
				$end = $this->p + $this->step - $this->offset - 1;
				if ($end > $this->page) {
					$end = $this->page;
				}
			}
			$active = '';
			for ($i = $start; $i <= $end; $i++) {
				if ($i == $this->p) {
					$active = 'class= "active"'; 
				} else {
					$active = '';
				}
				$str .= '<a ' . $active . ' href="' . $this->url . 'p=' . $i . '">' . $i . '</a>';
			}
			$str .= $this->nextPage();
			$str .= $this->lastPage();
			$str .= '</div>';
			echo $str;
		}

		public function firstPage() {
			return '<a href="' . $this->url . 'p=1">首页</a>';
		}

		public function lastPage() {
			return '<a href="' . $this->url . 'p=' . $this->page . '">尾页</a>';
		}

		public function prePage() {
			if ($this->p > 1) {
				return '<a href="' . $this->url . 'p=' . ($this->p - 1) . '">上一页</a>';
			} else {
				return '<a href="javascript:;">上一页</a>';	
			}
		}

		public function nextPage() {
			if ($this->p < $this->page) {
				return '<a href="' . $this->url . 'p=' . ($this->p + 1) . '">下一页</a>';
			} else {
				return '<a href="javascript:;">下一页</a>';	
			}
		}


	}
	$page = new Page(40,4);
	$page->build_page_list();
	echo "<pre>";
	print_r($page);
	echo "</pre>";
?>
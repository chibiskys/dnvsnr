<?php 
	/**
	 * 分页
	 * @param  [type] $p    [description]
	 * @param  [type] $page [description]
	 * @return [type]       [description]
	 */
	function showpage($p,$page) {
		$str = '<ul class="pagination">';
		$str .= '<li><a href="?p=1">首页</a></li>';
		if ($p == 1) {
			$str .= '<li><a href="javascript:;">上一页</a></li>';
		} else {
			$str .= '<li><a href="?p=' . ($p-1) . '">上一页</a></li>';
		}
		$active = '';
		for ($i = 1; $i <= $page; $i++) {
			if ($i == $p) {
				$active = 'active';
			} else {
				$active = '';
			}
			$str .= '<li class="' . $active . '"><a  href="?p=' . $i . '">' . $i . '</a></li>';
		
		}
		if ($p == $page) {
		$str .= '<li><a href="javascript:;">下一页</a></li>';
		} else {
		$str .= '<li><a href="?p=' . ($p+1) . '">下一页</a></li>';
		}
		$str .= '<li><a href="?p=' . $page . '">未页</a></li>';
		$str .= '</ul>';
		return $str;
	}

	/**
	 * 文件上传
	 * @return [type] [description]
	 */
	function upload() {
		if (isset($_FILES["photo"])) {
			if ($_FILES["photo"]["error"] == 0) {
				$uploadfile = "../upload/";
				$tmp_name = $_FILES["photo"]["tmp_name"];
				$filename = $_FILES["photo"]["name"];
				$ext = array("jpg","gif","png");
				$fileinfo = explode(".",$filename );
				$fileExt = array_pop($fileinfo);
				if (!is_dir($uploadfile)) {
					mkdir($uploadfile,777);
				}
				if (!in_array(strtolower($fileExt), $ext)) {
					return false;
				} else {
					$filename = md5($filename) . date("YmdHis") . "." . $fileExt;
					if (move_uploaded_file($tmp_name, $uploadfile . $filename)) {
							return $filename;
					} else {
						return false;
					}
				}
			}
		}
	}
 ?>
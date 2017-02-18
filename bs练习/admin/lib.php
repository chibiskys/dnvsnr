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
 ?>
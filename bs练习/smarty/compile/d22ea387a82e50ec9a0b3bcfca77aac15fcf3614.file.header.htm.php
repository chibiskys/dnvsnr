<?php /* Smarty version Smarty-3.1.10, created on 2017-02-26 17:45:21
         compiled from ".\template\header.htm" */ ?>
<?php /*%%SmartyHeaderCode:1767958b29295350ad2-33052594%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd22ea387a82e50ec9a0b3bcfca77aac15fcf3614' => 
    array (
      0 => '.\\template\\header.htm',
      1 => 1488102299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1767958b29295350ad2-33052594',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_58b2929537ba64_97748467',
  'variables' => 
  array (
    'cid' => 0,
    'catList' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b2929537ba64_97748467')) {function content_58b2929537ba64_97748467($_smarty_tpl) {?><link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>.bd {
	border:1px solid #eee;margin:10px 0;padding-left:10px;}
	.mt10 {
		margin-top:15px;margin-right:10px;}
</style>
<link rel="stylesheet" href="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="row">
	<div class="col-md-12">
		<nav class="navbar navbar-default" role="navigation">

			<ul class="nav navbar-nav">
				<li class="dropdown <?php if ($_smarty_tpl->tpl_vars['cid']->value==0){?>active<?php }?>">
					<a href="/" >主页</a>
				</li>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['catList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<li class="dropdown <?php if ($_smarty_tpl->tpl_vars['cid']->value==$_smarty_tpl->tpl_vars['v']->value['cat_id']){?>active<?php }?>">
					<a href="./cat.php?cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cat_id'];?>
" ><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</a>
				</li>
				<?php } ?>
			</ul>
			<div class="pull-right mt10">
				<?php if (!empty($_SESSION['username'])){?>
				<a href="./user.php">欢迎您,<?php echo $_SESSION['username'];?>
</a>
				|
				<a href="./user.php?act=loginout">退出</a>
				<?php }else{ ?>
				<a href="./user.php">注册</a>
				|
				<a href="./user.php">登陆</a>
				<?php }?>
			</div>
		</nav>
	</div>
</div><?php }} ?>
<?php /* Smarty version Smarty-3.1.10, created on 2017-02-26 17:45:21
         compiled from ".\template\detail.htm" */ ?>
<?php /*%%SmartyHeaderCode:1065258b2929a4fb991-85280707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ed1a4509ef49aecf81f9cb5e0659ef0f56433a2' => 
    array (
      0 => '.\\template\\detail.htm',
      1 => 1488102236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1065258b2929a4fb991-85280707',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_58b2929a536321_13052238',
  'variables' => 
  array (
    'msgInfo' => 0,
    'commentList' => 0,
    'pageBar' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b2929a536321_13052238')) {function content_58b2929a536321_13052238($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\workspace\\php\\WWW\\smarty\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	
</head>
<body>

	<div class="container">
		<?php echo $_smarty_tpl->getSubTemplate ("header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="row"><?php echo $_smarty_tpl->getSubTemplate ("breadcrumb.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
		<div class="row">

			<h3 class="text-center"><?php echo $_smarty_tpl->tpl_vars['msgInfo']->value['title'];?>
</h3>
			<h4><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['msgInfo']->value['addtime'],'%Y-%m-%d %H:%M:%S');?>
</h4>

			<p>
				<?php if ($_smarty_tpl->tpl_vars['msgInfo']->value['img']!=''){?>
				<img src="./upload/<?php echo $_smarty_tpl->tpl_vars['msgInfo']->value['img'];?>
" alt="" style="width:200px;"></p>
				<?php }?>

			<p><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['msgInfo']->value['content'], ENT_QUOTES);?>
</p>

		</div>
		<?php if (!empty($_smarty_tpl->tpl_vars['commentList']->value)){?>
		<div class="row"><?php echo $_smarty_tpl->tpl_vars['pageBar']->value;?>
</div>
		<?php }?>
		<div class="row">
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['commentList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
	 		<div class="media">
	 			<div class="media-body">
	 				<div class="bd">
	 					<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</h3>
	 					<p>评论者:<?php echo $_smarty_tpl->tpl_vars['v']->value['reviewers'];?>
&nbsp;&nbsp;&nbsp;&nbsp;时间:<?php echo $_smarty_tpl->tpl_vars['v']->value['comment_time'];?>
</p>
	 				</div>
	 			</div>
	 		</div>
	 		<?php } ?>
		</div>

		<div class="row">
			<form  method="POST" role="form" class="form-horizontal">
				<div class="form-group">

					<div class="col-md-12">
						<textarea name="content"  class="form-control" rows="6" required="required"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-1">
						<button type="submit" class="btn btn-primary" name="publish">发布评论</button>
					</div>
				</div>

			</form>
		</div>

</div>
</body>
</html><?php }} ?>
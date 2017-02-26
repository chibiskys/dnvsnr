<?php /* Smarty version Smarty-3.1.10, created on 2017-02-26 17:45:34
         compiled from ".\template\cat.htm" */ ?>
<?php /*%%SmartyHeaderCode:1086258b292952db7b5-44529023%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4cb0117168c8dc58004b8eb98f8b0a358fd019a' => 
    array (
      0 => '.\\template\\cat.htm',
      1 => 1488102312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1086258b292952db7b5-44529023',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_58b2929533d258_82108490',
  'variables' => 
  array (
    'msgList' => 0,
    'v' => 0,
    'pageBar' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b2929533d258_82108490')) {function content_58b2929533d258_82108490($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\workspace\\php\\WWW\\smarty\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<?php echo $_smarty_tpl->getSubTemplate ("header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		
		<div class="row">
			<div class="col-md-10 col-md-push-1">
				<table class="table table-bordered table-hover text-center">
					<thead>
						<tr>
							<td>标题</td>
							<td>分类</td>
							<td>时间</td>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
						<tr>
							<td><a href="detail.php?cid=<?php echo $_smarty_tpl->tpl_vars['v']->value['cat_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['v']->value['message_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></td>
							<td><?php echo $_smarty_tpl->tpl_vars['v']->value['cat_name'];?>
</td>
							<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['addtime'],'%Y-%m-%d %H:%M:%S');?>
</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-push-3">
				<?php echo $_smarty_tpl->tpl_vars['pageBar']->value;?>

			</div>
		</div>
	</div>	
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.10, created on 2017-02-26 17:45:25
         compiled from ".\template\index.htm" */ ?>
<?php /*%%SmartyHeaderCode:2825358b2974041d2e8-17081280%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef9876dd42f86945aa73d0a4606e5cf5ae426f09' => 
    array (
      0 => '.\\template\\index.htm',
      1 => 1488102273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2825358b2974041d2e8-17081280',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_58b2974047ed88_39293278',
  'variables' => 
  array (
    'pageBar' => 0,
    'msgList' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b2974047ed88_39293278')) {function content_58b2974047ed88_39293278($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
</head>
<body>
<div class="container">
		<?php echo $_smarty_tpl->getSubTemplate ("header.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class="row">
			<?php echo $_smarty_tpl->tpl_vars['pageBar']->value;?>

			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msgList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<div class="media">
					
							<a class="pull-left" href="detail.php?cid=<?php echo $_smarty_tpl->tpl_vars['v']->value["cat_id"];?>
&id=<?php echo $_smarty_tpl->tpl_vars['v']->value["message_id"];?>
"><img class="media-object" style="width:200px;height:150px;" src="upload/<?php if ($_smarty_tpl->tpl_vars['v']->value['img']!=''){?><?php echo $_smarty_tpl->tpl_vars['v']->value['img'];?>
<?php }else{ ?>nopic.jpg<?php }?>" alt=""></a>
						
			
					<div class="media-body">
						<h3><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</h3>
						<div class="cnt"><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</div>
					</div>
				</div>
			<?php } ?>
			<?php echo $_smarty_tpl->tpl_vars['pageBar']->value;?>

		</div>
		

		
	</div>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.10, created on 2017-02-26 17:45:21
         compiled from ".\template\breadcrumb.htm" */ ?>
<?php /*%%SmartyHeaderCode:3263458b29321898594-12387539%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '424c9a473a1be9890eb65ab052a9963683a95692' => 
    array (
      0 => '.\\template\\breadcrumb.htm',
      1 => 1488102318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3263458b29321898594-12387539',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_58b293218a4112_05388861',
  'variables' => 
  array (
    'catInfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58b293218a4112_05388861')) {function content_58b293218a4112_05388861($_smarty_tpl) {?><ol class="breadcrumb">
	 		    <li><a href="/">首页</a></li>
	 		   
	 		    <li><a href="cat.php?cid=<?php echo $_smarty_tpl->tpl_vars['catInfo']->value['cat_id'];?>
"><?php if ($_smarty_tpl->tpl_vars['catInfo']->value['cat_name']!=''){?><?php echo $_smarty_tpl->tpl_vars['catInfo']->value['cat_name'];?>
<?php }?></a></li>	 		    
</ol>
<?php }} ?>
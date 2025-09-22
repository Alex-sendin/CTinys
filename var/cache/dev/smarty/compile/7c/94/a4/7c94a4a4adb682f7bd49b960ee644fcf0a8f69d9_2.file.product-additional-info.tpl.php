<?php
/* Smarty version 4.3.4, created on 2025-09-21 22:20:04
  from 'C:\xampp\htdocs\ctinys\themes\classic\templates\catalog\_partials\product-additional-info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_68d05df471e187_71509338',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7c94a4a4adb682f7bd49b960ee644fcf0a8f69d9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\ctinys\\themes\\classic\\templates\\catalog\\_partials\\product-additional-info.tpl',
      1 => 1758392561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68d05df471e187_71509338 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="product-additional-info js-product-additional-info">
  <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0], array( array('h'=>'displayProductAdditionalInfo','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl ) );?>

</div>
<?php }
}
